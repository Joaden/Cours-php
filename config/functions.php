<?php
/////////////////////////// CREATE FUNCTION
//Create article for article_write.php
function createArticle($user_id, $categorie_id, $title, $content, $author, $image, $hastag)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    
    // preparation de al requete
    $req = $bdd->prepare('INSERT INTO articles (user_id, categories_id, title, content, author, date) VALUES (?, ?, ?, ?, ?, NOW())');
    $req->execute(array($user_id, $categorie_id, $title, $content, $author));
    $req1 = $bdd->prepare('SELECT id FROM articles ORDER BY id DESC LIMIT 0,1');
    $postId = $req1->execute();
    
    if($req1->rowCount() > 0)
    {
        $data = $req1->fetch(PDO::FETCH_OBJ);
    
        $article_id = $data->id;
        
        $req1 = $bdd->prepare('INSERT INTO images (article_id, name, user_id) VALUES (?, ?, ?)');
        $req1->execute(array($article_id, $image, $user_id));

        $req1->closeCursor(); 
    }
}

////////////////////////////// create article with multi img
function createArticleMulti($articleId, $author, $userId)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    // preparation de la requete
    $req = $bdd->prepare('INSERT INTO images (article_id, name, user_id) VALUES (?, ?, ?)');
    $req->execute(array($postId, $name, $userId));

    $req->closeCursor(); 
}

////////////////////////////// Create User for page session_register.php
function createUser()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    if(!empty($_POST['name']) AND !empty($_POST['email'])AND !empty($_POST['email2']) AND !empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND empty($_POST['antibot']) AND !empty($_POST['captcha']))
    {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $email2 = htmlspecialchars($_POST['email2']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['mdp']);
            $password2 = htmlspecialchars($_POST['mdp2']);
            $phrase = htmlspecialchars($_POST['phrase']);
            // $avatar = htmlspecialchars($_POST['avatar']);
            $captcha = htmlspecialchars($_POST['captcha']);
            
            // sha1, md5, sha256 et sha512 ne sont plus sûres aujourdhui donc à ne plus utiliser !!!!
            // j'utilise password_hash() MAIS, faudra faire une petite recherche pour être sûr que ce soit sécurisé
            // $br = '<br>';
                    // echo $name . $br;
                    // echo $email . $br;
                    // echo $pseudo . $br;
                    // echo $hashedmdp . $br;
                    // echo " Send form register ok <br>";
                    // echo $hashedmdp2 . $br;
            if($_POST['captcha']=="20")
            {
                $pseudolength = strlen($pseudo);
                if($pseudolength <= 30)
                {
                    $reqpseudo = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
                    $reqpseudo->execute(array($pseudo));
                    $pseudoexist = $reqpseudo->rowCount();
                    if($pseudoexist == 0)
                    {
                        if($email == $email2)
                        {
                            // function avec filtre qui permet de vérifier si c'est bien une adresse mail
                            if(filter_var($email, FILTER_VALIDATE_EMAIL))
                            {
                                $reqmail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
                                $reqmail->execute(array($email));
                                $mailexist = $reqmail->rowCount();
                                // Si il n'y a pas cet email en base
                                if($mailexist == 0)
                                {
                                    if($password == $password2)
                                    {
                                        // hash de mdp , a voir si il y a plus sûr comme function
                                        $hashedmdp = password_hash($password, PASSWORD_DEFAULT);
                                        $insertmdr = $bdd->prepare("INSERT INTO users(name, email, pseudo, password, phrase) VALUE(?, ?, ?, ?, ?)");
                                        // On insère les $*** dans la requête
                                        $insertmdr->execute(array($name, $email, $pseudo, $hashedmdp, $phrase));

                                        //vérification & upload image 
                                        $updateAvatar = updateAvatar();
                                        
                                        $erreur = "Votre compte à bien été créé ! <a href=\"session_login.php\">Me Connecter</a>";
                                        $_SESSION['comptecree'] = "Votre compte à bien été créé !";
                                        header('Location: session_login.php');
                                        
                                    }
                                    else
                                    {
                                        $erreur = "Vos mots de passes ne correspondent pas.";
                                    }
                                }
                                else
                                {
                                    $erreur = "Votre adresse mail est déjà utilisé.";
                                }
                            }
                            else
                            {
                                $erreur = "Votre adresses mail n'est pas valide.";
                            }
                        }
                        else
                        {
                            // erreur email
                            $erreur = "Vos adresses mails ne correspondent pas.";
                        }
                    }
                    else
                    {
                        // erreur pseudo deja pris
                        $erreur = "Votre pseudo est déjà utlisé.";
                    }
                }
                else{
                    // erreur pseudo trop long
                    $erreur = "Votre pseudo ne doit pas dépasser 30 caractères.";
                }
            }
        else
        {
            // erreur captcha
            $erreur = "Veuillez renseigner la bonne réponse";
        }
    }else{
    // $erreurs champs incomplet
    $erreur = "Tous les champs doivent être complétés";
    }
    $req->closeCursor(); 

}

/////////////////////////// GET & ADD FUNCTION

// function qui récupère tous les articles
function getArticles()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    ///* prepare() = Création d'un objet PDOStatement */
    $req = $bdd->prepare('SELECT * FROM articles ORDER BY id DESC');
    ///* execute() = Exécute la première requête */
    $req->execute();
    /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
    $req->closeCursor();
    
}

// Get my articles
function getMyArticles($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $bdd->prepare('SELECT * FROM articles WHERE user_id = ? ORDER BY id ASC');
    $req->execute(array($id));
    if($req->rowCount() >= 1)
    {
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
    else{
         header('Location: home.php');
    $req->closeCursor();
    }
   
    
}

// Fonction qui récupère un article
function getArticle($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount() == 1)
    {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
        // $req->closeCursor();
    }
    else
    header('Location: index.php');
    $req->closeCursor();
}

//Get image for article in database, table images
function getImages()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    
    $error = null;
    try{
        // get all images from bdd.
        $req = $bdd->prepare('SELECT * FROM images ORDER BY id ASC');
        ///* execute() = Exécute la première requête */
        $req->execute();
        /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
        $data = $req->fetchAll(PDO::FETCH_OBJ); // affiche tous les resultats
        
        $req->closeCursor();
        return $data;
    }
    catch (PDOException $e){
        $error = $e->getMessage();
        printf("Il y a eu un problème"); 
    }
    
}

////////////////////////////// GET IMAGE ARTICLE
function getImage($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $bdd->prepare('SELECT * FROM images WHERE article_id = ? ');
    $req->execute(array($id));
    $data = $req->fetch(PDO::FETCH_OBJ);
    // echo $data;
    // var_dump($data);
    // die();
    $req->closeCursor();
    return $data;
}

// fonction ajouter un commentaire à un article
function addComment($articleId, $author, $comment)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $bdd->prepare('INSERT INTO comments (articleId, author, comment, date) VALUES (?, ?, ?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
    // // Vider le champs du form !
    unset($_POST['comment']);
    unset($comment);
}
// fonction récupère le commentaire par ID
function getComments($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $bdd->prepare('SELECT * FROM comments INNER JOIN users ON comments.author = users.pseudo AND articleId = ? ORDER BY comments.id DESC');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    
    $req->closeCursor();
    return $data;
}

function getAvatarByComment($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');

    $req = $bdd->prepare('SELECT articleId, author, pseudo, avatar FROM comments INNER JOIN users ON comments.author = users.pseudo AND articleId = ?');
    
    ///* execute() = Exécute la première requête */
    $req->execute(array($id));
    /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
    $req->closeCursor();

}

function getAvatar($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');

    $req = $bdd->prepare('SELECT * FROM articles INNER JOIN users ON articles.user_id = users.id AND articles.id = ?');
    
    ///* execute() = Exécute la première requête */
    $req->execute(array($id));
    /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
    /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
    $req->closeCursor();

}

function getUsers()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');

    // Sécurité authentification obligatoire à décommenter pour obliger la connexion d'un admin
    // if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1) {
    //     echo "<div class=\"container\"><div class=\"jumbotron\"><h1>Vous devez vous authentifier .</h1></div></div>";
    //     exit();
    // }
    // Si il y Get type and qu'il est égale à user
        if(isset($_GET['type']) AND $_GET['type'] == 'user') {
            //
            if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
                $confirme = (int) $_GET['confirme'];

                $req = $bdd->prepare('UPDATE users SET is_verified = 1 WHERE id = ?');
                $req->execute(array($confirme));
            }
            if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
                $supprime = (int) $_GET['supprime'];
                
                $req = $bdd->prepare('DELETE FROM users WHERE id = ?');
                $req->execute(array($supprime));
            }
        } elseif(isset($_GET['type']) AND $_GET['type'] == 'commentaire') {
            if(isset($_GET['approved']) AND !empty($_GET['approved'])) {
                $approved = (int) $_GET['approved'];

                $req = $bdd->prepare('UPDATE users SET approved = 1 WHERE id = ?');
                $req->execute(array($approved));
            }
            if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
                $supprime = (int) $_GET['supprime'];

                $req = $bdd->prepare('DELETE FROM comments WHERE id = ?');
                $req->execute(array($supprime));
            } 
        }

            

    $req = $bdd->prepare('SELECT * FROM users ORDER BY id DESC');
    // $req = $bdd->prepare('SELECT * FROM users WHERE is_verified = 0 ORDER BY id DESC');

    
    ///* execute() = Exécute la première requête */
    $req->execute();
    /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
    $req->closeCursor();
}
// ADMIN fonction récupère le commentaire par ID
function getCommentsAdmin()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $bdd->prepare('SELECT * FROM comments ORDER BY id DESC LIMIT 0,5');
    $req->execute(array());
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

// function qui récupère toutes les catégories
function getCategories()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    ///* prepare() = Création d'un objet PDOStatement */
    $req = $bdd->prepare('SELECT id, parent_id, name, slug, is_valid FROM categories ORDER BY id ASC');
    ///* execute() = Exécute la première requête */
    $req->execute();
    /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
    $req->closeCursor();
    
}
function getCategorie($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $bdd->prepare('SELECT * FROM categories INNER JOIN articles ON categories.id = articles.categories_id AND articles.id = ?');
    // SELECT name FROM `cours_denis`.`categories` WHERE `id` = ? ');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

// Get HASHTAGS
function getHashtags($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $bdd->prepare('SELECT * FROM tags INNER JOIN tag_items ON tags.id = tag_items.tag_id AND tag_items.article_id = ?');
    // SELECT name FROM `cours_denis`.`categories` WHERE `id` = ? ');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
// add avatar for page session_register.php
function addavatar()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
{
    $taillemax = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'png', 'gif');
    if($_FILES['avatar']['size'] <= $taillemax)
    {
        //$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionsValides))
        {
            $chemin = "$pathToRootFolder/assets/photos/avatars".$_SESSION['id'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
            if($resultat)
            {
                $updateAvatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                $updateAvatar->execute(array(
                    'avatar' => $_SESSION['id'].".".$extensionUpload,
                    'id' => $_SESSION['id']
                ));
                
                return;
                
            } else {
                $erreur = "Erreur lors de l'importation de photo de profil.";
            }
        } else {
            $erreur = "Votre photo doit être au format jpg, jpeg, gif ou png.";
        }
    } else {
        $erreur = "Votre photo ne doit pas dépasser 2Mo.";
    }
}
}
// add picture
function addImageArticle($articleId, $name, $userId)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    //vérification & upload image
    if(isset($_FILES['image']) AND !empty($_FILES['image']['name']))
{
    $taillemax = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'png', 'gif');
    if($_FILES['image']['size'] <= $taillemax)
    {
        //$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionsValides))
        {
            $chemin = "$pathToRootFolder/assets/upload ".$_SESSION['id'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
            if($resultat)
            {
                $addImageArticle = $bdd->prepare('INSERT INTO images (articleId, name, userId) VALUES (?, ?, ?)');
                $addImageArticle->execute();
                
                header('Location: profil.php');
            } else {
                $erreur = "Erreur lors de l'importation de photo de profil.";
            }
        } else {
            $erreur = "Votre photo doit être au format jpg, jpeg, gif ou png.";
        }
    } else {
        $erreur = "Votre photo ne doit pas dépasser 2Mo.";
    }
}
}

// update  avatar profil.php
function updateAvatar()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    //vérification & upload image
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
    {
        $taillemax = 2097152;
        $extensionsValides = array('jpg', 'jpeg', 'png', 'gif');
        if($_FILES['avatar']['size'] <= $taillemax)
        {
            //$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            if(in_array($extensionUpload, $extensionsValides))
            {
                $chemin = "$pathToRootFolder/assets/photos/avatars/".$_SESSION['id'].".".$extensionUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                if($resultat)
                {
                    $updateAvatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                    $updateAvatar->execute(array(
                        'avatar' => $_SESSION['id'].".".$extensionUpload,
                        'id' => $_SESSION['id']
                    ));
                    
                    header('Location: profil.php');
                } else {
                    $erreur = "Erreur lors de l'importation de photo de profil.";
                }
            } else {
                $erreur = "Votre photo doit être au format jpg, jpeg, gif ou png.";
            }
        } else {
            $erreur = "Votre photo ne doit pas dépasser 2Mo.";
        }
    }
}

<?php
//////////// Get IP
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
    //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  


/////////////////////////  update article
function updateArticle($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    
}


////////////// END function USER AllUserSubscribes

/////////////////////////// GET & ADD FUNCTION


//Get image for article in database, table images
function getImages()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    
    $error = null;
    try{
        // get all images from bdd.
        $req = $pdo->prepare('SELECT * FROM images ORDER BY id ASC');
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
    $req = $pdo->prepare('SELECT * FROM images WHERE article_id = ? ');
    $req->execute(array($id));
    $data = $req->fetch(PDO::FETCH_OBJ);
    // echo $data;
    // var_dump($data);
    // die();
    $req->closeCursor();
    return $data;
}

// fonction récupère le commentaire par ID
function getInfoUserByComments($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $pdo->prepare('SELECT * FROM comments INNER JOIN users ON comments.author = users.pseudo AND articleId = ? ORDER BY comments.id DESC');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    
    $req->closeCursor();
    return $data;
}


function getAvatarByComment($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');

    $req = $pdo->prepare('SELECT articleId, author, pseudo, avatar FROM comments INNER JOIN users ON comments.author = users.pseudo AND articleId = ?');
    
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

    $req = $pdo->prepare('SELECT * FROM articles INNER JOIN users ON articles.user_id = users.id AND articles.id = ?');
    
    ///* execute() = Exécute la première requête */
    $req->execute(array($id));
    /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
    /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
    $req->closeCursor();

}


// function qui récupère toutes les catégories
function getCategories()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    ///* prepare() = Création d'un objet PDOStatement */
    $req = $pdo->prepare('SELECT id, parent_id, name, slug, is_valid FROM categories ORDER BY id ASC');
    ///* execute() = Exécute la première requête */
    $req->execute();
    /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
    $req->closeCursor();
    
}
//GET Categories by ID
function getCategorie($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $pdo->prepare('SELECT * FROM categories INNER JOIN articles ON categories.id = articles.categories_id AND articles.id = ?');
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
    $req = $pdo->prepare('SELECT * FROM tags INNER JOIN tag_items ON tags.id = tag_items.tag_id AND tag_items.article_id = ?');
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
                $updateAvatar = $pdo->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
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

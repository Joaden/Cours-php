<?php

// function qui récupère tous les articles
function getArticles()
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    ///* prepare() = Création d'un objet PDOStatement */
    $req = $bdd->prepare('SELECT id, title, date FROM articles ORDER BY id ASC');
    ///* execute() = Exécute la première requête */
    $req->execute();
    /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
    $req->closeCursor();
    
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
// fonction ajouter un commentaire à un article
function addComment($articleId, $author, $comment)
{
    $pathToRootFolder = "../../";
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $bdd->prepare('INSERT INTO comments (articleId, author, comment, date) VALUES (?, ?, ?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}
// fonction récupère le commentaire par ID
function getComments($id)
{
    $pathToRootFolder = "../../";
    require($pathToRootFolder.'config/connect.php');
    $req = $bdd->prepare('SELECT * FROM comments WHERE articleId = ?');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
function getUsers()
{
    $pathToRootFolder = "../../";
    
    // à décommenter pour utiliser $_SESSION
    // session_start();

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
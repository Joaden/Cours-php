<?php
// function qui récupère tous les articles
function getArticles()
{
    require('config/connect.php');
    ///* prepare() = Création d'un objet PDOStatement */
    $req = $bdd->prepare('SELECT id, title, date FROM articles ORDER BY id DESC');
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
    require('config/connect.php');
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
    require('config/connect.php');
    $req = $bdd->prepare('INSERT INTO comments (articleId, author, comment, date) VALUES (?, ?, ?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}
// fonction récupère le commentaire par ID
function getComments($id)
{
    require('config/connect.php');
    $req = $bdd->prepare('SELECT * FROM comments WHERE articleId = ?');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
function getUsers()
{
    
    // session_start();

    require('../../config/connect.php');

    // Sécurité authentification obligatoire
    // if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1) {
    //     echo "<div class=\"container\"><div class=\"jumbotron\"><h1>Vous devez vous authentifier .</h1></div></div>";
    //     exit();
    // }

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
function getCommentsAdmin($id)
{
    require('../../config/connect.php');
    $req = $bdd->prepare('SELECT * FROM comments WHERE articleId = ?');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
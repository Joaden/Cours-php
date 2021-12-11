<?php


$pathToRootFolder = "../../";
require_once($pathToRootFolder.'config/functions.php');

require($pathToRootFolder.'config/connect.php');


class Comments {

    /**
     * Retourne la liste des commentaires d'un article
     * 
     * @return array
     */
    public function getAllComments(): array
    {
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
        $req = $pdo->prepare('SELECT * FROM comments ORDER BY id DESC');
        ///* execute() = Exécute la première requête */
        $req->execute();
        /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
        $req->closeCursor();
    }
    // END functions COMMENT => getAllComments

    // fonction ajouter un commentaire à un article
    public function addComment($articleId, $author, $comment)
    {
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
        $req = $pdo->prepare('INSERT INTO comments (articleId, author, comment, date) VALUES (?, ?, ?, NOW())');
        $req->execute(array($articleId, $author, $comment));
        $req->closeCursor();
        // // Vider le champs du form !
        unset($_POST['comment']);
        unset($comment);
    }

    // fonction récupère l'ID d'un commentaire
    public function getCommentByArticle($id)
    {
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
        $req = $pdo->prepare('SELECT * FROM comments');
        $req->execute(array($id));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        
        $req->closeCursor();
        return $data;
    }

    //  fonction récupère le commentaire par ID
    public function getComments()
    {
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
        $req = $pdo->prepare('SELECT * FROM comments');
        $req->execute(array());
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }

    
    //  fonction supprime le commentaire par ID
    public function deleteComments($supp_id)
    {
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');
        
        $deleteComment = $pdo->prepare("DELETE FROM comments WHERE id = ?" );

        $deleteComment->execute(array($supp_id));
        $deleteComment->closeCursor();
    }


}





?>

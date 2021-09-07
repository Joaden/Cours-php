<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - report Comment";

    //Appel de function avec la connexion à la bdd

    require_once($pathToRootFolder.'config/connect.php');

    require_once($pathToRootFolder.'config/functions.php');

    require_once($pathToRootFolder.'config/functions/function_file.php');

    require($pathToRootFolder."views/common/checkSessionUser.php");

    // if(isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
    //     $id = $_SESSION['id'];
    //     $id = $userInfo['id'];
    //     $articles = getArticles();
    //     $categories = getCategories();
    //     $images = getImages();

        ///////////////////  SI REPORT ENVOYEE  /////////////////////////////
        if(isset($_GET['id']) AND !empty($_GET['id'])){

        //if(isset($_GET['id']) AND !empty($_GET['id'])){
            // je securise les données
            $report_id = htmlspecialchars($_GET['id']);
            //$get_id = htmlspecialchars($_GET['id']);
            // je recup larticle dans la bdd
            $recupComment = $bdd->prepare("SELECT * FROM comments WHERE id = ?");
            $recupComment->execute(array($report_id));

            if($recupComment->rowCount() > 0){

                // requete de suppression sur le commentaire trouvé
                $deleteComment = $bdd->prepare("UPDATE report FROM comments WHERE id = ?" );

                echo $supp_id . " est l'id du commentaire qui sera supprimer";
                 die();

                $deleteComment->execute(array($report_id));
                $deleteComment->closeCursor();
                $message = 'Votre article a bien été supprimé';
                header('Location: user_board.php');

            }else{
                echo "Aucun article n'a été trouvé";
                header('Location: home.php');
            }
        }
        
    ?>
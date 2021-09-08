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
            $report_id = (int) $report_id;
            //$get_id = htmlspecialchars($_GET['id']);
            // je recup larticle dans la bdd
            $recupComment = $bdd->prepare("SELECT * FROM comments WHERE id = ?");
            $recupComment->execute(array($report_id));

            if($recupComment->rowCount() > 0){
                $addReport = +1;
                // requete pour signaler un commentaire
                $reportComment = $bdd->prepare("UPDATE comments SET report = report+1 WHERE id = ?" );

                // echo $report_id . " est l'id du commentaire qui sera signalé";
                // die();

                $reportComment->execute(array($report_id));
                $reportComment->closeCursor();
                if($reportComment != TRUE) {
                    var_dump($reportComment);
                    die();
                }
                $message = 'Votre signalement a bien été envoyé';
                header('Location: article_all.php');

            }else{
                echo "Une erreur est survenue";
                header('Location: home.php');
            }
        }
        
    ?>
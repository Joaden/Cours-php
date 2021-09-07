<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - delete Comment";

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

        ///////////////////  SI SUPPRESSION ENVOYEE  /////////////////////////////
        $mode_delete = 0;
        if(isset($_GET['id']) AND !empty($_GET['id'])){

        //if(isset($_GET['id']) AND !empty($_GET['id'])){
            // je securise les données
            $supp_id = htmlspecialchars($_GET['id']);
            //$get_id = htmlspecialchars($_GET['id']);
            // je recup larticle dans la bdd
            $recupComment = $bdd->prepare("SELECT * FROM comments WHERE id = ?");
            $recupComment->execute(array($supp_id));

            
            if($recupComment->rowCount() > 0){

                // requete de suppression sur le commentaire trouvé
                $deleteComment = $bdd->prepare("DELETE FROM comments WHERE id = ?" );

                // echo $supp_id . " est l'id du commentaire qui sera supprimer";
                // var_dump($supp_id);
                // die();

                $deleteComment->execute(array($supp_id));
                $deleteComment->closeCursor();
                $message = 'Votre commentaire a bien été supprimé';
                header('Location: article_all.php');

            }else{
                echo "Aucun article n'a été trouvé";
                header('Location: home.php');
            }
        }
        
    ?>
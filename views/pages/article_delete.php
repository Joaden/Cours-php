<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - delete  Articles";

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
            $recupArticle = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
            $recupArticle->execute(array($supp_id));


            if($recupArticle->rowCount() == 1){

                // requete de suppression sur des commentaires trouvés
                $recupComment = $bdd->prepare("SELECT * FROM comments WHERE articleId = ?");
                $result = $recupComment->execute(array($supp_id));
                if($recupComment->rowCount() == 1){
                     
                    // requete de suppression sur l'article trouvé
                    
                    $deleteCommentFromArticle = $bdd->prepare("DELETE FROM comments WHERE articleId = $supp_id" );
                    $deleteCommentFromArticle->execute(array($supp_id));
                    //$deleteCommentFromArticle->closeCursor();
                
                    $deleteArticle = $bdd->prepare("DELETE FROM articles WHERE id = ?" );
                    $deleteArticle->execute($supp_id);
                    //$deleteArticle->closeCursor();
                }
                
                $message = 'Votre article a bien été supprimé';
                header('Location: article_gestion.php');

            }else{
                echo "Aucun article n'a été trouvé";
                header('Location: home.php');
            }
        }
        
    ?>
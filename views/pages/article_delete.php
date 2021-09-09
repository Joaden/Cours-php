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

        
            // je securise les données
            $supp_id = htmlspecialchars($_GET['id']);
            
            // je recup larticle dans la bdd
            $recupArticle = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
            $recupArticle->execute(array($supp_id));

            if($recupArticle->rowCount() == 1){

                //echo "</br>Article trouvé ID : ".$supp_id;
               
                $mode_delete = 1;
            
                if($mode_delete == 1){

                    //echo "</br>Mode delete activé </br>";

                    $deleteArticle = $bdd->prepare("DELETE FROM articles WHERE id = ?" );
                    $deleteArticle->execute(array($supp_id));
                    $deleteArticle->closeCursor();
                    $message = 'Votre article a bien été supprimé';
                    header('Location: article_gestion.php');

                }else{
                    echo "La suppression a échoué!!!";
                    die();
                }
                
                
            }else{
                echo "Aucun article n'a été trouvé";
                header('Location: home.php');
            }
        }
        
    ?>
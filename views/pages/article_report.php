<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - report Article";

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

            if (isset($_SESSION['userid']) and $userInfo['id'] == $_SESSION['userid'])
            {

                if(isset($_SESSION['sessionid']) and $_SESSION['sessionid'] == session_id()){
        
                    // je securise les données
                    $reportA_id = htmlspecialchars($_GET['id']);
                    $reportA_id = (int) $reportA_id;
                    
                    // je recup larticle dans la bdd
                    $recupArticle = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
                    $recupArticle->execute(array($reportA_id));

                    if($recupArticle->rowCount() > 0){
                        $addReportA = +1;
                        // requete pour signaler un commentaire
                        $reportArticle = $bdd->prepare("UPDATE articles SET report = report+1 WHERE id = ?" );

                        $reportArticle->execute(array($reportA_id));
                        $reportArticle->closeCursor();
                        if($reportArticle != TRUE) {
                            var_dump($reportArticle);
                            die();
                        }
                        $message = 'Votre signalement a bien été envoyé';
                        header('Location: article_all.php');

                    }else{
                        echo $reportA_id." Une erreur est survenue";
                        die('Echec du signalement de l\'article');
                        header('Location: home.php');
                    }
                }else{
                    die('error ID session invalide !');
                    header('Location: home.php');
                }
            }else{
                die('error userid et info user id');
                header('Location: home.php');
            }
        }else{
            die('error id article');
            header('Location: home.php');
        }
        
    ?>
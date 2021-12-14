<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - delete  Articles";

    //Appel de function avec la connexion à la bdd

    // require_once($pathToRootFolder.'config/connect.php');

    require_once($pathToRootFolder.'config/functions.php');

    require_once($pathToRootFolder.'src_denis/Models/Article.php');

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
            if(isset($_GET['user']) AND !empty($_GET['user'])){

                $deleteAuthorized = 0;
                

                // je securise les données
                $supp_id = htmlspecialchars($_GET['id']);
                $user_id = htmlspecialchars($_GET['user']);
                
                // je recup larticle dans la bdd
                $recupArticle = $bdd->prepare("SELECT * FROM articles WHERE id = ?");
                $recupArticle->execute(array($supp_id));

                if($recupArticle->rowCount() == 1){
                ///////////// START VERIFIER SI LARTICLE RECUPERER DANS LE GET APPARTIENT BIEN AU USER ET QUELA PAGE EST BIEN CELLE DE MON SITE
 
                    // if()

                ///////////// END Controle ID USER AND ARTICLE

                    //echo "</br>Article trouvé ID : ".$supp_id;
                
                    $mode_delete = 1;
                
                    if($mode_delete == 1){
                        $deleteAuthorized = 1;
                        //echo "</br>Mode delete activé </br>";
                        if($deleteAuthorized == 1) {

                            try{
                                $modelDelPost = new Article();
                                $deleteArticle = $modelDelPost->delete($id);
                                // $deleteArticle = $bdd->prepare("DELETE FROM articles WHERE id = ?" );
                                // $deleteArticle->execute(array($supp_id));
                                // $deleteArticle->closeCursor();
                                $message = 'Votre article a bien été supprimé';
                             
                            }
                            catch(\Exception $e)
                            {
                                die('Erreur : '.$e->getMessage());
                            }
                            
                            ///////////////////// START LOGGER 
                            include ($pathToRootFolder.'views/common/logs_articles.php');
                            $successArticleDelete = TRUE;
                        

                            if($successArticleDelete === TRUE){

                                $log = "Article id :".$supp_id." Delete par author ID :".$user_id;
                                logger($log);
                                echo "Success Delete article";

                            }
                            
                        }
                        ///////////////////// END LOGGER 
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
        }
        
    ?>
<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - delete Comment";

    //Appel de function avec la connexion à la bdd

    require_once($pathToRootFolder.'config/connect.php');
    require_once($pathToRootFolder.'src_denis/Models/Manager.php');
    
    require($pathToRootFolder."views/common/checkSessionUser.php");
    
    require_once($pathToRootFolder.'config/functions.php');
    require_once($pathToRootFolder.'config/functions/utils.php');
    require_once($pathToRootFolder.'config/functions/function_file.php');

    require_once($pathToRootFolder.'src_denis/Models/Article.php');
    require_once($pathToRootFolder.'src_denis/Models/Comments.php');
    require_once($pathToRootFolder.'src_denis/Models/User.php');


    

    

    // if(isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
    //     $id = $_SESSION['id'];
    //     $id = $userInfo['id'];
    //     $articles = getArticles();
    //     $categories = getCategories();
    //     $images = getImages();

        ///////////////////  SI SUPPRESSION ENVOYEE  /////////////////////////////
        $mode_delete = 0;
        if(isset($_GET['id']) AND !empty($_GET['id']) AND isset($_GET['post']) AND !empty($_GET['post'])){

        //if(isset($_GET['id']) AND !empty($_GET['id'])){
            // je securise les données
            $supp_id = htmlspecialchars($_GET['id']);
            $idPost = htmlspecialchars($_GET['post']);
            // var_dump($idPost);
            // die();
            //$get_id = htmlspecialchars($_GET['id']);
            // je recup larticle dans la bdd
            $recupComment = $pdo->prepare("SELECT * FROM comments WHERE id = ?");
            $recupComment->execute(array($supp_id));

            
            if($recupComment->rowCount() > 0){

                $modelDelCom = new Comments();
                $deleteCom = $modelDelCom->deleteComments($supp_id);
                $message = 'Votre commentaire a bien été supprimé';
                // header('Location: article_all.php');
                redirect("article_read.php?id=" . $idPost);

            }else{
                echo "Aucun article n'a été trouvé";
                header('Location: home.php');
            }
        }
        
    ?>
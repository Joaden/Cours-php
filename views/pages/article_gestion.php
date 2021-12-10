<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Dashboard My Posts";

    $_SESSION["varsessionboardarticle"] = "Session board_my_article OK";

      require_once($pathToRootFolder.'config/connect.php');

      require_once($pathToRootFolder.'config/functions.php');
      
    require_once($pathToRootFolder.'next_src_wip_denis/Models/Article.php');

    // check if user is connected
    require($pathToRootFolder."views/common/checkSessionUser.php");


    /////////////// start test debug
    // $id1 = htmlspecialchars($_SESSION['id']);
    // $id2 = htmlspecialchars($userInfo['id']);
    // var_dump($id1);
    // var_dump($id2);
    // var_dump($userInfo);
    // var_dump($_SESSION);
    //////////////// end test debug



    if(isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
        if(isset($_SESSION['sessionid']) and $_SESSION['sessionid'] == session_id()){
            //echo "</br>if isset session_id == à la session en base de donnée créé lors du login</br>";
            //var_dump($_SESSION);
            //die();
        $id = htmlspecialchars($_SESSION['id']);
        $iduser = htmlspecialchars($userInfo['id']);
        $author = htmlspecialchars($userInfo['pseudo']);
        // Get my articles
        $myArticles = getMyArticles($id);
        $nbr = 0;
        if(isset($myArticles) AND !empty($myArticles)){
            foreach($myArticles as $post){
                if($nbr > 0) {
                    $nbr = $nbr + 1;
                }
            }
        }
    $images = getImages();
    $categories = getCategories();
?>

<!DOCTYPE html>
<html lang="fr">
    <?php include($pathToRootFolder."views/common/head.php");?>
    <body>
         <!-- =================================================== -->
        <!-- ================ DEBUT HTML  ================ -->

        <?php include($pathToRootFolder."views/common/header.php"); ?>
        
        <div class="container-fluid mt-1 px-0 h-100">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <?php include($pathToRootFolder."views/common/sidebar_user.php"); ?>
                </div>
                <div class="col-md-9">
                    <!-- <h1 class="h1 text-dominante text-center my-5 border-top border-dominante"><?php # echo $PAGE_TITLE ?></h1> -->
                    <section class="text-center">
                        <h1 class="h1 text-dominante text-center mt-3 mb-5">Mes articles</h1>
                        <div class="widgetTextDigit">
                            <p class="widgetTextDigit-text">nombre d'articles rédigés</p>
                            <p class="widgetTextDigit-value">
                                <?php  
                                    $counterNbr = 0;
                                    if(isset($myArticles) AND !empty($myArticles)){
                                        foreach($myArticles as $myArticle){
                                                $counterNbr = $counterNbr + 1;
                                            }
                                            echo $counterNbr; 
                                        }else{
                                            echo "0";
                                    }   
                                ?>
                            </p>
                        </div>
                        <div class="widgetTextDigit">
                            <p class="widgetTextDigit-text">nombre de likes reçus</p>
                            <p class="widgetTextDigit-value">134</p>
                        </div>
                        <div class="widgetTextDigit">
                            <p class="widgetTextDigit-text">nombre de commentaires</p>
                            <p class="widgetTextDigit-value--red">1</p>
                        </div>
                        <div class="container section-content">
                        <div class="row">
                    <?php   if(isset($myArticles) AND !empty($myArticles)){
                                    foreach($myArticles as $article): ?>
                                        <div class="blogArticle--medium row   col-lg-6 col-xl-4 px-5 my-5">
                                            <a class="blogArticle-imglink" >
                                                <?php foreach($images as $image): ?>
                                                    <?php if($article->id == $image->article_id){ ?>
                                                    <img class="blogArticle-imglink-img" src="../../assets/uploadPersonal/<?php echo $image->name; ?>" alt="image article">
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </a>
                                            <div class="blogArticle-content">
                                                <h2 class="blogArticle-title">
                                                    <?= $article->title; ?>
                                                </h2>
                                                <span>
                                                    <a href="article_modify.php?edit=<?= $article->id ?>&user=<?= $iduser ?>&salt=<?= $_SESSION['token'] ?>">
                                                        Modifier 
                                                    </a>
                                                    <a href="article_delete.php?id=<?= $article->id ?>&user=<?= $iduser ?>&salt=<?= $_SESSION['token'] ?>">
                                                            <div onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'));" class="text-danger">Supprimer</div>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                <?php endforeach; ?>
                            <?php }else{
                                echo "Vous n'avez pas rédigé d'articles.";
                            } ?>
                        </div>
                    </div>
                    </section>
                </div>
            </div>   
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>  

        <!-- FOOTER -->
        <?php 
            #include($pathToRootFolder."views/common/footer.php");
            #include($pathToRootFolder."views/common/footer_dev_mode.php");
            
        ?>
        
        <!-- ================ FIN HTML  ================ -->
        <!-- =================================================== -->
        
        <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>

    </body>
</html>
<?php
        }
} else {
    
    header('Location: session_login.php');

}
?>
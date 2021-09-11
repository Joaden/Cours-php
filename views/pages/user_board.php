<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Tableau de bord";

    $_SESSION["varsessionuserboard"] = "Session user_board OK";

    include($pathToRootFolder."debug_functions.php");

    // Connection
      //require_once('vendor/autoload.php');

      require_once($pathToRootFolder.'config/connect.php');

      require_once($pathToRootFolder.'config/functions.php');
      
    // check if user is connected
    require($pathToRootFolder."views/common/checkSessionUser.php");
    //Get My articles
    
    if(isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
        $id1 = htmlspecialchars($_SESSION['id']);
        $id2 = htmlspecialchars($userInfo['id']);
        $author = htmlspecialchars($userInfo['pseudo']);

        // var_dump($id1);
        // var_dump($id2);
        // var_dump($author);
        // echo $_SESSION["varsessionuserboard"];
        // // die();

       // echo "oups";
        //die();

        // Get my articles
        $myArticles = getMyArticles($id);
        $nbr = 0;
        foreach($myArticles as $post){
            if($nbr > 0) {
                $nbr = $nbr + 1;
            }
        }
        var_dump($id1);
        var_dump($id2);
        var_dump($author);
        echo $_SESSION["varsessionuserboard"];
        // die();

        echo "</br>Fin script PHP Page user_board.php</br>";
        //die();
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
                        <h1 class="h1 text-dominante text-center mt-3 mb-5">Tableau de bord</h1>

                        <div class="widgetTextDigit">
                            <p class="widgetTextDigit-text">nombre d'articles rédigés</p>
                            <p class="widgetTextDigit-value">
                            <?php  
                                $counterNbr = 0;
                                foreach($myArticles as $myArticle){
                                        $counterNbr = $counterNbr + 1;
                                }
                                echo $counterNbr;
                                ?>
                            </p>
                        </div>
                        <div class="widgetTextDigit">
                            <p class="widgetTextDigit-text">nombre de likes reçus</p>
                            <p class="widgetTextDigit-value">134</p>
                        </div>
                        <div class="widgetTextDigit">
                            <p class="widgetTextDigit-text">nombre de warnings Admin</p>
                            <p class="widgetTextDigit-value--red">1</p>
                        </div>
                        
                    </section>
                        
                    <section class="text-center mx-3">
                        <h2 class="h1 text-dominante text-center my-5 border-top border-dominante">Mes Articles</h2>
                        <table class="table border border-secondaire">
                            <thead>
                                <tr>
                                    <td class="bg-secondaire text-white" scope="col">Titres</td>
                                    <td class="bg-secondaire text-white border-left border-white" scope="col">Edition</td>
                                    <td class="bg-secondaire text-white border-left border-white" scope="col">État</td>
                                    <td class="bg-secondaire text-white border-left border-white" scope="col">Likes reçus</td>
                                    <td class="bg-secondaire text-white" scope="col">Commentaires</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($myArticles as $article): ?>

                                <tr>
                                    <td class="text-left text-dark"><?= $article->title; ?>.</td>
                                    <td>
                                     
                                    <a href="article_modify.php?edit=<?= $article->id ?>">
                                            <i class="fas fa-edit fa-lg text-dominante"></i>
                                        </a>
                                    </td>
                                    <td class="text-secondaire">validé</td>
                                    <td class="text-secondary"><span class="">12 </span><i class="fas fa-thumbs-up"></i></td>
                                    <td class="text-secondary"><span class="">22 </span><i class="fas fa-comments"></i></td>
                                </tr>
                            <?php endforeach; ?>

                                <tr>
                                    <td class="text-left text-dark">Comment changer un carrénage sur Kawa.</td>
                                    <td>
                                        <i class="fas fa-edit fa-lg text-dominante"></i>
                                    </td>
                                    <td class="text-secondaire">validé</td>
                                    <td class="text-secondary"><span class="">24 </span><i class="fas fa-thumbs-up"></i></td>
                                    <td class="text-secondary"><span class="">45 </span><i class="fas fa-comments"></i></td>
                                </tr>
                                <tr>
                                    <td class="text-left text-dark">gonflage des pneus avant un long trajet.</td>
                                    <td>
                                        <i class="fas fa-edit fa-lg text-dominante"></i>
                                    </td>
                                    <td class="text-secondaire">validé</td>
                                    <td class="text-secondary"><span class="">45 </span><i class="fas fa-thumbs-up"></i></td>
                                    <td class="text-secondary"><span class="">17 </span><i class="fas fa-comments"></i></td>
                                </tr>
                                <tr>
                                    <td class="text-left text-dark">Les meilleurs casques-tandem connectés.</td>
                                    <td>
                                        <i class="fas fa-edit fa-lg text-dominante"></i>
                                    </td>
                                    <td class="text-dominanteLighter1">En attente</td>
                                    <td class="text-secondary"><span class="">0 </span><i class="fas fa-thumbs-up"></i></td>
                                    <td class="text-secondary"><span class="">0 </span><i class="fas fa-comments"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                    
                    <!-- ################################################### -->
                    <!-- ################################################### -->
                    <h2 class="jumbotron">2eme essai sans Bootstrap:</h2>
                    <!-- ################################################### -->
                    <!-- ################################################### -->
                    
                    <section class="text-center mx-3">
                        <h2 class="h1 text-dominante text-center my-5 border-top border-dominante">Mes Articles</h2>
                        <!-- ESSAI : WIDGET CUSTOM MADE (without Bootstrap) -->
                        <div class="widgetTable_container">

                            <table class="widgetTable">
                                <thead class="widgetTable-head">
                                    <tr class="widgetTable-head-row">
                                        <td class="widgetTable-head-cell" scope="col">Titres</td>
                                        <td class="widgetTable-head-cell" scope="col">Edition</td>
                                        <td class="widgetTable-head-cell" scope="col">État</td>
                                        <td class="widgetTable-head-cell" scope="col">Likes reçus</td>
                                        <td class="widgetTable-head-cell" scope="col">Commentaires</td>
                                    </tr>
                                </thead>
                                <tbody class="widgetTable-body">
                                    <tr class="widgetTable-body-row">
                                        <td class="widgetTable-body-cell">Bien se préparer pour concourir le Bol d'Or.</td>
                                        <td class="widgetTable-body-cell cell_edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </td>
                                        <td class="widgetTable-body-cell cell_status-validated">validé</td>
                                        <td class="widgetTable-body-cell"><span class="">12 </span><i class="fas fa-thumbs-up"></i></td>
                                        <td class="widgetTable-body-cell"><span class="">22 </span><i class="fas fa-comments"></i></td>
                                    </tr>
                                    <tr class="widgetTable-body-row">
                                        <td class="widgetTable-body-cell">Comment changer un carrénage sur Kawa.</td>
                                        <td class="widgetTable-body-cell cell_edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </td>
                                        <td class="widgetTable-body-cell cell_status-validated">validé</td>
                                        <td class="widgetTable-body-cell"><span class="">24 </span><i class="fas fa-thumbs-up"></i></td>
                                        <td class="widgetTable-body-cell"><span class="">45 </span><i class="fas fa-comments"></i></td>
                                    </tr>
                                    <tr class="widgetTable-body-row">
                                        <td class="widgetTable-body-cell">gonflage des pneus avant un long trajet.</td>
                                        <td class="widgetTable-body-cell cell_edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </td>
                                        <td class="widgetTable-body-cell cell_status-validated">validé</td>
                                        <td class="widgetTable-body-cell"><span class="">45 </span><i class="fas fa-thumbs-up"></i></td>
                                        <td class="widgetTable-body-cell"><span class="">17 </span><i class="fas fa-comments"></i></td>
                                    </tr>
                                    <tr class="widgetTable-body-row">
                                        <td class="widgetTable-body-cell">Les meilleurs casques-tandem connectés.</td>
                                        <td class="widgetTable-body-cell cell_edit">
                                            <i class="fas fa-edit fa-lg"></i>
                                        </td>
                                        <td class="widgetTable-body-cell cell_status-pending">En attente</td>
                                        <td class="widgetTable-body-cell"><span class="">0 </span><i class="fas fa-thumbs-up"></i></td>
                                        <td class="widgetTable-body-cell"><span class="">0 </span><i class="fas fa-comments"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    
                    
                    <h2 class="h1 text-dominante text-center my-5 border-top border-dominante">Mes Notes</h2>
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
            include($pathToRootFolder."views/common/footer_dev_mode.php");
            
        ?>
        
        <!-- ================ FIN HTML  ================ -->
        <!-- =================================================== -->
        
        <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>

    </body>
</html>
<?php
} else {

    header('Location: session_login.php');

}
?>
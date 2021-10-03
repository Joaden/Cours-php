<?php 
session_start();
        
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Tableau de bord Admin";

    $_SESSION["varsessionadmin_board"] = "Session admin_board OK";

    include($pathToRootFolder."debug_functions.php");

    require_once($pathToRootFolder.'config/connect.php');

    require_once($pathToRootFolder.'config/functions.php');
    require_once($pathToRootFolder.'config/functions/function_file.php');


    // include($pathToRootFolder."debug_functions.php");
    
    // check if user is connected
    require($pathToRootFolder."views/common/checkSessionUser.php");

    if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){

        if ($_SESSION["role"] == 1){ 
            $bienvenu = "Bonjour Boss";
            // echo $bienvenu;
            // die();
        }else{
            $nonAutorised = "Vous n'êtes pas autorisé";
            echo $nonAutorised;
            // die();
            header("location: /home.php?msg=ok&err=Vous n'êtes pas autorisé");
            exit;
        }
        if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id'])
        {
            if(isset($_SESSION['sessionid']) and $_SESSION['sessionid'] == session_id()){

            $id1 = htmlspecialchars($_SESSION['id']);
            $id2 = htmlspecialchars($userInfo['id']);
            //$author = htmlspecialchars($userInfo['pseudo']);
            $users = getUsers();
            // and $userInfo['roles_id'] == 1
            $varsessionid = $_SESSION['id'];
            //if(!empty($userInfo['roles_id']) and $userInfo['roles_id'] == 1)
            //{   
            $getUsersConnected = getUsersConnected();
            $getUnsubscribes = getUnsubscribes();
            $comments = getCommentsAdmin();
            $myArticles = getMyArticles($id2);
            $AllUserSubscribes = getAllUserSubscribes();
            $AllComments = getAllComments();
            $articles = getArticles();

            $nbr = 0;
            $num_rows=0;
            $setuser ="oui";
            //}
            $a = session_id();
            if(empty($a)) session_start();
            // echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];
            // echo $a;
            // echo $id1;
            // echo $id2;
            // echo "</br> var_dump(SESSION); : </br>";
            // var_dump($_SESSION);
            // die();

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
                            <h1 class="h1 text-dominante text-center mt-3 mb-5">Tableau de bord Admin</h1>

                            <div class="widgetTextDigit">
                                <p class="widgetTextDigit-text">nombre d'articles rédigés</p>
                                <p class="widgetTextDigit-value"> 
                                <?php  
                                    $counterNbr = 0;
                                    if(isset($articles) AND !empty($articles)){
                                        foreach($articles as $articles){
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
                                <p class="widgetTextDigit-text">nombre membres inscrits</p>
                                <p class="widgetTextDigit-value">
                                <?php  
                                    $counterNbr = 0;
                                    if(isset($AllUserSubscribes) AND !empty($AllUserSubscribes)){
                                        foreach($AllUserSubscribes as $AllUserSubscribe){
                                                $counterNbr = $counterNbr + 1;
                                            }
                                            echo $counterNbr; 
                                        }else{
                                            echo "0";
                                    }
                                    
                                
                                ?>

                                </p>
                            </div>
                            <a href="admin_manageUsers.php">
                            <div class="widgetTextDigit">
                                <p class="widgetTextDigit-text">Membres connectés</p>
                                <p class="widgetTextDigit-value">
                                <?php  
                                    $counterNbr = 0;
                                    if(isset($getUsersConnected) AND !empty($getUsersConnected)){
                                        foreach($getUsersConnected as $getUsersConnected){
                                                $counterNbr = $counterNbr + 1;
                                            }
                                            echo $counterNbr; 
                                        }else{
                                            echo "0";
                                    }
                                    
                                
                                ?>
                                </p>
                                
                            </div>
                            </a>
                            <div class="widgetTextDigit">
                                <p class="widgetTextDigit-text">nombre de désabonnés</p>
                                <p class="widgetTextDigit-value"><?php  
                                $counterUnsubs = 0;
                                foreach($getUnsubscribes as $getUnsubscribe){
                                    // if($counterNbr >= 0) {
                                        $counterUnsubs = $counterUnsubs + 1;
                                        
                                    // }
                                }
                                echo $counterUnsubs;
                                ?></p>
                            </div>
                            <div class="widgetTextDigit">
                                <p class="widgetTextDigit-text">nombre de commentaires</p>
                                <p class="widgetTextDigit-value">
                                <?php  
                                    $counterNbr = 0;
                                    if(isset($AllComments) AND !empty($AllComments)){
                                        foreach($AllComments as $AllComment){
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
                                <p class="widgetTextDigit-text">nombre de likes</p>
                                <p class="widgetTextDigit-value">134</p>
                            </div>
                            <div class="widgetTextDigit">
                                <p class="widgetTextDigit-text">nombre de warnings Admin</p>
                                <p class="widgetTextDigit-value--red">1</p>
                            </div>
                            <div class="widgetTextDigit">
                                <p class="widgetTextDigit-text"> <a href="admin_manageUsers.php?token=<?php echo $_SESSION['token']; ?>&setuser=<?php echo $setuser; ?>">MANAGE USERS</a></p>
                            </div>
                            <!-- START PAGE AFFICHAGE TEST JWT TOKEN -->
                            <div class="widgetTextDigit">
                                <!-- <div type="button" class="widgetTextDigit-text">  -->
                                    <a href="admin_manageToken.php?token=<?php echo $_SESSION['token']; ?>&setuser=<?php echo $setuser; ?>">SHOW TEST TOKEN API</a>
                                <!-- </div> -->
                            </div>
                            <!-- END PAGE AFFICHAGE TEST JWT TOKEN -->

                            
                        </section>
                            
                        <section class="text-center mx-3">
                            <h2 class="h1 text-dominante text-center my-5 border-top border-dominante">Pending Request</h2>
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
                                    <tr>
                                        <td class="text-left text-dark">Bien se préparer pour concourir le Bol d'Or.</td>
                                        <td>
                                            <a href="article_modify.php?edit=<?= $article->id ?>">
                                                <i class="fas fa-edit fa-lg text-dominante"></i>
                                            </a>
                                        </td>
                                        <td class="text-secondaire">validé</td>
                                        <td class="text-secondary"><span class="">12 </span><i class="fas fa-thumbs-up"></i></td>
                                        <td class="text-secondary"><span class="">22 </span><i class="fas fa-comments"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left text-dark">Comment changer un carrénage sur Kawa.</td>
                                        <td>
                                            <a href="article_modify.php?edit=<?= $article->id ?>">
                                                <i class="fas fa-edit fa-lg text-dominante"></i>
                                            </a>
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
        }
        } else {
            header('Location: session_login.php');
        }
    } 

?>
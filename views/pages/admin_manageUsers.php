<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Tableau de bord Admin managge users";

    $_SESSION["varsessionadmin_manageUsers"] = "Session admin_manageUsers OK";

    include($pathToRootFolder."debug_functions.php");

    // Connection
      require_once($pathToRootFolder.'config/connect.php');

      require_once($pathToRootFolder.'config/functions.php');
      
    // check if user is connected
    require($pathToRootFolder."views/common/checkSessionUser.php");

    // Verification auth
    if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id'])
    {
        $id = $_SESSION['id'];
        $id = $userInfo['id'];
        $users = getUsers();
        // and $userInfo['roles_id'] == 1
        $varsessionid = $_SESSION['id'];
        //if(!empty($userInfo['roles_id']) and $userInfo['roles_id'] == 1)
        //{   
        $getUnsubscribes = getUnsubscribes();
        $comments = getCommentsAdmin();
        $nbr = 0;
        $num_rows=0;
        //}
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
                        <h1 class="h1 text-dominante text-center mt-3 mb-5">Manage Users</h1>

                        <div class="widgetTextDigit">
                            <p class="widgetTextDigit-text">nombre d'users inscrit</p>
                            <p class="widgetTextDigit-value"><?php  
                                $counterNbr = 0;
                                foreach($users as $user){
                                    // if($counterNbr >= 0) {
                                        $counterNbr = $counterNbr + 1;
                                        
                                    // }
                                }
                                echo $counterNbr;
                                ?></p>
                        </div>
                        <div class="widgetTextDigit">
                            <p class="widgetTextDigit-text">nombre d'users désinscrit</p>
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
                            <p class="widgetTextDigit-text">demandes des users</p>
                            <p class="widgetTextDigit-value">34</p>
                        </div>
                        <div class="widgetTextDigit">
                            <p class="widgetTextDigit-text">nombre de warnings users</p>
                            <p class="widgetTextDigit-value--red">21</p>
                        </div>
                        
                    </section>
                        
                    <section class="text-center mx-3">
                        <h2 class="h1 text-dominante text-center my-5 border-top border-dominante">Pending Validation Users</h2>
                        <table class="table border border-secondaire">
                            <thead>
                                <tr>
                                    <td class="bg-secondaire text-white" scope="col">Email</td>
                                    <td class="bg-secondaire text-white border-left border-white" scope="col">ID</td>
                                    <td class="bg-secondaire text-white border-left border-white" scope="col">État</td>
                                    <td class="bg-secondaire text-white border-left border-white" scope="col">Validation</td>
                                    <td class="bg-secondaire text-white border-left border-white" scope="col">date</td>
                                    <td class="bg-secondaire text-white" scope="col">Commentaires</td>
                                    <td class="bg-secondaire text-white" scope="col">Voir Détail</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user): ?>
                                    <tr>
                                        <td class="text-left text-dark"><?= $user->email ?></td>
                                        <td class="text-left text-dark"><?= $user->id ?></td>
                                        
                                            <?php if($user->is_verified == 0) { ?>
                                                <td class="text-danger"><?= $user->is_verified ?></td>
                                            <?php } ?>
                                            <?php if($user->is_verified == 1) { ?>  
                                                <td class="text-secondaire">User verified</td>
                                            <?php } ?>
                                            <td>
                                            <i class="fas fa-edit fa-lg text-dominante"><?php if($user->is_verified == 0) { ?> : 
                                <a href="admin_manageUsers.php?type=user&confirme=<?= $user->id ?>">
                                    Confirmer
                                </a>
                            <?php } ?> - <a  href="admin_manageUsers.php?type=user&supprime=<?= $user->id ?>"><span class="text-danger">Supprimer</span></a></i>
                                        </td>
                                        <td class="text-secondary"><span class=""><?= "date"; ?></span></td>
                                        <td class="text-secondary"><span class=""><?= $user->is_verified ?></span></td>
                                        <td class="text-secondary"><span class=""><a  href="admin/admin_manage_detail_users.php?id=<?= $user->id ?>"><span class="text-info">Détails</span></a></span></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td class="text-left text-dark">toto@gmail.fr</td>
                                    <td class="text-left text-dark">27</td>
                                    <td class="text-secondaire">validé</td>
                                    <td>
                                        <i class="fas fa-edit fa-lg text-dominante"><span class="text-danger">Supprimer</span></i>
                                    </td>
                                    <td class="text-secondary"><span class="">26/01/2021 </span></td>
                                    <td class="text-secondary"><span class="">Inscrit via campagne lead Facebook</span></td>
                                </tr>
                            </tbody>
                        </table>
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
                                        <i class="fas fa-edit fa-lg text-dominante"></i>
                                    </td>
                                    <td class="text-secondaire">validé</td>
                                    <td class="text-secondary"><span class="">12 </span><i class="fas fa-thumbs-up"></i></td>
                                    <td class="text-secondary"><span class="">22 </span><i class="fas fa-comments"></i></td>
                                </tr>
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
    //} 

?>
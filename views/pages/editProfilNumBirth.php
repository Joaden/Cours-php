<?php
session_start();


$_SESSION["varsessionprofiltest"]= "Session profilmodify num birth test OK";
$pathToRootFolder = "../../";
$PAGE_TITLE = "Mon profil modify editProfilNumBirth";

//require_once($pathToRootFolder.'vendor/autoload.php');

// Connection
require_once($pathToRootFolder.'config/connect.php');

require_once($pathToRootFolder.'config/functions.php');

require_once($pathToRootFolder.'next_src_wip_denis/Models/Article.php');

// check if user is connected
require($pathToRootFolder."views/common/checkSessionUser.php");

if(isset($_GET['id']) AND !empty($_GET['id'])){
    if(isset($_GET['auth']) AND !empty($_GET['auth'])){
        echo "get id & auth ok";
        // die();

        if(isset($_SESSION['userid']) and $userInfo['id'] == $_SESSION['userid']) {
            if(isset($_SESSION['sessionid']) and $_SESSION['sessionid'] == session_id()){
                //echo "</br>if isset session_id == à s_session['sessionid :: ".$_SESSION['sessionid']."</br>";
             
                $idsession = htmlspecialchars($_SESSION['sessionid']);
                $iduserid = htmlspecialchars($_SESSION['userid']);
                $iduserinfo = htmlspecialchars($userInfo['id']);
                $num_rows=0;

                //Si le user est connecté
                $reqUser = $bdd->prepare("SELECT * FROM users_infos WHERE id = ? ");
                $reqUser->execute(array($iduserid));
                $userInfos = $reqUser->fetchAll();

                if(isset($_POST['inputPhone']) AND !empty($_POST['inputPhone']))
                {
                    $newPseudo = htmlspecialchars($_POST['inputPhone']);
                    $insertPseudo = $bdd->prepare("UPDATE users_infos SET pseudo = ? WHERE id = ?");
                    $insertPseudo->execute(array($newPseudo, $_SESSION['id']));
                    header('Location: profil.php?id='.$_SESSION['id']);

                }

                if(isset($_POST['inputBirth']) AND !empty($_POST['inputBirth']))
                {
                    $newemail = htmlspecialchars($_POST['inputBirth']);
                    $insertemail = $bdd->prepare("UPDATE users_infos SET email = ? WHERE id = ?");
                    $insertemail->execute(array($newemail, $_SESSION['id']));
                    header('Location: profil.php?id='.$_SESSION['id']);

                }


            ?>
            <!DOCTYPE html>
            <html lang="fr">
                <?php 
                    include($pathToRootFolder."views/common/head.php"); 
                ?>
                <body>

                <?php include($pathToRootFolder."views/common/header.php"); ?>
                <div class="container-fluid mt-1 px-0 h-100">
                    <div class="row no-gutters">

                        <div class="col-md-3">
                            <?php include($pathToRootFolder."views/common/sidebar_user.php"); ?>
                        </div>
    
                    
                        <div class="col-md-9">
                            <section class="text-center">

                        <!-- <div class="container"> -->
                            <?php 
                            // define a $alertMessage="..message.." if necessary
                            include($pathToRootFolder."views/common/alertMessageIfExist.php");
                            ?>
                        <!-- <div class="row"> -->
                <hr>
                <!-- <div class="col-md-4"></div> -->
                <div class="col-md-9">
                    <h1><?php echo $PAGE_TITLE ?></h1>
                    <!-- H3 affiche une var de session pour tester si la session fonctionne bien -->
                    <h5>
                        <?php #echo $_SESSION["varsessionprofiltest"]; ?>
                        
                    </h5>
                    
                    <?php
                        if(isset($_SESSION['userid']) AND $userInfo['id'] == $_SESSION['userid'])
                        {
                            //echo $userInfo['pseudo'];
                        }
                        else{
                            echo "";
                        }
                     ?>
                </div>
                
            </div>
            <p style="color: red;" id="erreur">
                <?php 
                    if(isset($erreur))
                    {
                    echo $erreur;  
                    }
                ?>
            </p>
            <br>
            <!-- Formulaire pour modifier son profil -->
            <hr><br>
            <h2 class="text-secondary">Visible par vous uniquement</h2>
            <small class="form-text text-muted">Ces informations doivent être correctes si vous souhaitez commander un produit sur notre e-commerce</small>
    
                <form method="POST" action="">
                    <div class="form-group  col-md-3">
                        <label for="inputPhone">Phone</label>
                        <input type="text" name="inputPhone" class="form-control" id="inputPhone" placeholder="0606060606">
                    </div>

                    <div class="form-group  col-md-3">
                        <label for="inputBirth">Date de naissance</label>
                        <input type="date" name="inputBirth" class="form-control" id="inputBirth">
                    </div>

                    <button type="submit" name="formEditEmail" class="btn btn-primary">Enregistrer</button>
                    
                </form>
                    <p style="color: red;" id="erreur">
                        <?php 
                            if(isset($erreur))
                            {
                            echo $erreur;  
                            }
                        ?>
                    </p>
                    <br>
                    <br>
                <hr>
                <hr>
                <hr>
                          </div>
                    </div>
                </div>
                       
            </body>
            </html>
            <?php
                }
            
        }
        else
        {
            header("Location: connexion.php");
        }
    }
}else{
    header("Location: home.php");
}
?>
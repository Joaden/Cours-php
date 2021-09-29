<?php
session_start();


$_SESSION["varsessionprofiltest"]= "Session profilmodify address test OK";
$pathToRootFolder = "../../";
$PAGE_TITLE = "Mon profil modify address";

//require_once($pathToRootFolder.'vendor/autoload.php');

// Connection
require_once($pathToRootFolder.'config/connect.php');

require_once($pathToRootFolder.'config/functions.php');

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
                $reqUser = $bdd->prepare("SELECT * FROM users WHERE id = ? ");
                $reqUser->execute(array($_SESSION['id']));
                $user = $reqUser->fetch();

                if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'] AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND $_POST['mdp'] == $_POST['mdp2'])
                {
                    $newPseudo = htmlspecialchars($_POST['newpseudo']);
                    $insertPseudo = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
                    $insertPseudo->execute(array($newPseudo, $_SESSION['id']));
                    header('Location: profil.php?id='.$_SESSION['id']);

                }

                if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email'] AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND $_POST['mdp'] == $_POST['mdp2'])
                {
                    $newemail = htmlspecialchars($_POST['newemail']);
                    $insertemail = $bdd->prepare("UPDATE users SET email = ? WHERE id = ?");
                    $insertemail->execute(array($newemail, $_SESSION['id']));
                    header('Location: profil.php?id='.$_SESSION['id']);

                }


            ?>
            <!DOCTYPE html>
            <html lang="fr">
                <?php 
                    include($pathToRootFolder."views/common/head.php"); 
                ?>
                <?php include($pathToRootFolder."views/common/header.php"); ?>
                <body class="layout with-sidenav">
                    
                    <div class="container-fluid">
                        <div class="container">
                            <?php 
                            // define a $alertMessage="..message.." if necessary
                            include($pathToRootFolder."views/common/alertMessageIfExist.php");
                            ?>
                        <div class="row">
                <hr>
                <div class="col-md-4"></div>
                <div class="col-md-4">
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
                <div class="col-md-4">
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
                <div class="ml-5">

                    <div class="form-group">
                        <label for="newpseudo">Nouveau Pseudo</label>
                        <input name="newpseudo" type="text" class="form-control" id="newpseudo" aria-describedby="newpseudo" placeholder="Votre pseudo" value="<?php $user['pseudo']; ?>" required>
                        <small id="newpseudo" class="form-text text-muted"></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="mdp">Password</label>
                        <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" required>
                    </div>
                    <div class="form-group">
                        <label for="mdp2">Confirmation Password</label>
                        <input name="mdp2" type="password" class="form-control" id="mdp2" placeholder="Votre mot de passe" required>
                    </div>
                                                        
                    <div class="form-group">
                        <label for="newmail">Nouveau Mail</label>
                        <input name="newmail" type="email" class="form-control" id="newmail" aria-describedby="newmail" placeholder="Votre email" value="<?php $user['email']; ?>" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="mdp">Password</label>
                        <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" required>
                    </div>
                    <div class="form-group">
                        <label for="mdp2">Confirmation Password</label>
                        <input name="mdp2" type="password" class="form-control" id="mdp2" placeholder="Votre mot de passe" required>
                    </div>
                    
                        <button type="submit" name="formEditEmail" class="btn btn-primary">Enregistrer les modifications</button>
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
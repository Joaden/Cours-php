<?php
session_start();

$_SESSION["varsessionparameters"]= "Session parameters test OK";
$pathToRootFolder = "../../";
$PAGE_TITLE = "Parameters";

//require_once($pathToRootFolder.'vendor/autoload.php');

// Connection
require_once($pathToRootFolder.'config/connect.php');

require_once($pathToRootFolder.'config/functions.php');

// check if user is connected
require($pathToRootFolder."views/common/checkSessionUser.php");

if(isset($_POST['formupdateparameters']))
{
    //vérification & update 
      
}


if(isset($_SESSION['id']))
{
    $num_rows=0;

    //Si le user est connecté
    $reqUser = $bdd->prepare("SELECT * FROM users WHERE id = ? ");
    $reqUser->execute(array($_SESSION['id']));
    $user = $reqUser->fetch();

    if(isset($_POST['']) AND !empty($_POST['']) AND $_POST[''] != $user[''] AND !empty($_POST['']) AND !empty($_POST['']) AND $_POST[''] == $_POST[''])
    {
        
        $newPseudo = htmlspecialchars($_POST['']);
        $insertPseudo = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
        $insertPseudo->execute(array($newPseudo, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);

    }

    



?>
<!DOCTYPE html>
<html lang="fr">

    <?php
        include($pathToRootFolder."views/common/head.php");
    ?>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }

        #notes div {
            padding: 5px;
            margin: 5px;
        }
    </style>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->

    <?php include($pathToRootFolder."views/common/header.php"); ?>
    


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
                        if(isset($_SESSION['id']) AND $userInfo['id'] == $_SESSION['id'])
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

            <!-- Formulaire pour modifier  les parametres -->
            <form method="POST" action="" enctype="multipart/form-data">

                <h2 class="text-secondary">Notifications</h2>

                <div class="ml-5">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Default radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Second default radio
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                            <label class="form-check-label" for="exampleRadios3">
                                Disabled radio
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailRegister"><?php if(isset($userInfo)) { echo $userInfo['email']; } ?></label>
                                <input name="email" type="email" class="form-control" id="emailRegister" aria-describedby="emailRegister" placeholder="Modifier mon email" value="<?php if(isset($email)) { echo $email; } ?>" >
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="verified">
                                    <?php if(isset($userInfo)) { echo 'Profil vérifié'; } 
                                        if( $userInfo['is_verified'] == 0)
                                        {
                                           echo "<div>Votre profil n\'est pas confirmé</div>";
                                        } 
                                        else{
                                            echo "<div>Veuillez confirmer votre email.</div>";
                                        }
                                        
                                    ?>
                                </label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php if(isset($userInfo)) { echo 'Statut : '.$userInfo->roles_id; } else { echo "Permission statut :"; }?></label>
                            </div>
                        </div>

                        
                    </div>
                </div>
                

                <h2 class="mt-5 text-secondary">Visible par tout le monde</h2>

                <div class="ml-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pseudoRegister"><?php if(isset($userInfo)) { echo $userInfo['pseudo']; } ?></label>
                                <input name="pseudo" type="text" class="form-control" id="pseudoRegister" aria-describedby="pseudoRegister" placeholder="Modifier mon pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="avatarRegister">Avatar / Photo</label>
                                <input name="avatar" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phraseRegister"><?php if(isset($userInfo)) { echo $userInfo['phrase']; } ?></label>
                        <input name="phrase" type="text" class="form-control" id="phraseRegister" aria-describedby="phraseRegister" placeholder="Modifier la phrase" value="<?php if(isset($phrase)) { echo $phrase; } ?>" >
                    </div>
                </div>

                <div class="row">
                    <div class="offset-md-3 col-md-6">
                        <hr>
                    </div>
                </div>

                <div class="form-group form-check">
                    <div class="form-check pl-0 text-center">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck29" required>
                        <label class="form-check-label" for="invalidCheck29">
                            Accepter les conditions générales d'utilisations
                            <!--Agree to terms and conditions-->
                        </label>
                        <div class="invalid-feedback">You  shall not pass!</div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2 offset-sm-4 col-sm-4">
                        <label for="captcha"></label>
                        <input type="text" class="form-control" id="captcha" name="captcha" placeholder="14 + 1 = ?" autocomplete="off" required="required" data-validation-required-message="Please enter the response.">
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <button type="submit" name="formupdateprofil" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </div>
            </form>

            <hr>
            
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
            <?php
            #if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
            ?>
                <a href="editProfilNew.php?id=<?php $_SESSION['id']; ?>">Editer mon profil</a><br>
                <a href="session_logout.php">Se déconnecter</a>
            <?php
            #}
            ?>
       
        </div>
        <br>
        <hr><br>


    </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- FOOTER -->
    <?php include($pathToRootFolder."views/common/footer.php");?>
    <?php include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    
</body>

</html>
<?php
}
?>
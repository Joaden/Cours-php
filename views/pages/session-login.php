<?php 
session_start();

$pathToRootFolder = "../../";
$PAGE_TITLE = "Connexion";

require_once($pathToRootFolder.'vendor/autoload.php');

//Appel de function avec la connexion à la bdd
require($pathToRootFolder.'config/functions.php');

require_once($pathToRootFolder.'config/connect.php'); 

// Si e submit est fait
if(isset($_POST['formconnexion']))
{
    $emailConnect = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['mdp']);
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    $captchaConnect = htmlspecialchars($_POST['captcha']);

    $passwordConnect = password_verify($password, $passwordHashed);
        
   if(!empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['captcha']))
   {
        
        if($_POST['captcha']=="10")
        {
            // Requete pour vérifier si les identifiants correspondent et existent
            $reqUser = $bdd->prepare("SELECT * FROM users WHERE email = :email ");
            $reqUser->execute(array('email' => $_POST['email']));
            $result = $reqUser->fetch();
            if ($result && password_verify($_POST['mdp'], $result['password']))
            {
                // Si les verif passent bien on pourra utiliser ces variables de session pour avoir les infos du user connecté
                $_SESSION['id'] = $result['id'];
                $_SESSION['pseudo'] = $result['pseudo'];
                $_SESSION['email'] = $result['email'];

                header("Location: profil.php?id=".$_SESSION['id']);
            }
            else
            {
                $erreur = "Identifiants invalides";
            }
        }
        else
        {
            // erreur captcha
            $erreur = "Veuillez renseigner la bonne réponse";
        }
    }
   else{
    // $erreurs = 1;
    $erreur = "Tous les champs doivent être complétés";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include($pathToRootFolder."views/common/head.php");?>

    <style>
        #antibot{
        display: none;
        visibility: hidden;

        }
    </style>
    
    <body>
         <!-- =================================================== -->
        <!-- ================ DEBUT HTML  ================ -->

        <h1 class="brand-logo-big"><a href="home.php">BLOG</a></h1>

        <!-- ======== NAVBAR ========= -->
        <?php include($pathToRootFolder."views/common/navbar.php"); ?>

        <div class="container-fluid">
            <div class="container">
                <div class="row">    
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <h1><?php echo $PAGE_TITLE ?></h1>
                        <!-- H3 affiche une var de session pour tester si la session fonctionne bien -->
                        <h3>
                            <?php echo $_SESSION["varsessiontest"]; ?>
                        </h3>
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
                
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailRegister"></label>
                                <input name="email" type="email" class="form-control" id="emailRegister" aria-describedby="emailRegister" placeholder="E-mail" value="<?php if(isset($email)) { echo $email; } ?>" required>
                                
                            </div>
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mdp"></label>
                                <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Mot de passe" required>
                                <small id="emailRegister" class="form-text text-muted">Mot de passe oublié ?</small>
                            </div>
                        </div>
                        <div class="col-md-3"></div>



                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label for="captcha"></label>
                                    <input type="text" class="form-control" id="captcha" name="captcha" placeholder="4 + 6 = ?" autocomplete="off" required="required" data-validation-required-message="Please enter the response.">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5"></div>

                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div id="antibot" class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label for="antibot"></label>
                                <input type="text"  name="antibot" placeholder="" value="">
                            </div>
                    
                            <button type="submit" name="formconnexion" class="btn btn-primary">Se connecter</button>
                        </div>
                        <div class="col-md-5"></div>

                        <div class="col-md-4"></div>
                        <div class="col-md-4 ">
                            <hr>
                        </div>
                        <div class="col-md-4"></div>

                    </div>
                </form>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <p>Vous n'avez pas encore de compte ?</p>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                        <button class="btn btn-danger">
                            <a href="session-register.php">
                                S'inscrire
                            </a>
                        </button>
                    </div>
                    <div class="col-md-5"></div>
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
                <br>
                <hr>
            </div>
        </div>
          <!-- FOOTER -->
        <?php include($pathToRootFolder."views/common/footer_dev_mode.php");?>
        
        <!-- ================ FIN HTML  ================ -->
        <!-- =================================================== -->

        <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    </body>
</html>
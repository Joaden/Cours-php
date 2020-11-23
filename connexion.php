<?php 
session_start();

require_once('vendor/autoload.php');

//Appel de function avec la connexion à la bdd
require('config/functions.php');

require_once('config/connect.php'); 

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
                // Si les verif passent bien on pourra utiliser ces variables de session pour avoir les info du user connecté
                $_SESSION['id'] = $result['id'];
                $_SESSION['pseudo'] = $result['pseudo'];
                $_SESSION['email'] = $result['email'];
                // echo "id = ".$result['id']."<br>";
                // echo "name = ".$result['name']."<br>";
                // echo "pseudo = ".$result['pseudo']."<br>";
                // echo "email = ".$result['email']."<br>";
                // echo "Valide = ".$result['is_verified']."<br>";
                // die();
                header("Location: profil.php?id=".$_SESSION['id']);
            }

            // $reqUser = $bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            // $reqUser->execute(array($emailConnect, $passwordConnect));
            // $userExist = $reqUser->rowCount();
            // if($userExist == 1)
            // {
            //     $userInfo = $reqUser->fetch();
            //     $_SESSION['id'] = $userInfo['id'];
            //     $_SESSION['pseudo'] = $userInfo['pseudo'];
            //     $_SESSION['email'] = $userInfo['email'];
            //     header("Location: profil.php?id".$_SESSION['id']);

            // }
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
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@1.0.0-beta.3.1/dist/css/axentix.min.css">
        <link rel="stylesheet" type="text/css" href="../css/base-back.css">
        <link rel="stylesheet" type="text/css" href="../css/base-front.css">
        <link rel="stylesheet" type="text/css" href="../css/header.css">
        <link rel="stylesheet" type="text/css" href="../css/navbar-back.css">
        <link rel="stylesheet" type="text/css" href="../css/navbar-front.css">
        <link rel="stylesheet" type="text/css" href="../css/content.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
    </head>
    <style>
        #antibot{
        display: none;
        visibility: hidden;

        }
    </style>
    <body>
        <nav class="navbar shadow-1 primary">
        <a href="index.php" class="navbar-brand">Homepage Blog</a>
        <div class="navbar-menu ml-auto">
            <a class="navbar-link" href="index.php"><i class="fas fa-home"></i> Accueil</a>
            <a class="navbar-link" href="register.php"><i class="fas fa-sign-in-alt"></i> Inscription</a>
        </div>
        </nav>
        </header>
            <div class="container-fluid">
                <h1>Connexion</h1>
                <div class="container bordered">
                    <hr>
                    <hr>
                    <div class="row">
                    <div class="col-md-6">
                        <h2>Connexion</h2>
                    </div>
                    <div class="col-md-6">
                        <p>Vous n'avez pas encore de compte ? 
                            <button class="btn btn-primary">
                                <a href="register.php">
                                    S'inscrire
                                </a>
                            </button>
                        </p>
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
                        <div class="form-group">
                            <label for="emailRegister">Email</label>
                            <input name="email" type="email" class="form-control" id="emailRegister" aria-describedby="emailRegister" placeholder="Votre email" value="<?php if(isset($email)) { echo $email; } ?>" required>
                            <small id="emailRegister" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="mdp">Password</label>
                            <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" required>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label for="captcha"></label>
                                <input type="text" class="form-control" id="captcha" name="captcha" placeholder="4 + 6 = ?" autocomplete="off" required="required" data-validation-required-message="Please enter the response.">
                            </div>
                        </div>
                        <div id="antibot" class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label for="antibot"></label>
                            <input type="text"  name="antibot" placeholder="" value="">
                        </div>
                        <div class="form-group form-check">
                            <div class="form-check pl-0">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck29" required>
                                <label class="form-check-label" for="invalidCheck29">Agree to terms and conditions</label>
                                <div class="invalid-feedback">You  shall not pass!</div>
                            </div>
                        </div>
                        <button type="submit" name="formconnexion" class="btn btn-primary">Je m'inscris</button>
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
                </div>
            </div>
            <footer class="footer primary">
                Copyright © 2020 - Daos
            </footer>
        <script src="https://cdn.jsdelivr.net/npm/axentix@1.0.0-beta.3.1/dist/js/axentix.min.js"></script>
    </body>
</html>
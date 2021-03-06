<?php 
session_start();

require_once('vendor/autoload.php');

//Appel de function avec la connexion à la bdd
require('config/functions.php');

require_once('config/connect.php'); 


if(isset($_POST['formregister']))
{
    
    if(!empty($_POST['name']) AND !empty($_POST['email'])AND !empty($_POST['email2']) AND !empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND empty($_POST['antibot']) AND !empty($_POST['captcha']))
    {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $email2 = htmlspecialchars($_POST['email2']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['mdp']);
            $password2 = htmlspecialchars($_POST['mdp2']);
            $captcha = htmlspecialchars($_POST['captcha']);
            
            // sha1, md5, sha256 et sha512 ne sont plus sûres aujourdhui donc à ne plus utiliser !!!!
            // j'utilise password_hash() MAIS, faudra faire une petite recherche pour être sûr que ce soit sécurisé
            // $br = '<br>';
                    // echo $name . $br;
                    // echo $email . $br;
                    // echo $pseudo . $br;
                    // echo $hashedmdp . $br;
                    // echo " Send form register ok <br>";
                    // echo $hashedmdp2 . $br;
            if($_POST['captcha']=="20")
            {
                $pseudolength = strlen($pseudo);
                if($pseudolength <= 30)
                {
                    $reqpseudo = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
                    $reqpseudo->execute(array($pseudo));
                    $pseudoexist = $reqpseudo->rowCount();
                    if($pseudoexist == 0)
                    {
                        if($email == $email2)
                        {
                            // function avec filtre qui permet de vérifier si c'est bien une adresse mail
                            if(filter_var($email, FILTER_VALIDATE_EMAIL))
                            {
                                $reqmail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
                                $reqmail->execute(array($email));
                                $mailexist = $reqmail->rowCount();
                                // Si il n'y a pas cet email en base
                                if($mailexist == 0)
                                {
                                    if($password == $password2)
                                    {
                                        // hash de mdp , a voir si il y a plus sûr comme function
                                        $hashedmdp = password_hash($password, PASSWORD_DEFAULT);
        
                                        $insertmdr = $bdd->prepare("INSERT INTO users(name, email, pseudo, password) VALUE(?, ?, ?, ?)");
                                        // On insère les $*** dans la requête
                                        $insertmdr->execute(array($name, $email, $pseudo, $hashedmdp));
                                        $erreur = "Votre compte à bien été créé ! <a href=\"connexion.php\">Me Connecter</a>";
                                        // $_SESSION['comptecree'] = "Votre compte à bien été créé !";
                                        // header('Location: index.php');
                                    }
                                    else
                                    {
                                        $erreur = "Vos mots de passes ne correspondent pas.";
                                    }
                                }
                                else
                                {
                                    $erreur = "Votre adresse mail est déjà utilisé.";
                                }
                            }
                            else
                            {
                                $erreur = "Votre adresses mail n'est pas valide.";
                            }
                        }
                        else
                        {
                            // erreur email
                            $erreur = "Vos adresses mails ne correspondent pas.";
                        }
                    }
                    else
                    {
                        // erreur pseudo deja pris
                        $erreur = "Votre pseudo est déjà utlisé.";
                    }
                }
                else{
                    // erreur pseudo trop long
                    $erreur = "Votre pseudo ne doit pas dépasser 30 caractères.";
                }
            }
        else
        {
            // erreur captcha
            $erreur = "Veuillez renseigner la bonne réponse";
        }
    }else{
    // $erreurs champs incomplet
    $erreur = "Tous les champs doivent être complétés";
    }
}
    
   
// }



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
        <a class="navbar-link" href="connexion.php"><i class="fas fa-sign-in-alt"></i> Connexion</a>
      </div>
    </nav>
  </header>
        <div class="container-fluid">
            <h1>Inscription</h1>
            <div class="container bordered">
                 <hr>
                 <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h2>Inscription</h2> 
                    </div>
                    <div class="col-md-6">
                        <p>Vous avez déjà un compte ? 
                            <button class="btn btn-primary">
                                <a href="connexion.php">
                                    Se connecter
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
                        <label for="emailRegister">Name</label>
                        <input name="name" type="text" class="form-control" id="nameRegister" aria-describedby="nameRegister" placeholder="Votre nom" value="<?php if(isset($name)) { echo $name; } ?>" required>
                        <small id="nameRegister" class="form-text text-muted">Visible que par vous.</small>
                    </div>
                    <div class="form-group">
                        <label for="emailRegister">Email</label>
                        <input name="email" type="email" class="form-control" id="emailRegister" aria-describedby="emailRegister" placeholder="Votre email" value="<?php if(isset($email)) { echo $email; } ?>" required>
                        <small id="emailRegister" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="email2">Email confirmation</label>
                        <input name="email2" type="email" class="form-control" id="email2" aria-describedby="email2" placeholder="Votre email" required>
                        <small id="email2" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="pseudoRegister">Pseudo</label>
                        <input name="pseudo" type="text" class="form-control" id="pseudoRegister" aria-describedby="pseudoRegister" placeholder="Votre pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" required>
                        <small id="pseudoRegister" class="form-text text-muted">Visible par tout le monde.</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="mdp">Password</label>
                        <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" required>
                    </div>
                    <div class="form-group">
                        <label for="mdp2">Confirmation Password</label>
                        <input name="mdp2" type="password" class="form-control" id="mdp2" placeholder="Votre mot de passe de confirmation" required>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label for="captcha"></label>
                            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="14 + 6 = ?" autocomplete="off" required="required" data-validation-required-message="Please enter the response.">
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
                    <button type="submit" name="formregister" class="btn btn-primary">Je m'inscris</button>
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
        <?php 
            include("src/Views/common/scripts_loader.html");
        ?>
    </body>
</html>
<?php 
session_start();

$pathToRootFolder = "../../";
$PAGE_TITLE = "Inscription";

require_once($pathToRootFolder.'vendor/autoload.php');

//Appel de function avec la connexion à la bdd
require($pathToRootFolder.'config/functions.php');

require_once($pathToRootFolder.'config/connect.php'); 


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
            $phrase = htmlspecialchars($_POST['phrase']);
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
        
                                        $insertmdr = $bdd->prepare("INSERT INTO users(name, email, pseudo, password, phrase) VALUE(?, ?, ?, ?, ?)");
                                        // On insère les $*** dans la requête
                                        $insertmdr->execute(array($name, $email, $pseudo, $hashedmdp, $phrase));
                                        $erreur = "Votre compte à bien été créé ! <a href=\"session_login.php\">Me Connecter</a>";
                                        $_SESSION['comptecree'] = "Votre compte à bien été créé !";
                                        header('Location: session_login.php');
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
        <!-- ================ DEBUT HTML  ================ -->

        <?php include($pathToRootFolder."views/common/header.php"); ?>
            
        <div class="container"> <!-- 1er container -->
            <h1 class="text-dark text-center mt-3"><?php echo $PAGE_TITLE ?></h1>
            <h3></h3><!-- H3 affiche une var de session pour tester si la session fonctionne bien -->

            <br>
            <br>

            <form method="POST" action="">

                <h2 class="text-secondary">Visible par vous uniquement</h2>

                <div class="ml-5">
                    <div class="form-group">
                        <label for="emailRegister">Name</label>
                        <input name="name" type="text" class="form-control" id="nameRegister" aria-describedby="nameRegister" placeholder="Votre nom" value="<?php if(isset($name)) { echo $name; } ?>" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailRegister">Email</label>
                                <input name="email" type="email" class="form-control" id="emailRegister" aria-describedby="emailRegister" placeholder="Votre email" value="<?php if(isset($email)) { echo $email; } ?>" required>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mdp">Password</label>
                                <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email2">Email confirmation</label>
                                <input name="email2" type="email" class="form-control" id="email2" aria-describedby="email2" placeholder="Confirmation de votre email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mdp2">Confirmation Password</label>
                                <input name="mdp2" type="password" class="form-control" id="mdp2" placeholder="Confirmation du mot de passe" required>
                            </div>
                        </div>
                    </div>
                </div>
                

                <h2 class="mt-5 text-secondary">Visible par tout le monde</h2>

                <div class="ml-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pseudoRegister">Pseudo</label>
                                <input name="pseudo" type="text" class="form-control" id="pseudoRegister" aria-describedby="pseudoRegister" placeholder="Votre pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" required>
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
                        <label for="phraseRegister">Phrase affichée en fin de vos posts</label>
                        <input name="phrase" type="text" class="form-control" id="phraseRegister" aria-describedby="phraseRegister" placeholder="Votre phrase" value="<?php if(isset($phrase)) { echo $phrase; } ?>" required>
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
                        <input type="text" class="form-control" id="captcha" name="captcha" placeholder="14 + 6 = ?" autocomplete="off" required="required" data-validation-required-message="Please enter the response.">
                    </div>
                </div>

                <div class="row">
                    <div class="col text-center">
                        <button type="submit" name="formregister" class="btn btn-primary">Je m'inscris</button>
                    </div>
                </div>
            </form>

            <hr>
            <p class="text-center">Vous avez déjà un compte ?</p>
            <div class="row">
                <div class="col text-center">
                    <a href="session-login.php btn" class="btn btn-danger text-white">
                        Se connecter
                    </a>
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
            <br>
            <hr>
        </div> <!-- 1er container -->
        
        <?php 
            include($pathToRootFolder."views/common/footer_dev_mode.php");

            #include($pathToRootFolder."views/pages/common/scripts_loader.html");
            include($pathToRootFolder."views/common/load_js_scripts.php");
        ?>
    </body>
</html>
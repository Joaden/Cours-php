<?php 
session_start();

$pathToRootFolder = "../../";
$PAGE_TITLE = "Connexion";
$_SESSION['autoriser']="non";


$_SESSION["varsessionlogintest"] = "Session login active OK";

require_once($pathToRootFolder.'vendor/autoload.php');

// Call functions with the connections
require($pathToRootFolder.'config/functions.php');

require_once($pathToRootFolder.'config/connect.php'); 

// back processing of the form if the form is submitted
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
            // request for verify id and check this
            $reqUser = $bdd->prepare("SELECT * FROM users WHERE email = :email ");
            $reqUser->execute(array('email' => $_POST['email']));
            $connectedUserFromDB = $reqUser->fetch();
            $reqUser->closeCursor(); 

            if ($connectedUserFromDB && password_verify($_POST['mdp'], $connectedUserFromDB['password']))
            {
                // If the checks are successful we can use these session variables to get the information of the connected user.
                $sessionIdActual = session_id();
                if(empty($sessionIdActual)) session_start();
                echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];
                echo $sessionIdActual;

               //////////// START REGISTER IP & SESSION ID to DB //////////
               $userId = $connectedUserFromDB['id'];
               //$ipUser = $_SERVER['HTTP_CLIENT_IP'];
               $ipUser = $_SERVER['REMOTE_ADDR'];
               $userAgent = $_SERVER['HTTP_USER_AGENT'];

               // je vérifie si il y a une entrée correspondant à l'ID du user
                // $reqVerifIfIdExistToDBSession = $bdd->prepare("SELECT user_id FROM sessions WHERE user_id = ? ");
                // $reqVerifIfIdExistToDBSession->execute(array($userId));
                // $userIdFromDBSessions = $reqVerifIfIdExistToDBSession->fetch();
                // echo "</br>after SELECT USER_ID FROM SESSIONS</br>";

                // // Si il y a déjà une entrée avec son ID de user(user_id) je dois l'UPDATE
                // if(isset($userIdFromDBSessions['user_id']) && $userIdFromDBSessions['user_id'] == $userId ){
                //     echo "</br>Il y a déjà une entrée dans la Table Sessions ! Before UPDATE sessions SET session_id....</br>";
                // //die();
                //     $reqUpdateSessionId = $bdd->prepare("UPDATE sessions SET session_id = :session_id, ip = :ip, user_agent = :user_agent, date = NOW() WHERE id = :id");
                //     echo "</br>Il y a déjà une entrée dans la Table Sessions ! Before Execute!! UPDATE sessions SET session_id....</br>";
                //     $reqUpdateSessionId->execute(array(
                //         'session_id' => $sessionIdActual,
                //         'ip' => $ipUser,
                //         'user_agent' => $userAgent,
                //         'id' => $userId
                //         ));
                // $reqUpdateSessionId->closeCursor(); 


                // echo "</br>Il y a déjà une entrée dans la Table Sessions ! After UPDATE sessions SET session_id....</br>";
                // die();

                // }else{

                   $reqInsertToDBSessions = $bdd->prepare("INSERT INTO sessions (user_id, session_id, ip, user_agent, date) VALUES (?, ?, ?, ?,NOW())");

                    $reqInsertToDBSessions->execute(array($userId, $sessionIdActual, $ipUser, $userAgent));
                    //$connectedUserFromDB = $reqUser->fetch();
                    $reqInsertToDBSessions->closeCursor(); 

 
                    echo "</br>Nouvelle Entrée dans la Table Sessions ! after INSERT INTO sessions SET session_id</br>";
                // die();
                // }
                
               //////////// END REGISTER IP & SESSION ID to DB ////////////

                $cookieActual = $_COOKIE["PHPSESSID"];
                setcookie('infoUser', 'infos divers', time() + 365*24*3600, null, null, false, true); 
                setcookie('pseudo1', $connectedUserFromDB['pseudo'], time() + 365*24*3600, null, null, false, true); 
                //$_SESSION['cookie'] = $cookieActual;
                $_SESSION['sessionid'] = $sessionIdActual;
                $_SESSION['id'] = $connectedUserFromDB['id'];
                $_SESSION['userid'] = $connectedUserFromDB['id'];
                $_SESSION['sessionuserid'] = $connectedUserFromDB['id'];
                //$_SESSION['id'] = $sessionIdActual;
                $_SESSION['pseudo'] = $connectedUserFromDB['pseudo'];
                $_SESSION['email'] = $connectedUserFromDB['email'];
                $_SESSION['autoriser']="oui";
                // CREATE TOKEN AFTER LOGIN
                $_SESSION['token'] = md5(time()*rand(175,658));

               

                // header("Location: session.php?id=".$_SESSION['id']);
                header("Location: session.php");
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
    <!-- style antibot should stay here -->
    <style>
        #antibot{
        display: none;
        visibility: hidden;

        }
    </style>
    
    <body>
         <!-- =================================================== -->
        <!-- ================ DEBUT HTML  ================ -->
        <h1 class="brand-logo--big">
        <a class="brand-logo_link" href="home.php">BLOG</a>
        </h1>

        <!-- ======== NAVBAR ========= -->
        <?php include($pathToRootFolder."views/common/navbar_false.php"); ?>
        <!-- navbar temporaire pour eviter un bug qui s'aafiche dans les logs lors de la connection ;) idem pour logout -->
        <?php //include($pathToRootFolder."views/common/header.php"); ?>
     

        <div class="container">
            <?php 
                // define a $alertMessage="..message.." if necessary
                include($pathToRootFolder."views/common/alertMessageIfExist.php");
            ?>

                    
                <div class="col-md-4">
                    <h1><?php echo $PAGE_TITLE ?></h1>
                    <!-- H3 affiche une var de session pour tester si la session fonctionne bien -->
                    <h3>
                        <?php echo $_SESSION["varsessionlogintest"]; ?>
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
                            <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Mot de passe" autocomplete="off" required>
                            <small id="emailRegister" class="form-text text-muted">
                                <a href="recover_password.php">
                                    Mot de passe oublié ?
                                </a>
                            </small>
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
                    <a class="btn btn-danger" href="session_register.php">
                        S'inscrire
                    </a>
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
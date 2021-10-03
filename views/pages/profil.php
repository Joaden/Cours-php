<?php
session_start();

$_SESSION["varsessionprofiltest"]= "Session profil test OK";
$pathToRootFolder = "../../";
$PAGE_TITLE = "Mon profil";

//require_once($pathToRootFolder.'vendor/autoload.php');

// Connection
require_once($pathToRootFolder.'config/connect.php');

require_once($pathToRootFolder.'config/functions.php');

// check if user is connected
require($pathToRootFolder."views/common/checkSessionUser.php");

if(isset($_SESSION['userid']) and $userInfo['id'] == $_SESSION['userid']) {
    if(isset($_SESSION['sessionid']) and $_SESSION['sessionid'] == session_id()){
        //echo "</br>if isset session_id == à s_session['sessionid :: ".$_SESSION['sessionid']."</br>";
        
        $idsession = htmlspecialchars($_SESSION['userid']);
        $iduserinfo = htmlspecialchars($userInfo['id']);
        $author = htmlspecialchars($userInfo['pseudo']);



        if(isset($_POST['formupdateprofil']))
        {
            //vérification & upload image 
            $updateAvatar = updateAvatar();  
        }

        // $articles = getMyArticles($id);
        // if($articles >= 1)
        // {
        //     $nrb = 0;
        //     foreach($articles as $article)
        //     {
        //         $nbr++;
        //     }
        //     var_dump($nrb);
        //     echo $nrb;
        // }

        if(isset($_SESSION['id']))
        {
            $num_rows=0;

            //Si le user est connecté
            $reqUser = $bdd->prepare("SELECT * FROM users WHERE id = ? ");
            $reqUser->execute(array($_SESSION['id']));
            $user = $reqUser->fetch();

            // on get tous ses articles
            $reqarticleByUser = $bdd->prepare("SELECT * FROM articles WHERE user_id = ? ");
            $reqarticleByUser->execute(array($_SESSION['id']));
            $articleByUser = $reqarticleByUser->fetch();

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
    <?php 
        include($pathToRootFolder."views/common/head.php"); 
    ?>
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
            <form method="POST" action="" enctype="multipart/form-data">

                <h2 class="text-secondary">Visible par vous uniquement</h2>

                <div class="ml-5">
                    <div class="form-group">
                        <label for="emailRegister"><?php if(isset($userInfo)) { echo $userInfo['name']; } ?></label>
                        <input name="name" type="text" class="form-control" id="nameRegister" aria-describedby="nameRegister" placeholder="Modifier mon nom" value="<?php if(isset($name)) { echo $name; } ?>" >
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
                                <label for="phone"><?php if(isset($userInfo)) { echo 'Statut : '.$userInfo['roles_id']; } else { echo "Permission statut :"; }?></label>
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
            <hr>
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

            <form method="POST" action="" >
                <div class="form-group  col-md-3">
                    <label for="inputPhone">Phone</label>
                    <input type="text" class="form-control" id="inputPhone" placeholder="0606060606">
                </div>
                <div class="form-group  col-md-3">
                    <label for="inputBirth">Date de naissance</label>
                    <input type="date" class="form-control" id="inputBirth">
                </div>
                
                <button type="submit" class="btn btn-info">
                <a href="editProfilNumBirth.php?id=<?php echo $_SESSION['id']; ?>&auth=<?php echo $_SESSION['token']; ?>">Mettre à jour</a>
                </button>
                </form>
            <br>
            <hr>
            <hr>
            <hr>
            <form method="POST" action="" >
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="3 route du puit">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Complément</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Appartement, 4C 1er étage">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Country</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>France</option>
                            <option>USA</option>
                            <option>Laos</option>
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            <br>
            <hr>
            <?php
            #if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
            ?>
                <a href="editProfilAddress.php?id=<?php echo $_SESSION['id']; ?>&auth=<?php echo $_SESSION['token']; ?>">Editer mon adresse</a><br>
                <!-- <a href="session_logout.php">Se déconnecter</a> -->
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
    <?php include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    
</body>

</html>
<?php
        }
    }
}
?>
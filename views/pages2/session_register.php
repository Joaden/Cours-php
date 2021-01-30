<?php 
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Inscription";
?>

<!DOCTYPE html>
<html lang="fr">
    <?php include($pathToRootFolder."views/common/head.php");?>

    <body>
    <!-- ================ DEBUT HTML  ================ -->

    <h1 class="brand-logo-big"><a href="home.php">BLOG</a></h1>

    <!-- ======== NAVBAR ========= -->
    <?php include($pathToRootFolder."views/common/navbar.php"); ?>
        
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
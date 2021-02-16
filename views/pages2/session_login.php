<?php 
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Connexion";
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include($pathToRootFolder."views/common/head.php");?>
    <body>
         <!-- =================================================== -->
        <!-- ================ DEBUT HTML  ================ -->

        <?php include($pathToRootFolder."views/common/header.php"); ?>

        <div class="container">
            <h1 class="text-dark text-center mt-3"><?php echo $PAGE_TITLE ?></h1>
            <form method="POST" action="">
                <div class="row">
                    <div class="offset-md-3 col-md-6">
                        <div class="form-group">
                            <label for="emailRegister"></label>
                            <input name="email" type="email" class="form-control" id="emailRegister" aria-describedby="emailRegister" placeholder="E-mail" value="<?php if(isset($email)) { echo $email; } ?>" required>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-md-3 col-md-6">
                        <div class="form-group">
                            <label for="mdp"></label>
                            <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Mot de passe" required>
                            <small id="emailRegister" class="form-text text-muted">
                                <a href="recover_password.php">
                                    Mot de passe oublié ?
                                </a>
                            </small>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="offset-sm-4 col-sm-4">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label for="captcha"></label>
                            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="4 + 6 = ?" autocomplete="off" required="required" data-validation-required-message="Please enter the response.">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" name="formconnexion" class="btn btn-primary">Se connecter</button> 
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <hr>
                </div>
            </div>


            <p class="text-center">Vous n'avez pas encore de compte ?</p>
            <div class="row">
                <div class="col text-center">
                    <a class="btn btn-danger" href="session_register.php">
                        S'inscrire
                    </a>
                </div>
            </div>
        
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>  

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
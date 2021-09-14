<?php
session_start();
if(@$_SESSION["autoriser"]!="oui"){
    header("location:session_login.php");
    exit();
}
else{
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Profil";
}
require_once($pathToRootFolder.'config/connect.php');

require_once($pathToRootFolder.'config/functions.php');

require($pathToRootFolder."views/common/checkSessionUser.php");
?>
<!DOCTYPE html>
<html>
    <?php
        include($pathToRootFolder."views/common/head.php");
    ?>
    <body>
        <!-- =================================================== -->
        <!-- ================ DEBUT HTML  ================ -->
        <h1 class="brand-logo--big">
            <a class="brand-logo_link" href="home.php">BLOG</a>
        </h1>

        <!-- ======== NAVBAR ========= -->
        <?php include($pathToRootFolder."views/common/navbar_false.php"); ?>


        <div class="container">
            <?php 
                // define a $alertMessage="..message.." if necessary
                include($pathToRootFolder."views/common/alertMessageIfExist.php");
            ?>
          
    
    
            <h1>Page de Connexion</h1>
            <h2>Félicitations, vous êtes bien connecté !</h2>
            <h3>Vous allez être rediriger vers la page d'accueil.</h3>
            <h4><a href="session_logout.php">Se déconnecter</a></h4>
            
            <?php header("refresh:4;url=home.php");?> 
            <br>
            <br>
        </div>

    <!-- FOOTER -->
   
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    </body>
</html>
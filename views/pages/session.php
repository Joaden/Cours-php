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
?>
<!DOCTYPE html>
<html>
    <?php
        include($pathToRootFolder."views/common/head.php");
    ?>
    <body>
            <!-- =================================================== -->
        <!-- ================ DEBUT HTML  ================ -->

        <h1 class="brand-logo-big"><a href="home.php">BLOG</a></h1>

        <!-- ======== NAVBAR ========= -->
        <?php include($pathToRootFolder."views/common/navbar.php"); ?>


        <h1>Page confidentielle <a href="session-logout.php">Déconnexion</a></h1>
        <h3>Félicitations, vous êtes bien connecté !</h3>

        
        <?php header("refresh:3;url=profil.php");?> 
        <br>
        <br>
        <br>
    <br>

    <!-- FOOTER -->
   
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    </body>
</html>
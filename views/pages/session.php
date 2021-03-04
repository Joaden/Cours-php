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
        <?php include($pathToRootFolder."views/common/header.php"); ?>
        <div class="container">
            <?php 
                // define a $alertMessage="..message.." if necessary
                include($pathToRootFolder."views/common/alertMessageIfExist.php");
            ?>
          
    
    
            <h1>Page confidentielle de Connexion</h1>
            <h2>Félicitations, vous êtes bien connecté !</h2>
            <h4><a href="session_logout.php">Se déconnecter</a></h4>
            
            <?php header("refresh:3;url=profil.php");?> 
            <br>
            <br>
        </div>

    <!-- FOOTER -->
   
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    </body>
</html>
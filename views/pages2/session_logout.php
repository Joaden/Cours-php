<?php 
    $pathToRootFolder = "../../";

    $PAGE_TITLE = "BlogPHP - Déconnexion";
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include($pathToRootFolder."views/common/head.php");?>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->

    <h1 class="brand-logo-big"><a href="home.php">BLOG</a></h1>

    <!-- ======== NAVBAR ========= -->
    <?php include($pathToRootFolder."views/common/navbar.php"); ?>
    
    <div class="container">
        <h2 class="text-center text-secondaireDarker1 mt-4">Vous êtes maintenant déconnecté !</h2>
        <p class="text-center">Vous allez être redirigé vers la page d'acceuil.</p>
    </div>

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
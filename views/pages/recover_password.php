<?php 
    session_start();

    $_SESSION["varsessiontest"]= "Recover password";
    $pathToRootFolder = "../../";
    //require_once('vendor/autoload.php');

    // $PAGE_TITLE = "BlogPHP - home";
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
        <?php 
            // define a $alertMessage="..message.." if necessary
            include($pathToRootFolder."views/common/alertMessageIfExist.php");
        ?>
        <div class="row">
            <div class="col-md-4">
                <h3>
                    <?php echo $_SESSION["varsessiontest"]; ?>
                </h3>
                <h2>Suivez les indications pour redéfinir un nouveau mot de passe.</h2>
            </div>
        </div>
        <form action=""></form>
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
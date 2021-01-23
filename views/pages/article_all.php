<?php 
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - All Articles";
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include($pathToRootFolder."views/common/head.php");?>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->

    <h1 class="brand-logo-big">BLOG</h1>

    <!-- ======== NAVBAR ========= -->
    <?php include($pathToRootFolder."views/common/navbar.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <main class="order-1 order-md-0 col-md-9 col-xl-10 bg-primary">
                <!-- <div class="container"> -->
                MAIN
                <!-- </div> -->
            </main>
            <aside class="order-0 order-md-1 col-md-3 col-xl-2 bg-success articleFilter">
                ASIDE
            </aside>
        </div>
    </div>
    <!-- FOOTER -->
    <?php include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
</body>

</html>
<?php 
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Tableau de bord";
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
        

        <div class="container-fluid mt-1 px-0 h-100">
            <div class="row no-gutters">

                <div class="col-md-3">
                    <?php include($pathToRootFolder."views/common/sidebar_user.php"); ?>
                </div>
    
                <div class="col-md-9">
                    <h1 class="h1 text-dominante text-center my-5 border-top border-dominante"><?php echo $PAGE_TITLE ?></h1>
                    <h2 class="h1 text-dominante text-center my-5 border-top border-dominante">Mes Articles</h2>
                    <h2 class="h1 text-dominante text-center my-5 border-top border-dominante">Mes Notes</h2>
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
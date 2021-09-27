<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Blog DCCG - terms of service";
    require_once($pathToRootFolder.'vendor/autoload.php');

    require_once($pathToRootFolder.'config/connect.php');

    require_once($pathToRootFolder.'config/functions.php');

    require_once($pathToRootFolder.'config/functions/function_file.php');

    require($pathToRootFolder."views/common/checkSessionUser.php");

?>

<!DOCTYPE html>
<html lang="fr">

    <?php include($pathToRootFolder."views/common/head.php");?>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->

    <?php include($pathToRootFolder."views/common/header.php"); ?>

    <!-- ======== PARAGRAPHE BIENVENUE ========= -->
    <main class="container border-yellow">
        
        <section class="section">
            <div class="section-head">
                <h2 class="section-head-title font-weight-bolder">
                   Termes of services 
                </h2>
            </div>
        </section>
        <section class="section">
            

            <!-- =================== BLOC COMPETENCES ================== -->
           
                <div class="section-content">
                <h2 class="section-head-title font-weight-bolder"></h2>

                    <div class="blogArticle--large row no-gutters">

                    </div>
                </div>
            </section>
                         
           
        
        

    </main>

    <!-- FOOTER -->
    <?php include($pathToRootFolder."views/common/footer.php");?>
    <?php #include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
</body>

</html>
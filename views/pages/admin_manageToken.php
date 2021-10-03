<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Tableau de bord Admin show test token JWT";

    $_SESSION["varsessionadmin_board"] = "Session admin_board show test token JWT";


    include($pathToRootFolder."debug_functions.php");

    // Connection
    // require_once('vendor/autoload.php');

    require_once($pathToRootFolder.'config/connect.php');

    require_once($pathToRootFolder.'config/functions.php');
      
    // check if user is connected
    require($pathToRootFolder."views/common/checkSessionUser.php");
    require($pathToRootFolder."views/common/jwtToken.php");

?>

<!DOCTYPE html>
<html lang="fr">
    <?php include($pathToRootFolder."views/common/head.php");?>
    <body>
         <!-- =================================================== -->
        <!-- ================ DEBUT HTML  ================ -->

        <?php include($pathToRootFolder."views/common/header.php"); ?>
        
        <div class="container-fluid mt-1 px-0 h-100">
            <div class="row no-gutters">

                <div class="col-md-3">
                    <?php include($pathToRootFolder."views/common/sidebar_user.php"); ?>
                </div>
    
                <div class="col-md-9">
                    <!-- <h1 class="h1 text-dominante text-center my-5 border-top border-dominante"><?php # echo $PAGE_TITLE ?></h1> -->
                    <section class="text-center">
                        <h1 class="h1 text-dominante text-center mt-3 mb-5">Show test token JWT</h1>

                        <div class="widgetTextDigit">
                            <p class="widgetTextDigit-text">TEST</p>
                            <p class="widgetTextDigit-value">240</p>
                        </div>                       
                    </section>                        
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
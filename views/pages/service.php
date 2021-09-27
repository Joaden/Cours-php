<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Blog DCCG - service";
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
                   Les services que nous proposons : 
                </h2>
            </div>

            <p class="section-text">Passionnés par l'informatique nous avons des parcours très variés qui ont enrichis notre savoir et nos compétences, nous aimons les défis et concevoir de A à Z nos projets web.</p>
        </section>

        <section class="section">
            <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">

                <h3 class="section-title">
                    DEVELOPPEMENT WEB FRONT-END 
                <i class="fas fa-file-code"></i></h3>
                
            </div>
            
            <p>Nous développons toute l'interface visible du site web à partir d'une maquette et cahier des charges.<br>
            Pour aboutir à une interface ergonomique et interactive.</p>
            <span>HTML, CSS, Javascript, jQuery..</span>
        </section>
        
        <section class="section">
            <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">

                <h3 class="section-title">
                    DEVELOPPEMENT WEB BACK-END 
                <i class="fab fa-php"></i></h3>
             
            </div>  
                <p>Nous assurons de développement et la maintenance de toutes les fonctionnalités nécessaires au fonctionnement du site.</p>
                <span>MySQL, PHP(Symfony)..</span>
        </section>

            <!-- =================== BLOC COMPETENCES ================== -->
           
                <div class="section-content">
                <h2 class="section-head-title font-weight-bolder">Nos créations : </h2>

                    <div class="blogArticle--large row no-gutters">

                        <img class="blogArticle-imglink-img" src="https://via.placeholder.com/500x300" alt="image here">
                        <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random/500x300" alt="image here"><a href="#"></a>
                        <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random/500x300" alt="image here"><a href="#"></a>
                        <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random/500x300" alt="image here"><a href="#"></a>
                        <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random/500x300" alt="image here"><a href="#"></a>
                        <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random/500x300" alt="image here"><a href="#"></a>
                        <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random/500x300" alt="image here"><a href="#"></a>
                    </div>
                </div>
            </section>
                         
           
            <section class="section">
                <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                    <h2 class="section-head-title font-weight-bolder">Contact</h2>
                    <div class="blogArticle--large row no-gutters">
                        <a href="contact_writeMessage.php" class="abrev">Demander un devis !</a>
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
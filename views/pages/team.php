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
                   Présentations des développeurs : 
                </h2>
            </div>

            <p class="section-text">Passionnés par l'informatique nous avons des parcours très variés qui ont enrichis notre savoir et nos compétences, nous aimons les défis et concevoir de A à Z nos projets web.</p>
        </section>

        <section class="section">
            <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">

                <h3 class="section-title">
                    Denis CHANET 
                </h3>
                <img class="blogArticle-imglink-img" src="../../assets/uploadPersonal/denis.jpg" alt="image here">
            </div>
            
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam eligendi blanditiis magnam laboriosam nesciunt neque dolore veniam sit dicta est. Hic illum similique quis necessitatibus laudantium cumque incidunt in ut..<br>
            Pour aboutir à une interface ergonomique et interactive.</p>
            <span class="keyword">Développeur Fullstack</span>
            <span class="keyword">Coderminator</span>
            <span class="keyword">Expert Logistique</span>
            <span class="keyword">Manager</span>
            <span class="keyword">Eleveur de Gremlins</span>

        </section>
        
        <section class="section">
            <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">

                <h3 class="section-title">
                    Christophe GOURMAND 
                </h3>
                <img class="blogArticle-imglink-img" src="https://via.placeholder.com/500x300" alt="image here">
            </div>  
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam laboriosam alias eveniet sint id quisquam pariatur earum repellendus illum labore blanditiis vel autem omnis commodi amet ducimus, sequi quos impedit..</p>
                <span class="keyword">Développeur Fullstack</span>
                <span class="keyword">Génie du son</span>
                <span class="keyword">Expert Analyse & Management</span>
                <span class="keyword">Office Manager</span>
        </section>

            <!-- =================== BLOC COMPETENCES ================== -->
           
                <div class="section-content">
                <h2 class="section-head-title font-weight-bolder">Nos collaborateurs : </h2>

                    <div class="blogArticle--large row no-gutters">

                        <img class="blogArticle-imglink-img" src="https://via.placeholder.com/500x300" alt="image here">
                        

                    </div>
                    <div class="blogArticle--large row no-gutters">

                        <img class="blogArticle-imglink-img" src="https://via.placeholder.com/500x300" alt="image here">
                        <!-- <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random/500x300" alt="image here"><a href="#"></a> -->

                    </div>
                </div>
            </section>
            <section class="section">
                <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                    <h3 class="section-title">
                        
                    </h3>
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
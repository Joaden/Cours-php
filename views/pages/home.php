<?php 
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - home";
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
    

    <!-- ======== CARROUSEL ========= -->
    <div id="carouselOnHomepage" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselOnHomepage" data-slide-to="0" class="active"></li>
            <li data-target="#carouselOnHomepage" data-slide-to="1"></li>
            <li data-target="#carouselOnHomepage" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.imore.com/sites/imore.com/files/styles/xlarge/public/field/image/2018/12/barley-field-wallpaper-hero.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://img.fcbayern.com/image/upload/cms/public/images/allianz-arena/wallpaper/wallpaper-7.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://img-4.linternaute.com/UcR-LNbBvF-FMfqevLX9pV0no8o=/1240x/smart/56b88043c63e497c99930c4b296eaa5c/ccmcms-linternaute/10501254.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselOnHomepage" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselOnHomepage" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- ======== PARAGRAPHE BIENVENUE ========= -->
    <main class="container border-yellow">
        <section class="section">
            <div class="section-head">
                <h2 class="section-head-title">Bienvenue</h2>
            </div>

            <p class="section-text">Vous voilà arrivés sur notre Blog ! Profitez, écrivez, partagez, et réagissez, c'est pour ça que ce site existe.</p>
            <p class="section-text">Mais surtout, on est cools, on se respecte, car c'est parce que nos avis divergent que le monde est riche et créatif !</p>
        </section>
        <section class="section">
            <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                <h2 class="section-head-title font-weight-bolder">Derniers Articles</h2>

                <form class="d-flex mb-2 mb-md-0">
                    <input class="form-control rounded-pill border-dominante" type="search" placeholder="Recherche" aria-label="search">
                </form>
            </div>

            <!-- =================== ARTICLES ================== -->
            <?php for($i=1; $i<=3; $i++): ?>
                <div class="section-content">
                    <div class="blogArticle--large row no-gutters">
                        <a class="blogArticle-imglink col-lg-5" href="#">
                            <!-- <img class="blogArticle-imglink-img" src="https://via.placeholder.com/500x300" alt="image here"> -->
                            <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random" alt="image here">
                            <!-- <img class="blogArticle-imglink-img" src="http://jwilson.coe.uga.edu/emt668/EMAT6680.2002/Nooney/EMAT6600-ProblemSolving/MagicSquares(4x4)/image01.gif" alt="image here"> -->
            
                        </a>
                        <div class="blogArticle-content offset-lg-1 col-lg-6">
                            <h2 class="blogArticle-title">Lorem ipsum dolor sit amet</h2>
                            <p class="blogArticle-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos rem eum fuga voluptatibus velit excepturi aliquid quia minima dolor cum? Dolorem repellat, dicta rerum doloremque non omnis? Deleniti eaque blanditiis corporis recusandae placeat, delectus veritatis omnis at dolor neque, expedita quo nemo incidunt similique dolorum dolorem, exercitationem ratione odio quia sit est! Deserunt quisquam vitae blanditiis amet nam, accusantium cumque animi suscipit, perspiciatis quam exercitationem qui obcaecati, quos molestias beatae?</p>
                            <div class="blogArticle-footer">
                                <!-- v1 -->
                                
                                <div class="blogArticle-footer-infos row no-gutters flex-no-wrap">
                                    <p class="col-lg-6 align-self-baseline mb-0">
                                        <span class="abrev">par</span>
                                        <span class="pseudo-valid">Pseudo</span>
                                    </p>
                                    <p class="col-lg-6 align-self-baseline text-lg-right">
                                        <span class="abrev">date</span>
                                        <span class="date">xx/xx/xxxx</span>
                                        <span class="hour">..h..</span>
                                    </p>
                                </div>

                                <div class="blogArticle-footer-keywords row no-gutters">
                                    <a href="#" class="keyword">moto</a>
                                    <a href="#" class="keyword">vitesse</a>
                                    <a href="#" class="keyword">design</a>
                                    <a href="#" class="keyword">carrenage</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </section>

    </main>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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
<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Blog DCCG - home";
    
    include($pathToRootFolder."debug_functions.php");
    //////////////////// START WIP DENIS POO->ROUTER
    //require_once($pathToRootFolder.'next_src_wip_denis/Controllers/Router.php');

    // $router = new router();
    // $router->routerReq();
    
    //////////////////// END WIP DENIS POO->ROUTER


    $_SESSION["varsessiontest"] = "Session home active OK";
    if (isset($_SESSION['sessionid'])){
        $varsessionid = $_SESSION['sessionid'];
        $cookieActual = $_COOKIE["PHPSESSID"];
        $ipUser = $_SERVER['REMOTE_ADDR'];
        // $ipUser1 = $_SERVER['HTTP_CLIENT_IP'];
        // $ipUser2 = $_SERVER['HTTP_X_FORWARDED_FOR'];
        //echo "</br> Address IP :".$ipUser;
        // echo $_SERVER['HTTP_CLIENT_IP'];
        // echo $_SERVER['HTTP_X_FORWARDED_FOR'];
        function getIPAddress() {  
            //whether ip is from the share internet  
             if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                        $ip = $_SERVER['HTTP_CLIENT_IP'];  
                }  
            //whether ip is from the proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
             }  
        //whether ip is from the remote address  
            else{  
                     $ip = $_SERVER['REMOTE_ADDR'];  
             }  
             return $ip;  
        }  
        $ip = getIPAddress();  
        
        $connectedUserFromDB['pseudo'] = $_SESSION['pseudo'];
        setcookie('pseudo1', $connectedUserFromDB['pseudo'], time() +3600, null, null, false, true);
        setcookie('pseudo2', "Denis", time() +3600, null, null, false, true);
        // if(isset($_COOKIE["pseudo1"])){
        // }elseif(isset($_COOKIE["pseudo2"])){
        //     //echo "</br>".$_COOKIE["pseudo2"]."</br>";
        // }else{
        //     echo "</br>Cookie pseudo non accepté";
        // }
    }

   
    
    //Cookie de test pour le theme
    @$theme=$_GET["theme"];
    // if($theme=="clair" || $theme=="sombre"){
    //     setcookie("theme",$theme,time()+3600);
    //     header("location: home.php");
    // }
    // print_r($_COOKIE);
    // showInConsole($_COOKIE);

    //$styleTheme=(empty(@$_COOKIE["theme"]))?("clair"):(@$_COOKIE["theme"]);

    require_once($pathToRootFolder.'vendor/autoload.php');

    require_once($pathToRootFolder.'config/connect.php');

    require_once($pathToRootFolder.'next_src_wip_denis/Models/Model.php');


    require_once($pathToRootFolder.'config/functions.php');

    require_once($pathToRootFolder.'next_src_wip_denis/Models/Article.php');

    require_once($pathToRootFolder.'config/functions/function_file.php');

    require_once($pathToRootFolder."views/common/checkSessionUser.php");
    
    $model = new Article();

    $articles = $model->getLastArticles();
    $categories = getCategories();
    $images = getImages();
    
    //showInConsole($articles); // debug

?>

<!DOCTYPE html>
<html lang="fr">

    <?php include($pathToRootFolder."views/common/head.php");?>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->

    <?php include($pathToRootFolder."views/common/header.php"); ?>

    <!-- ======== CARROUSEL ========= -->
    <div id="carouselOnHomepage" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselOnHomepage" data-slide-to="0" class="active"></li>
            <li data-target="#carouselOnHomepage" data-slide-to="1"></li>
            <li data-target="#carouselOnHomepage" data-slide-to="2"></li>
            <li data-target="#carouselOnHomepage" data-slide-to="3"></li>
            <li data-target="#carouselOnHomepage" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="https://www.imore.com/sites/imore.com/files/styles/xlarge/public/field/image/2018/12/barley-field-wallpaper-hero.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/collection/190727/1600x900">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/random" class="d-block w-100" alt="...">

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
        <?php 
            // define a $alertMessage="..message.." if necessary
            include($pathToRootFolder."views/common/alertMessageIfExist.php");
        ?>
        <section class="section">
            <div class="section-head">
                <h2 class="section-head-title">Bienvenue 
                    <?php if(isset($_COOKIE['pseudo1'])){
                        echo $_COOKIE['pseudo1'];
                        }else{
                            echo " chez nous!";
                        } 
                    ?>
                </h2>
                <!-- <h4><?php #echo $_SESSION["varsessiontest"]; ?></h4> -->
                <h4><?php if(isset($errorMessage)){
                    echo $errorMessage;
                }
                 ?></h4>
                <!-- START Affiche l'heure  -->
                <?php echo date('d/m/Y'); ?>
                
                <!-- END Affiche l'heure  -->
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
            <php $nbr = 1; ?>
            
            <?php foreach($articles as $article): ?>
                 
                <div class="section-content">
                    <div class="blogArticle--large row no-gutters">
                        <a class="blogArticle-imglink col-lg-5" href="article_read.php?id=<?= $article->id ?>">
                            <!-- <img class="blogArticle-imglink-img" src="https://via.placeholder.com/500x300" alt="image here"> -->
                            <?php foreach($images as $image): ?>
                                <?php if($article->id == $image->article_id){ ?>
                                   <img class="blogArticle-imglink-img" src="../../assets/uploadPersonal/<?php echo $image->name; ?>" alt="image article">
                                <?php } ?>
                                 <!--   <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random" alt="image here"><a href="#"></a>
                                <img class="blogArticle-imglink-img" src="http://jwilson.coe.uga.edu/emt668/EMAT6680.2002/Nooney/EMAT6600-ProblemSolving/MagicSquares(4x4)/image01.gif" alt="image here"> -->
                            <?php endforeach; ?>
            
                        </a>
                        <div class="blogArticle-content offset-lg-1 col-lg-6">
                            <h2 class="blogArticle-title">
                                <a href="article_read.php?id=<?= $article->id ?>" class="">
                                    <?= $article->title; ?>
                                </a>
                            </h2>
                            <p class="blogArticle-text"><?= nl2br(substr($article->content, 0, 250))."..."; ?></p>
                            <div class="blogArticle-footer">
                                <!-- v1 -->
                                
                                <div class="blogArticle-footer-infos row no-gutters flex-no-wrap">
                                    <p class="col-lg-6 align-self-baseline mb-0">
                                        <span class="abrev">par</span>
                                        <span class="pseudo"><?php if(isset($article->author)){echo $article->author;}else{echo "Pseudo";} ?></span>
                                    </p>
                                    <p class="col-lg-6 align-self-baseline text-lg-right">
                                        <span class="abrev">date</span>
                                        <span class="date"><?= $article->date; ?></span>
                                        <!--<span class="hour">..h..</span>-->
                                    </p>
                                </div>

                                <?php #if (isset($categorie)){ ?>
                                    <div class="blogArticle-footer-keywords row no-gutters">
                                        <?php if (isset($article->categories_id)){ ?>
                                            <?php $cat = $article->id; ?>
                                            <?php $id = $article->id; ?>

   
                                            
                                            <?php  $categorie = getCategorie($id);
                                            $getHashtags = getHashtags($id);
                                            #if (isset($categorie)){ ?>


                                            <?php foreach ($categorie as $cat) : ?>
                                            Rubrique : <?= $cat->name; ?><br>
                                            <?php endforeach; ?>

                                            <?php foreach ($getHashtags as $hashtags) : ?>

                                            <a href="#" class="keyword"><?=  $hashtags->name; ?></a>
                                        
                                        <?php endforeach; ?>

                                    </div>

                                        <?php }else{?>

                                    <div class="blogArticle-footer-keywords row no-gutters">
                                        <a href="#" class="keyword">moto</a>
                                        <a href="#" class="keyword">vitesse</a>
                                        <a href="#" class="keyword">design</a>
                                        <a href="#" class="keyword">carrenage</a>
                                    </div>
                                        <?php    #}  ?>
                                        <?php    }  ?>

                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
        <section class="section">
            <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                <div class="blogArticle--large row no-gutters">
                    <a href="article_all.php" class="abrev">Voir tous les articles</a>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                <h2 class="section-head-title font-weight-bolder">Services</h2>
                
                
            </div>
        </section>
        <div class="blogArticle--large row no-gutters">
                    <a class="blogArticle-imglink col-lg-5" href="">
                        <!-- <img class="blogArticle-imglink-img" src="../../assets/uploadPersonal/<?php echo $image->name; ?>" alt="image article"> -->
                        <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random" alt="image here"><a href="#"></a>
                        <!-- <img class="blogArticle-imglink-img" src="http://jwilson.coe.uga.edu/emt668/EMAT6680.2002/Nooney/EMAT6600-ProblemSolving/MagicSquares(4x4)/image01.gif" alt="image here"> -->
                    </a>
                </div>
        <section class="section">
            <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                <h2 class="section-head-title font-weight-bolder">Nos Vidéos Youtube</h2>
                
        </section>
<!-- 
<div id="carouselOnHomepage" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselOnHomepage" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselOnHomepage" data-slide-to="1"></li>
                        <li data-target="#carouselOnHomepage" data-slide-to="2"></li>
                        <li data-target="#carouselOnHomepage" data-slide-to="3"></li>
                        <li data-target="#carouselOnHomepage" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container mt-3">
                                <h2>Card Image</h2>
                                <p>Image at the top (card-img-top):</p>
                                <div class="card" style="width:400px">
                                    <img class="card-img-top" src="https://img-4.linternaute.com/UcR-LNbBvF-FMfqevLX9pV0no8o=/1240x/smart/56b88043c63e497c99930c4b296eaa5c/ccmcms-linternaute/10501254.jpg" alt="Card image" style="width:100%">
                                    <div class="card-body">
                                    <h4 class="card-title">John Doe</h4>
                                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                                    <a href="#" class="btn btn-primary">See Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container mt-3">
                                <h2>Card Image</h2>
                                <p>Image at the top (card-img-top):</p>
                                <div class="card" style="width:400px">
                                    <img class="card-img-top" src="https://img-4.linternaute.com/UcR-LNbBvF-FMfqevLX9pV0no8o=/1240x/smart/56b88043c63e497c99930c4b296eaa5c/ccmcms-linternaute/10501254.jpg" alt="Card image" style="width:100%">
                                    <div class="card-body">
                                    <h4 class="card-title">John Doe</h4>
                                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                                    <a href="#" class="btn btn-primary">See Profile</a>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                        <div class="carousel-item">
                            <div class="container mt-3">
                                <h2>Card Image</h2>
                                <p>Image at the top (card-img-top):</p>
                                <div class="card" style="width:400px">
                                    <img class="card-img-top" src="https://img-4.linternaute.com/UcR-LNbBvF-FMfqevLX9pV0no8o=/1240x/smart/56b88043c63e497c99930c4b296eaa5c/ccmcms-linternaute/10501254.jpg" alt="Card image" style="width:100%">
                                    <div class="card-body">
                                    <h4 class="card-title">John Doe</h4>
                                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                                    <a href="#" class="btn btn-primary">See Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container mt-3">
                                <h2>Card Image</h2>
                                <p>Image at the top (card-img-top):</p>
                                <div class="card" style="width:400px">
                                    <img class="card-img-top" src="https://img-4.linternaute.com/UcR-LNbBvF-FMfqevLX9pV0no8o=/1240x/smart/56b88043c63e497c99930c4b296eaa5c/ccmcms-linternaute/10501254.jpg" alt="Card image" style="width:100%">
                                    <div class="card-body">
                                    <h4 class="card-title">John Doe</h4>
                                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                                    <a href="#" class="btn btn-primary">See Profile</a>
                                    </div>
                                </div>
                            </div>
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
                <div class="blogArticle--large row no-gutters">
                    <a href="#" class="abrev">Voir toutes les vidéos</a>
                </div>
            </div>
            <div class="container mt-3">
                <h2>Card Image</h2>
                <p>Image at the top (card-img-top):</p>
                <div class="card" style="width:400px">
                    <img class="card-img-top" src="https://img-4.linternaute.com/UcR-LNbBvF-FMfqevLX9pV0no8o=/1240x/smart/56b88043c63e497c99930c4b296eaa5c/ccmcms-linternaute/10501254.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <h2>Card Image</h2>
                <p>Image at the top (card-img-top):</p>
                <div class="card" style="width:400px">
                  
                    <img class="card-img-top" src="https://img-4.linternaute.com/UcR-LNbBvF-FMfqevLX9pV0no8o=/1240x/smart/56b88043c63e497c99930c4b296eaa5c/ccmcms-linternaute/10501254.jpg" alt="Card image" style="width:100%">

                    <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <img src="https://youtu.be/dhsNcKeOZNA" class="rounded" alt="Cinque Terre1" width="304" height="236"> 

                <img src="cinqueterre.jpg" class="circle" alt="Cinque Terre2" width="304" height="236"> 
                <img src="cinqueterre.jpg" class="rounded" alt="Cinque Terre3" width="304" height="236"> 
            </div>-->
            <iframe width="320" height="240" controls src="https://youtu.be/dhsNcKeOZNA" type="video/mp4">
            </iframe> 

        <section class="section">
            <div class="section-head d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                <h2 class="section-head-title font-weight-bolder">Meet-up</h2>
                <div class="blogArticle--large row no-gutters">
                    <a href="#" class="abrev">Voir le planning</a>
                </div>
            </div>
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
    <?php include($pathToRootFolder."views/common/footer.php");?>
    <?php include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
</body>

</html>
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
            <main class="order-1 order-md-0 col-md-9 col-xl-10">
                <section class="section">
                    <div class="section-head mt-5">
                        <h2 class="section-head-title">Articles populaires</h2>
                    </div>

                    <div class="container section-content">
                        <div class="row">
                            <?php for($i=0; $i<6;$i++):?>
                                <!-- <div class="col-6 show-red"> -->
                                <!-- </div> -->

                                <div class="blogArticle--medium row   col-lg-6 col-xl-4 px-5 my-5">
                                    <a class="blogArticle-imglink" href="#">
                                        <!-- <img class="blogArticle-imglink-img" src="https://via.placeholder.com/500x300" alt="image here"> -->
                                        <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random" alt="image here">
                                        <!-- <img class="blogArticle-imglink-img" src="http://jwilson.coe.uga.edu/emt668/EMAT6680.2002/Nooney/EMAT6600-ProblemSolving/MagicSquares(4x4)/image01.gif" alt="image here"> -->
                        
                                    </a>
                                    <div class="blogArticle-content">
                                        <h2 class="blogArticle-title">Lorem ipsum dolor sit amet</h2>
                                        <p class="blogArticle-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos rem eum fuga voluptatibus velit excepturi aliquid quia minima dolor cum? Dolorem repellat, dicta rerum doloremque non omnis?</p>
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
                            <?php endfor; ?>

                        </div>
                    </div>




                </section>


                article==========   article==========   article========== 
            </main>
            <aside class="order-0 order-md-1 col-md-3 col-xl-2 bg-secondaireLighter2 articleFilter px-0">
                <form method="get" action="">
                    <div class="form-group">
                        <label for="filter_categorie_id" class="h3 d-block bg-secondaireDarker2 text-white mt-5 pl-2">Categorie</label>
                        <select name="filter_categorie" id="filter_categorie_id" class="form-control">
                            <!-- <optgroup label=""> -->

                                <!-- array temporaire: -->
                                <?php $fakeCategories = ['aaaa','bbbb','cccc'];?>

                                <?php for($i=0; $i<count($fakeCategories); $i++): ?>
                                    <option value="<?=$fakeCategories[$i]?>"><?=$fakeCategories[$i]?></option>
                                <?php endfor; ?>
                            <!-- </optgroup> -->
                        </select>

                        <label for="filter_author_id" class="h3 d-block bg-secondaireDarker2 text-white mt-3 mb-1 pl-2">Auteur</label>
                        <input type="text" id="filter_author_id" name="filter_author" class="form-control rounded-pill">


                        <label for="filter_topic_id" class="h3 d-block bg-secondaireDarker2 text-white mt-3 mb-1 pl-2">Sujet ou Hashtag</label>
                        <input type="text" id="filter_topic_id" name="filter_topic" class="form-control rounded-pill">




                        <!-- <input type="submit" value="Filter" name="" id=""> -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-light mt-4 mb-4">Filter</button>
                        </div>
                    </div>
                </form>
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
<?php $PAGE_TITLE = "Blog DCCG - home"; ?>

<?php ob_start(); ?>

    <!-- ======== PARAGRAPHE BIENVENUE ========= -->
    
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
        <?php $articles->closeCursor(); ?>
<?php $content = ob_get_clean(); ?>

<?php require('views/pages/home.php'); ?>

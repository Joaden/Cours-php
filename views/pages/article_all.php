<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - All Articles";

    $_SESSION["varsessionAllArticlestest"] = "Session AllArticles active OK";

    //Appel de function avec la connexion à la bdd    

    //require_once($pathToRootFolder.'vendor/autoload.php');

    require_once($pathToRootFolder.'config/connect.php');

    require_once($pathToRootFolder.'config/functions.php');
    
    require_once($pathToRootFolder.'next_src_wip_denis/Models/Article.php');


    require_once($pathToRootFolder.'config/functions/function_file.php');

    $model = new Article();

    // Get all articles
    $articles = $model->getArticles();
    $images = getImages();
    $categories = getCategories();

    ////////// START afficher le nombre de vue

    //$monfichier = fopen('compteur.txt', 'a+');
    $monfichier = fopen('compteur_view_article_all.txt', 'r+');
 
    $pages_vues = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
    $pages_vues += 1; // On augmente de 1 ce nombre de pages vues
    fseek($monfichier, 0); // On remet le curseur au début du fichier
    fputs($monfichier, $pages_vues); // On écrit le nouveau nombre de pages vues
    
    fclose($monfichier);
    
    // echo '<p>Cette page a été vue ' . $pages_vues . ' fois !</p>';
    ////////// END

    //showInConsole($articles); // debug
    // do search by author
    if(isset($_GET['filter_author']) AND !empty($_GET['filter_author'])) {
        $search = htmlspecialchars($_GET['filter_author']);
        $articlesS = $bdd->query('SELECT * FROM articles WHERE author LIKE "%'.$search.'%" ORDER BY id DESC');
        //$articlesS->execute();
        //$dataSearch = $articlesS->fetchAll(PDO::FETCH_OBJ);
        //$articlesSearch = $articlesS->fetch();
        //$allUsers->closeCursor();

    }


    // retrieves the user's ID if he is logged in
    // if(isset($_GET['id']) AND $_GET['id'] > 0)
    require($pathToRootFolder."views/common/checkSessionUser.php");
    
?>

<!DOCTYPE html>
<html lang="fr">
    <?php include($pathToRootFolder."views/common/head.php");?>
<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->

   <?php include($pathToRootFolder."views/common/header.php"); ?>

    <!-- ================ DEBUT LOOP ARTICLES  ================ -->
    <div class="container-fluid">
        <?php 
            // define a $alertMessage="..message.." if necessary
            include($pathToRootFolder."views/common/alertMessageIfExist.php");
        ?>
        <div class="row">
            <main class="order-1 order-md-0 col-md-9 col-xl-10">
                <section class="section">


                    <div class="section-head mt-5">
                        <h2 class="section-head-title"><?php  
                                $counterNbr = 0;
                                if(isset($articles)){
                                    foreach($articles as $article){
                                    // if($counterNbr >= 0) {
                                        $counterNbr = $counterNbr + 1;
                                        
                                    // }
                                }
                                echo $counterNbr;
                                }else {
                                    echo "Aucun article trouvé";
                                }
                                
                                ?>
                                Articles populaires</h2>
                        <h3>
                        <?php #echo $_SESSION["varsessionAllArticlestest"]; ?>
                    </h3>
                    <span>
                        <?php echo'<p>Cette page a été vue ' . $pages_vues . ' fois !</p>'; ?>
                    </span>
                    </div>

                    <div class="container section-content">
                        <div class="row">

                            <?php 
                            if(isset($articlesS)){
                                if($articlesS->rowCount() > 0){
                                    //echo "Author : ".$articlesS->author."</br>";
                                    echo "affichage de la search bar";
                                    //echo $articlesS['author']."</br>";

                                    // 1er exmeple affichage
                                    while($articlesSearch = $articlesS->fetch()){ ?>
                                    <!-- // 2eme ex -->
                                    <!-- <?php #foreach($articlesSearchs as $articlesSearch): ?> -->
                                        
                                            <div class="blogArticle--medium row   col-lg-6 col-xl-4 px-5 my-5">
                                                
                                                <div class="blogArticle-content">
                                                    <h2 class="blogArticle-title">
                                                        <a href="article_read.php?id=<?= $articlesSearch['id'] ?>">
                                                            <?= $articlesSearch['title']; ?>
                                                        </a>
                                                    </h2>
                                                    
                                                    <div class="blogArticle-footer">
                                                        <!-- v1 -->
                                                        
                                                        <div class="blogArticle-footer-infos row no-gutters flex-no-wrap">
                                                            
                                                            <p class="col-lg-6 align-self-baseline text-lg-right">
                                                                <span class="abrev">date</span>
                                                                <span class="date"><?= $articlesSearch['date']; ?></span>
                                                                <span class="hour"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php #endforeach; ?>
                                        <p>
                                            <?= $articlesSearch['author']; ?>
                                        </p>
                                        <?php
                                       // var_dump($articlesS);
                                        //die();

                                        //echo $articlesS->title."</br>";
                                        //echo "Author : ".$articlesS->author;
                                        //die();
                                    }

                                }else{
                                    echo "Aucun author trouvé";
                                    
                                }
                            }else{
                                // echo "Vous pouvez rentrer un nom d'auteur dans la barre de recherche";
                                } 
                                
                            ?>


                            <?php foreach($articles as $article): ?>
                                
                                <div class="blogArticle--medium row   col-lg-6 col-xl-4 px-5 my-5">
                                    <a class="blogArticle-imglink" href="article_read.php?id=<?= $article->id ?>">
                                        <?php foreach($images as $image): ?>
                                            <?php if($article->id == $image->article_id){ ?>
                                            <img class="blogArticle-imglink-img" src="../../assets/uploadPersonal/<?php echo $image->name; ?>" alt="image article">
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <!-- <img class="blogArticle-imglink-img" src="https://via.placeholder.com/500x300" alt="image here"> 
                                        <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random" alt="image here"><a href="article_read.php?id=<?= $article->id ?>"></a>
                                         <img class="blogArticle-imglink-img" src="http://jwilson.coe.uga.edu/emt668/EMAT6680.2002/Nooney/EMAT6600-ProblemSolving/MagicSquares(4x4)/image01.gif" alt="image here"> -->
                        
                                    </a>
                                    <div class="blogArticle-content">
                                        <h2 class="blogArticle-title">
                                            <a href="article_read.php?id=<?= $article->id ?>">
                                                <?= $article->title; ?>
                                            </a>
                                        </h2>
                                        <p class="blogArticle-text"><?= substr($article->content, 0, 250)."..."; ?></p>
                                        <?php if (isset($article->categories_id)){ 
                                                    $id = $article->id;
                                                    $categorie = getCategorie($id);
                                                ?>
                                                    <p class="col-lg-3 align-self-baseline text-lg-right">
                                                        <span class="abrev">
                                                            <?php foreach ($categorie as $cat) : ?>
                                                                <?= $cat->name; ?>
                                                            <?php endforeach; ?>
                                                        </span>
                                                    </p>
                                                <?php    }  ?>
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
                                                    <span class="hour"></span>
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
                            <?php endforeach; ?>
                        
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
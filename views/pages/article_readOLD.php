<?php
session_start();

$pathToRootFolder = "../../";
$PAGE_TITLE = "Article";

if (!isset($_GET['id']) or !is_numeric($_GET['id']))
    header('location: home.php');
    else {
        extract($_GET);
    
        $id = strip_tags($id);
    
        require_once($pathToRootFolder.'config/connect.php');
        require_once($pathToRootFolder.'config/functions.php');
        require($pathToRootFolder."views/common/checkSessionUser.php");

        if (!empty($_POST)) {
            extract($_POST);
            $errors = array();
    
            $author = strip_tags($author);
            $comment = strip_tags($comment);
    
            if (empty($author))
                array_push($errors, 'Entrez un pseudo !');
    
            if (empty($comment))
                array_push($errors, 'Entrez un commentaire !');
    
            if (count($errors) == 0) {
                // comment utilise la function addComment
                $comment = addComment($id, $author, $comment);
    
                // message retourné pas d'erreur
                $success = '<div class="alert alert-success">Votre commentaire a bien été envoyé</div>';
    
                // Vider le champs du form !
                unset($author);
                unset($comment);
            }
        }
    
        $article = getArticle($id);
        $comments = getComments($id);
    }

?>



<!DOCTYPE html>
<html lang="fr">

    <?php include($pathToRootFolder."views/common/head.php");?>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->

    <?php include($pathToRootFolder."views/common/header.php"); ?>

        <?php 
            // define a $alertMessage="..message.." if necessary
            include($pathToRootFolder."views/common/alertMessageIfExist.php");
        ?>
        <div class="row">
            <main class="order-1 order-md-0 col-md-9 col-xl-10">
                <section class="section">
                    <?php if(isset($alerte)): ?>
                        <p class="alerte"><?php echo $alerte; ?></p>
                    <?php endif; ?>
                    <div class="section-head mt-5">
                        <h2 class="section-head-title"><?= $article->title; ?></h2>
                    </div>
                    <div class="blogArticle--medium row   col-lg-6 col-xl-4 px-5 my-5">
                        <a class="blogArticle-imglink" href="article_read.php?id=<?= $article->id ?>">
                            <!-- <img class="blogArticle-imglink-img" src="https://via.placeholder.com/500x300" alt="image here"> -->
                            <img class="blogArticle-imglink-img" src="assets/upload/tatsumaru.jpg" alt="image here">
                            <!-- <img class="blogArticle-imglink-img" src="http://jwilson.coe.uga.edu/emt668/EMAT6680.2002/Nooney/EMAT6600-ProblemSolving/MagicSquares(4x4)/image01.gif" alt="image here"> -->
            
                        </a>
                        <div class="blogArticle-content">
                            <h2 class="blogArticle-title"><?= $article->title; ?></h2>
                            <p class="blogArticle-text">
                                <?= 
                                    $article->content; 
                                ?>
                            </p>
                            <div class="blogArticle-footer">
                                <!-- v1 -->
                                
                                <div class="blogArticle-footer-infos row no-gutters flex-no-wrap">
                                    <p class="col-lg-6 align-self-baseline mb-0">
                                        <span class="abrev">par</span>
                                        <span class="pseudo">Pseudo</span>
                                    </p>
                                    <p class="col-lg-6 align-self-baseline text-lg-right">
                                        <span class="abrev">date</span>
                                        <span class="date"><?= $article->date; ?></span>
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
                </section>
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
    <?php include($pathToRootFolder."views/common/footer.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
</body>

</html>
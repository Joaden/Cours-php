<?php
session_start();
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Article Write";

    $_SESSION["varsessionarticleWritetest"] = "Session article write active OK";
    
    if (isset($_SESSION['id'])){

    // if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
        $varsessionid = $_SESSION['id'];
        //$author = $userInfo['pseudo'] ;

        require_once($pathToRootFolder.'config/connect.php');

        require_once($pathToRootFolder.'config/functions.php');

        // retrieves the user's ID if he is logged in
        // if(isset($_GET['id']) AND $_GET['id'] > 0)
        require($pathToRootFolder."views/common/checkSessionUser.php");
    }
    else {
        header("Location: home.php");
    }
?>



<!DOCTYPE html>
<html lang="fr">

    <?php include($pathToRootFolder."views/common/head.php");?>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->

    <?php include($pathToRootFolder."views/common/header.php"); ?>

    
    <div class="container-fluid">
        <div class="row">
            <main class="order-1 order-md-0 col-md-9 col-xl-10">
                <!-- <section class="section m-md-5 border-bottom border-dark pb-5">
                    <div class="blogArticle--large">
                        <div class="blogArticle-content">
                            <div class="row no-gutters align-items-center">
                                <h2 class="blogArticle-title col-md-10 mb-4"></h2>
                                <img class="avatar-img col-md-2" src="https://source.unsplash.com/Y7C7F26fzZM/300x300" alt="photo de l'auteur">
                            </div>

                            <a class="blogArticle-imglink" href="#">
                                <img class="blogArticle-imglink-img" src="https://source.unsplash.com/random" alt="image here">
                            </a>
                            
                        </div>
                    </div>
                    
                </section> -->
                <h4><?php echo $_SESSION["varsessionarticleWritetest"]; ?></h4>
                
                <section class="section m-md-5">
                <!-- ############ START FORM CREATE ARTICLE ############## -->
                    <form action="" class="mb-5">
                        <div class="form-group">
                            <label for="writeArticle_id">
                                <h4>Poster un article</h4> 
                            </label>
                            <div class="container">
                                <h2>Create Article</h2>
                                <form action="/action_page.php" method="POST">
                                    <input type="text" name="author" id="author" value="$author" class="form-control" disabled>
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="title" class="form-control" id="title" placeholder="Title de l'article" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Contenu:</label>
                                        <input type="content" class="form-control" id="content" placeholder="Contenu de l'article" name="content">
                                    </div>
                                    <div class="form-group">
                                        <!-- <div class="form-group"> -->
                                            <label for="image">Photo de votre article</label>
                                            <input name="image" type="file" class="form-control">
                                        <!-- </div> -->
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember"> Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-success" name="submit_article">Poster</button>
                                </form>
                            </div>
                        </div>
                    </form>
                </section>
            </main>
            <!-- ############ END FORM CREATE ARTICLE ############## -->

            <?php
                                if (isset($success))

                                    echo $success;

                                if (!empty($errors)) : ?>

                                    <?php foreach ($errors as $error) : ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class=" alert alert-danger">
                                                    <?= $error ?>
                                                </div>
                                            </div>
                                        </div>
                                        <p></p>
                                    <?php endforeach; ?>

                            <?php endif; ?>

            <!-- ############ ASIDE ############## -->
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
    <?php # include($pathToRootFolder."views/common/footer.php");?>
    <?php include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
</body>

</html>
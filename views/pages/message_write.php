<?php
session_start();
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Message Write";

    $_SESSION["varsessionMessageWritetest"] = "Session Message write active OK";
    
    $mode_edition = 0;
////////////////////////////////////////////////////
////////////////////////////////////////////////////
    // if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
    //     $varsessionid = $_SESSION['id'];
    //     $author = $userInfo['pseudo'] ;
    //     //var_dump($author);
    //     echo $author."ligne 15";

    //     die();
    //     }
////////////////////////////////////////////////////
////////////////////////////////////////////////////


    if (isset($_SESSION['id'])){

        

    // if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
        $varsessionid = $_SESSION['id'];
        //$author = $userInfo['pseudo'] ;

        require_once($pathToRootFolder.'config/connect.php');

        require_once($pathToRootFolder.'config/functions.php');

        require_once($pathToRootFolder.'next_src_wip_denis/Models/Article.php');

        require($pathToRootFolder."views/common/checkSessionUser.php");
        // retrieves the user's ID if he is logged in
        // if(isset($_GET['id']) AND $_GET['id'] > 0)

        $categories = getCategories();
        // showInConsole($categories); // debug


        if(isset($_POST['title'], $_POST['content'], $_POST['image'])) {
            if(!empty($_POST['title']) AND !empty($_POST['content'])) {
                
                $title = htmlspecialchars($_POST['title']);
                $content = htmlspecialchars($_POST['content']);

                // if()

                $ins = createArticle($title, $content, $author, $image);

                $message = 'Votre article a bien été posté';
                // $ins = $bdd->prepare('INSERT INTO articles (title, content, date)')

            } else {
                $message = 'Veuillez remplir tous les champs';
            }
        }
    }
    else {
        header("Location: home.php");
    }

    
?>



<!DOCTYPE html>
<html lang="fr">

    <?php include($pathToRootFolder."views/common/head.php");?>

    <style>
        #antibot{
        display: none;
        visibility: hidden;

        }
    </style>
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
                <h4><?php echo $_SESSION["varsessionMessageWritetest"]; ?></h4>
                
                <section class="section m-md-5">
                <!-- ############ START FORM CREATE Message ############## -->
                    <form action="" class="mb-5">
                        <div class="form-group">
                            <label for="writeMessage_id">
                                <h4>Poster un Message</h4> 
                            </label>
                            <div class="container">
                                <h2>Create Message</h2>
                                <form action="" method="POST" >
                                    <input type="text" name="author" id="author" value="" class="form-control" disabled>
                                    <div class="form-group">
                                        <label for="title">Destinataire:</label>
                                        <input type="title" class="form-control" placeholder="Message" name="destinataire">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Contenu:</label>
                                        <textarea type="text" class="form-control" id="content" placeholder="Contenu de l'article" name="content"></textarea>
                                    </div>
                                    
                                    <div id="antibot" class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label for="antibot"></label>
                                        <input type="text"  name="antibot" placeholder="" value="">
                                    </div>
                                    <button type="submit" class="btn btn-success" name="submit_message">Poster</button>
                                </form>
                                <br>
                                <?php if(isset($erreur)) { echo $erreur; } ?>
                                <br>
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
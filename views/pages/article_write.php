<?php
session_start();
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Article Write";

    $_SESSION["varsessionarticleWritetest"] = "Session article write active OK";
    
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



        

        // if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
        $varsessionid = $_SESSION['id'];
        //$author = $userInfo['pseudo'] ;

        require_once($pathToRootFolder.'config/connect.php');

        require_once($pathToRootFolder.'config/functions.php');

        require($pathToRootFolder."views/common/checkSessionUser.php");
        // retrieves the user's ID if he is logged in
        // if(isset($_GET['id']) AND $_GET['id'] > 0)
        // if (isset($_SESSION['id'])and $userInfo['id'] == $_SESSION['id'])
        if (isset($_SESSION['id']))
        {
            $mode_edition = 1;
            $categories = getCategories();
            // showInConsole($categories); // debug

            if(isset($_POST['submit_article']))
            {
                $title = htmlspecialchars($_POST['title']);
                        $content = htmlspecialchars($_POST['content']);
                        $categorie_id[] = htmlspecialchars($_POST['categorie']);
                        
                        echo $title . "<br>";
                        echo $content . "<br>";
                        var_dump($categorie_id)  . "<br>";
                        die();
                if(isset($_POST['title'], $_POST['content'], $_FILES['image'], $_POST['categorie'])) {
                    if(!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_FILES['image']) AND !empty($_POST['categorie'])) {
                        
                        $title = htmlspecialchars($_POST['title']);
                        $content = htmlspecialchars($_POST['content']);
                        $categorie_id = htmlspecialchars($_POST['categorie']);
                        
                        echo $title . "<br>";
                        echo $content . "<br>";
                        echo $categorie_id . "<br>";
                        die();
                        // if()
                        

                        $ins = createArticle($categorie_id, $title, $content, $author, $image);

                        $message = 'Votre article a bien été posté';
                        header('Location: user_board.php');

                        // $ins = $bdd->prepare('INSERT INTO articles (title, content, date)')

                    } else {
                        $message = 'Tous les champs sont obligatoires';
                    }
                } else {
                    $message = 'Veuillez remplir les champs vide';
                }
            } 
        
        } else {
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
                <h4><?php 
                        echo $_SESSION["varsessionarticleWritetest"];   
                         echo "<br> ID user N° : ".$userInfo['id'],$userInfo['pseudo'];
                        
                    ?></h4>
   
                <h5>
                    <?php
                    if (isset($message)){
                    ?>
                        <div class="row">
                        <div class="col-md-6">
                            <div class=" alert alert-danger">
                                <?=  $message; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    else {
                        echo "Laissez votre imagination parler";
                    }
                    ?>
                </h5>
                <section class="section m-md-5">
                <!-- ############ START FORM CREATE ARTICLE ############## -->
                        <div class="form-group">
                            <label for="writeArticle_id">
                                <h4>Poster un article</h4> 
                            </label>
                            <div class="container">
                                <h2>Create Article</h2>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <!--<input type="text" name="author" id="author" value="<?php #if(isset($userInfo)) { echo $userInfo['name']; } ?>" class="form-control" disabled>-->
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="title" class="form-control" id="title" placeholder="Title de l'article" name="title" require>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Contenu:</label>
                                        <textarea type="text" class="form-control" id="content" placeholder="Contenu de l'article" name="content" require></textarea>
                                    </div>
                                    <div class="form-group">
                                        <!-- <div class="form-group"> -->
                                            <label for="image">Photo de votre article</label>
                                            <?php if($mode_edition == 1) { ?>
                                            <input name="image" type="file" class="form-control">
                                            <?php } ?>
                                        <!-- </div> -->
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputCat">Catégories</label>
                                        <select id="inputCat" class="form-control">
                                            <option selected>Choisir une catégorie</option>
                                            <?php foreach ($categories as $cat) : ?>
                                            <option name="<?php echo $cat->name ?>"><?php echo $cat->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                
                                    <button type="submit" class="btn btn-success" name="submit_article">Poster</button>
                                </form>
                                <br>
                                <?php if(isset($erreur)) { echo $erreur; } ?>
                                <br>
                            </div>
                        </div>
                   
                </section>
            </main>
            <!-- ############ END FORM CREATE ARTICLE ############## -->

            
            <?php
                   

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
            <?php unset($error); ?>
            <?php unset($message); ?>
            
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
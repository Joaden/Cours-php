<?php
session_start();
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Article Write";

    $_SESSION["varsessionarticleWritetest"] = "Session article write active OK";
    
    $mode_edition = 0;

        // if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
        $varsessionid = $_SESSION['id'];
        //$author = $userInfo['pseudo'] ;

        require_once($pathToRootFolder.'config/connect.php');

        require_once($pathToRootFolder.'config/functions.php');

        require_once($pathToRootFolder.'next_src_wip_denis/Models/Article.php');
        require_once($pathToRootFolder.'next_src_wip_denis/Models/User.php');
        require_once($pathToRootFolder.'next_src_wip_denis/Models/Comments.php');
        require_once($pathToRootFolder.'config/functions/utils.php');
    
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
                $categorie_id = htmlspecialchars($_POST['categorie']);
                $hastag = htmlspecialchars($_POST['hastag']);
                $user_id = $userInfo['id'];      
                    
                if(isset($_POST['title'], $_POST['content'], $_FILES['image'], $_POST['categorie'])) {
                    if(!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_FILES['image']['name']) AND !empty($_POST['categorie'])) {
                        
                        $title = htmlspecialchars($_POST['title']);
                        $content = htmlspecialchars($_POST['content']);
                        $categorie_id = htmlspecialchars($_POST['categorie']);
                        $hastag = htmlspecialchars($_POST['hastag']);
                        

                        // STR_REPLACE <br> pour permettre d'aaficher les retour a la ligne
                        $content = str_replace("<br>", "nl2br()", $content);

                        var_dump($title);
                        var_dump($content);

                        // traitement image de l'article
                        $taillemax = 2097152;
                        $extensionsValides = array('jpg', 'jpeg', 'png', 'gif');
                        if($_FILES['image']['size'] <= $taillemax)
                        {
                            //$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                            $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
                            if(in_array($extensionUpload, $extensionsValides))
                            {
                                $date = date("Ymdhis");
                                $chemin = "$pathToRootFolder/assets/uploadPersonal/".$_SESSION['id']."-article-".$date.".".$extensionUpload;
                                $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
                                if($resultat)
                                {
                                    $date = date("Ymdhis");
                                    $image = $_SESSION['id']."-article-".$date.".".$extensionUpload;

                                    $author = $userInfo['pseudo'];

                                    $modelCreateArticle = new Article();

                                    $ins = $modelCreateArticle->createArticle($user_id, $categorie_id, $title, $content, $author, $image, $hastag);

                                    ///////////////////// START LOGGER 
                                    include ($pathToRootFolder.'views/common/logs_articles.php');
                                    $successArticleCreate = TRUE;
                                    if($_SERVER['REQUEST_METHOD'] === "POST") {

                                        if($successArticleCreate === TRUE){

                                            $user_idLogs = $user_id;
                                            $titleLogs = $title;
                                            $authorLogs = $author;

                                            $log = "Article créé par :".$authorLogs." ID :".$user_idLogs." Titre : ".$titleLogs;
                                            logger($log);
                                            echo "Success create article";

                                        }
                                        
                                    }
                                    ///////////////////// END LOGGER 

                                    $message = 'Votre article a bien été posté';
                                    header('Location: user_board.php');

                                    // $ins = $bdd->prepare('INSERT INTO articles (title, content, date)')
                                } else {
                                    $erreur = "Erreur lors de l'importation de photo de profil.";
                                }
                            } else {
                                $message = 'Le types de fichiers sont jpg, jpeg, png, gif';
                            }
                        } else {
                            $message = 'La taille de l\'image est trop grande';
                        }                        
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
                
                <h4><?php 
                        //echo $_SESSION["varsessionarticleWritetest"];   
                        //echo "<br> ID user N° : ".$userInfo['id'],$userInfo['pseudo'];
                        
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
                                    <input type="text" name="author" id="author" value="<?php if(isset($userInfo)) { echo $userInfo['pseudo']; } ?>" class="form-control" disabled>
                                
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
                                        <select id="inputCat" class="form-control" name="categorie">
                                            <option selected>Choisir une catégorie</option>
                                            <?php foreach ($categories as $cat) : ?>
                                            <option value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTag">Hastags</label>
                                        <input type="hastag" class="form-control" id="hastag" placeholder="Ecrivez vos tags" name="hastag">
                                        
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
    <?php  include($pathToRootFolder."views/common/footer.php");?>
    <?php #include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
</body>

</html>
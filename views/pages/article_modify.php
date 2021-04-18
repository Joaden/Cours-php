<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - modify Articles";

    //Appel de function avec la connexion à la bdd
    // require_once($pathToRootFolder.'config/functions.php');
    // $articles = getArticles();


    require_once($pathToRootFolder.'config/connect.php');

    require_once($pathToRootFolder.'config/functions.php');

    require_once($pathToRootFolder.'config/functions/function_file.php');

    require($pathToRootFolder."views/common/checkSessionUser.php");
    
    if(isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
        $id = $_SESSION['id'];
        $id = $userInfo['id'];
        $articles = getArticles();
        $categories = getCategories();
        $images = getImages();

    ///////////////////  SI FORMULAIRE ENVOYE  /////////////////////////////
    if(isset($_POST['formupdateprofil']))
    {
        //vérification & upload image 
        $updateArticle = updateArticle($id);  
    }
    ///////////   Affichage article   //////////////    

    if($_GET) {
        $id = $_GET['id'];
        //var_dump($id);
        // requete pour récuperer la ligne correspondant à l'id transmis ds l'URL
        $req= "
        SELECT * FROM articles
        WHERE id = '$id'
        LIMIT 1
        ";
        // execution de la requete
        //$res = $conn -> query($req);
        // tableaux des données
        //$data = mysqli_fetch_array($res);
        //recuperation des donnees
        $getArticle = getArticle($id);
        //$id = $data['id'];
        //$titre_article = $data['titre_article'];
        //$photo_article = $data['photo_article'];
        //echo $photo_article;
        //$contenu_article = nl2br($data['contenu_article']);
    }

    ///////////Modification ////////////////
    $alerte= '';
    if($_POST) {
        var_dump($_POST);
        foreach ($_POST as $name => $value) {
            ${$name} = $value;
            $var_form = ${$name};
            if(empty($var_form)) {
                $alerte .= $name;
                $alerte .= '<br>';
            }
        } // fin foreach

        // Attention pas terminé
        // A finir
        if($_FILES) {
            $alerte .= uploadFile(DIR_UPLOAD, TAILLE_MAX_UPLOAD, LARGEUR_MAX_PHOTO);
        } else {

        }

        if(empty($alerte)) { 
            $alerte = "Article enregistré";
            if(isset($GLOBALS['nom_photo'])) {
                $photo_article = $GLOBALS['nom_photo'];
            }
            //var_dump($nom_photo);
            /////////////// Requete d'insertion///////////////////////
            $req = "
            UPDATE articles
            SET 
            titre_article = '$titre_article',
            photo_article = ' $photo_article',
            contenu_article = '$contenu_article'
            WHERE  id = '$id'        
            ";

            // A evaluer aussi
            $res = $conn -> query($req);
            if($res){
                $alerte = "Article modifié";
            } else {
                $alerte = "Problème";
            }



            //////////////////////////////////////////////////////////
        } // fin empty alerte
    } // fin POST



    ?>



<!DOCTYPE html>
<html lang="fr">
    <?php include($pathToRootFolder."views/common/head.php");?>
    <body>
         <!-- =================================================== -->
        <!-- ================ DEBUT HTML  ================ -->

        <?php include($pathToRootFolder."views/common/header.php"); ?>
        
        <div class="container-fluid mt-1 px-0 h-100">
            <div class="row no-gutters">

                <div class="col-md-3">
                    <?php include($pathToRootFolder."views/common/sidebar_user.php"); ?>
                </div>
    
                <div class="col-md-9">
                    <!-- <h1 class="h1 text-dominante text-center my-5 border-top border-dominante"><?php # echo $PAGE_TITLE ?></h1> -->
                    
                    <section class="text-center">
                        <h1 class="h1 text-dominante text-center mt-3 mb-5">Modify Article</h1>
                        <div class="container section-content">
                        <div class="row">
                            <?php if(isset($alerte) && $alerte!= ""): ?>
                                <p class="alerte">
                                    <?php echo $alerte; ?>
                                </p>
                            <?php endif; ?>

                            <h1>Modifier l'article</h1>

                            <?php if($_GET): ?>

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
                            <?php endif; ?>
                            <table>
                                <?php
                                
                                while($data = mysqli_fetch_array($res)): ?>
                                    <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['titre_article']; ?></td>
                                    <td><a href="modifier.php?id=<?php echo $data['id']; ?>">Modifier</a></td>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                            <?php foreach($myArticles as $article): ?>
                            <?php #for($i=0; $i<6;$i++):?>
                                <!-- <div class="col-6 show-red"> -->
                                <!-- </div> -->
                                <div class="blogArticle--medium row   col-lg-6 col-xl-4 px-5 my-5">
                                    <a class="blogArticle-imglink" href="article_modify.php?id=<?= $article->id ?>">
                                        <?php foreach($images as $image): ?>
                                            <?php if($article->id == $image->article_id){ ?>
                                            <img class="blogArticle-imglink-img" src="../../assets/uploadPersonal/<?php echo $image->name; ?>" alt="image article">
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </a>
                                    <div class="blogArticle-content">
                                        <h2 class="blogArticle-title">
                                            <a href="article_modify.php?id=<?= $article->id ?>">
                                                <?= $article->title; ?>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    </section>
                </div>
            </div>   
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>  
        <!-- FOOTER -->
        <?php 
            #include($pathToRootFolder."views/common/footer.php");
            include($pathToRootFolder."views/common/footer_dev_mode.php");
        ?>
        <!-- ================ FIN HTML  ================ -->
        <!-- =================================================== -->
        <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    </body>
</html>
<?php
} else {
    header('Location: session_login.php');
}
?>
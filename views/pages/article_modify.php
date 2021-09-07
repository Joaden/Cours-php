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

    
    ///////////   Affichage article   //////////////    

    if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
        // secure variable
        $edit_id = htmlspecialchars($_GET['edit']);
        //$id = htmlspecialchars($_GET['id']);
        //$id = strip_tags($id);

        // call requete
        $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ? ');
        $edit_article->execute(array($edit_id));
        
        
        if($edit_article->rowcount() == 1)
        {
            $edit_article = $edit_article->fetch();
            //$edit_titre = $edit_article['titre'];

        } else {
            die('Erreur : L\article n\existe pas!');
        }

        ///////////////////  SI FORMULAIRE ENVOYE  /////////////////////////////
        $mode_edition = 0;
        if(isset($_POST['submit_modify_article']))
        {
            if(isset($_POST['title']) AND $_POST['content']) 
            {
                if(!empty($_POST['title']) AND !empty($_POST['content'])) 
                {
                    $title = htmlspecialchars($_GET['title']);
                    $content = htmlspecialchars($_GET['content']);

                    if($mode_edition == 1)
                    {
                        $updateArticle = $bdd->prepare('UPDATE articles SET title = ?, content= ?, edition = NOW() WHERE id = ?' );
                        $updateArticle->execute(array($title, $content));
                        $message = 'Votre article a bien été modifié';
                    }
                }
            }
            //vérification & upload image 
            //$updateArticle = updateArticle($id);  
        }


        //$id = $_GET['id'];
        //var_dump($id);
        // requete pour récuperer la ligne correspondant à l'id transmis ds l'URL
        // $req= "
        // SELECT * FROM articles
        // WHERE id = '$id'
        // LIMIT 1
        // ";
        // execution de la requete
        //$res = $conn -> query($req);
        // tableaux des données
        //$data = mysqli_fetch_array($res);
        //recuperation des donnees
        
        //$getArticle = getArticle($id);
        
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
            // $req = "
            // UPDATE articles
            // SET 
            // titre_article = '$titre_article',
            // photo_article = ' $photo_article',
            // contenu_article = '$contenu_article'
            // WHERE  id = '$id'        
            // ";

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
                        <h1 class="h1 text-dominante text-center mt-3 mb-5">Modifier l'article</h1>
                        <div class="container section-content">
                        <div class="row">
                            <?php if(isset($alerte) && $alerte!= ""): ?>
                                <p class="alerte">
                                    <?php echo $alerte; ?>
                                </p>
                            <?php endif; ?>

                            <h1> Article </h1>

                            <?php #if($_GET): ?>

                                <form action="" method="POST" enctype="multipart/form-data">

                                    <!-- <input type="text" name="author" id="author" value="<?php #if(isset($userInfo)) { echo $userInfo['pseudo']; } ?>" class="form-control" disabled> -->
                                
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="title" name="title" class="form-control" id="title" placeholder="Title de l'article" <?php if($mode_edition == 1) {?>
                                            value="<?php echo $edit_article['title']; ?>"
                                        <?php } ?>  require>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Contenu:</label>
                                        <textarea type="text" name="content" class="form-control" id="content" placeholder="Contenu de l'article" value="<?php echo $edit_article['content']; ?>" require></textarea>
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
                                
                                    <button type="submit" class="btn btn-success" name="submit_modify_article">Valider la modification</button>
                                </form>

                            <?php #endif; ?>


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
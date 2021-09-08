<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - modify Articles";

    //Appel de function avec la connexion à la bdd

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
        $image = getImage($edit_id);
        $categorie = getCategorie($edit_id);

        // call requete
        $edit_article = $bdd->prepare('SELECT * FROM articles WHERE id = ? ');
        $edit_article->execute(array($edit_id));
        
        
        if($edit_article->rowcount() == 1)
        {
            $edit_article = $edit_article->fetch();

        } else {
            die('Erreur : L\article n\existe pas!');

        }
        
        ///////////////////  SI FORMULAIRE ENVOYE  /////////////////////////////
        $mode_edition = 1;
        if(isset($_POST['submit_modify_article']))
        {
            if(isset($_POST['title']) AND $_POST['content']) 
            {
                if(!empty($_POST['title']) AND !empty($_POST['content'])) 
                {
                    $title = htmlspecialchars($_POST['title']);
                    $content = htmlspecialchars($_POST['content']);

                    if($mode_edition == 1)
                    {
                        $updateArticle = $bdd->prepare('UPDATE articles SET title = ?, content= ?, edition = NOW() WHERE id = ?' );
                        $updateArticle->execute(array($title, $content, $edit_id));
                        $message = 'Votre article a bien été modifié';
                        header('Location: article_gestion.php');
                    }else{
                        echo "Une erreur s'est produite, la modification à échouée !";
                    }
                }
            }
             
        }

    }else{
        echo 'Aucun identifiant trouvé';
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

        if(empty($alerte)) { 
            $alerte = "Article enregistré";
            if(isset($GLOBALS['nom_photo'])) {
                $photo_article = $GLOBALS['nom_photo'];
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
                    <section class="text-center">
                        <h1 class="h1 text-dominante text-center mt-3 mb-5">Modifier l'article</h1>
                        <div class="container section-content">
                        <div class="row">
                            <?php if(isset($alerte) && $alerte!= ""): ?>
                                <p class="alerte">
                                    <?php echo $alerte; ?>
                                </p>
                            <?php endif; ?>

                            <h1>  </h1>

                            <?php #if($_GET): ?>

                                <form action="" method="POST">
                                
                                    <div class="form-group">
                                        <label for="title">Titre de mon article </label>
                                        <input type="title" name="title" class="form-control" id="title" placeholder="Title de l'article" <?php if($mode_edition == 1) {?>
                                            value="<?php echo $edit_article['title']; ?>"
                                        <?php } ?>  require>
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Contenu</label>
                                        <input type="text" name="content" class="form-control" id="content" <?php if($mode_edition == 1) { ?> value="<?php echo $edit_article['content']; ?>" 
                                        <?php } ?> require>
                                        </input>
                                    </div>

                                    <div class="form-group">
                                        
                                            <label for="image">Photo de l'article</label>
                                            
                                            <img class="blogArticle-imglink-img" src="../../assets/uploadPersonal/<?php echo $image->name; ?>" alt="image de l'article here" style="width:100%; height:auto">
                                            
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="inputCat">

                                            Catégorie choisie :
                                            <?php
                                                if($mode_edition == 1){
                                                    if (isset($categorie)){ ?>
                                                    <div class="blogArticle-footer-keywords row no-gutters">

                                                    <?php foreach ($categorie as $cat) : ?>
                                                        <em class="text-success"><?= $cat->name; ?></em>
                                                    <?php endforeach; 
                                                }
                                            
                                            }?>

                                        </label>
                                        <select id="inputCat" class="form-control" name="categorie">
                                            <option selected>Changer de catégorie</option>
                                            <?php foreach ($categories as $cat) : ?>
                                            <option  value="<?php echo $cat->id ?>"><?php echo $cat->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="inputTag">Hastags</label>
                                        <input type="hastag" class="form-control" id="hastag" placeholder="Ecrivez vos tags" name="hastag">
                                        
                                    </div> -->
                                
                                    <div class="form-group"></div>
                                    
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
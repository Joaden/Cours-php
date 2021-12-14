<?php 
session_start();

    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - modify Articles";

    //Appel de function avec la connexion à la bdd

    require_once($pathToRootFolder.'config/connect.php');

    require_once($pathToRootFolder.'config/functions.php');

    require_once($pathToRootFolder.'src_denis/Models/Article.php');

    require_once($pathToRootFolder.'config/functions/function_file.php');

    require($pathToRootFolder."views/common/checkSessionUser.php");
    
    // Vous pouvez decommenter les ECHO pour afficher les aides 
    if(isset($_SESSION['userid']) && $userInfo['id'] == $_SESSION['userid']) {
        //echo "</br>if isset user id = ".$_SESSION['userid'];

        if(isset($_SESSION['sessionid']) and $_SESSION['sessionid'] == session_id()){
        
            $userid = htmlspecialchars($_SESSION['userid']);
            $iduserInfo = htmlspecialchars($userInfo['id']);
            
            //echo "</br>if isset session id = ".$_SESSION['sessionid'];
            
            ///////////   Affichage article   //////////////    
            ///////////// START VERIFIER SI LARTICLE RECUPERER DANS LE GET APPARTIENT BIEN AU USER ET QUELA PAGE EST BIEN CELLE DE MON SITE
            if(isset($_GET['edit']) && !empty($_GET['edit']) && isset($_GET['user']) && !empty($_GET['user']) && isset($_SESSION['token']) && !empty($_SESSION['token'])) {
                // if(isset($_GET['user']) AND !empty($_GET['user'])){

                    $modificationAuthorized = 0;
                    // secure variable
                    $edit_id = strip_tags($_GET['edit']);
                    $getUser_id = strip_tags($_GET['user']);
                    $getToken = strip_tags($_SESSION['token']);
                    
                    $author = strip_tags($userInfo['pseudo']);
                    $edit_id = htmlspecialchars($edit_id);
                    // echo "</br>if isset get edit iD = ".$edit_id."</br>";
                    // echo "</br>if isset getUser_id  = ".$getUser_id."</br>";
                    // echo "</br>if isset getToken  = ".$getToken."</br>";
                    
                    $categories = getCategories();
                    $images = getImages();
                    $image = getImage($edit_id);
                    $categorie = getCategorie($edit_id);

                    //echo "</br>if isset get edit iD = ".$edit_id."</br>";
                    
                    // call requete
                    $edit_article = $pdo->prepare('SELECT * FROM articles WHERE id = :id ');

                    $edit_article->bindValue(':id', $edit_id, PDO::PARAM_INT);

                    $edit_article->execute();
                    
                    // $edit_article->execute(array($edit_id));
                    /////////////////////////////////////////
                    // Si user_id de l'article = id $_SESSION['userid']) && $userInfo['id'] et qu'il y a un get token
                    // je peux afficher l'article pour le modifier
                     
                    $edit_article = $edit_article->fetch();
                    //echo "</br></br>ID de l'Auteur de l'article = ".$edit_article['user_id'];
                    //echo "</br></br>ID du user actuel = ".$getUser_id;
                    // if(!isset($edit_article) && empty($edit_article)){
                    //     $errorMessage = "Erreur : L\'article n\'existe pas!";
                    //     die();
                    //     header('Location: home.php');
                    // }
                    if(isset($edit_article) && !empty($edit_article))
                    // if($edit_article->rowcount() == 1)
                    {    
                        //echo "</br>Fetch => Article exist";

                        if(isset($edit_article['user_id']) && $edit_article['user_id'] == $getUser_id ){
                            //echo "</br>Vous êtes bien l'auteur de cet article, vous pouvez le modifier";
                            // die();
                       
                        }else{
                            $errorMessage = "</br>Vous n'êtes pas l'auteur de cet article, vous ne pouvez pas le modifier";
                            echo $errorMessage;
                            ///////////////////// START LOGGER 
                            include ($pathToRootFolder.'views/common/logs_users.php');
                            $errorModifyArticle = TRUE;

                                if($errorModifyArticle === TRUE){

                                    $nameLogs = $edit_article['user_id'];
                                    $user_idLogs = $getUser_id;
                                    $author = $author;
                                    // $pseudoLogs = $pseudo;
                                    // $phraseLog = $phrase;

                                    $log = "Warning ID User & ID Article :".$nameLogs." ID :".$user_idLogs." Last author : ".$author." Error Tentative de modification non autorisée !!! ";
                                    logger($log);
                                    echo "Error Tentative de modification non autorisée !!!";

                                }
                                
                            
                            // die($errorMessage);
                            header('Location: session_logout.php');
                        
                        }
                    }else {
                        $errorMessage = "Erreur : L\article n\'existe pas! ";
                        echo $errorMessage;
                        ///////////////////// START LOGGER 
                        include ($pathToRootFolder.'views/common/logs_users.php');
                        $errorModifyArticle = TRUE;

                            if($errorModifyArticle === TRUE){

                                $nameLogs = $edit_article['user_id'];
                                $user_idLogs = $getUser_id;
                                $author = $author;
                                // $pseudoLogs = $pseudo;
                                // $phraseLog = $phrase;

                                $log = "Warning ID User & ID Article :".$nameLogs." ID :".$user_idLogs." Last author : ".$author." Message : ".$errorMessage." modification non autorisée !!! ";
                                logger($log);
                                echo "Error Tentative de modification non autorisée !!!";

                            }
                            
                        // die($errorMessage);
                        header('Location: article_gestion.php?errorMessage=oui');
                    }

                    ///////////// END Controle ID USER AND ARTICLE
                    if(isset($_GET['errorMessage']) && !empty($_GET['errorMessage']) && $_GET['errorMessage'] == "oui"){
                        $errorMessage = strip_tags($_GET['errorMessage']);
                        
                    }
                    ///////////////////  SI FORMULAIRE ENVOYE  /////////////////////////////
                    $mode_edition = 1;
                    if(isset($_POST['submit_modify_article']))
                    {
                        $mode_edition = 1;
                        echo "</br>Before if isset POST title iD = ".$edit_id."</br>";

                        if($mode_edition == 1)
                        {
                            if(isset($_POST['title']) AND !empty($_POST['title'])) 
                            {
                                $title = htmlspecialchars($_POST['title']);
                                $updateArticleTitle = $pdo->prepare('UPDATE articles SET title = ?, edition = NOW() WHERE id = ?' );
                                $updateArticleTitle->execute(array($title, $edit_id));

                                echo "</br>After UPDATE POST title </br>";

                                if(isset($_POST['content']) AND !empty($_POST['content'])) 
                                {
                                    $content = htmlspecialchars($_POST['content']);
                                    echo "</br>Before UPDATE POST content </br>";
                                    // if($mode_edition == 1)
                                    // {
                                        $updateArticleContent = $pdo->prepare('UPDATE articles SET content= ?, edition = NOW() WHERE id = ?' );
                                        $updateArticleContent->execute(array($content, $edit_id));
                                        $message = 'Votre article a bien été modifié';
                                        echo "</br>After UPDATE POST content </br>";
                                        //die();
                                        //header('Location: article_gestion.php');
                                    // }else{
                                    //     echo "Une erreur s'est produite, la modification à échouée !";
                                    // }
                                }
                                echo "</br>After UPDATE POST Content </br>";

                                if(isset($_POST['categorie']) AND !empty($_POST['categorie'])) 
                                {
                                    $categorieId = htmlspecialchars($_POST['categorie']);
                                    echo "</br>Before UPDATE POST Categorie </br>".$categorieId;
                                    //die();
                                    // if($mode_edition == 1)
                                    // {
                                        $updateArticleContent = $pdo->prepare('UPDATE articles SET categories_id= ?, edition = NOW() WHERE id = ?' );
                                        $updateArticleContent->execute(array($categorieId, $edit_id));
                                        $message = 'Votre article a bien été modifié';
                                        echo "</br>After UPDATE POST categorie </br>";

                                        ///////////////////// START LOGGER 
                                        include ($pathToRootFolder.'views/common/logs_articles.php');
                                        $successArticleModify = TRUE;
                                        if($_SERVER['REQUEST_METHOD'] === "POST") {

                                            if($successArticleModify === TRUE){

                                                $user_idLogs = $user_id;
                                                $titleLogs = $title;
                                                $authorLogs = $author;

                                                $log = "Article id :".$edit_id." Modifié par :".$authorLogs." ID :".$user_idLogs." Titre : ".$titleLogs;
                                                logger($log);
                                                echo "Success modify article";

                                            }
                                            
                                        }
                                        ///////////////////// END LOGGER 
                                        //die();
                                        $message = 'Votre article a bien été modifié ';
                                        header('Location: article_gestion.php');
                                    // }else{
                                    //     echo "Une erreur s'est produite, la modification à échouée !";
                                    // }
                                }
                                echo "</br>After UPDATE POST Categorie </br>";

                            }
                        }else{
                            echo "Une erreur s'est produite, la modification à échouée !";
                        }
                    }
                // }

            }else{
                $alerte = 'Aucun identifiant trouvé';
                header('Location: article_gestion.php');

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

                            <?php if(isset($_GET['errorMessage']) && !empty($_GET['errorMessage'])){
                                echo $errorMessage;
                            } ?>

                                <form action="" method="POST">
                                
                                    <div class="form-group">
                                        <label for="title">Titre de mon article </label>
                                        <input type="title" name="title" class="form-control" id="title" placeholder="Title de l'article" <?php if($mode_edition == 1) {?>
                                            value="<?php echo $edit_article['title']; ?>"
                                        <?php } ?>  require>
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Contenu</label>
                                        
                                        <textarea type="text" name="content" class="form-control" cols="30" rows="12" id="content" 
                                        placeholder="<?php if($mode_edition == 1){echo $edit_article['content'];}?>" 
                                        require><?php if($mode_edition == 1){echo $edit_article['content'];}?>
                                        </textarea>
                                        
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
            #include($pathToRootFolder."views/common/footer_dev_mode.php");
        ?>
        <!-- ================ FIN HTML  ================ -->
        <!-- =================================================== -->
        <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    </body>
</html>
<?php
        }

    } else {
    header('Location: session_login.php');
}
?>
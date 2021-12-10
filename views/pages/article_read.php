<?php
session_start();
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Article";

    if (isset($_GET['id']) AND !empty($_GET['id'])){
        extract($_GET);

        // secure data
        $id = htmlspecialchars($_GET['id']);
        $id = strip_tags($id);
    
        require_once($pathToRootFolder.'config/connect.php');
        require_once($pathToRootFolder.'config/functions.php');
        
        require_once($pathToRootFolder.'next_src_wip_denis/Models/Article.php');
        require_once($pathToRootFolder.'next_src_wip_denis/Models/User.php');
        require_once($pathToRootFolder.'next_src_wip_denis/Models/Comments.php');
        require_once($pathToRootFolder.'config/functions/utils.php');

        require($pathToRootFolder.'config/functions/function_file.php');
        require($pathToRootFolder."views/common/checkSessionUser.php");

        // ADD likes
        $likes = $bdd->prepare('SELECT id FROM post_like WHERE article_id = ?');
        $likes->execute(array($id));
        $likes= $likes->rowCount();
        // ADD dislikes
        $dislikes = $bdd->prepare('SELECT id FROM dislikes WHERE article_id = ?');
        $dislikes->execute(array($id));
        $dislikes= $dislikes->rowCount();

        if (isset($_POST['submit_comment'])) {
            if(isset($_POST['comment']) AND !empty($_POST['comment'])) {

                // secure session user
                if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
                    $varsessionid = $_SESSION['id'];
                    $author = $userInfo['pseudo'] ;
                    $phraseAuthor = $userInfo['phrase'] ;
                    
                    }

                //extract($_POST);
                $author = htmlspecialchars($userInfo['pseudo']);  
                $comment = htmlspecialchars($_POST['comment']);

                $errors = array();
        
                $author = strip_tags($author);
                $comment = strip_tags($comment);
        
                //if (empty($author))
                //  array_push($errors, 'Entrez un pseudo !');
        
                if (empty($comment))
                    array_push($errors, 'Entrez un commentaire !');
        
                if (count($errors) == 0) {
                    // get id article read
                    $articleId = $id;

                    $modelAddCom = new Comments();
                    // comment utilise la function addComment
                    $comment = $modelAddCom->addComment($articleId, $author, $comment);
        
                    // message retourné pas d'erreur
                    $success = '<div class="alert alert-success">Votre commentaire a bien été envoyé</div>';
        
                    // Vider le champs du form !
                    unset($_POST['comment']);
                    unset($comment);
                    // header('Location: article_all.php');
                        redirect("article_read.php?id=" . $id);
                    
                }
            }
            else{
                echo '<div class="alert alert-danger">Veuillez écrire un commentaire !</div>';
            }
        }
    
        $modelArticle = new Article();
        $modelCom = new Comments();
        $modelUser = new User();
        $model = new Article();

        $article = $modelArticle->getArticle($id);
        $image = getImage($id);
        $comments = getInfoUserByComments($id);
        $idComment = $modelCom->getCommentByArticle($id);
        $getComments = $modelCom->getComments();
        $getUsers = $modelUser->getUsers($id);
        $getUsersId = $getUsers[0];     
        $categorie = getCategorie($id);
        $avatar = getAvatar($id);

        $idPostReportOk = $id;
        //echo "</br>Voici l'id du post choisi  => ".$idPostReportOk;
        
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
                <section class="section m-md-5 border-bottom border-dark pb-5">
                    <div class="blogArticle--large">
                        <div class="blogArticle-content">
                            <div class="row no-gutters align-items-center">
                                <h2 class="blogArticle-title col-md-10 mb-4"><?= $article->title; ?></h2>
                                <?php 
                                    if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
                                        $varsessionid = $_SESSION['id'];
                                        if(!empty($userInfo['avatar']))
                                        {
                                        ?>
                                            <img class="avatar-img col-md-2" src="../../assets/photos/avatars/<?php echo $avatar->avatar; ?>" alt="photo de l'auteur">
                                        <?php 
                                        } else {
                                        ?>
                                            <img class="avatar-img col-md-2" src="https://source.unsplash.com/Y7C7F26fzZM/300x300" alt="photo de l'auteur">
                                        <?php
                                        }
                                    }  
                                    ?>
                            </div>

                            <div class="blogArticle-footer-infos row no-gutters flex-no-wrap">
                                <p class="col-lg-6 align-self-baseline mb-0">
                                    <span class="abrev">posté le</span>
                                    <span class="date"><?= $article->date; ?></span>
                                    <span class="hour"></span>
                                </p>
                                <p class="col-lg-6 align-self-baseline text-lg-right">
                                    <span class="abrev">par</span>
                                    <span class="pseudo"><?php if(isset($article->author)) echo $article->author; else echo "Admin"; ?></span>
                                </p>
                            </div>


                            <a class="blogArticle-imglink" href="#">
                                <!-- <img class="blogArticle-imglink-img" src="../../assets/uploadPersonal/<?php echo $image->name; ?>" alt="image de l'article here" style="width:100%; height:auto"> -->
                                <img class="blogArticle-imglink col-lg-8" src="../../assets/uploadPersonal/<?php echo $image->name; ?>" alt="image de l'article here" style="width:100%; height:auto">
                            </a>

                            <p class="blogArticle-text">
                                <?= 
                                    $article->content; 
                                ?>
                            </p>
                            
                            <p class="blogArticle-text"></p>
                            
                            <div class="blogArticle-footer">
                                <div class="blogArticle-footer-infos row no-gutters flex-no-wrap">
                                    <p class="col-lg-6 align-self-baseline mb-0">
                                        <span class="abrev">par</span>
                                        <span class="pseudo"><?php if(isset($article->author)) echo $article->author; else echo "Admin"; ?></span>
                                    </p>
                                    <p class="col-lg-6 align-self-baseline text-lg-right">
                                        <span class="abrev">date</span>
                                        <span class="date"><?= $article->date; ?></span>
                                        <span class="hour"></span>
                                    </p>
                                    
                                    
                                </div>
                                <!-- array PERMANENT: -->
                                <?php
                                $getHashtags = getHashtags($id);
                                 if (isset($categorie)){ ?>
                                    <div class="blogArticle-footer-keywords row no-gutters">

                                    <?php foreach ($categorie as $cat) : ?>
                                        Catégorie : <a href="#" class="text-success"><?= $cat->name; ?></a>
                                    <?php endforeach; ?>
                                    <?php foreach ($getHashtags as $hashtags) : ?>

                                        <a href="#" class="keyword"> <?=  $hashtags->name; ?></a>

                                    <?php endforeach; ?>
                                    </div>
                                
                                <?php }else{?>
                                    <div class="blogArticle-footer-keywords row no-gutters">
                                        <a href="#" class="keyword">moto</a>
                                        <a href="#" class="keyword">vitesse</a>
                                        <a href="#" class="keyword">design</a>
                                        <a href="#" class="keyword">carrenage</a>
                                    </div>
                                <?php  } ?>

                                <p>
                                    <span class="abrev">
                                        <a href="../common/actionLike.php?t=1&id=<?= $id ?>">J'aime  </a> (<?= $likes ?>)
                                        <a href="../common/actionLike.php?t=2&id=<?= $id ?>">/ Je n'aime pas</a> (<?= $dislikes ?>)
                                    </span>
                                </p>
                                <p class="col-lg-2 align-self-baseline mb-0">
                                    <a href="article_report.php?id=<?= $idPostReportOk; ?>">
                                        <div class="text-danger">Signaler</div>
                                    </a>
                                </p>
                                
                                
                            </div>
                        </div>
                    </div>
                    <a href="article_all.php">Retour aux articles</a>
                </section>
                
                <section class="section m-md-5">
                    <!-- COMMENTAIRES -->
                    <form method="POST" action="" class="mb-5">
                        <div class="form-group">
                            <label for="writeComment_id">
                                <h4>Poster un commentaire</h4> 
                            </label>
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
                           
                            <?php 
                                 if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
                                    $varsessionid = $_SESSION['id'];
                                    $author = $userInfo['pseudo'] ;
                                    
                                 echo "
                                    <form action=\"\" method=\"POST\">
                                        <p>
                                        <input type=\"text\" name=\"author\" id=\"author\" value=\"$author\" class=\"form-control\" disabled>
                                        </p>
                                        
                                        <p>
                                            <label for=\"comment\">Commentaire :</label><br>
                                            <textarea name=\"comment\" id=\"comment\" cols=\"30\" rows=\"5\" class=\"form-control\"></textarea>
                                        </p>
                                        <button class=\"btn btn-success\" type=\"submit\" name=\"submit_comment\">Envoyer</button>
                                    </form>
                                 ";
                                }
                                else {
                                    echo "<p>
                                        <em class=\"text-secondary\"> (pas de compte ? inscrivez vous ici:</em>
                                        <a href=\"session_register.php\">inscription</a>
                                        <em class=\"text-secondary\">)</em>
                                        </p>";
                                }
                            ?>
                            
                        </div>
                    </form>

                    <?php //for($i=0; $i<4; $i++):?>
                    <?php if (isset($comments)){ ?>
                    <?php foreach ($comments as $com) : ?>

                        <div id="article_comment_section_div" class="comment row pt-3">
                            <div class="col-md-2">
                                <div class="d-flex flex-column">
                                    <?php 
                                    //foreach ($avatarByComment as $avatarCom)
                                    if ($com->author == $com->pseudo){
                                        echo "<img class=\"avatar-img\" src=\"../../assets/photos/avatars/$com->avatar\" alt=\"photo de l'auteur\">"; 
                                    }else {
                                        echo "<img class=\"avatar-img col-md-2\" src=\"https://source.unsplash.com/Y7C7F26fzZM/300x300\" alt=\"photo de l'auteur\">";

                                    }
                                    ?>
                                    
                                    <p class="">
                                        <span class="abrev">par</span>
                                        <span class="pseudo"><?= $com->author ?></span>
                                        <span class="date"><?= $com->date; ?></span>
                                    </p>
        
                                </div>
                            </div>
                            <div class="col-md-10">
                                <p class="comment-text text-dark"><?= $com->comment ?></p>
                            </div>
                            <div>
                                <!-- Si pseudo du com est = au pseudo session  -->
                                <!-- report or delete comment  -->
                                
                                <?php 
                                    foreach($getComments as $element) {
                                        if($com->comment == $element->comment){
                                            $idComOk = $element->id;
                                        }
                                        
                                    } 
                                    
                                    if($com->author == $userInfo['pseudo']){ 
                                        foreach($getComments as $element) {
                                            if($com->comment == $element->comment){
                                         
                                                echo "<a href=\"comment_delete.php?id=$idComOk\">
                                                    <div onclick=\"confirmer() \" class=\"text-danger\">Supprimer mon commentaire</div>
                                                </a>";
                                            }
                                        }

                                    }else{
                                        echo 
                                        "<p>
                                            <a href=\"comment_report.php?id=$idComOk\">
                                                <div class=\"text-secondary\">Signaler</div>
                                            </a>
                                        </p>";} 
                                ?>
                            
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <?php }else 
                        echo "<p>
                            <em class=\"text-secondary\"> Ecrire le premier commentaire</em>
                        ";
                    ?>
                    <?php //endfor; ?>
                </section>


            </main>


            <!-- ############ ASIDE ############## -->
            <aside class="order-0 order-md-1 col-md-3 col-xl-2 bg-secondaireLighter2 articleFilter px-0">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="filter_categorie_id" class="h3 d-block bg-secondaireDarker2 text-white mt-5 pl-2">Categorie</label>
                        <select name="filter_categorie" id="filter_categorie_id" class="form-control">
                            <!-- <optgroup label=""> -->

                                <!-- array temporaire: -->
                                <?php $categories = ['aaaa','bbbb','cccc'];?>

                                <?php for($i=0; $i<count($categories); $i++): ?>
                                    <option value="<?=$categories[$i]?>"><?=$categories[$i]?></option>
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
    <?php
    #require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur';
    #ajouter_vue();
    ?>
    
    <!-- FOOTER -->
    <?php # include($pathToRootFolder."views/common/footer.php");?>
    <?php include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    
</body>

</html>
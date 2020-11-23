<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
    <?php 
        include("src/Views/import/head.html"); 
    ?>
    <body class="layout with-sidenav">
        <?php 
          include("src/Views/import/navbar-front.php"); 
        ?>
        <div class="container-fluid">
            <?php if(isset($alerte)): ?>
                <p class="alerte"><?php echo $alerte; ?></p>
            <?php endif; ?>

            <div class="container">
               <h1>Page Articles</h1>
               <img src="assets/upload/ps5.jpg" class="img-fluid" alt="Responsive image"> 
            </div>
            
           <hr>
           <div class="container">
               <div class="row">
                    <div class="col-6">
                        <a href="src/register.php">Connexion / Inscription</a>
                    </div>
                    <div class="col-6">
                        <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>         
                    </div>
                </div>
           </div>
            <hr>
            <br>
            <div class="container">
               <div class="row">
                    <div class="col-6">
                        <h2>Créer un article</h2>
                        <a href="#">*****</a>
                    
                    
                    <form action="article.php?id=<?= $article->id ?>" method="post">
                        <p>
                            <label for="author">Pseudo :</label><br>
                            <input type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>" class="form-control">
                        </p>
                        <p>
                            <label for="title">Titre :</label><br>
                            <text name="title" id="title" cols="30" rows="5" class="form-control"><?php if(isset($title)) echo $title ?></text>
                        </p>
                        <p>
                            <label for="content">Contenu :</label><br>
                            <textarea name="content" id="content" cols="30" rows="5" class="form-control"><?php if(isset($content)) echo $content ?></textarea>
                        </p>
                        <button class="btn btn-success" type="submit">Envoyer</button>
                    </form>     
                    </div>
                </div>
           </div>
            <br><hr><br>
        

            <div class="container-xl">
                <h2>Articles :</h2>
                <p class="lead">
                Voici nos derniers articles.
            </p>
            </div>
            
            <div class="container">
                <div class="row">
                    <?php foreach($articles as $article): ?>
                        <div class="col-md-3">
                            <h3><?= $article->title ?></h3>
                            <br>
                            Créé le :<time><?= $article->date ?></time>
                            <br>
                            <a href="article.php?id=<?= $article->id ?>" class="btn btn-primary">Lire la suite</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <hr>

            <?php 
                include("src/Views/import/footer.php"); 
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/axentix@1.0.0-beta.3.1/dist/js/axentix.min.js"></script>
    </body>
</html>

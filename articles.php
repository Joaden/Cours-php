<?php 

?>
<!DOCTYPE html>
<html lang="fr">
    <?php 
        include("src/Views/import/header.html"); 
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
               <img src="..." class="img-fluid" alt="Responsive image"> 
            </div>
            
           <hr>
            <div>
                <a href="src/register.php">Connexion / Inscription</a>
            </div>
            <hr>

        

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

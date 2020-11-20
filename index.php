<?php
use Carbon\Carbon;
// spl_autoload_register(function($className){

//     // str_replace
//     require_once $className;
// })

require_once('vendor/autoload.php');

//Appel de function avec la connexion à la bdd
require_once('config/functions.php');

$articles = getArticles();

// TEST AUTOLOAD CLASS COMPTEUR
$instance = new App\Models\Compteur();

$today = Carbon::now();
// var_dump($today->format('d/m/Y H:i'));

$resultat = $instance->additionner(31, 33);



// var_dump($resultat);

// require ('../inc/_connexion.php');
// if($_POST) {
//     $identifiant = $_POST['identifiant'];
//     $password = $_POST['password'];

//     $req = "
//     SELECT nom, password
//     FROM admin
//     WHERE nom LIKE '$identifiant'
//     AND password LIKE MD5('$password')
//     ";

//     var_dump($req);
//     // Execution de la requete
//     $res = $conn -> query($req);
//     // Recup des resultats dans un tableau
//     $data = mysqli_fetch_array($res);
//     var_dump($data);
//     // nbre resultats
//     $nbre_result = $res -> num_rows;

//     if($nbre_result >= 1) {
//         header('Location:inserer.php');
//     } else {
//         $alerte = "Identifiants non valides";
//     }
// }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Blog Home page</title>
        <?php 
            include("src/Views/import/header.html"); 
        ?>  
    </head>
    
    <body class="layout with-sidenav">
        <?php 
          include("src/Views/import/navbar-front.php"); 
        ?>
        <div class="container-fluid">
            <?php if(isset($alerte)): ?>
                <p class="alerte"><?php echo $alerte; ?></p>
            <?php endif; ?>

            <div class="container">
               <h1>Home page </h1>
               <!-- <img src="..." class="img-fluid" alt="Responsive image">  -->
               <span>Choose your hero !</span>
               <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (3).jpg" alt="Image profil" />
               
            </div>
            
           <hr>
           <?php 
           
           ?>

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

            <main>
                <!-- Code here the main content -->
                <button data-target="example-sidenav"
                    class="btn rounded-1 press amaranth dark-1 sidenav-trigger hide-md-up">
                    Open sidenav
                </button>
            </main>

            <div class="container-xl">
                <h2>Articles :</h2>
                <p class="lead">
                Voici nos derniers articles.
            </p>
            </div>
            
            <div class="container">
                <div class="row">
                    <?php foreach($articles as $article): ?>
                        <div id="border-articles" class="col-md-3" >
                            <h3><?= $article->title ?></h3>
                            <img src="assets/upload/penguins.jpg" alt="img-thumbnail" class="img-thumbnail">
                            <br>
                            Créé le :<time><?= $article->date ?></time>
                            <br>
                            <a href="article.php?id=<?= $article->id ?>" class="btn btn-primary">Lire la suite</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <hr>
            <section>
                <div class="container">
                    <div>
                    <img src="assets/upload/ps5.jpg" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="assets/upload/parisgameweek.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="assets/upload/ps5.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="assets/upload/parisgameweek.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </section>

            <div class="container-sm text-primary">
                <div><p>container-sm</p></div>
                100% wide until small breakpoint
            </div>

            <div class="container-md text-primary">
            <div><p>container-md</p></div>

                100% wide until medium breakpoint
            </div>

            <div class="container-lg text-primary">
            <div><p>container-lg</p></div>

                100% wide until large breakpoint
            </div>

            <div class="container-xl text-primary">
            <div><p>container-xl</p></div>

                100% wide until extra large breakpoint
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col">
                    1 of 2
                    </div>
                    <div class="col">
                    2 of 2
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    1 of 3
                    </div>
                    <div class="col">
                    2 of 3
                    </div>
                    <div class="col">
                    3 of 3
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row align-items-start">
                    <div class="col">
                    One of three columns
                    </div>
                    <div class="col">
                    One of three columns
                    </div>
                    <div class="col">
                    One of three columns
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                    One of three columns
                    </div>
                    <div class="col">
                    One of three columns
                    </div>
                    <div class="col">
                    One of three columns
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col">
                    One of three columns
                    </div>
                    <div class="col">
                    One of three columns
                    </div>
                    <div class="col">
                    One of three columns
                    </div>
                </div>
            </div>
            <?php 
                include("src/Views/import/footer.php"); 
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/axentix@1.0.0-beta.3.1/dist/js/axentix.min.js"></script>
        <script src="jquery-3.5.1.min.js"></script>
        <script>
            $('.carousel').carousel({
                interval: 2000
            })
        </script>

    </body>
</html>

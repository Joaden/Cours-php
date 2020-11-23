<?php
session_start();

// Route url : http://localhost:8000/src/Admin/indexAdmin.php : Accueil Administration
require_once('vendor/autoload.php');

//Appel de function avec la connexion à la bdd
require_once('config/functions.php');

$users = getUsers();
$comments = getCommentsAdmin();
// echo count($users);
// var_dump($users);
// die();
$num_rows=0;


?>
<!-- <!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Administration</title> -->
        <?php 
            include("src/Views/base-back.php"); 
        ?>
    <!-- </head> -->
    <!-- <body class="layout with-sidenav"> -->
    <header>
    <div class="navbar-fixed">

    <nav class="navbar shadow-1 primary">
      <a href="#" class="navbar-brand">Back-Office Gestion articles</a>
      <div class="navbar-menu ml-auto">
        <a class="navbar-link" href="index.php"><i class="fas fa-home"></i> Accueil</a>
        <a href="articlesAdmin.php" class="sidenav-link "><i class="fas fa-home"></i>Articles</a>
        <a href="usersAdmin.php" class="sidenav-link "><i class="fas fa-home"></i></a>
        <a href="#" class="sidenav-link "><i class="fas fa-home"></i></a>
        <a href="#" class="sidenav-link "><i class="fas fa-home"></i></a>
        <a href="#" class="sidenav-link "><i class="fas fa-home"></i> Gestion Exporter</a>
        <a href="#" class="sidenav-link "><i class="fas fa-home"></i></a>
        <a class="navbar-link" href="register.php"><i class="fas fa-sign-in-alt"></i> Connexion</a>
      </div>
    </nav>
  </header>

  <div id="example-sidenav" data-ax="sidenav" class="sidenav shadow-1 large fixed white">
    <div class="sidenav-header">
      <button data-target="example-sidenav" class="sidenav-trigger"><i class="fas fa-times"></i></button>
      <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (2).jpg" alt="Logo" />
    </div>
    <a href="index.php" class="sidenav-link active"><i class="fas fa-home"></i> Accueil</a>
    <a href="articlesAdmin.php" class="sidenav-link "><i class="fas fa-home"></i> Gestion Articles</a>
    <a href="usersAdmin.php" class="sidenav-link "><i class="fas fa-home"></i> Gestion Users</a>
    <a href="#" class="sidenav-link "><i class="fas fa-home"></i> Gestion Notes</a>
    <a href="#" class="sidenav-link "><i class="fas fa-home"></i> Gestion Images</a>
    <a href="#" class="sidenav-link "><i class="fas fa-home"></i> Gestion Exporter les data</a>
    <a href="#" class="sidenav-link "><i class="fas fa-home"></i> Gestion Mailing</a>
    <a href="register.php" class="sidenav-link"><i class="fas fa-sign-in-alt"></i> Connexion</a>
    <div>
        <hr>
  </div>
    <a href="inserer.php">Insérer</a>
    <a href="modifier.php">Modifier</a>
    <a href="supprimer.php">Supprimer</a>
    <div><hr><br></div>
    <button class="btn shadow-1 btn-dark rounded-4">Mode dark</button>
    <div><br></div>
    <button class="btn shadow-1 rounded-4">Mode light </button>
  </div>
  </div>
        <div class="container-fluid">
            
            <div class="container">
               <h1>Administration Gestion articles</h1>
               <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (3).jpg" alt="Image" />
            </div>
            <hr><br>
            <div class="grix xs2 md4 center mt-5">
                <button id="tooltip1" data-ax="tooltip" data-tooltip-content="Affiche les users" class="btn airforce dark-3 rounded-1 shadow-1">Data Users</button>
                <button id="tooltip4" data-ax="tooltip" data-tooltip-position="left" data-tooltip-content="Affiche les articles" class="btn airforce dark-3 rounded-1 shadow-1">Data Articles</button>
                <button id="tooltip2" data-ax="tooltip" data-tooltip-position="right" data-tooltip-content="Tooltip" class="btn airforce dark-3 rounded-1 shadow-1">Right</button>
                <button id="tooltip3" data-ax="tooltip" data-tooltip-position="bottom" data-tooltip-content="Tooltip" class="btn airforce dark-3 rounded-1 shadow-1">Bottom</button>
            </div>
            <br><hr><br>
            <!-- START barre de recherche users par categories, type, etc.. -->
                <form method="POST" action="">
                <label for="especes">Espèces recherché : </label>
                    <select name="especes" id="select-user-espece">
                        <option value="humain">Humain</option>
                        <option value="martien">Martien</option>
                        <option value="alien">Alien</option>
                        <option value="Null">Autres</option>
                    </select>
                    <label for="verified">Vérifié : </label>
                    <select name="verified" id="select-user-verified">
                        <option value="true">Oui</option>
                        <option value="false">Non</option>
                    </select>
                    <input type="submit" value="OK">
                </form>
                <?php
                    $bdd = new PDO('mysql:host=localhost;dbname=cours_denis;charset=utf8', $db_login, $db_password);

                    // '(A) ->query est utilisé quand on sait ce que l'on veut récupérer
                    // Requete avec INNER JOIN pour récupérer des données ciblées dans 2 tables
                    // LEFT JOIN ajoute toutes les donnees de la table cité à gauche et RIGHT JOIN celle de droite
                    $reqJoin = $bdd->query('SELECT articles.title,articles.date, comments.author, comments.comment, comments.approved FROM articles INNER JOIN comments ON articles.id = comments.articleId AND comments.approved = "1" LIMIT 0,25');

                    // '(B) ->prepare est utilisé quand on ne connait pas la valeur
                    // $req2 = $bdd->prepare('SELECT * FROM users WHERE espece_id = ? ORDER BY id');
                    // $req2->execute(array($_POST['espece_id']));
                    // $req2->execute(array($_GET['value']));
                    ?>
                    <h3>Tableau de recherche article</h3>
             <table border="1">
                 <th scope="col">Title</th>
                 <th scope="col">date</th>
                 <th scope="col">Author</th>
                 <th scope="col">Commentaire</th>
                 <th scope="col">Approuvé</th>
                 <th scope="col">***</th>
                 <th scope="col">***</th>
                 <?php
                    // while($resultat = $req1->fetch())
                    while($resultat = $reqJoin->fetch())
                    {
                    ?>
                    <tr>
                        <td><?php echo  $resultat['title'] ?></td>
                        <td><?php echo  $resultat['date'] ?></td>
                        <td><?php echo  $resultat['author'] ?></td>
                        <td><?php echo  $resultat['comment'] ?></td>
                        <td><?php echo  $resultat['approved'] ?></td>
                        <td>***</td>
                        <td>***</td>
                    </tr>
                      <!-- echo "Nom : "  . $resultat['name'] . ". / Email : "  . $resultat['email'] . " / espèce : " . $resultat['espece_id'] . " <br/> " ; -->
                    <?php
                    }
              
                ?>
             </table>
          

            <br><hr><br>
    
           
    <footer class="footer primary">
      Copyright © 2020 - Daos
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/axentix@1.0.0-beta.3.1/dist/js/axentix.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
  </body>
</html>
<?php
// Route url : http://localhost:8000/src/Admin/indexAdmin.php : Accueil Administration
require_once('vendor/autoload.php');

// Appel de function avec la connexion à la bdd
require('config/connect.php');
// Appel du fichier de fonction
require('config/functions.php');

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
      <a href="#" class="navbar-brand">Back-Office Blog</a>
      <div class="navbar-menu ml-auto">
        <a class="navbar-link" href="index.php"><i class="fas fa-home"></i> Accueil</a>
        <a href="articlesAdmin.php" class="sidenav-link "><i class="fas fa-sticky-note"></i>Articles</a>
        <a href="usersAdmin.php" class="sidenav-link "><i class="fas fa-user"></i>Users</a>
        <a href="#" class="sidenav-link "><i class="fas fa-clipboard"></i>Notes</a>
        <a href="#" class="sidenav-link "><i class="fas fa-home"></i>Images</a>
        <a href="#" class="sidenav-link "><i class="fas fa-download"></i> Gestion Exporter</a>
        <a href="#" class="sidenav-link "><i class="fas fa-home"></i>Mailing</a>
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
    <a href="articlesAdmin.php" class="sidenav-link "><i class="fas fa-sticky-note"></i> Gestion Articles</a>
    <a href="usersAdmin.php" class="sidenav-link "><i class="fas fa-user"></i> Gestion Users</a>
    <a href="#" class="sidenav-link "><i class="fas fa-clipboard"></i> Gestion Notes</a>
    <a href="#" class="sidenav-link "><i class="fas fa-home"></i> Gestion Images</a>
    <a href="#" class="sidenav-link "><i class="fas fa-download"></i> Gestion Exporter les data</a>
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
               <h1>Administration</h1>
               <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (3).jpg" alt="Image" />
            </div>
            <hr><br>
            <div class="grix xs2 md4 center mt-5">
                <button id="tooltip1" data-ax="tooltip" data-tooltip-content="Affiche les users" class="btn airforce dark-3 rounded-1 shadow-1">Show Users</button>
                <button id="tooltip4" data-ax="tooltip" data-tooltip-position="left" data-tooltip-content="Affiche les articles" class="btn airforce dark-3 rounded-1 shadow-1">Show Articles</button>
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
                    $req1 = $bdd->query('SELECT * FROM users');
                    $req3 = $bdd->query('SELECT * FROM espèces');
                    $req4 = $bdd->query('SELECT * FROM users INNER JOIN users_infos ON users.users_infos_id = users_infos.users_id LIMIT 0,30');
                    // Requete avec INNER JOIN pour récupérer des données ciblées dans 2 tables
                    // LEFT JOIN ajoute toutes les donnees de la table cité à gauche et RIGHT JOIN celle de droite
                    $req5 = $bdd->query('SELECT articles.title,articles.date, comments.author, comments.comment, comments.approved FROM articles INNER JOIN comments ON articles.id = comments.articleId AND comments.approved = "1" LIMIT 0,25');

                    // '(B) ->prepare est utilisé quand on ne connait pas la valeur
                    $req2 = $bdd->prepare('SELECT * FROM users WHERE espece_id = ? ORDER BY id');
                    // $req2->execute(array($_POST['espece_id']));
                    // $req2->execute(array($_GET['value']));
                    ?>
             <table border="1">
                 <th scope="col">User ID</th>
                 <th scope="col">Nom</th>
                 <th scope="col">Email</th>
                 <th scope="col">Vérifié</th>
                 <th scope="col">Phone</th>
                 <th scope="col">Type</th>
                 <th scope="col">Date inscription</th>
                 <?php
                    // while($resultat = $req1->fetch())
                    while($resultat = $req4->fetch())
                    {
                    ?>
                    <tr>
                        <td><?php echo  $resultat['id'] ?></td>
                        <td><?php echo  $resultat['name'] ?></td>
                        <td><?php echo  $resultat['email'] ?></td>
                        <td><?php echo  $resultat['is_verified'] ?></td>
                        <td><?php echo  $resultat['phone'] ?></td>
                        <td><?php echo  $resultat['espece_id'] ?></td>
                        <td><?php echo  $resultat['date_inscription'] ?></td>
                    </tr>
                      <!-- echo "Nom : "  . $resultat['name'] . ". / Email : "  . $resultat['email'] . " / espèce : " . $resultat['espece_id'] . " <br/> " ; -->
                    <?php
                    }
              
                ?>
             </table>

            <!-- END barre de recherche users par categories, type, etc.. -->
            <br><hr><br>
            <!-- Affichage des membres -->
            
            <div class="responsive-table-2">
                <table class="table bordered hover">
                    <thead>
                        <caption>
                        Tableau des utilisateurs
                        </caption>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Vérifié</th>
                            <th>Age</th>
                            <th>Pseudo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->name ?></td>
                                <td><?= $user->email ?></td>
                            <?php if($user->is_verified == 0) { ?>
                                <td class="red"><?= $user->is_verified ?></td>
                            <?php } ?>
                            <?php if($user->is_verified == 1) { ?>  
                                <td class="success">User verified</td>
                            <?php } ?>
                                <td><?= $user->age ?></td>
                                <td><?= $user->pseudo ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br><hr><br>
            <div>
                <h2> Action sur liste Users :</h2>
                <h4> Confirmation du status vérifié</h4>
                <h5> Suppression d'utilisateurs</h5>
            </div>
            <ul>
                <?php foreach($users as $user): ?>
                    
                    <li>
                        <?= $user->id ?> : <?= $user->name ?> / <?= $user->email ?>
                            <?php if($user->is_verified == 0) { ?> : 
                                <a href="indexAdmin.php?type=user&confirme=<?= $user->id ?>">
                                    Confirmer
                                </a>
                            <?php } ?> - <a  href="indexAdmin.php?type=user&supprime=<?= $user->id ?>"><span class="red dark-1">Supprimer</span></a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <br><hr><br>
    
            <div>
                <h2> Action sur liste des Commentaires :</h2>
                <h4> Approuver ou Supprimer le commentaire</h4>
            </div>
            <ul>
                <?php foreach($comments as $comment): ?>
                    
                    <li>
                        <?= $comment->articleId ?> : créé le <?= $comment->date ?> : <?= $comment->author ?> / <?= $comment->comment ?>
                            <?php if($comment->approved == 0) { ?> : 
                                <a href="indexAdmin.php?type=commentaire&confirme=<?= $comment->id ?>">
                                    Confirmer
                                </a>
                            <?php } ?> - <a  href="indexAdmin.php?type=commentaire&supprime=<?= $comment->id ?>"><span class="red dark-1">Supprimer</span></a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <br><hr><br>
    
           
    <footer class="footer primary">
      Copyright © 2020 - Denis & Christohpe
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/axentix@1.0.0-beta.3.1/dist/js/axentix.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
  </body>
</html>
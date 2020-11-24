<?php
session_start();

// Route url : http://localhost:8000/src/Admin/indexAdmin.php : Accueil Administration
require_once('vendor/autoload.php');

// Appel de function avec la connexion à la bdd
require('config/connect.php');
// Appel du fichier de fonction
require('config/functions.php');

if(isset($_SESSION['id']))
{
    $num_rows=0;

    //Si le user est connecté
    $reqUser = $bdd->prepare("SELECT * FROM users WHERE id = ? ");
    $reqUser->execute(array($_SESSION['id']));
    $user = $reqUser->fetch();

    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo'] AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND $_POST['mdp'] == $_POST['mdp2'])
    {
        // echo $_POST['newpseudo'];
        // echo $_POST['mdp'];
        // echo $_POST['mdp2'];
        // die();
        $newPseudo = htmlspecialchars($_POST['newpseudo']);
        $insertPseudo = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
        $insertPseudo->execute(array($newPseudo, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);

    }

    if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email'] AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND $_POST['mdp'] == $_POST['mdp2'])
    {
        $newemail = htmlspecialchars($_POST['newemail']);
        $insertemail = $bdd->prepare("UPDATE users SET email = ? WHERE id = ?");
        $insertemail->execute(array($newemail, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);

    }


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Edit profil</title>
        <?php 
            include("src/Views/common/head.html"); 
        ?>
        <style>

            #formEditProfil div{
                padding: 10px;
                margin: 10px;
            }
        </style>
    </head> 
    <body class="layout with-sidenav">
        <?php 
          include("src/Views/common/navbar-front.php"); 
        ?>
        <div class="container-fluid">
            <div class="container">
               <h1>Edition de mon profil</h1>
               <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (3).jpg" alt="Image" />
            </div>
            <hr><br>
            <div class="grix xs2 md4 center mt-5">
                <button id="tooltip1" data-ax="tooltip" data-tooltip-content="Editer mes infos personnelles" class="btn airforce dark-3 rounded-1 shadow-1">Show Users</button>
                <button id="tooltip4" data-ax="tooltip" data-tooltip-position="left" data-tooltip-content="Editer mes articles" class="btn airforce dark-3 rounded-1 shadow-1">Show Articles</button>
                <button id="tooltip2" data-ax="tooltip" data-tooltip-position="right" data-tooltip-content="Tooltip" class="btn airforce dark-3 rounded-1 shadow-1">Right</button>
                <button id="tooltip3" data-ax="tooltip" data-tooltip-position="bottom" data-tooltip-content="Tooltip" class="btn airforce dark-3 rounded-1 shadow-1">Bottom</button>
            </div>
            <br><hr><br>

            <div class="container">
                <h3>Edition</h3>
                <div class="row">
                    <div></div>
                    <!-- <div>
                        <form method="POST" action="">
                        <div class="form-group">
                            <label for="newpseudo">Avatar</label>
                            <input name="newpseudo" type="text" class="form-control" id="newpseudo" aria-describedby="newpseudo" placeholder="Votre pseudo" value="<?php $user['pseudo']; ?>" required>
                            <small id="newpseudo" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="newmail">Nouveau Mail</label>
                            <input name="newmail" type="email" class="form-control" id="newmail" aria-describedby="newmail" placeholder="Votre email" value="<?php $user['email']; ?>" required>
                            <small id="newmail" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="mdp">Password</label>
                            <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" required>
                        </div>
                        <div class="form-group">
                            <label for="mdp2">Confirmation Password</label>
                            <input name="mdp2" type="password" class="form-control" id="mdp2" placeholder="Votre mot de passe" required>
                        </div>
                        
                            <button type="submit" name="formEditProfil" class="btn btn-primary">Enregistrer les modifications</button>
                        </form>
                        <p style="color: red;" id="erreur">
                            <?php 
                                if(isset($erreur))
                                {
                                echo $erreur;  
                                }
                            ?>
                        </p>
                        <br>
                        <br>
                    </div> -->
                </div>
            </div>
            <hr><br>

<div id="formEditProfil" class="container shadow-1 rounded-2 bd-solid bd-3">
  <button id="ButtonEditProfil"  class="btn btn-success rounded-1 press">Modifier mon profil</button> 
  <small class="form-text text-muted">Si vous changez ......</small>
  <div class="form-hide">
    <div id="notes-div" class="grix xs1 sm2 ">
      <div class="grix xs3 shadow-1 rounded-2 bd-blue bd-solid bd-3 ">
        <div class="col-xs3 text-center">
        <button class="btn btn-primary rounded-2 press">Mon pseudo</button>
          <!-- <button class="btn btn-primary rounded-2 press">Add Notes</button> | <button class="btn btn-danger rounded-2 press">Supp Notes</button> -->
        </div>
        <hr class="border-bottom">
        <div class="col-xs3">
                        <form method="POST" action="">
                        <div class="form-group">
                            <label for="newpseudo">Nouveau Pseudo</label>
                            <input name="newpseudo" type="text" class="form-control" id="newpseudo" aria-describedby="newpseudo" placeholder="Votre pseudo" value="<?php $user['pseudo']; ?>" required>
                            <small id="newpseudo" class="form-text text-muted"></small>
                        </div>
                        
                        <div class="form-group">
                            <label for="mdp">Password</label>
                            <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" required>
                        </div>
                        <div class="form-group">
                            <label for="mdp2">Confirmation Password</label>
                            <input name="mdp2" type="password" class="form-control" id="mdp2" placeholder="Votre mot de passe" required>
                        </div>
                        
                            <button type="submit" name="formEditPseudo" class="btn btn-primary">Enregistrer les modifications</button>
                        </form>
                        <p style="color: red;" id="erreur">
                            <?php 
                                if(isset($erreur))
                                {
                                echo $erreur;  
                                }
                            ?>
                        </p>
                        <br>
                        <br>
                    </div>
        <!-- <div>box 2</div>
        <div>box 3</div>
        <div>box 4</div> -->
      </div>
      <div class="grix xs3 shadow-1 rounded-2 bd-blue bd-solid bd-3">
      <div class="col-xs3 text-center">
        <button class="btn btn-primary rounded-2 press">Mon email</button>
          <!-- <button class="btn btn-primary rounded-2 press">Add Notes</button> | <button class="btn btn-danger rounded-2 press">Supp Notes</button> -->
        </div>
        <hr class="border-bottom">
      <div class="col-xs3">
                        <form method="POST" action="">
                        <div class="form-group">
                            <label for="newmail">Nouveau Mail</label>
                            <input name="newmail" type="email" class="form-control" id="newmail" aria-describedby="newmail" placeholder="Votre email" value="<?php $user['email']; ?>" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="mdp">Password</label>
                            <input name="mdp" type="password" class="form-control" id="mdp" placeholder="Votre mot de passe" required>
                        </div>
                        <div class="form-group">
                            <label for="mdp2">Confirmation Password</label>
                            <input name="mdp2" type="password" class="form-control" id="mdp2" placeholder="Votre mot de passe" required>
                        </div>
                        
                            <button type="submit" name="formEditEmail" class="btn btn-primary">Enregistrer les modifications</button>
                        </form>
                        <p style="color: red;" id="erreur">
                            <?php 
                                if(isset($erreur))
                                {
                                echo $erreur;  
                                }
                            ?>
                        </p>
                        <br>
                        <br>
                    </div>
      </div>
    </div>
  </div>
</div>
<br><hr><br>

            <br><hr><br>
            <!-- START barre de recherche users par categories, type, etc.. -->
                <!-- <form method="POST" action="">
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
                </form> -->
                <?php
                    // $bdd = new PDO('mysql:host=localhost;dbname=cours_denis;charset=utf8', $db_login, $db_password);

                    // // '(A) ->query est utilisé quand on sait ce que l'on veut récupérer
                    // $req1 = $bdd->query('SELECT * FROM users');
                    // $req3 = $bdd->query('SELECT * FROM espèces');
                    // $req4 = $bdd->query('SELECT * FROM users INNER JOIN users_infos ON users.users_infos_id = users_infos.users_id LIMIT 0,30');
                    // // Requete avec INNER JOIN pour récupérer des données ciblées dans 2 tables
                    // // LEFT JOIN ajoute toutes les donnees de la table cité à gauche et RIGHT JOIN celle de droite
                    // $req5 = $bdd->query('SELECT articles.title,articles.date, comments.author, comments.comment, comments.approved FROM articles INNER JOIN comments ON articles.id = comments.articleId AND comments.approved = "1" LIMIT 0,25');

                    // // '(B) ->prepare est utilisé quand on ne connait pas la valeur
                    // $req2 = $bdd->prepare('SELECT * FROM users WHERE espece_id = ? ORDER BY id');
                    // // $req2->execute(array($_POST['espece_id']));
                    // // $req2->execute(array($_GET['value']));
                    ?>
             <table border="1">
                 <th scope="col">Nom</th>
                 <th scope="col">Email</th>
                 <th scope="col">Pseudo</th>
                 <th scope="col">Vérifié</th>
                 <th scope="col">Phone</th>
                 <th scope="col">Type</th>
                 <th scope="col">Date inscription</th>
                 <?php
                    // while($resultat = $req1->fetch())
                    // while($resultat = $req->fetch())
                    // {
                    ?>
                    <tr>
                        <td><?php echo  $resultat['name'] ?></td>
                        <td><?php echo  $resultat['email'] ?></td>
                        <td><?php echo  $resultat['pseudo'] ?></td>
                        <td><?php echo  $resultat['is_verified'] ?></td>
                        <td><?php echo  $resultat['phone'] ?></td>
                        <td><?php echo  $resultat['espece_id'] ?></td>
                        <td><?php echo  $resultat['date_inscription'] ?></td>
                    </tr>
                      <!-- echo "Nom : "  . $resultat['name'] . ". / Email : "  . $resultat['email'] . " / espèce : " . $resultat['espece_id'] . " <br/> " ; -->
                    <?php
                    // }
              
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
    <script>
          $(document).ready(function(){
      $("#ButtonEditProfil").click(function(){
        $(".form-hide").fadeToggle("2000");
      });
    });
     
    </script>
  </body>
</html>
<?php
}
else
{
    header("Location: connexion.php");
}
?>
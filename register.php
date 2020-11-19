<?php 

require_once('vendor/autoload.php');

//Appel de function avec la connexion à la bdd
require('config/functions.php');

if(isset($_POST['form']))
{
   // if(!empy($_POST['name']) AND !empy($_POST['pseudo']) AND !empy($_POST['email']) AND !empy($_POST['password']));
    echo "ok";
}
else{
    $erreurs = 1;

}



// 
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@1.0.0-beta.3.1/dist/css/axentix.min.css">
        <link rel="stylesheet" type="text/css" href="../css/base-back.css">
        <link rel="stylesheet" type="text/css" href="../css/base-front.css">
        <link rel="stylesheet" type="text/css" href="../css/header.css">
        <link rel="stylesheet" type="text/css" href="../css/navbar-back.css">
        <link rel="stylesheet" type="text/css" href="../css/navbar-front.css">
        <link rel="stylesheet" type="text/css" href="../css/content.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
    </head>
    <body>
    <nav class="navbar shadow-1 primary">
      <a href="#" class="navbar-brand">Inscription Blog</a>
      <div class="navbar-menu ml-auto">
        <a class="navbar-link" href="../../index.php"><i class="fas fa-home"></i> Accueil</a>
        <a class="navbar-link" href="#"><i class="fas fa-sign-in-alt"></i> Connexion</a>
      </div>
    </nav>
  </header>
        <div class="container-fluid">


            <h1>Inscription / Connexion</h1>

            <div class="container bordered">
                <h2>Connexion</h2>
                <!-- <div class="col-md-6"> -->
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                <!-- </div> -->
                 <hr>
                 <hr>
                 <hr>
                <h2>Inscription</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="emailRegister">Name</label>
                        <input name="email" type="email" class="form-control" id="emailRegister" aria-describedby="emailRegister" required>
                        <small id="smallRegister" class="form-text text-muted">Visible que par vous.</small>
                    </div>
                    <div class="form-group">
                        <label for="emailRegister">Pseudo</label>
                        <input name="pseudo" type="email" class="form-control" id="emailRegister" aria-describedby="emailRegister">
                        <small id="smallRegister" class="form-text text-muted">Visible par tout le monde.</small>
                    </div>
                    <div class="form-group">
                        <label for="emailRegister">Email address</label>
                        <input name="email" type="email" class="form-control" id="emailRegister" aria-describedby="emailRegister">
                        <small id="smallRegister" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="passwordRegister">Password</label>
                        <input name="password" type="password" class="form-control" id="passwordRegister">
                    </div>
                    <div class="form-group">
                        <label for="confirmationPasswordRegister">Confirmation Password</label>
                        <input name="password" type="password" class="form-control" id="confirmationPasswordRegister">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="checkRegister">
                        <label class="form-check-label" for="checkRegister">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Je m'inscris</button>
                </form>
                <br>
                <hr>
            </div>
        
        </div>
        <footer class="footer primary">
      Copyright © 2020 - Daos
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/axentix@1.0.0-beta.3.1/dist/js/axentix.min.js"></script>
    </body>
</html>
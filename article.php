<?php
session_start();


if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
    header('location: index.php');
else
{
  extract($_GET);

  $id = strip_tags($id);

  require_once('config/functions.php');

  if(!empty($_POST))
  {
    extract($_POST);
    $errors = array();

    $author = strip_tags($author);
    $comment = strip_tags($comment);

    if(empty($author))
      array_push($errors, 'Entrez un pseudo !');

    if(empty($comment))
      array_push($errors, 'Entrez un commentaire !');

    if(count($errors) == 0)
        {
          // comment utilise la function addComment
          $comment = addComment($id, $author, $comment);
          
          // message retourné pas d'erreur
          $success = '<div class="alert alert-success">Votre commentaire a bien été envoyé</div>';

          // Vider le champs du form !
          unset($author);
          unset($comment);
        }
  }

    $article = getArticle($id);
    $comments = getComments($id);
   
  }
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title><?= $article->title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Blog Article Page</title>
        <?php 
            include("src/Views/import/head.html"); 
        ?>  
  </head>
  <body class="layout with-sidenav">
  <?php 
          include("src/Views/import/navbar-front.php"); 
        ?>
    <div class="container-fluid">
      <div class="container">
      <a href="articles.php">Retour aux articles</a>
      <div>
        <img src="assets/upload/ps5.jpg" class="img-fluid" alt="Responsive image">
      </div>
      <h1><?= $article->title ?></h1>
      <br>
      <p><?= $article->content ?></p>
      <br>
          Créé le :<time><?= $article->date ?></time>
      <br>
      <hr>

      <?php
        if(isset($success))
        
          echo $success;

        if(!empty($errors)):?>

          <?php foreach($errors as $error): ?>
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

        <div class="row">
          <div class="col-md-6">
            <form action="article.php?id=<?= $article->id ?>" method="post">
              <p>
                <label for="author">Pseudo :</label><br>
                <input type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>" class="form-control">
              </p>
              <p>
                <label for="comment">Commentaire :</label><br>
                <textarea name="comment" id="comment" cols="30" rows="5" class="form-control"><?php if(isset($comment)) echo $comment ?></textarea>
              </p>
              <button class="btn btn-success" type="submit">Envoyer</button>
            </form>
          </div>
        </div>
      
            <hr>
      <h2>Commentaires :</h2>

      <?php foreach($comments as $com): ?>
          <h3><?= $com->author ?></h3>
          <time><?= $com->date ?></time>
          <p><?= $com->comment ?></p>
      <?php endforeach; ?>

      </div>
    </div>
    <?php 
        include("src/Views/import/footer.php"); 
    ?>
  </body>
</html>
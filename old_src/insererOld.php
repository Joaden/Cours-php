<?php
session_start();

require ('../inc/_connexion.php');
require ('../inc/_define.php');
require ('../inc/functions.php');

$alerte= '';
if($_POST) {
    //var_dump($_POST);
    foreach ($_POST as $name => $value) {
        ${$name} = $value;
        $var_form = ${$name};
        if(empty($var_form)) {
            $alerte .= $name;
            $alerte .= '<br>';
        }
    } // fin foreach

    if($_FILES) {
        $alerte .= uploadFile(DIR_UPLOAD, TAILLE_MAX_UPLOAD, LARGEUR_MAX_PHOTO);
    }

    if(empty($alerte)) {
        $alerte = "Article enregistré";
        if(isset($GLOBALS['nom_photo'])) {
            $photo_article = $GLOBALS['nom_photo'];
        }
        //var_dump($nom_photo);
        /////////////// Requete d'insertion///////////////////////
        $req = "
        INSERT INTO articles(titre_article, photo_article, contenu_article, date)
        VALUES ('$titre_article', '$photo_article','$contenu_article', NOW())
        ";
        // A evaluer aussi
        $res = $conn -> query($req);


        //////////////////////////////////////////////////////////
    } // fin empty alerte



} // fin POST



?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
<?php include('parts/header.html'); ?>

<?php if(isset($alerte) && $alerte!= ""): ?>
    <p class="alerte">
        <?php echo $alerte; ?>
    </p>
<?php else: ?>
    <p class="alerte-verte">Formulaire bien envoyé</p>
<?php endif; ?>

<h1>Insérer un article</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
    <label for="titre_article">Titre de l'article</label>
    <input type="text" name="titre_article" id="titre_article">

    <p>Taille maximale du fichier: <?php echo round(TAILLE_MAX_UPLOAD/1024);  ?>Ko</p>
    <p>Largeur maximale du fichier: <?php echo LARGEUR_MAX_PHOTO;  ?>px</p>

    <label for="photo_article">Photo de l'article</label>
    <input type="file" name="photo_article" id="photo_article">

    <label for="contenu_article">Contenu de l'article</label>
    <textarea name="contenu_article"></textarea>

    <input type="submit" value="Enregistrer l'article">


</form>




</body>
</html>
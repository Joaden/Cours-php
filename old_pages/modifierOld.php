<?php
session_start();

require ('../inc/_connexion.php');
require ('../inc/_define.php');
require ('../inc/functions.php');

///////////Affichage des articles //////////////
$req = "SELECT * FROM articles";
$res = $conn -> query($req);
////////////////////////////////////////////////
if($_GET) {
    $id = $_GET['id'];
    //var_dump($id);
    // requete pour récuperer la ligne correspondant à l'id transmis ds l'URL
    $req= "
    SELECT * FROM articles
    WHERE id = '$id'
    LIMIT 1
    ";
    // execution de la equete
    $res = $conn -> query($req);
    // tableaux des données
    $data = mysqli_fetch_array($res);
    // recuperation des donnees
    $id = $data['id'];
    $titre_article = $data['titre_article'];
    $photo_article = $data['photo_article'];
    echo $photo_article;
    $contenu_article = nl2br($data['contenu_article']);
}

///////////Modification ////////////////
$alerte= '';
if($_POST) {
    var_dump($_POST);
    foreach ($_POST as $name => $value) {
        ${$name} = $value;
        $var_form = ${$name};
        if(empty($var_form)) {
            $alerte .= $name;
            $alerte .= '<br>';
        }
    } // fin foreach

    // Attention pas terminé
    // A finir
    if($_FILES) {
        $alerte .= uploadFile(DIR_UPLOAD, TAILLE_MAX_UPLOAD, LARGEUR_MAX_PHOTO);
    } else {

    }

    if(empty($alerte)) {
        $alerte = "Article enregistré";
        if(isset($GLOBALS['nom_photo'])) {
            $photo_article = $GLOBALS['nom_photo'];
        }
        //var_dump($nom_photo);
        /////////////// Requete d'insertion///////////////////////
        $req = "
        UPDATE articles
        SET 
        titre_article = '$titre_article',
        photo_article = ' $photo_article',
        contenu_article = '$contenu_article'
        WHERE  id = '$id'        
        ";

        // A evaluer aussi
        $res = $conn -> query($req);
        if($res){
            $alerte = "Article modifié";
        } else {
            $alerte = "Problème";
        }



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
<?php endif; ?>

<h1>Insérer un article</h1>

<?php if($_GET): ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>">
        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
        <label for="titre_article">Titre de l'article</label>
        <input type="text" name="titre_article" id="titre_article" value="
        <?php if(isset($titre_article)) echo $titre_article; ?>">

        <p>Taille maximale du fichier: <?php echo round(TAILLE_MAX_UPLOAD/1024);  ?>Ko</p>
        <p>Largeur maximale du fichier: <?php echo LARGEUR_MAX_PHOTO;  ?>px</p>

        <p><img src="<?php echo DIR_UPLOAD ?>/<?php echo $photo_article; ?>"></p>
        <label for="photo_article">Photo de l'article</label>
        <input type="file" name="photo_article" id="photo_article">

        <label for="contenu_article">Contenu de l'article</label>
        <textarea name="contenu_article"><?php if(isset($contenu_article)) echo $contenu_article; ?></textarea>

        <input type="submit" value="Enregistrer l'article">
    </form>

<?php endif; ?>


<table>
    <?php
    //$data = mysqli_fetch_array($res);
    //var_dump($data);
    while($data = mysqli_fetch_array($res)): ?>
        <tr>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['titre_article']; ?></td>
          <td><a href="modifier.php?id=<?php echo $data['id']; ?>">Modifier</a></td>
        </tr>
    <?php endwhile; ?>
</table>




</body>
</html>
<?php
require ('../inc/_connexion.php');
require ('../inc/_define.php');
require ('../inc/functions.php');

///////////Affichage des articles //////////////
$req = "SELECT * FROM articles";
$res = $conn -> query($req);
////////////////////////////////////////////////
if($_GET) {
    $id = $_GET['id'];       
    $req= "
    DELETE FROM articles
    WHERE id = '$id';
    ";
    // execution de la requete
    $res = $conn -> query($req);
    if($res){
        $alerte = "Article supprimé";
    } else {
        $alerte = "Problème de suppression";
    }
}
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




<table>
    <?php
    //$data = mysqli_fetch_array($res);
    //var_dump($data);
    while($data = mysqli_fetch_array($res)): ?>
        <tr>
          <td><?php echo $data['id']; ?></td>
          <td><?php echo $data['titre_article']; ?></td>
          <td><a href="supprimer.php?id=<?php echo $data['id']; ?>">Supprimer</a></td>
        </tr>
    <?php endwhile; ?>
</table>




</body>
</html>
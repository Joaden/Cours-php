<?php
require "Produit.php";

$basket = new Produit();
$basket->setName("Basket Adidas");
$basket->setDescription("Red basket");
$basket->setPrixHt(44.90);

$basket2 = new Produit();
$basket2->setName("Basket Nike");
$basket2->setDescription("Blue basket");
$basket2->setPrixHt(60.90);

$sneaker = new Produit();
$sneaker->setName("Basket Jordan");
$sneaker->setDescription("Sport basket");
$sneaker->setPrixHt(160.00);

// Tableau numerique
$produits= [$basket,$basket2,$sneaker];

/**Produit::$facteur_tva=1.5;  changement de valeur de la variable static  **/
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            width: 900px;
        }
        th, td{
            border: 1px solid black;

        }
        .green{
            /* background: #green; */
        }
    </style>
</head>
<body>
    <h1>Produits</h1>
<!--    table>tr>th*5   raccourci de tableau  -->
    <table>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix HT</th>
            <th>Prix TTC</th>
            <th>Dispo à la vente</th>
        </tr>


        <?php foreach($produit as $produit) {  ?>

        <tr class="green">
            <th><?= $produit->getName() ?></th>
            <th><?= $produit->getDescription() ?></th>
            <th><?= $produit->getPrixHt() ?></th>
            <th><?= $produit->PrixTTC() ?></th>
            <th><?= $produit->getIs_online() ?></th>
        </tr>
        <?php } ?>



    </table>
</body>
</html>

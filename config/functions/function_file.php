<?php
/////////////////////////// FUNCTION on file / image
// Resize image with PHP
function resizeImage()
{
    $img_src_chemin = "";
    $original = "";
    // 1) lire l'image original avec son extension
    $extension = substr($img_src_chemin, -3);
    // minuscule
    $extension = strtolower($extension);
    // ouvrir l'image en fonction de son extension
    switch ($extension) 
    {
        case "jpg":
        case "peg":
            $original = imagecreatefromjpeg($img_src_chemin);
            break;

        case "gif":
            $original = imagecreatefromgif($img_src_chemin);
            break;

        case "png":
            $original = imagecreatefrompng($img_src_chemin);
            break;

        default:
            echo "L'image n'est pas au bon format, extension autorisées : jpg/jpeg, gif, png";
            break;

    }
    // 2) CREATE EMPTY CANVAS
    $resized = imagecreatetruecolor(300, 300);

    // 2.a) TRANSPARENCY
    imagealphablending($resized, false);
    imagesavealpha($resized, true);
    imagefilledrectangle(
        $resized, 0, 0, 565, 640,
        imagecolorallocatealpha($resized, 255, 255, 255, 127)
    );

    // 3) rezise image
    imagecopyresampled(
        $resized, $original, 0, 0, 0, 0, 565, 640, 1130, 1280
    );


    // 4) OUTPUT
    imagejpeg($resized, "");
    // Deux fonctions permettent de redimensionner une image, imagecopyresized() et imagecopyresampled().

    
}


// //Get image for article in database, table images
// function getImages()
// {
//     $pathToRootFolder = "../../";
//     require($pathToRootFolder.'config/connect.php');

    
//     $error = null;
//     try{
//         // get all images from bdd.
//         $req = $bdd->prepare('SELECT * FROM images ORDER BY id ASC');
//         ///* execute() = Exécute la première requête */
//         $req->execute();
//         /* fetch() = Récupération de la première ligne uniquement depuis le résultat et fetchAll recup tous*/
//         $data = $req->fetchAll(PDO::FETCH_OBJ); // affiche tous les resultats
        
//         $req->closeCursor();
//         return $data;
//     }
//     catch (PDOException $e){
//         $error = $e->getMessage();
//         printf("Il y a eu un problème"); 
//     }
    
// }


// ////////////////////////////// GET IMAGE ARTICLE
// function getImage($id)
// {
//     $pathToRootFolder = "../../";
//     require($pathToRootFolder.'config/connect.php');
//     $req = $bdd->prepare('SELECT * FROM images WHERE article_id = ? ');
//     $req->execute(array($id));
//     $data = $req->fetch(PDO::FETCH_OBJ);
//     // echo $data;
//     // var_dump($data);
//     // die();
//     $req->closeCursor();
//     return $data;
// }

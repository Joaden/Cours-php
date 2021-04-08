<?php
/////////////////////////// FUNCTION on file / image
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

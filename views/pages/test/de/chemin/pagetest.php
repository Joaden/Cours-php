<?php
$pathToRootFolder = "../../../../../";


//  <div class="container-menu">
// <div class="btn-menu">
//     <div class="ligne"></div>
// </div>
//      div.blob.blob$*4>img.icone 
//     <div class="blob blob1">
//         <img src="../../assets/upload/desert.jpg" alt="icone" class="icone">
//     </div>
//     <div class="blob blob2">
//         <img src="../../assets/upload/etretat.jpg" alt="icone" class="icone">
//     </div>
//     <div class="blob blob3">
//         <img src="../../assets/upload/koala.jpg" alt="icone" class="icone">
//     </div>
//     <div class="blob blob4">
//         <img src="../../assets/upload/penguins.jpg" alt="icone" class="icone">
//     </div>

// </div> 


function calculatePathToRootFolder($pathToParentFolderOfTheFile) {
    // __DIR__                    renvoi  C:\laragon\www\Cours-php\views\pages
    // $_SERVER["DOCUMENT_ROOT"]  renvoi  C:/laragon/www/Cours-php/

    // récupérer chacun des chemins dans un array chacun, sans / ou \
        $absolutePathToRoot_arr = explode("/",$_SERVER["DOCUMENT_ROOT"]);
        $absolutePathToFile_arr = explode("\\",$pathToParentFolderOfTheFile);
    
    // les vérifier:
    // var_dump($absolutePathToRoot_arr);   // ['C:','laragon','www','Cours-php','']
    // var_dump($absolutePathToFile_arr);   // ['C:','laragon','www','Cours-php','views','page','test','de']
                                            //                                     ../    ../    ../    ../

    // mettre les 2 tableaux à la même taille:

        $differenceOfArraysSizes = count($absolutePathToFile_arr) - count ($absolutePathToRoot_arr); // 3
        $indexOfLastElement_absolutePathToRoot_arr = count($absolutePathToRoot_arr)-1;

        // j'augmente l'array1 du nombre requis d'elements:
        for($i = count($absolutePathToRoot_arr)-1 /*4*/ ; $i <= count($absolutePathToFile_arr)-1 ; $i++){
            $absolutePathToRoot_arr[$i] = "";
        }
        // verification
            // var_dump($absolutePathToRoot_arr);
        // ok ils sont maintenant de la même taille!
    
    $pathToRootFolder = "../";
    for ($i=0 ; $i<count($absolutePathToFile_arr); $i++){

        if ( $absolutePathToRoot_arr[$i] != $absolutePathToFile_arr[$i]) {
            $pathToRootFolder = $pathToRootFolder."../";
        }
    }

    return $pathToRootFolder;
}

// essai sans return, juste pour voir les var_dump() de la fonction:
// calculatePathToRootFolder(dirname(__DIR__));


// essai avec return du $pathToRootFolder >> dans une variable de test :
    // $pathToRootFolder_essai = calculatePathToRootFolder(dirname(__DIR__));
    // var_dump($pathToRootFolder_essai); // ok renvoi bien "../../../../"



// essai avec return du $pathToRootFolder: >> dans la variable que l'on gardera :
    $pathToRootFolder = calculatePathToRootFolder( dirname(__DIR__) );


include($pathToRootFolder."views/common/navbar.php");



__DIR__;  // chemin du parent  C:/  /   /  / / parent/ 
__FILE__; // chemin du parent  C:/  /   /  / / parent/ fichier.php




// FOOTER
include($pathToRootFolder."views/common/footer_dev_mode.php");

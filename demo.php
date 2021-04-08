<?php 


function rep_oui_non($phrase) {
    while(true){
        $reponse = readline($phrase . " - (o)ui/(n)on : ");
        if($reponse === "o"){
            return true;

        } elseif ($reponse === "n") {
            return false;
        }
    }
}

function demander_creaneau ($phrase = 'Veuillez entrer un creneau') {
    echo $phrase . "\n";
    while (true) {
        $ouverture = (int)readline('Heure d\'ouverture) : ');
        if ($ouverture >= 0 && $ouverture <= 23) {
            break;
        }
    }
    while (true) {
        $fermeture = (int)readline('Heure de fermeture) : ');
        if ($fermeture >= 0 && $fermeture <= 23 && $fermeture > $ouverture) {
            break;
        }
    }
    return [$ouverture, $fermeture];
}   

//demander plusieurs creneaux

// resultat
$creneau = demander_creaneau(); // [8, 9]
$creneau2 = demander_creaneau('Veuillez entrer votre creneau');
// si le user tape "o" => true
// si le user tape "n" => false
var_dump($creneau, $creneau2);

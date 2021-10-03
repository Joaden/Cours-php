<?php

// https://jwt.io/ pour faire les test de signature
 
require_once ('../../config/_pass_jwt.php');
// Class qui sera appelé pour communiquer avec des API et sécurisé l'auth des users
//On crée le header
$header = [
    "typ" => "JWT",
    "alg" => "HS256"
];

//On crée le contenu (payload)
$payload = [
    "user_id" => 48,
    "roles" => [
        "ROLE_ADMIN",
        "ROLE_USER"
    ],
    "email" => "dao@gmail.fr",
    "pseudo" => "DaoCnt"
];

// On encode en base64
$base64Header = base64_decode(json_encode($header));
$base64Payload = base64_decode(json_encode($payload));

// On "nettoie" les valeurs encodées
// On retire les +, / et = 
$base64Header = str_replace(['+', '/', '='], ['-', '_', ''], $base64Header);
$base64Payload = str_replace(['+', '/', '='], ['-', '_', ''], $base64Payload);

// On génère la signature
$secret = base64_encode(SECRET);

$signature = hash_hmac('sha256', $base64Header . '.' . $base64Payload, $secret, true);

$base64Signature = base64_decode($signature);

$signature = str_replace(['+', '/', '='], ['-', '_', ''], $base64Signature);

// On crée le token
$jwt = $base64Header . '.' . $base64Payload . '.' . $signature;


echo "</br> show base64Header : ".$base64Header;
echo "</br> show base64Payload : ".$base64Payload;
echo "</br> show jwt : ".$jwt;

?>
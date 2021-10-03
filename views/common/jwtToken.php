<?php
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
    ]
];

// On encode en base64
$base64Header = base64_decode(json_encode($header));
$base64Payload = base64_decode(json_encode($Payload));

// On "nettoie" les valeurs encodées
// On retire les +, / et = 
$base64Header = str_replace(['+', '/', '='], ['-', '_', ''], $base64Header);
$base64Payload = str_replace(['+', '/', '='], ['-', '_', ''], $base64Payload);

echo $base64Header;
echo $base64Payload;

?>
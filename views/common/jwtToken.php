<?php

// https://jwt.io/ pour faire les test de signature
 
require_once ('../../config/_pass_jwt.php');
require_once ('../../next_src_wip_denis/classes/JWT.php');
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

// On instancie un token
$jwt = new JWT();

$token = $jwt->generate($header, $payload, SECRET, 3600);

echo $token;


?>
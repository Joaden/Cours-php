<?php
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');

// On interdit toutes méthodes différentes de POST
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    http_response_code(405);

    echo json_encode(['message' => 'Méthode non autorisée in authAPI.php code : 405']);

    exit;
}

// On vérifie si on reçoit un token
if(isset($_SERVER['Authorization'])){
    $token = trim($_SERVER['Authorization']);

}elseif(isset($_SERVER['HTTP_AUTHORIZATION'])){
    $token = trim($_SERVER['HTTP_AUTHORIZATION']);

}elseif(function_exists('apache_request_headers')){
    $requestHeaders = apache_request_headers();

    if(isset($requestHeaders['Authorization'])){
        $token = trim($requestHeaders['Authorization']);
    }

}
    
if(!isset($token) || !preg_match('/Bearer_s(\S+)/', $token, $matches)){
    http_response_code(400);

    echo json_encode(['message' => 'Token introuvable in authAPI.php !']);

    exit;
}
// echo $token;

// On extrait le token
$token = str_replace('Bearer ', '', $token);

require_once ('../../config/_pass_jwt.php');
require_once ('../../next_src_wip_denis/classes/JWT.php');

$jwt = new JWT();

// On verifie la validité
if(!$jwt->isValid($token)){
    http_response_code(400);
    echo json_encode(['message' => 'Le Token est invalide !']);
    exit;
}


// On verifie la signature
if(!$jwt->check($token, SECRET)){
    http_response_code(403);
    echo json_encode(['message' => 'Le Token(signature) est invalide !']);
    exit;
}

// On vérifie l'expiration
if(!$jwt->isExpired($token)){
    http_response_code(403);
    echo json_encode(['message' => 'Le Token est expiré !']);
    exit;
}

echo json_encode($jwt->getPayload($token));
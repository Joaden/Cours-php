<?php

// Function Log User Action
function logger($log){
    if(!file_exists('../../log_users.txt')){
        file_put_contents('../../log_users.txt', '');
    }
    $ip = $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set('France/Paris');
    $time = date('m/d/y h:i', time());

    // 1ere solution avec fopen('../../log_users.txt', 'a+')
    $file_a = fopen('../../log_users.txt', 'a+');

    //2 ieme solution avec file_put_contents
    // $contents = file_put_contents('../../log_users.txt');
    // file_put_contents('../../log_users.txt', $contents, "\n", FILE_APPEND);
    
    $contents .= "$ip\t$time\t$log\r";
    fwrite($file_a, $contents);

    fclose($file_a);
}

//r
// Ouvre le fichier en lecture seule. Cela signifie que vous pourrez seulement lire le fichier.

// r+
// Ouvre le fichier en lecture et écriture. Vous pourrez non seulement lire le fichier, mais aussi y écrire (on l'utilisera assez souvent en pratique).

// a
// Ouvre le fichier en écriture seule. Mais il y a un avantage : si le fichier n'existe pas, il est automatiquement créé.

// a+
// Ouvre le fichier en lecture et écriture. Si le fichier n'existe pas, il est créé automatiquement. Attention : le répertoire doit avoir un chmod à 777, dans ce cas ! À noter que si le fichier existe déjà, le texte sera ajouté à la fin.

?>
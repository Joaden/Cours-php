<?php
// convertit en octets
/////////////////////////////////////////////////////////////
function convertBytes( $value ) {
    if ( is_numeric( $value ) ) {
        return $value;
    } else {
        $value_length = strlen($value);
        $qty = substr( $value, 0, $value_length - 1 );
        $unit = strtolower( substr( $value, $value_length - 1 ) );
        switch ( $unit ) {
            case 'k':
                $qty *= 1024;
                break;
            case 'm':
                $qty *= 1048576;
                break;
            case 'g':
                $qty *= 1073741824;
                break;
        }
        return $qty;
    }
}
///////////////////////////////////////////////////////////
function uploadFile($dir_upload, $taille_fichier, $max_width) {
    // definie ds le fichier php.ini
    $taille_max_phpini_init = ini_get('upload_max_filesize');
    $taille_max_phpini = convertBytes($taille_max_phpini_init);


    foreach ($_FILES as $name => $value) {
        $nom_index = $name;
        //var_dump($nom_index);
    }

    ///////////////gestion des erreurs///////////////
    $erreur_upload = $_FILES[$nom_index]['error'];

    switch($erreur_upload) {
        // la taille définit dans php.ini
        case 1:
            $erreur = true;
            $message = 'La taille du fichier doit être inférieur à ';
            $message .= $taille_max_phpini_init.'o';
            break;
        // definit dans la MAX_FILE_SIZE du html
        case 2:
            $erreur = true;
            $message = 'La taille du fichier doit être inférieur à 1M ';
            break;
        // Erreur de chargement
        case 3:
            $erreur = true;
            $message = 'Erreur de téléchargement...';
            break;
        // Aucun fichier chargé
        case 4:
            $erreur = true;
            $message = 'Aucun fichier téléchargé.';
            break;
        // Ok pas d'erreur
        case 0:
            $taille = $_FILES[$nom_index]['size'];
            if($taille > TAILLE_MAX_UPLOAD) {
                $erreur = true;
                $message = 'Votre fichier ne doit pas excéder ';
                $message .= round(TAILLE_MAX_UPLOAD/1024).'Ko';
            }

            ////////////Verification du type de fichier///////////////
            $type_fichier = $_FILES[$nom_index]['type'];
            if(stristr($type_fichier, 'jpg') === false && stristr($type_fichier, 'jpeg') === false ){
                $erreur= true;
                $message = 'Votre photo doit être au format jpg ou jpeg';
            }
            /////////////////////////////////////////////////////////


            /////////////Verification des dimensions : largeur////////////
            /// getimagesize: librairie GD obligatoire
            $dimensions = getimagesize($_FILES[$nom_index]['tmp_name']);
            //var_dump($dimensions);
            // list: assigne les entrée d'un tableau à des variables
            list($width, $height) = getimagesize($_FILES[$nom_index]['tmp_name']);
            //var_dump($width);
            //$max_width = 600;
            if($width > $max_width) {
                $erreur = true;
                $message = 'La largeur de votre photo est trop grande:';
                $message .= $width.'px';
                $message .= '<br>';
                $message .= 'La taille max ne doit pas dépasser';
                $message .= $max_width.'px';
            }




            if(empty($erreur)) {
                $path = '';
                // 1ere utilisation
                if(!file_exists($path.$dir_upload)) {
                    $upload = mkdir($dir_upload.'/', 0777 );
                    if(!$upload) {
                        $erreur = true;
                        $message = 'Dossier non créé';
                    } else {
                        $ok =true;
                    }
                    // si le dossier existe déjà
                } else {
                    $ok = true;
                } // fin file_exist

                ///////////dossier créé/////////
                if($ok) {
                    $uploaddir = $dir_upload.'/';
                    $nom_photo = $_FILES[$nom_index]['name'];
                    // recupère le nom du fichier sans l'extension
                    $nom_photo = basename($nom_photo);
                    //var_dump($nom_photo);
                    // en minuscule
                    $nom_photo = strtolower($nom_photo);
                    // suprimme les espaces (remplace une chaine de caract par une chaine)
                    $nom_photo = str_replace(' ', '', $nom_photo );
                    // URL de la photo
                    $uploadfile = $uploaddir.$nom_photo;
                    // Déplace le fichier temporaire dans le nouveau dossier créé
                    $move = move_uploaded_file($_FILES[$nom_index]['tmp_name'], $uploadfile);
                    // le dossier a été créé et la photo déplacé vers le dossier d'upload
                    if($move) {
                       $GLOBALS['nom_photo'] = $nom_photo;

                    } else {
                        $message = 'Ploblème de téléchargement';
                    }


                } // fin ok


            } // fin empty erreur

    } // fin switch

    return $message;

}
//////////////////////////////////////////////////////

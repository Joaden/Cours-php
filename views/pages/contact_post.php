<?php 

$infosServer = [];
//$infosServer = [$serverName, $serverName, $serverREFERER, $serverHOST, $serverUSER_AGENT, $serverPORT];

// Nom du serveur
$serverName = $_SERVER['SERVER_NAME'];
// L'adresse IP du client
$serverADDR = $_SERVER['REMOTE_ADDR'];
// L'adresse de la page
$serverREFERER = $_SERVER['HTTP_REFERER'];
// Contenu de l'en-tête Host: de la requête courante
$serverHOST = $_SERVER['HTTP_HOST'];
// nom du serveur
$serverUSER_AGENT = $_SERVER['HTTP_USER_AGENT'];
// PORT DU CLIENT
$serverPORT = $_SERVER['REMOTE_PORT'];


$errors = [];


if(!array_key_exists('antibot', $_POST) || $_POST['antibot'] != '')
{
    $errors['antibot'] = "Que faites vous ? :) ";
    header('location: formulaireContact.php');

}

if(!array_key_exists('name', $_POST) || $_POST['name'] == '')
{
    $errors['name'] = "Vous n'avez pas renseigné votre nom";
}

if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
    $errors['email'] = "Vous n'avez pas renseigné votre email";
}

if(!array_key_exists('message', $_POST) || $_POST['message'] == '')
{
    $errors['message'] = "Vous n'avez pas renseigné votre message";
}

if(!array_key_exists('captcha', $_POST) || $_POST['captcha'] == '' || $_POST['captcha']!="20")
{
    $errors['captcha'] = "Vous devez renseigner la bonne réponse ! ";
    header('location: formulairePage.php');
    
}


if(!empty($errors)){
    session_start();
    $_SESSION['errors'] = $errors;
    $_SESSION['inputs'] = $_POST;
}else{
    $_SESSION['success'] = 1;
// Nom du serveur
$serverName = " 
".$_SERVER['SERVER_NAME']." 
";
// L'adresse IP du client
$serverADDR = " 
".$_SERVER['REMOTE_ADDR']." 
";
// L'adresse de la page
$serverREFERER = " 
".$_SERVER['HTTP_REFERER']." 
";
// Contenu de l'en-tête Host: de la requête courante
$serverHOST = " 
".$_SERVER['HTTP_HOST']." 
";
// nom du serveur
$serverUSER_AGENT = " 
".$_SERVER['HTTP_USER_AGENT']." 
";
// PORT DU CLIENT
$serverPORT = " 
".$_SERVER['REMOTE_PORT']." 
";




$infosServer1 = $serverName."
";
$infosServer2 = $serverADDR."
";
$infosServer3 = $serverREFERER."
";
$infosServer4 = $serverHOST."
";
$infosServer5 = $serverUSER_AGENT."
";
$infosServer6 = $serverPORT."
";



    $message = trim($_POST['message']);
    $message = stripslashes($_POST['message']);
    $message = htmlspecialchars($_POST['message']);


    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $sujet = $_POST["sujet"];

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= 'From : '. $_POST['email']."\n";
    $headers .= 'Content-Type: text/html; charset="utf-8"'."\n";
    $headers .= 'Content-Transfer-Encoding: 8bit';

    // $content = "Mail envoyé via le blog a part.
    //             De : ".$_POST["email"]." 
    //             Sujet : ".$sujet."
    //             Mail : ".$email."
    //             Téléphone : ".$phone."
    //             Nom : ".$name."
    //             Message : 
    //             ".$message."
    //             ".$infosServer;
                    
    $content='
    <html>
        <body>
            <div align="center">
                <img src=""/>
                <br />

                <u>Mail envoyé via le formulaire de blog a part.</u>
                <br />
                <u>Nom de l\'expéditeur :  </u>'.$name.'<br />

                <u>Prénom de l\'expéditeur :  </u>'.$lastname.'<br />

                <u>Sujet de l\'expéditeur :  </u>'.$sujet.'<br />

                <u>Email de l\'expéditeur :  </u>'.$email.'<br />

                <u>Téléphone de l\'expéditeur :  </u>'.$phone.'<br />
                
                '.$message.'<br />
                <br />
                <br />
                <u>Infos divers de l\'expéditeur :  </u>'.$infosServer1."<br>".$infosServer2.'<br />
                <br />
                '.$infosServer3."<br>".$infosServer4.'<br />
                <br />
                '.$infosServer5."<br>".$infosServer6.'<br />
                <br />
                <u>Message de l\'expéditeur :  </u>'.nl2br($message).'
                <br />
                <img src=""/>
            </div>
        </body>
    </html>
    ';

    // Envoi du mail avec les donnees
    // mail('no-reply@BDC.fr', 'Blog form contact '. $_POST['name'], $content, $headers);
    echo "Mail envoyé :)";
    // die();
    header('location: home.php');
    }


?>
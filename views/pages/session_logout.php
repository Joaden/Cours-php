<?php 
    session_start();
    
    // Détruit toutes les variables de session
    // $_SESSION = array();

    // Si vous voulez détruire complètement la session, effacez également
    // le cookie de session.
    // Note : cela détruira la session et pas seulement les données de session !
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    /////////////////////////// START foreach log out , the session id should be delete in database
   // if(isset($userInfo['id']) && $userInfo['id'] === $_SESSION['userid']){
    if (isset($_SESSION['userid']) && isset($_SESSION['sessionid'])) {
            
        $pathToRootFolder = "../../";
        require($pathToRootFolder.'config/connect.php');

        $sessionIdUserToDelete = htmlspecialchars($_SESSION['sessionid']);
        $userIdInSessionToDelete = htmlspecialchars($_SESSION['userid']);
        // Je verifie la correspondance de l'enregistrement de l'id dans la BDD
        $reqVerifIfSessionIdExistToDelete = $bdd->prepare('SELECT * FROM sessions WHERE user_id = ?');
        $reqVerifIfSessionIdExistToDelete->execute(array($userIdInSessionToDelete));
        
        var_dump($userIdInSessionToDelete);
        //die('Check Id In SESSION TABLE to DELETE');
        if($reqVerifIfSessionIdExistToDelete->rowcount() > 0)
        {
            $data = $reqVerifIfSessionIdExistToDelete->fetchAll(PDO::FETCH_OBJ);
            // Si je trouve une correspondance je delete les données en BDD
            $reqVerifIfSessionIdExistToDelete = $bdd->prepare('DELETE FROM sessions WHERE user_id = ?');
            $reqVerifIfSessionIdExistToDelete->execute(array($userIdInSessionToDelete));
        
        }
        
        /* L'appel suivant à closeCursor() peut être requis par quelques drivers */
        $reqVerifIfSessionIdExistToDelete->closeCursor();
        // Message Success or Error

    /////////////////////////// END foreach log out , the session id should be delete in database
    }
    //die('DELETE SESSION ECHEC');
    // delete token 
    unset($_SESSION['token']);
    // destruction de tab session
    unset($_SESSION);

    // Finalement, on détruit la session.
    session_destroy();

    header("Location: msg_logout.php");
    //header("Location: home.php");

?>
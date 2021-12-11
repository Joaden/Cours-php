<?php 
if(isset($_SESSION['userid'])){
    if( isset($_GET['token']) && $_GET['token'] != $_SESSION['token']){
        echo('Echec checksessionuser.php => Jeton de sécurité périmé');
        die();
        header("Location: session_logout.php");

    }else{
        ////////////// 1) Controle des infos user
        // intval force le type 
        $getId = intval($_SESSION['id']);
        require_once($pathToRootFolder.'config/connect.php');

        // je prepare la requete 'SELECT' recherche par id 
        $reqUser = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        // execution de la requete $reqUser avec l'id($getId)
        $reqUser->execute(array($getId));
        // $userInfo stock les données du fetch 
        $userInfo = $reqUser->fetch();
        $userInfoId = $userInfo['id'];

        /////////////// 2) Controle de la session 
        if(isset($userInfo['id']) && $userInfo['id'] === $_SESSION['userid']){
        $reqSession = $pdo->prepare(
            'SELECT * FROM sessions ORDER BY id DESC LIMIT 1'
        );
        // execution de la requete $reqUser avec l'id($getId)
        $reqSession->execute();
        // $sessionInfo stock les données du fetch 
        $sessionInfo = $reqSession->fetch();
        //echo 'CheckSessionUser.php => Affichage de $sessionInfo[\'session_id\']';
        //var_dump($sessionInfo['session_id']);

        // $sessionInfo = $reqSession->fetchAll(PDO::FETCH_OBJ);
        $reqSession->closeCursor();
        //die('die vardump sessionInfo du checksessionuser');
        }
        
        // 3) Controle de l'adresse avec http referer
        //echo $_SERVER['HTTP_REFERER'];
    }
    
    


 } 
else {
    //echo('Echec checksessionuser.php => Jeton de sécurité périmé');
    header("Location: session_login.php");
    
}

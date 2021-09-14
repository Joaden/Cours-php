<?php 
if(isset($_SESSION['id']))
{
    // intval force le type 
    $getId = intval($_SESSION['id']);
    // je prepare la requete 'SELECT' recherche par id 
    $reqUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
     // je prepare la requete 'SELECT' recherche par session_id 
    //$reqUser = $bdd->prepare('SELECT * FROM users WHERE session_id = ?');
    // execution de la requete $reqUser avec l'id($getId)
    $reqUser->execute(array($getId));
    // $userInfo stock les données du fetch 
    $userInfo = $reqUser->fetch();
 } 
else {
    
    header("Location: session_login.php");
    
}

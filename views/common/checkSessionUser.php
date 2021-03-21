<?php 
if(isset($_SESSION['id']))
{
    $getId = intval($_SESSION['id']);
    $reqUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $reqUser->execute(array($getId));
    $userInfo = $reqUser->fetch();
 } 
//else {
//     echo "error user in checSessionUSer";
//     // die();
// }

<?php 
    session_start();
    // $_SESSION = array();
    session_destroy();
    header("Location: msg_logout.php");

?>
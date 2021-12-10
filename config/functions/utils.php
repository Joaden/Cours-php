<?php

// redirection à refacto dans toutes les autres fonctions
function redirect(string $url):void {
    header("Location: $url");
    //exit();
}

?>
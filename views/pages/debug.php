<?php
// require_once("variables_project.php");
require_once("../../debug_functions.php");

showInHtml(__DIR__ , "__DIR__");
showInHtml( __FILE__ , "__FILE__");
showInHtml( dirname(__FILE__) , "dirname(__FILE__)");

showInHtml($_SERVER["DOCUMENT_ROOT"] , "DOCUMENT_ROOT");
showInHtml($_SERVER["SERVER_NAME"] , "SERVER_NAME");
showInHtml($_SERVER["SERVER_ADDR"] , "SERVER_ADDR");

showInConsole($_SERVER);
// showInHtml($_SERVER);



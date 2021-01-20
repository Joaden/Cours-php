<?php 
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "BlogPHP - phpinfos";
?>

<h1> PHP INFOS : </h1>

<?php 
    phpinfo(); 



    // FOOTER:
    include($pathToRootFolder."views/common/footer_dev_mode.php");

?>
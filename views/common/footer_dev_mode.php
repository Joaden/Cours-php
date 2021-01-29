<?php 
    // $pathToRootInUrl = ''; // reset
    // $pathToRootInUrl = $_SERVER['SERVER_NAME'].'/Cours-php'; // 'localhost'
    // $pathToRootFolder = "../../";

    require_once($pathToRootFolder."debug_functions.php");
    
    // get an array with list of all pages in '/views/pages/' (so we can the footer_dev_mode will create links dynamically):
        $folderPages_filesAndFolders = scandir($pathToRootFolder."/views/pages/");

        // divide in 2 arrays :  
        $folderPages_files = [];

        $folderPages_folders = [];

        showinConsole($folderPages_filesAndFolders);

    /*
        foreach($folderPages_filesAndFolders as $element)
        {
                        if ( filetype($element) == 'file' && substr($element,-1 , 4) == ".php" )
            if ( filetype($element) == 'file' )
            {
                showInConsole($element." est un fichier php");
                
                                array_push( $folderPages_files , $element);
            }
            elseif ($element != "." && $element != "..")
            {
                showInConsole($element." est un dossier ou autre");

                                array_push( $folderPages_folder , $element);
            }
                                array_push( $folderPages_files , filetype($element));
        }
*/

    
        
?>

<!-- Yes, i Know, the 'style' html tag should not be placed here. But it's just for dev_mode anyway! -->
<!-- <style> -->
    
<!-- </style> -->


<footer class="footer-dev-mode">
    <ul>
        <a href="<?=$pathToRootFolder.'index.php'?>">
            <li>index.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'views/pages/home.php'?>">
            <li>views/pages/home.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'views/pages/article_all.php'?>">
            <li>views/pages/article_all.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'views/pages/debug.php'?>">
            <li>views/pages/debug.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'views/pages/phpinfos.php'?>">
            <li>views/pages/phpinfos.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'views/pages/test/de/chemin/pagetest.php'?>">
            <li>views/pages/test/de/chemin/pagetest.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'debug_functions.php'?>">
            <li>debug_functions.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'variables_project.php'?>">
            <li>variables_project.php</li>
        </a>
    </ul>

    <?php 
        // showInHtml( $folderPages_files);
    ?>

</footer>
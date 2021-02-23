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


<footer class="footer-dev-mode grid-md-2">
    <ul>
        <h4 class="text-danger">in /pages/ </h4>
        <li>
            <a href="<?=$pathToRootFolder.'index.php'?>">index.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages/home.php'?>">views/pages/home.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages/article_all.php'?>">views/pages/article_all.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages/debug.php'?>">views/pages/debug.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages/phpinfos.php'?>">views/pages/phpinfos.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages/test/de/chemin/pagetest.php'?>">views/pages/test/de/chemin/pagetest.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'debug_functions.php'?>">debug_functions.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'variables_project.php'?>">variables_project.php</a>
        </li>
    </ul>

    <ul>
        <h4 class="text-danger">in /pages2/ </h4>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages2/home.php'?>">views/pages2/home.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages2/article_all.php'?>">views/pages2/article_all.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages2/article_read.php'?>">views/pages2/article_read.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages2/session_login.php'?>">views/pages2/session_login.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages2/session_logout.php'?>">views/pages2/session_logout.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages2/session_register.php'?>">views/pages2/session_register.php</a>
        </li>
        <li>
            <a href="<?=$pathToRootFolder.'views/pages2/user_board.php'?>">views/pages2/user_board.php</a>
        </li>
    </ul>

    <?php 
        // showInHtml( $folderPages_files);
    ?>

</footer>
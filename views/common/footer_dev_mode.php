<?php 
    // $pathToRootInUrl = ''; // reset
    // $pathToRootInUrl = $_SERVER['SERVER_NAME'].'/Cours-php'; // 'localhost'
    // $pathToRootFolder = "../../";
?>


<!-- Yes, i Know, the 'style' html tag should not be placed here. But it's just for dev_mode anyway! -->
<style>
    .footer-dev-mode {
        background:black; 
        color:white;
        padding:2rem 1rem;
    }
    .footer-dev-mode a:any-link{
        color:white;
        font-size: 1.2rem;
    }
</style>


<footer class="footer-dev-mode">
    <ul>
        <a href="<?=$pathToRootFolder.'debug_functions.php'?>">
            <li>debug_functions.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'index.php'?>">
            <li>index.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'variables_project.php'?>">
            <li>variables_project.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'views/pages/debug.php'?>">
            <li>views/pages/debug.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'views/pages/home.php'?>">
            <li>views/pages/home.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'views/pages/phpinfos.php'?>">
            <li>views/pages/phpinfos.php</li>
        </a>
        <a href="<?=$pathToRootFolder.'views/pages/test/de/chemin/pagetest.php'?>">
            <li>views/pages/test/de/chemin/pagetest.php</li>
        </a>
    </ul>
</footer>
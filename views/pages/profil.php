<?php
session_start();

$pathToRootFolder = "../../";
$PAGE_TITLE = "Tableau de bord";

require_once($pathToRootFolder.'vendor/autoload.php');

require_once($pathToRootFolder.'config/connect.php');

require_once($pathToRootFolder.'config/functions.php');

if (isset($_GET['id']) and $_GET['id'] > 0) {
    $getId = intval($_GET['id']);
    $reqUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $reqUser->execute(array($getId));
    $userInfo = $reqUser->fetch();
    
}

echo $_SESSION["pseudo"];
?>
<!DOCTYPE html>
<html lang="fr">

    <?php
        include($pathToRootFolder."views/common/head.php");
    ?>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }

        #notes div {
            padding: 5px;
            margin: 5px;
        }
    </style>

<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->

    <h1 class="brand-logo-big"><a href="home.php">BLOG</a></h1>

    <!-- ======== NAVBAR ========= -->
    <?php include($pathToRootFolder."views/common/navbar.php"); ?>



    <div class="container-fluid">
        <div class="container">
            <?php 
                // define a $alertMessage="..message.." if necessary
                include($pathToRootFolder."views/common/alertMessageIfExist.php");
            ?>
            <div class="row">
                <hr>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1><?php echo $PAGE_TITLE ?></h1>
                    <!-- H3 affiche une var de session pour tester si la session fonctionne bien -->
                    <h3>
                        <?php echo $_SESSION["varsessiontest"]; ?>
                        
                    </h3>
                    <?php if(isset($_SESSION['id'])) echo "<div class=\"text-danger\"><a href=\"session-logout.php\">Déconnexion</a></div>";
                            else                       
                                echo "<a href=\"session-login.php\">Connexion</a>"; 
                    ?>
                    <?php
                        if(isset($_SESSION['id']) AND $userInfo['id'] == $_SESSION['id'])
                        {
                            echo $userInfo['pseudo'];
                        }
                        else{
                            echo "User non connecté";
                        }
                     ?>
                </div>
                <div class="col-md-4">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">nombre d'articles rédigés 12</div>
                <div class="col-md-4"></div>
                
                <div class="col-md-4"></div>
                <div class="col-md-4">nombre de likes reçus 120</div>
                <div class="col-md-4"></div>

                <div class="col-md-4"></div>
                <div class="col-md-4">nombre de warning Admin 1</div>
                <div class="col-md-4"></div>
            </div>

            <hr><br><hr>

            <div class="row">
                <hr>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>Mes articles</h1>
                </div>
                <div class="col-md-4"></div>
            </div>

            <hr>

            <div class="row">
                <hr>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>Mes notes</h1>
                </div>
                <div class="col-md-4"></div>
            </div>


            
            <?php
            #if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
            ?>
                <a href="editProfil.php?id=<?php $_SESSION['id']; ?>">Editer mon profil</a><br>
                <a href="session_logout.php">Se déconnecter</a>
            <?php
            #}
            ?>
       
        </div>
        <br>
        <hr><br>


    </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- FOOTER -->
    <?php include($pathToRootFolder."views/common/footer.php");?>
    <?php include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    
</body>

</html>
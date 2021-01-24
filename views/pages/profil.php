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
            <div class="row">
                <hr>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1><?php echo $PAGE_TITLE ?></h1>
                    <!-- H3 affiche une var de session pour tester si la session fonctionne bien -->
                    <h3>
                        <?php echo $_SESSION["varsessiontest"]; ?>
                    </h3>
                    <?php if(isset($_SESSION['id'])) echo "<a href=\"session-logout.php\">Déconnexion</a>";
                            else                       
                                echo "<a href=\"session-login.php\">Connexion</a>"; 
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


            <h1>Profil de <?php echo $userInfo['name']; ?>****</h1>

            <hr><br><hr>
            <div>
                Pseudo = <?php echo $userInfo['pseudo']; ?>. <br>
                Email = <?php echo $userInfo['email']; ?>. <br>
                Adresse mail confirmée = <?php echo $userInfo['is_verified']; ?>. <br>
                <!--  -->
            </div>
            <?php
            if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
            ?>
                <a href="editProfil.php?id=<?php $_SESSION['id']; ?>">Editer mon profil</a><br>
                <a href="logout.php">Se déconnecter</a>
            <?php
            }
            ?>
            <main>
                <!-- Code here the main content -->
                <button data-target="example-sidenav" class="btn rounded-1 press amaranth dark-1 sidenav-trigger hide-md-up">
                    Open sidenav
                </button>
            </main>
            
        </div>

        <hr><br>

        <div id="notes" class="container shadow-1 rounded-2 bd-solid bd-3">
            <button id="myNotes" class="btn btn-success rounded-1 press">Mes Notes</button> Intégrer le crud de la class notes, button green hide/show notes.
            <div class="notes">
                <div id="notes-div" class="grix xs1 sm2 ">
                    <div class="grix xs3 shadow-1 rounded-2 bd-blue bd-solid bd-3 ">
                        <div class="col-xs3 ">
                            <button class="btn btn-primary rounded-2 press">Add Notes</button> | <button class="btn btn-danger rounded-2 press">Supp Notes</button>
                        </div>
                        <div>box 2</div>
                        <div>box 3</div>
                        <div>box 4</div>
                    </div>
                    <div class="grix xs3 shadow-1 rounded-2 bd-blue bd-solid bd-3">
                        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis at, dolore itaque quisquam dolorem rem distinctio eaque! Excepturi, quasi placeat, assumenda deserunt maiores odio id recusandae, aut modi odit enim.</div>
                        <div>box 2</div>
                        <div>box 3</div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr><br>

        <?php

        // $bdd = new PDO('mysql:host=localhost;dbname=cours_denis;charset=utf8', $db_login, $db_password);

        // '(B) ->prepare est utilisé quand on ne connait pas la valeur
        // '(A) ->query est utilisé quand on sait ce que l'on veut récupérer
        // $req = $bdd->query('SELECT * FROM users_infos');

        // $req1 = $bdd->query('SELECT * FROM espèces');

        // $req2 = $bdd->query('SELECT * FROM users WHERE is_verified = 1 ');

        // while($reqUserData = $req1->fetch())
        // {
        //   echo "Nom : "  . $reqUserData['name'] . ". Email : "  . $reqUserData['email'] . "<br/> Caractéristique : " ;

        // }

        // while ($reqUserData = $req2->fetch()) {
        //     echo "Nom : "  . $reqUserData['name'] . ". Email : "  . $reqUserData['email'] . "Vérifié : oui <br/> ";
        // }

        // while ($resultat = $req->fetch()) {
        //     echo $resultat['users_id'] . ". date d'anniversaire le : " . $resultat['birth'] . " inscrit le : " . $resultat['date_inscription'] . " tel : " . $resultat['phone'] . "<br/>";
        // }


        ?>

    </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- FOOTER -->
    <?php include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    <script>
        $(document).ready(function() {
            $("#myNotes").click(function() {
                $(".notes").fadeToggle("2000");
            });
        });


        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "getuser.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>
</body>

</html>
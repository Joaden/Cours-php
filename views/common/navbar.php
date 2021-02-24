<nav class="navbar navbar-expand-md navbar-dark bg-dominante d-flex justify-content-end justify-content-md-between sticky-top">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            
            <!--<li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>-->
                
            <li class="nav-item d-flex align-items-center active">
                <a class="nav-link text-center" href="article_all.php">
                    <!-- <i class="fas fa-sticky-note"></i> -->
                    Articles
                </a>
            </li>
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link text-center" href="team/portfolioDenis/Portfolio2k20Prod/index.php" target="_blank" data-type="external" rel="nofollow">
                    <!-- <i class="fas fa-user"></i> -->
                    L'équipe
                </a>
            </li>
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link text-center" href="contact.php">
                    <!-- <i class="fas fa-envelope"></i> -->
                    Contact
                </a>
            </li>

            <li class="nav-item d-flex align-items-center">
                <a class="nav-link text-center" href="?theme=clair">Clair</a>
            </li>
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link text-center" href="?theme=sombre">Sombre</a>
            </li>

        </ul>

        <!--
            <form class="form-inline my-2 my-md-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            -->

        <div class="container-fluid d-flex flex-column justify-content-center flex-md-row justify-content-md-end">
        <?php # if(isset($_SESSION['id'])) echo $_SESSION["pseudo"]; ?>
            <!-- <div>  </div> -->

        <?php
            /*
            if(isset($_SESSION['id'])) 
                echo (
                    '<button class="btn bg-white mb-1 mb-md-0 mr-md-3 p-0 text-dominante">
                        <div class=""></div>
                        <a class="nav-link text-center" href="session_logout.php">Déconnection</a>
                    </button>'
                    );
            else
                 echo (
                    '<button class="btn bg-white mb-1 mb-md-0 mr-md-3 p-0 text-dominante">
                        <a class="nav-link text-center" href="session_register.php">Inscription</a>
                    </button>
                    <button class="btn btn-outline-light p-0">
                        <a class="nav-link text-center" href="session_login.php">Connexion</a>
                    </button>'
                );
            */

            // FOR NOW ACTIVATE THE PART YOU WANT TO SEE :
                // if not connected :
                    // include($pathToRootFolder."views/common/navbar_part_notConnected.php");
                // if connected :
                    include($pathToRootFolder."views/common/navbar_part_profil.php");
                
        ?>
        </div>
    </div>
</nav>
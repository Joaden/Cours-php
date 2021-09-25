<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbar_profil_Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="d-flex flex-column text-white">
                <p class="h4 mb-0">
                    <?php 
                        if (isset($_SESSION['userid']) and $userInfo['id'] == $_SESSION['userid']) {
                        $varsessionid = htmlspecialchars($_SESSION['userid']);
                        echo $userInfo['pseudo'];
                        }  
                    ?>
                </p>
                <small>[statut: Writer]</small>
            </div>
        </a>
        <div class="dropdown-menu dropdownProfil" aria-labelledby="navbar_profil_Dropdown">
            <a class="dropdown-item" href="profil.php">Profil</a>
            <a class="dropdown-item" href="article_gestion.php">Mes articles</a>
            <a class="dropdown-item" href="parameters.php">Paramètres</a>
            <a class="dropdown-item" href="user_board.php">Tableau de bords</a>
            <!-- <div class="dropdown-divider"></div> -->
            <a class="dropdown-item" href="session_logout.php">Déconnexion <i class="fas fa-sign-out-alt"></i></a>
        </div>
    </li>
</ul>

<?php 
    if (isset($_SESSION['userid']) and $userInfo['id'] == $_SESSION['userid']) {
        $varsessionid = $_SESSION['userid'];
        if(!empty($userInfo['avatar']))
        {
        ?>
            <img class="ml-1 avatar-img--small" src="../../assets/photos/<?php echo "avatars/".$userInfo['avatar']; ?>" alt="avatar">
        <?php 
        } else {
        ?>
            <img class="ml-1 avatar-img--small" src="https://source.unsplash.com/Y7C7F26fzZM/300x300" alt="photo de l'auteur">
        <?php
        }

    }  
    ?>


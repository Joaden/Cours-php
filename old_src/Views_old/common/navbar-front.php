<header>
    <?php
    if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
    ?>
        <nav class="navbar shadow-1 primary">
            <a href="#" target="_blank" class="navbar-brand">Blog Php
                <?php
                echo $userInfo['pseudo'];
                ?>
            </a>
            <div class="navbar-menu ml-auto">
                <a class="navbar-link" href="index.php">Accueil</a>
                <a class="navbar-link" href="articles.php"><i class="fas fa-sticky-note"></i> Articles</a>
                <a class="navbar-link" href="profil.php"><i class="fas fa-user"></i> Profil</a>
                <a class="navbar-link" href="contact.php"><i class="fas fa-user"></i> Contact</a>
                <a class="navbar-link" href="formulaireContact.php"><i class="fas fa-envelope"></i> Formulaire</a>
                <a class="navbar-link" href="src/Admin/indexAdmin.php"><i class="fas fa-user"></i> Administration</a>
                <a class="navbar-link" href="connexion.php"><i class="fas fa-sign-in-alt"></i> sign in</a>
                <a class="navbar-link" href="register.php"><i class="fas fa-sign-in-alt"></i> sign up</a>
            </div>
        </nav>
</header>

<div id="example-sidenav" data-ax="sidenav" class="sidenav shadow-1 large fixed white">
    <div class="sidenav-header">
        <button data-target="example-sidenav" class="sidenav-trigger"><i class="fas fa-times"></i></button>
        <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (2).jpg" alt="Logo" />
    </div>
    <a href="profil.php" class="sidenav-link">
        <?php
        // if(isset($_SESSION['id']) AND $userInfo['id'] == $_SESSION['id'])
        //   {
        echo $userInfo['pseudo'];
        //     }
        //     else{
        //       echo "User non connecté";
        //     }
        // 
        ?>
    </a>
    <a href="index.php" class="sidenav-link active">Accueil</a>
    <a href="articles.php" class="sidenav-link"><i class="fas fa-sticky-note"></i> Articles</a>
    <a href="profil.php" class="sidenav-link"><i class="fas fa-user"></i> Profil</a>
    <a href="contact.php" class="sidenav-link"><i class="fas fa-user"></i> Contact</a>
    <a href="formulaireContact.php" class="sidenav-link"><i class="fas fa-envelope"></i> Formulaire</a>
    <a href="indexAdmin.php" class="sidenav-link"><i class="fas fa-user"></i> Administration</a>
    <a href="register.php" class="sidenav-link"><i class="fas fa-sign-in-alt"></i> Inscription</a>
    <a href="connexion.php" class="sidenav-link"><i class="fas fa-sign-in-alt"></i> Connexion</a>

    <div>
        <hr><br>
    </div>
    
    <button class="btn shadow-1 btn-dark rounded-4">Mode dark</button>
    <div><br></div>
    <button class="btn shadow-1 rounded-4">Mode light </button>
</div>
<?php
        // if(isset($_SESSION['id']) AND $userInfo['id'] == $_SESSION['id'])
        //   {

    } else {
?>
    <nav class="navbar shadow-1 primary">
        <a href="#" target="_blank" class="navbar-brand">Blog Php </a>
        <div class="navbar-menu ml-auto">
            <a class="navbar-link" href="index.php">Accueil</a>
            <a class="navbar-link" href="articles.php"><i class="fas fa-sticky-note"></i> Articles</a>
            <a class="navbar-link" href="contact.php"><i class="fas fa-user"></i> Contact</a>
            <a class="navbar-link" href="formulaireContact.php"><i class="fas fa-envelope"></i> Formulaire</a>
            <a class="navbar-link" href="connexion.php"><i class="fas fa-sign-in-alt"></i> sign in</a>
            <a class="navbar-link" href="register.php"><i class="fas fa-sign-in-alt"></i> sign up</a>
        </div>
    </nav>
    </header>

    <div id="example-sidenav" data-ax="sidenav" class="sidenav shadow-1 large fixed white">
        <div class="sidenav-header">
            <button data-target="example-sidenav" class="sidenav-trigger"><i class="fas fa-times"></i></button>
            <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (2).jpg" alt="Logo" />
        </div>
        <a href="profil.php" class="sidenav-link">
            <?php
            if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
                echo $userInfo['pseudo'];
            } else {
                echo "User non connecté";
            }
            // 
            ?>
        </a>
        <a href="index.php" class="sidenav-link active">Accueil</a>
        <a href="articles.php" class="sidenav-link"><i class="fas fa-sticky-note"></i> Articles</a>
        <a href="contact.php" class="sidenav-link"><i class="fas fa-user"></i> Contact</a>
        <a href="formulaireContact.php" class="sidenav-link"><i class="fas fa-envelope"></i> Formulaire</a>
        <a href="register.php" class="sidenav-link"><i class="fas fa-sign-in-alt"></i> Inscription</a>
        <a href="connexion.php" class="sidenav-link"><i class="fas fa-sign-in-alt"></i> Connexion</a>
        <div>
        </div>

        <div>
            <hr><br></div>
        <button class="btn shadow-1 btn-dark rounded-4">Mode dark</button>
        <div><br></div>
        <button class="btn shadow-1 rounded-4">Mode light </button>
    </div>

<?php
    }
    // 
?>
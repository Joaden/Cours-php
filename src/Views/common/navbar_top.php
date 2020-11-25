<nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between">
    <?php if (isset($_SESSION['id']) && $userInfo['id']== $_SESSION['id'] ): ?>
        <span class="navbar-text text-primary flex-grow-1 justify-content-md-start w-md-100">Abonné</span>
    <?php else: ?>
        <span class="navbar-text text-white flex-grow-1 justify-content-md-start w-md-100">non-inscrit</span>
    <?php endif; ?>

    <a class="navbar-brand mr-0 flex-grow-1 text-md-center w-md-100" href="#">Blog PHP</a>

    <button class="navbar-toggler border-primary" type="button" data-toggle="collapse" data-target="#navbar_top" aria-controls="navbar_top" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse flex-grow-1 justify-content-md-end w-md-100" id="navbar_top">
        <!-- 
        <form class="form my-2 my-md-0 d-flex flex-column flex-sm-row">
            <button class="btn btn-outline-danger flex-grow-1 mb-2 mb-sm-0  mr-sm-2" type="button">Register</button>
            <button class="btn btn-outline-primary flex-grow-1" type="button">Sign In</button>
        </form>
         -->
        <form class="form my-2 my-md-0 d-flex flex-column flex-sm-row">
            <a class="btn btn-outline-danger flex-grow-1 mb-2 mb-sm-0  mr-sm-2" href="connexion.php">Register</a>
            <a class="btn btn-outline-primary flex-grow-1" href="register.php">Sign In</a>
        </form>
    </div>
</nav>
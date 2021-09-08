<ul class="sidebar">
    <?php
        if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
            $varsessionid = $_SESSION['id'];
            if(!empty($userInfo['roles_id']) and $userInfo['roles_id'] == 1)
            {
            ?>
                <li class="sidebar-item--status">
                    <a class="sidebar-link " href="admin_board.php">
                        DashBoard Admin
                    </a>
                </li>
            <?php 
            } 
        } 
    ?>
    
    <li class="sidebar-item--status">
        <a class="sidebar-link " href="#">
            Statut Abonné
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="article_gestion.php">
            Gérer mes articles
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="article_write.php">
            Écrire un article
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="#">
            <?php echo $_SESSION["varsessionuserboard"]; ?>
        </a>
    </li>
</ul>
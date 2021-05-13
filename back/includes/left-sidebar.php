<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">


            <a class="nav-link collapsed pt-4 " href="index.php">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                Tableau de bord

            </a>
            <a class="nav-link collapsed pt-4 " href="users.php">
                <div class="nav-link-icon"><i data-feather="users"></i></div>
                utilisateurs
            </a>
            <a class="nav-link collapsed pt-4" href="messages.php">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                Messages
            </a>
            <a class="nav-link collapsed pt-4" href="profile.php">
                <div class="nav-link-icon"><i data-feather="user"></i></div>
                Profile
            </a>
            <a class="nav-link collapsed pt-4 " href="Restaurant.php">
                <div class="nav-link-icon"><i data-feather="home"></i></div>
                Restaurants
            </a>
            <a class="nav-link collapsed pt-4 " href="Menu.php">
                <div class="nav-link-icon"><i data-feather="book"></i></div>
                Menu
            </a>
            <a class="nav-link collapsed pt-4 " href="NewsLetter.php">
                <div class="nav-link-icon"><i data-feather="send"></i></div>
                NewsLetter
            </a>
            <a class="nav-link collapsed pt-4 " href="Evenement.php">
                <div class="nav-link-icon"><i data-feather="calendar"></i></div>
                Evenements
            </a>
            <a class="nav-link collapsed pt-4 " href="Participant.php">
                <div class="nav-link-icon"><i data-feather="smile"></i></div>
                Participants
            </a>
            <a class="nav-link collapsed pt-4 " href="Formateur.php">
                <div class="nav-link-icon"><i data-feather="users"></i></div>
                Formateurs
            </a>
            <a class="nav-link collapsed pt-4 " href="Cours.php">
                <div class="nav-link-icon"><i data-feather="book-open"></i></div>
                Cours
            </a>
            <a class="nav-link collapsed pt-4 " href="Livraison.php">
                <div class="nav-link-icon"><i data-feather="shopping-bag"></i></div>
                Livraison
            </a>
            <a class="nav-link collapsed pt-4 " href="Commandes.php">
                <div class="nav-link-icon"><i data-feather="shopping-cart"></i></div>
                Commandes
            </a>
            <a class="nav-link collapsed pt-4 " href="Recette.php">
                <div class="nav-link-icon"><i data-feather="book-open"></i></div>
                Recettes
            </a>
            <a class="nav-link collapsed pt-4 " href="Chefs.php">
                <div class="nav-link-icon"><i data-feather="star"></i></div>
                Chefs
            </a>

        </div>
    </div>




    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <?php
            if (isset($_COOKIE['_uid_'])) {
                $user_id = base64_decode($_COOKIE['_uid_']);
            } else if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            } else {
                $user_id = -1;
            }
            $sql = "SELECT * FROM users WHERE user_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':id' => $user_id
            ]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_name = $user['user_name'];
            ?>
            <div class="sidenav-footer-title"><?php echo $user_name; ?></div>
        </div>
    </div>



</nav>
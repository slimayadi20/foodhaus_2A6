<?php require_once('./includes/header.php'); ?>

    <body class="nav-fixed">
<?php require_once('./includes/top-navbar.php'); ?>


    <!--Side Nav-->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php
        $curr_page = basename(__FILE__);
        require_once("./includes/left-sidebar.php");
        ?>
    </div>


    <div id="layoutSidenav_content">
        <main>
            <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                <div class="container-fluid">
                    <div class="page-header-content">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                            <span>mise a jour Menu</span>
                        </h1>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_POST['update'])) {
                $idMenu = $_POST['idMenu'];
                $id = $_POST['id'];
                $nom = $_POST['nom'];
                $entrees = $_POST['entrees'];
                $platsPrincipal = $_POST['platsPrincipal'];
                $dessert = $_POST['dessert'];
                $Boisson = $_POST['Boisson'];
                $prix = $_POST['prix'];

                $sql = "UPDATE menu SET id='$id',nom='$nom',entrees='$entrees',platsPrincipal='$platsPrincipal',dessert='$dessert' ,Boisson='$Boisson',prix='$prix' WHERE idMenu='$idMenu' ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nom' => $nom,
                    ':entrees' => $entrees,
                    ':platsPrincipal' => $platsPrincipal,
                    ':dessert' => $dessert,
                    ':prix' => $prix,
                    ':Boisson' => $Boisson,
                    ':id' => $id,
                    ':idMenu' => $_GET['idMenu']
                ]);
                header("Location: Menu.php");
            }


            ?>
            <?php
            if (isset($_POST['edit-user'])) {
                $idMenu = $_POST['idMenu'];
                $url = "http://localhost/foodhaus/backend/update-menu.php?idMenu=" . $idMenu;
                header("Location: {$url}");
            }

            ?>
            <?php
            if (isset($_GET['idMenu'])) {
                $idMenu = $_GET['idMenu'];
                $sql = "SELECT * FROM menu WHERE idMenu = :idMenu";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':idMenu' => $idMenu]);
                $restaurant = $stmt->fetch(PDO::FETCH_ASSOC);
                $id = $restaurant['id'];
                $nom = $restaurant['nom'];
                $entrees = $restaurant['entrees'];
                $platsPrincipal = $restaurant['platsPrincipal'];
                $dessert = $restaurant['dessert'];
                $Boisson = $restaurant['Boisson'];
                $prix = $restaurant['prix'];
                $idMenu = $restaurant['idMenu'];

            }
            ?>

            <!--Start Table-->
            <div class="container-fluid mt-n10">
                <div class="card mb-4">
                    <div class="card-header">Edit restaurant</div>
                    <div class="card-body">
                        <form action="update-menu.php?idMenu=<?php echo $_GET['idMenu']; ?>" method="POST" encentrees="multipart/form-data">

                            <div class="form-group">
                                <label for="id ">menu id</label>
                                <input value="<?php echo $idMenu; ?>" name="idMenu" class="form-control" id="id restaurant" entrees="text" placeholder="restaurant id..." />
                            </div>
                            <div class="form-group">
                                <label for="nom ">id restaurant</label>
                                <input value="<?php echo $id; ?>" name="id" class="form-control" id="nom restaurant" entrees="text" placeholder="Enter nom..." />
                            </div>
                            <div class="form-group">
                                <label for="entrees">nom menu:</label>
                                <input value="<?php echo $nom; ?>" name="nom" class="form-control" id="restaurant-entrees" entrees="text" placeholder="restaurant- ype..." />
                            </div>
                            <div class="form-group">
                                <label for="contact">entrees:</label>
                                <input value="<?php echo $entrees; ?>" name="entrees" class="form-control" id="contact" entrees="text" placeholder="contact..." />
                            </div>
                            <div class="form-group">
                                <label for="email">plats principals:</label>
                                <input value="<?php echo $platsPrincipal; ?>" name="platsPrincipal" class="form-control" id="restaurant-email" entrees="text" placeholder="restaurant email..." />
                            </div>
                            <div class="form-group">
                                <label for="nom">dessert:</label>
                                <input value="<?php echo $dessert; ?>" name="dessert" class="form-control" id="restaurant-nom" entrees="text" placeholder="restaurant nom..." />
                            </div>
                            <div class="form-group">
                                <label for="entrees">boisson:</label>
                                <input value="<?php echo $Boisson; ?>" name="Boisson" class="form-control" id="restaurant-entrees" entrees="text" placeholder="restaurant- ype..." />
                            </div>
                         
                            <div class="form-group">
                                <label for="entrees">prix:</label>
                                <input value="<?php echo $prix; ?>" name="prix" class="form-control" id="restaurant-entrees" entrees="text" placeholder="restaurant- ype..." />
                            </div>
                         
                           
                    </div>
                    <button name="update" class="btn btn-primary mr-2 my-1" entrees="submit">Update now!</button>
                    </form>
                </div>
            </div>
    </div>
    <!--End Table-->
    </main>

<?php require_once('./includes/footer.php'); ?>
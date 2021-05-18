<script>
    function numb(inputtxt) {
        var numbers = /^[-+]?[0-9]+$/;
        if (inputtxt.value.match(numbers)) {
            return true;
        } else {
            alert('Prière de saisir uniquement des nombres');
            return false;
        }
    }

    function lett(inputtxt) {
        var letters = /^[A-Za-z\s]+$/;
        if (inputtxt.value.match(letters)) {
            return true;
        } else {
            alert('Prière de saisir uniquement des lettres');
            return false;
        }
    }
</script>
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
                                <span>Create New Menu</span>
                            </h1>
                        </div>
                    </div>
                </div>







                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Create New Menu</div>
                        <div class="card-body">

                            <?php
                            if (isset($_POST['create'])) {

                                $id = $_POST['id'];
                                $idMenu = $_POST['idMenu'];
                                $nom = $_POST['nom'];
                                $entrees = $_POST['entrees'];
                                $platsPrincipal = $_POST['platsPrincipal'];
                                $dessert = $_POST['dessert'];
                                $Boisson = $_POST['Boisson'];
                                $prix = $_POST['prix'];

                                $image = $_FILES['image']['name'];

                                $user_photo_temp = $_FILES['image']['tmp_name'];
                                move_uploaded_file("{$image}", "./assests/img/{$user_photo_temp}");

                                $sql = "INSERT INTO menu (idMenu,id,nom,entrees,platsPrincipal,dessert,Boisson,prix,image) values (:idMenu, :id,:nom,:entrees,:platsPrincipal,:dessert,:Boisson,:prix,:image) ";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':nom' => $nom,
                                    ':entrees' => $entrees,
                                    ':platsPrincipal' => $platsPrincipal,
                                    ':dessert' => $dessert,
                                    ':Boisson' => $Boisson,
                                    ':prix' => $prix,
                                    ':idMenu' => $idMenu,
                                    ':id' => $id,
                                    ':image' => $image
                                ]);

                                header("Location: Menu.php");
                            }

                            ?>
                            <form action="add-new-Menu.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="id">menu id:</label>
                                    <input name="idMenu" class="form-control" id="id" type="text" placeholder="menu id" />
                                </div>

                                <label> nom du menu: </label>
                                <?php
                                $mysqli = new MySQLi('localhost', 'root', '', 'evenement');
                                $resultSet = $mysqli->query("SELECT id, nom FROM restaurant");
                                ?>
                                <select name="id">
                                    <?php
                                    while ($rows = $resultSet->fetch_assoc()) {
                                        $id = $rows['id'];
                                        $nom = $rows['nom'];
                                        echo "<option value='$id'/'$nom'>$id $nom </option>";
                                    }
                                    ?>
                                </select> </br>

                                <div class="form-group">
                                    <label for="nomf">nom</label>
                                    <input name="nom" class="form-control" id="nomf" onblur="lett(this)" type="text" placeholder="nom." />
                                </div>
                                <div class="form-group">
                                    <label for="lieu">entrees</label>
                                    <input name="entrees" class="form-control" id="lieu" type="text" placeholder="entrees" />
                                </div>
                                <div class="form-group">
                                    <label for="date">platsPrincipal:</label>
                                    <input name="platsPrincipal" class="form-control" id="date" type="text" placeholder="plats..." />
                                </div>
                                <div class="form-group">
                                    <label for="date">dessert:</label>
                                    <input name="dessert" class="form-control" id="date" type="text" placeholder="dessert..." />
                                </div>
                                <div class="form-group">
                                    <label for="date">Boisson:</label>
                                    <input name="Boisson" class="form-control" id="date" type="text" placeholder="boisson..." />
                                </div>
                                <div class="form-group">
                                    <label for="date">image:</label>
                                    <input name="image" class="form-control" type="file" placeholder="image..." />
                                </div>


                                <div class="form-group">
                                    <label for="prix"> prix:</label>
                                    <input name="prix" class="form-control" id="prix" onblur="numb(this)" type="text" placeholder="cours prix..." />
                                </div>
                                <button name="create" class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>
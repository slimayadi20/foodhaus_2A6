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
                            <span>mise a jour restaurant</span>
                        </h1>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $nom = $_POST['nom'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $adresse = $_POST['adresse'];
                $type = $_POST['type'];
                $description = $_POST['description'];
                $image = $_POST['image'];

                $sql = "UPDATE restaurant SET nom='$nom',contact='$contact',email='$email',adresse='$adresse',type='$type',description='$description',image='$image' WHERE id='$id' ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nom' => $nom,
                    ':contact' => $contact,
                    ':email' => $email,
                    ':adresse' => $adresse,
                    ':type' => $type,
                    ':description' => $description,
                    ':image' => $image,

                    ':id' => $_GET['id']
                ]);
                header("Location: restaurant.php");
            }


            ?>
            <?php
            if (isset($_POST['edit-user'])) {
                $id = $_POST['id'];
                $url = "http://localhost/backend/maj-restaurant.php?id=" . $id;
                header("Location: {$url}");
            }

            ?>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM restaurant WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':id' => $id]);
                $restaurant = $stmt->fetch(PDO::FETCH_ASSOC);
                $id = $restaurant['id'];
                $nom = $restaurant['nom'];
                $contact = $restaurant['contact'];
                $email = $restaurant['email'];
                $adresse = $restaurant['adresse'];
                $type = $restaurant['type'];
                $description = $restaurant['description'];
                $image = $restaurant['image'];
            }
            ?>

            <!--Start Table-->
            <div class="container-fluid mt-n10">
                <div class="card mb-4">
                    <div class="card-header">Edit restaurant</div>
                    <div class="card-body">
                        <form action="maj-restaurant.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="id ">restaurant id</label>
                                <input value="<?php echo $id; ?>" name="id" class="form-control" id="id restaurant" type="text" placeholder="restaurant id..." />
                            </div>
                            <div class="form-group">
                                <label for="nom ">nom restaurant</label>
                                <input value="<?php echo $nom; ?>" name="nom" class="form-control" id="nom restaurant" type="text" placeholder="Enter nom..." />
                            </div>
                            <div class="form-group">
                                <label for="contact">contact restaurant:</label>
                                <input value="<?php echo $contact; ?>" name="contact" class="form-control" id="contact" type="text" placeholder="contact..." />
                            </div>
                            <div class="form-group">
                                <label for="email">restaurant email:</label>
                                <input value="<?php echo $email; ?>" name="email" class="form-control" id="restaurant-email" type="text" placeholder="restaurant email..." />
                            </div>
                            <div class="form-group">
                                <label for="adresse">restaurant adresse:</label>
                                <input value="<?php echo $adresse; ?>" name="adresse" class="form-control" id="restaurant-adresse" type="text" placeholder="restaurant adresse..." />
                            </div>
                            <div class="form-group">
                                <label for="type">restaurant type:</label>
                                <input value="<?php echo $type; ?>" name="type" class="form-control" id="restaurant-type" type="text" placeholder="restaurant- ype..." />
                            </div>
                            <div class="form-group">
                                <label for="description">restaurant description:</label>
                                <input value="<?php echo $description; ?>" name="description" class="form-control" id="description" type="text" placeholder="description restaurant..." />
                            </div>
                            <div class="form-group">
                                <label for="image">restaurant image:</label>
                                <input value="<?php echo $image; ?>" name="image" class="form-control" id="restaurant-email" type="text" placeholder="restaurant image..." />
                            </div>
                           
                    </div>
                    <button name="update" class="btn btn-primary mr-2 my-1" type="submit">Update now!</button>
                    </form>
                </div>
            </div>
    </div>
    <!--End Table-->
    </main>

<?php require_once('./includes/footer.php'); ?>
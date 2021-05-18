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
                                <span>Updating chef </span>
                            </h1>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_POST['update'])) {
                    $id = $_POST['id'];
                    $img_chef = $_POST['img_chef'];
                    $chef_name = $_POST['chef_name'];
                    $chef_description = $_POST['chef_description'];
                    $link_vid = $_POST['link_vid'];
                    $img_video_chef = $_POST['img_video_chef'];
                    $plat1 = $_POST['plat1'];
                    $plat2 = $_POST['plat2'];
                    $citation = $_POST['citation'];
                    $Plat_image1 = $_POST['Plat_image1'];
                    $Plat_image2 = $_POST['Plat_image2'];

                    $sql =  "UPDATE chefs SET img_chef='$img_chef',nom='$chef_name',descriptions='$chef_description',lien_video_chef='$link_vid',
                    img_video_chef='$img_video_chef',nom_plat1_chef='$plat1',nom_plat2_chef='$plat2',citation_chef='$citation',img_plat1_chef='$Plat_image1'
                    ,img_plat2_chef='$Plat_image2' WHERE id_chef='$id' ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();

                    header("Location: chefs.php");
                }


                ?>
                <?php
                if (isset($_POST['edit-chef'])) {
                    $id_chef = $_POST['id_chef'];
                    $url = "http://localhost/foodhaus/backend/update-chef.php?id_chef=" . $id_chef;
                    header("Location: {$url}");
                }

                ?>
                <?php
                if (isset($_GET['id'])) {
                    $id_chef = $_GET['id'];
                    $sql = "SELECT * FROM chefs WHERE id_chef = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':id' => $id_chef]);
                    $chef = $stmt->fetch(PDO::FETCH_ASSOC);

                    $id_chef = $chef['id_chef'];
                    $img_chef = $chef['img_chef'];
                    $chef_name = $chef['nom'];
                    $chef_description = $chef['descriptions'];
                    $link_vid = $chef['lien_video_chef'];
                    $img_video_chef = $chef['img_video_chef'];
                    $plat1 = $chef['nom_plat1_chef'];
                    $plat2 = $chef['nom_plat2_chef'];
                    $citation = $chef['citation_chef'];
                    $Plat_image1 = $chef['img_plat1_chef'];
                    $Plat_image2 = $chef['img_plat2_chef'];
                }
                ?>

                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Create New chef</div>
                        <div class="card-body">
                            <form action="update-chef.php" method="POST" enctype="multipart/form-data">

                                <input value="<?php echo $id_chef; ?>" name="id" class="form-control" id="cours-name" type="hidden" />

                                <div class="form-group">
                                    <label for="cours-name">chef name:</label>
                                    <input value="<?php echo $chef_name; ?>" name="chef_name" class="form-control" id="cours-name" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>chef image:</label>
                                    <input value="<?php echo $img_chef; ?>" name="img_chef" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>chef description:</label>
                                    <input value="<?php echo $chef_description; ?>" name="chef_description" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>link vid :</label>
                                    <input value="<?php echo $link_vid; ?>" name="link_vid" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>vid img:</label>
                                    <input value="<?php echo $img_video_chef; ?>" name="img_video_chef" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label> plat1 :</label>
                                    <input value="<?php echo $plat1; ?>" name="plat1" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>Plat image1:</label>
                                    <input value="<?php echo $Plat_image1; ?>" name="Plat_image1" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>plat2:</label>
                                    <input value="<?php echo $plat2; ?>" name="plat2" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>Plat image2:</label>
                                    <input value="<?php echo $Plat_image2; ?>" name="Plat_image2" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>citation :</label>
                                    <input value="<?php echo $chef_name; ?>" name="citation" class="form-control" type="text" />
                                </div>




                                <button name="update" class="btn btn-primary mr-2 my-1" type="submit">update </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>
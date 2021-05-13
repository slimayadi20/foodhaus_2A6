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
                                <span>Create New chef</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_POST['create'])) {


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


                    $sql =  "INSERT INTO chefs (img_chef,nom,descriptions,lien_video_chef,img_video_chef,nom_plat1_chef,nom_plat2_chef,citation_chef,img_plat1_chef,img_plat2_chef) values
                    (:img_chef, :nom,:descriptions,:lien_video_chef,:img_video_chef,:nom_plat1_chef ,:nom_plat2_chef,:citation_chef,:img_plat1_chef,:img_plat2_chef)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':img_chef' => $img_chef,
                        ':nom' => $chef_name,
                        ':descriptions' => $chef_description,
                        ':lien_video_chef' => $link_vid,
                        ':img_video_chef' => $img_video_chef,
                        ':nom_plat1_chef' => $plat1,
                        ':nom_plat2_chef' => $plat2,
                        ':citation_chef' => $citation,
                        ':img_plat1_chef' => $Plat_image1,
                        ':img_plat2_chef' => $Plat_image2



                    ]);
                    header("Location: chefs.php");
                }


                ?>

                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Create New chef</div>
                        <div class="card-body">
                            <form action="add-new-chef.php" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>chef Name:</label>
                                    <input name="chef_name" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>chef image:</label>
                                    <input name="img_chef" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>chef description:</label>
                                    <input name="chef_description" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>link vid :</label>
                                    <input name="link_vid" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>vid img:</label>
                                    <input name="img_video_chef" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label> plat1 :</label>
                                    <input name="plat1" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>Plat image1:</label>
                                    <input name="Plat_image1" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>plat2:</label>
                                    <input name="plat2" class="form-control" type="text" />
                                </div>
                                <div class="form-group">
                                    <label>Plat image2:</label>
                                    <input name="Plat_image2" class="form-control" type="text" />
                                </div>


                                <div class="form-group">
                                    <label>citation :</label>
                                    <input name="citation" class="form-control" type="text" />
                                </div>




                                <button name="create" class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>
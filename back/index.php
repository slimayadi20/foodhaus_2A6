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
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                <span>Tableau de bord || FoodHaus</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <!--Table-->
                <div class="container-fluid mt-n10">

                    <!--Card Primary-->
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>utilisateurs</p>
                                    <?php
                                    $sql = "SELECT * FROM users";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([':status' => 'Published']);
                                    $post_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $post_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="users.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Messages</p>
                                    <?php
                                    $sql = "SELECT * FROM messages";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $comment_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $comment_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="messages.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Restaurants</p>
                                    <?php
                                    $sql = "SELECT * FROM Restaurant ";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $comment_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $comment_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Restaurant.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Menu</p>
                                    <?php
                                    $sql = "SELECT * FROM menu ";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $comment_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $comment_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Menu.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Evenements</p>
                                    <?php
                                    $sql = "SELECT * FROM evenement";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([':status' => 'Published']);
                                    $post_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $post_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Evenement.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Participants</p>
                                    <?php
                                    $sql = "SELECT * FROM participant";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([':status' => 'Published']);
                                    $post_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $post_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Participant.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Formateurs</p>
                                    <?php
                                    $sql = "SELECT * FROM formateur";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $comment_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $comment_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Formateur.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Cours</p>
                                    <?php
                                    $sql = "SELECT * FROM cours";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([':status' => 'Published']);
                                    $post_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $post_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Cours.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-teal text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Livraison</p>
                                    <?php
                                    $sql = "SELECT * FROM Livraisons";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([':status' => 'Published']);
                                    $post_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $post_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Livraison.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-teal text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Commandes</p>
                                    <?php
                                    $sql = "SELECT * FROM commande";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([':status' => 'Published']);
                                    $post_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $post_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Commandes.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Recettes</p>
                                    <?php
                                    $sql = "SELECT * FROM recette ";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $comment_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $comment_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Recette.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Chefs</p>
                                    <?php
                                    $sql = "SELECT * FROM chefs ";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute();
                                    $comment_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $comment_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="Chefs.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <!--End Table-->

            </main>


            <?php require_once('./includes/footer.php'); ?>
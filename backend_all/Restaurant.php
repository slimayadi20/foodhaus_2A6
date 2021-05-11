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
                        <div class="page-header-content d-flex align-items-center justify-content-between text-white">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="home"></i></div>
                                <span>Restaurant</span>
                            </h1>
                            <a href="new-restaurant.php" title="Add new Restaurant" class="btn btn-white">
                                <div class="page-header-icon"><i data-feather="plus"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Restaurant</div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Photo</th>
                                            <th>type</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM restaurant";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        while ($restaurant = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                            $name = $restaurant['Name'];
                                            $Contact = $restaurant['Contact'];
                                            $photo = $restaurant['Photo'];
                                            $type = $restaurant['type'];

                                        ?>
                                            <tr>

                                                <td>
                                                    <?php echo $name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Contact; ?>
                                                </td>
                                                <td>
                                                    <img src="./assets/img/<?php echo $photo; ?>" width="50" height="50" />
                                                </td>
                                                <td><?php echo $type; ?></td>

                                            
                                               
                                            </tr>
                                            <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>
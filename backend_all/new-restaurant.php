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
                                <span>Create New restaurant</span>
                            </h1>
                        </div>
                    </div>
                </div>



                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Create New restaurant</div>
                        <div class="card-body">
                            <form action="new-restaurant.php" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="restaurant-name">restaurant Name:</label>
                                    <input name="restaurant-name" class="form-control" id="restaurant-name" type="text" placeholder="restaurant Name..." />
                                </div>
                                <div class="form-group">
                                    <label for="nickname">restaurant contact:</label>
                                    <input name="nick-name" class="form-control" id="nickname" type="text" placeholder="restaurant contact..." />
                                </div>
                                <div class="form-group">
                                    <label for="restaurant-email">restaurant type:</label>
                                    <input name="restaurant-email" class="form-control" id="restaurant-type" type="text"  placeholder="restaurant type..." />
                                </div>

                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="restaurant-photo">Choose photo:</label>
                                        <input name="restaurant-photo" class="form-control" id="restaurant-photo" type="file" />
                                    </div>
                                </div>
                                <button name="create" class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>
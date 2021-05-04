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
                                <div class="page-header-icon"><i data-feather="calendar"></i></div>
                                <span>Evenement</span>
                            </h1>
                            <a href="add-new-event.php" title="Add new Evenement" class="btn btn-white">
                                <div class="page-header-icon"><i data-feather="plus"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Evenement</div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>TITLE</th>
                                            <th>NBR PLACE</th>
                                            <th>DATE</th>
                                            <th>DESCRIPTION</th>
                                            <th>IMG</th>
                                            <th>ADRESS</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM evenement";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                            $id = $event['id'];
                                            $title = $event['title'];
                                            $nbplaces = $event['nbplaces'];
                                            $date = $event['date'];
                                            $description = $event['description'];
                                            $img = $event['img'];
                                            $adress = $event['adress'];

                                        ?>
                                            <tr>

                                                <td>
                                                    <?php echo $id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $title; ?>
                                                </td>
                                                <td>
                                                    <?php echo $nbplaces; ?>
                                                </td>
                                                <td>
                                                    <?php echo $date; ?>
                                                </td>
                                                <td>
                                                    <?php echo $description; ?>
                                                </td>

                                                <td>
                                                    <img src="./assets/img/<?php echo $img; ?>" width="50" height="50" />
                                                </td>
                                                <td>
                                                    <?php echo $adress; ?>
                                                </td>



                                                <td>
                                                    <form action="Evenement.php" method="POST">
                                                        <input type="hidden" name="event-id" value="<?php echo $id; ?>">
                                                        <button name="edit-user" type="submit" class="btn btn-primary btn-icon"><i data-feather="edit"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (isset($_POST['delete'])) {
                                                        $id = $_POST['event-id'];
                                                        $sql = "DELETE FROM evenement WHERE id = :id";
                                                        $stmt = $pdo->prepare($sql);
                                                        $stmt->execute([':id' => $id]);
                                                        header("Location: Evenement.php");
                                                    }
                                                    ?>
                                                    <form action="Evenement.php" method="POST">
                                                        <input type="hidden" name="event-id" value="<?php echo $id; ?>">
                                                        <button name="delete" type="submit" class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                    </form>
                                                </td>

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
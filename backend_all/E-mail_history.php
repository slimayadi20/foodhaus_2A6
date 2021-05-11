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
                                <div class="page-header-icon"><i data-feather="save"></i></div>
                                <span>E-mails History</span>
                            </h1>
                        </div>
                    </div>
                </div>



                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">E-Mails</div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Content</th>
                                            <th>Date</th>
                                            <th>delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM e_mails";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        while ($restaurant = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                            $ID = $restaurant['id_mail'];
                                            $Content = $restaurant['msg_mail'];
                                            $Date = $restaurant['time_mail'];


                                        ?>
                                            <tr>

                                                <td>
                                                    <?php echo $ID; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Content; ?>
                                                </td>
                                                <td><?php echo $Date; ?>
                                                </td>
                                                <td>

                                                    <?php
                                                    if (isset($_POST['mail'])) {
                                                        $u_id = $_POST['mail-id'];
                                                        $sql = "DELETE FROM e_mails WHERE id_mail = :id";
                                                        $stmt = $pdo->prepare($sql);
                                                        $stmt->execute([':id' => $u_id]);
                                                        header("Location:E-mail_history.php");
                                                    }
                                                    ?>
                                                    <form action="E-mail_history.php" method="POST">
                                                        <input type="hidden" name="mail-id" value="<?php echo $ID; ?>">
                                                        <button name="mail" type="submit" class="btn btn-danger btn-icon"><i data-feather="x"></i></button>
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
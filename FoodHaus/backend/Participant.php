<?php require_once('./includes/header.php'); ?>
<?php require_once('./includes/js.php'); ?>
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
                                <div class="page-header-icon"><i data-feather="smile"></i></div>
                                <span>Participants</span>
                            </h1>
                            <a href="add-new-participant.php" title="Add new participant" class="btn btn-white">
                                <div class="page-header-icon"><i data-feather="plus"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Participants</div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <a class="btn btn-primary mr-2 my-1 " tabindex="0" aria-controls="datatable-buttons" href="Participant.php" onclick="exportTableToExcel('dataTable')"><span>Excel</span></a>
                                    <a class="btn btn-primary mr-2 my-1" tabindex="0" aria-controls="datatable-buttons" href="Participant.php" onclick="CopyToClipboard('dataTable')"><span>Copier</span></a> &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                    <a><label>chercher: <input type="text" id="myInput" onkeyup="myFunction()" class="form-control form-control-sm" placeholder="chercher par nom.."></label></a>
                                    <br>
                                    </br>
                                    <thead>
                                        <tr>
                                            <th onclick="sortTable(0)"><i data-feather="list"></i> id</th>
                                            <th onclick="sortTable(1)"><i data-feather="list"></i> nom</th>
                                            <th onclick="sortTable(2)"><i data-feather="list"></i> mail</th>
                                            <th onclick="sortTable(3)"><i data-feather="list"></i> idevent</th>
                                            <th>Effacer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM participant";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        while ($participant = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                            $id_participant = $participant['id_participant'];
                                            $name = $participant['name'];
                                            $mail = $participant['mail'];
                                            $id = $participant['id'];

                                        ?>
                                            <tr>

                                                <td>
                                                    <?php echo $id_participant; ?>
                                                </td>
                                                <td>
                                                    <?php echo $name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $mail; ?>
                                                </td>
                                                <td><?php echo $id; ?></td>

                                                <td>
                                                    <?php
                                                    if (isset($_POST['delete'])) {
                                                        $id_participant = $_POST['id_participant'];
                                                        $sql = "DELETE FROM participant WHERE id_participant = :id_participant";
                                                        $stmt = $pdo->prepare($sql);
                                                        $stmt->execute([':id_participant' => $id_participant]);
                                                        header("Location: Participant.php");
                                                    }
                                                    ?>
                                                    <form action="Participant.php" method="POST">
                                                        <input type="hidden" name="id_participant" value="<?php echo $id_participant; ?>">
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
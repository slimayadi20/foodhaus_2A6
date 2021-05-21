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
                                <div class="page-header-icon"><i data-feather="home"></i></div>
                                <span>Menu</span>
                            </h1>
                            <a href="add-new-menu.php" title="Add new menu" class="btn btn-white">
                                <div class="page-header-icon"><i data-feather="plus"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Menu</div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <a class="btn btn-primary mr-2 my-1" tabindex="0" aria-controls="datatable-buttons" href="Menu.php" onclick="CopyToClipboard('dataTable')"><span>Copier</span></a>

                                    <a class="btn btn-primary mr-2 my-1" tabindex="0" aria-controls="datatable-buttons" href="./pdf_genrator/generate_pdfjihed.php"><span>PDF</span></a> &emsp; &emsp;&emsp;&emsp;&emsp; &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;


                                    <a><label>Chercher: <input type="text" id="myInput" onkeyup="myFunction()" class="form-control form-control-sm" placeholder="chercher par nom.."></label></a>
                                    <thead>
                                        <tr>

                                            <th>idRestaurant</th>
                                            <th>idMenu</th>
                                            <th>nom</th>
                                            <th>entrees</th>
                                            <th>platsPrincipal</th>
                                            <th>dessert</th>
                                            <th>boisson</th>
                                            <th>prix</th>

                                            <th>Éditer</th>
                                            <th>Effacer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM menu";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        while ($restaurant = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                            $id = $restaurant['id'];
                                            $idMenu = $restaurant['idMenu'];
                                            $nom = $restaurant['nom'];
                                            $entrees = $restaurant['entrees'];
                                            $platsPrincipal = $restaurant['platsPrincipal'];
                                            $dessert = $restaurant['dessert'];
                                            $Boisson = $restaurant['Boisson'];
                                            $prix = $restaurant['prix'];
                                           
                                        ?>
                                            <tr>

                                                <td>
                                                    <?php echo $id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $idMenu; ?>
                                                </td>

                                                <td><?php echo $nom; ?></td>
                                                <td>
                                                    <?php echo $entrees; ?>
                                                </td>
                                                <td>
                                                    <?php echo $platsPrincipal; ?>
                                                </td>

                                                <td><?php echo $dessert; ?></td>
                                                <td>
                                                    <?php echo $Boisson; ?>
                                                </td>
                                                <td>
                                                    <?php echo $prix; ?>
                                                </td>


                                                <td>
                                                    <form action="update-menu.php" method="POST">
                                                        <input type="hidden" name="idMenu" value="<?php echo $idMenu; ?>">
                                                        <button name="edit-user" type="submit" class="btn btn-primary btn-icon"><i data-feather="edit"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (isset($_POST['delete'])) {
                                                        $idMenu = $_POST['idMenu'];
                                                        $sql = "DELETE FROM menu WHERE idMenu = :idMenu";
                                                        $stmt = $pdo->prepare($sql);
                                                        $stmt->execute([':idMenu' => $idMenu]);
                                                        header("Location: Menu.php");
                                                    }
                                                    ?>
                                                    <form action="Menu.php" method="POST">
                                                        <input type="hidden" name="idMenu" value="<?php echo $idMenu; ?>">
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
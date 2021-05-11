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
                                <span>Updating event</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_POST['update'])) {
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $nbplaces = $_POST['nbplaces'];
                    $date = $_POST['date'];
                    $description = $_POST['description'];
                    $img = $_POST['img'];
                    $adress = $_POST['adress'];

                    $sql = "UPDATE evenement SET title='$title',nbplaces='$nbplaces',date='$date',description='$description',img='$img',adress='$adress' WHERE id='$id' ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':title' => $title,
                        ':nbplaces' => $nbplaces,
                        ':date' => $date,
                        ':description' => $description,
                        ':img' => $img,
                        ':adress' => $adress,

                        ':id' => $_GET['id']
                    ]);
                    header("Location: Evenement.php");
                }


                ?>
                <?php
                if (isset($_POST['edit-user'])) {
                    $id = $_POST['id'];
                    $url = "http://localhost/backend/event-update.php?id=" . $id;
                    header("Location: {$url}");
                }

                ?>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM evenement WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':id' => $id]);
                    $event = $stmt->fetch(PDO::FETCH_ASSOC);
                    $id = $event['id'];
                    $title = $event['title'];
                    $nbplaces = $event['nbplaces'];
                    $date = $event['date'];
                    $description = $event['description'];
                    $img = $event['img'];
                    $adress = $event['adress'];
                }
                ?>

                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Edit event</div>
                        <div class="card-body">
                            <form action="event-update.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="event-name">event id:</label>
                                    <input value="<?php echo $id; ?>" name="id" class="form-control" id="event-name" type="text" placeholder="event Name..." />
                                </div>
                                <div class="form-group">
                                    <label for="event-nickname">event title :</label>
                                    <input value="<?php echo $title; ?>" name="title" class="form-control" id="event-nickname" type="text" placeholder="Enter nickname..." />
                                </div>
                                <div class="form-group">
                                    <label for="event-email">event nbplaces:</label>
                                    <input value="<?php echo $nbplaces; ?>" name="nbplaces" class="form-control" id="event-email" type="text" placeholder="event Email..." />
                                </div>
                                <div class="form-group">
                                    <label for="event-email">event date:</label>
                                    <input value="<?php echo $date; ?>" name="date" class="form-control" id="event-email" type="text" placeholder="event Email..." />
                                </div>
                                <div class="form-group">
                                    <label for="event-email">event description:</label>
                                    <input value="<?php echo $description; ?>" name="description" class="form-control" id="event-email" type="text" placeholder="event Email..." />
                                </div>
                                <div class="form-group">
                                    <label for="event-email">event img:</label>
                                    <input value="<?php echo $img; ?>" name="img" class="form-control" id="event-email" type="text" placeholder="event Email..." />
                                </div>
                                <div class="form-group">
                                    <label for="event-email">event adress:</label>
                                    <input value="<?php echo $adress; ?>" name="adress" class="form-control" id="event-email" type="text" placeholder="event Email..." />
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
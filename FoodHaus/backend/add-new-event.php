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
                                <span>Create New event</span>
                            </h1>
                        </div>
                    </div>
                </div>



                <?php
                if (isset($_POST['create'])) {
                    $event_title = $_POST['event-title'];
                    $event_nbr = $_POST['event-nbr'];
                    $event_date = $_POST['event-date'];
                    $event_description = $_POST['event-description'];
                    $event_img = $_POST['event-img'];
                    $event_adress = $_POST['event-adress'];

                    $sql = "INSERT INTO evenement (id,title,nbplaces,date,description,img,adress) values (:id, :title,:nbplaces,:date,:description,:img,:adress) ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([

                        ':title' => $event_title,
                        ':nbplaces' => $event_nbr,
                        ':date' => $event_date,
                        ':description' => $event_description,
                        ':img' => $event_img,
                        ':adress' => $event_adress
                    ]);
                    header("Location: Evenement.php");
                }


                ?>



                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Create New event</div>
                        <div class="card-body">

                            <?php
                            if (isset($_POST['update'])) {
                                $id = $_POST['event-id'];

                                $title = $event['title'];
                                $nbplaces = $event['nbplaces'];
                                $date = $event['date'];
                                $description = $event['description'];
                                $img = $event['img'];
                                $adress = $event['adress'];
                                $sql = "UPDATE evenement SET title='$title',nbplaces='$nbplaces',date='$date',description='$description',img='$img',adress='$adress' WHERE id='$id' ";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute();
                                header("Location: Evenement.php");
                            }

                            ?>
                            <form action="add-new-event.php" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="restaurant-name">event title:</label>
                                    <input name="event-title" class="form-control" id="restaurant-name" type="text" placeholder="title" />
                                </div>
                                <div class="form-group">
                                    <label for="nickname">event nb place:</label>
                                    <input name="event-nbr" class="form-control" id="nickname" type="text" placeholder="event nb place" />
                                </div>
                                <div class="form-group">
                                    <label for="restaurant-email">date</label>
                                    <input name="event-date" class="form-control" id="restaurant-type" type="date" placeholder="date." />
                                </div>
                                <div class="form-group">
                                    <label for="restaurant-email">description</label>
                                    <input name="event-description" class="form-control" id="restaurant-type" type="text" placeholder="description" />
                                </div>

                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="restaurant-photo">Choose img:</label>
                                        <input name="event-img" class="form-control" id="restaurant-photo" type="file" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="restaurant-email">event adress:</label>
                                    <input name="event-adress" class="form-control" id="restaurant-type" type="text" placeholder="event type..." />
                                </div>
                                <button name="create" class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>
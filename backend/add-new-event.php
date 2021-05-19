<script>
    function numb(inputtxt) {
        var numbers = /^[-+]?[0-9]+$/;
        if (inputtxt.value.match(numbers)) {
            return true;
        } else {
            alert('Prière de saisir uniquement des nombres');
            return false;
        }
    }

    function lett(inputtxt) {
        var letters = /^[A-Za-z\s]+$/;
        if (inputtxt.value.match(letters)) {
            return true;
        } else {
            alert('Prière de saisir uniquement des lettres');
            return false;
        }
    }
</script>
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







                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Create New event</div>
                        <div class="card-body">

                            <?php
                            if (isset($_POST['create'])) {

                                $id = $_POST['id'];
                                $title = $_POST['title'];
                                $nbplaces = $_POST['nbplaces'];
                                $date = $_POST['date'];
                                $description = $_POST['description'];
                                $img = $_FILES['img']['name'];
                                $user_photo_temp = $_FILES['img']['tmp_name'];
                                move_uploaded_file("{$img}", "./assests/img/{$user_photo_temp}");

                                $adress = $_POST['adress'];
                                $id_categ = $_POST['id_categ'];

                                $sql = "INSERT INTO evenement (id,title,nbplaces,date,description,img,adress,id_categ) values (:id, :title,:nbplaces,:date,:description,:img,:adress,:id_categ) ";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':title' => $title,
                                    ':nbplaces' => $nbplaces,
                                    ':date' => $date,
                                    ':description' => $description,
                                    ':img' => $img,
                                    ':adress' => $adress,
                                    ':id_categ' => $id_categ,

                                    ':id' => $id
                                ]);
                                // echo $id ; 
                                // echo $title ; 
                                // echo $nbplaces ; 
                                // echo $date ; 
                                // echo $description ; 
                                // echo $img ; 
                                // echo $adress ; 

                                 header("Location: Evenement.php");
                            }

                            ?>
                            <form action="add-new-event.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="id">event id:</label>
                                    <input name="id" class="form-control" id="id" type="text" placeholder="id" />
                                </div>
                                <div class="form-group">
                                    <label for="title">event title:</label>
                                    <input name="title" class="form-control" id="title" type="text" onblur="lett(this)" placeholder="title" />
                                </div>
                                <div class="form-group">
                                    <label for="nbplaces">event nb place:</label>
                                    <input name="nbplaces" class="form-control" id="nbplaces" type="text"  onblur="numb<(this)"  placeholder="event nb place" />
                                </div>
                                <div class="form-group">
                                    <label for="date">date</label>
                                    <input name="date" class="form-control" id="date" type="date" placeholder="date." />
                                </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input name="description" class="form-control" id="description" type="text" placeholder="description" />
                                </div>

                                <div class="form-group">
                                        <label for="user-photo">Choose photo:</label>
                                        <input name="img" class="form-control" id="user-photo" type="file" />
                                    </div>
                                <div class="form-group">
                                    <label for="adress">event adress:</label>
                                    <input name="adress" class="form-control" id="adress" type="text" placeholder="event type..." />
                                </div>    <label> id categorie: </label>
                                <?php
                                $mysqli = new MySQLi('localhost', 'root', '', 'foodhaus');
                                $resultSet = $mysqli->query("SELECT id_categ FROM categorie");
                                ?>
                                <select class="form-control" name="id_categ">
                                    <?php
                                    while ($rows = $resultSet->fetch_assoc()) {
                                        $id_categ = $rows['id_categ'];
                                        echo "<option value='$id_categ'>$id_categ</option>";
                                    }
                                    ?>
                                </select> </br>
                                <button name="create" class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>
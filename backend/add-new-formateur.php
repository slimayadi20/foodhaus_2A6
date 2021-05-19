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
                                <span>Create New formateur</span>
                            </h1>
                        </div>
                    </div>
                </div>







                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Create New Formateur</div>
                        <div class="card-body">

                            <?php
                            if (isset($_POST['create'])) {

                                $id = $_POST['id'];
                                $nom = $_POST['nom'];
                                $prenom = $_POST['prenom'];
                                $specialite = $_POST['specialite'];
                                $image = $_FILES['image']['name'];
                                $user_photo_temp = $_FILES['image']['tmp_name'];
                                move_uploaded_file("{$image}", "./assests/img/{$user_photo_temp}");

                                $sql = "INSERT INTO formateur (id,nom,prenom,specialite,image) values (:id, :nom , :prenom, :specialite,:image) ";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':id' => $id,
                                    ':nom' => $nom,
                                    ':prenom' => $prenom,
                                    ':specialite' => $specialite,
                                    ':image' => $image,

                                ]);
                                // echo $id ; 
                                // echo $title ; 
                                // echo $nbplaces ; 
                                // echo $date ; 
                                // echo $description ; 
                                // echo $img ; 
                                // echo $adress ; 

                                header("Location: Formateur.php");
                            }

                            ?>
                            <form action="add-new-formateur.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="id">formateur id:</label>
                                    <input name="id" class="form-control" id="id" type="text" placeholder="id" />
                                </div>
                                <div class="form-group">
                                    <label for="title">formateur nom:</label>
                                    <input name="nom" class="form-control" id="nom" type="text" onblur="lett(this)" placeholder="nom du formateur" />
                                </div>
                                <div class="form-group">
                                    <label for="nbplaces">formateur prenom:</label>
                                    <input name="prenom" class="form-control" id="prenom" type="text" onblur="lett(this)" placeholder="prenom du formateur" />
                                </div>
                                <div class="form-group">
                                    <label for="date">specialite</label>
                                    <input name="specialite" class="form-control" id="specialite" type="text" onblur="lett(this)" placeholder="specialite." />
                                </div>
                                <div class="form-group">
                                        <label for="user-photo">Choose photo:</label>
                                        <input name="image" class="form-control" id="user-photo" type="file" />
                                    </div>
                                <button name="create" class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>
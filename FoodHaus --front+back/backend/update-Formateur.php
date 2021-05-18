<?php require_once('./includes/header.php'); ?>
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
                                <span>Updating Formateur</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_POST['update'])) {
                    $id = $_POST['id'];
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $specialite = $_POST['specialite'];
                    $sql = "UPDATE formateur SET id='$id',nom='$nom',prenom='$prenom',specialite='$specialite' WHERE id='$id' ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':id' => $id,
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':specialilte' => $specialite,

                    ]);
                    header("Location: Formateur.php");
                }


                ?>
                <?php
                if (isset($_POST['edit-user'])) {
                    $id = $_POST['id'];
                    $url = "http://localhost/foodhaus/backend/update-formateur.php?id=" . $id;
                    header("Location: {$url}");
                }

                ?>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM formateur WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':id' => $id]);
                    $formateur = $stmt->fetch(PDO::FETCH_ASSOC);
                    $id = $formateur['id'];
                    $nom = $formateur['nom'];
                    $prenom = $formateur['prenom'];
                    $specialite = $formateur['specialite'];
                }
                ?>

                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Edit formateur</div>
                        <div class="card-body">
                            <form action="update-formateur.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="formateur-name">formateur id:</label>
                                    <input value="<?php echo $id; ?>" name="id" class="form-control" id="formateur-name" type="text" placeholder="formateur Name..." />
                                </div>
                                <div class="form-group">
                                    <label for="formateur-nickname">formateur nom :</label>
                                    <input value="<?php echo $nom; ?>" name="nom" class="form-control" id="formateur-nickname" type="text"  onblur="lett(this)" placeholder="Enter nickname..." />
                                </div>
                                <div class="form-group">
                                    <label for="formateur-email">formateur prenom:</label>
                                    <input value="<?php echo $prenom; ?>" name="prenom" class="form-control" id="formateur-email" type="text"  onblur="lett(this)" placeholder="formateur Email..." />
                                </div>
                                <div class="form-group">
                                    <label for="formateur-email">formateur specialite:</label>
                                    <input value="<?php echo $specialite; ?>" name="specialite" class="form-control" id="formateur-email" type="text"   onblur="lett(this)"placeholder="formateur Email..." />
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
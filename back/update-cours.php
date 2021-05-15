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
                                <span>Updating cours</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_POST['update'])) {
                    $id = $_POST['id'];
                    $nomc = $_POST['nomc'];
                    $imgpath = $_FILES['imgpath'];
                    $nomf = $_POST['nomf'];
                    $lieu = $_POST['lieu'];
                    $date = $_POST['date'];
                    $prix = $_POST['prix'];

                    $sql = "update cours SET nomc='$nomc',imgpath='$imgpath',nomf='$nomf',lieu='$lieu',date='$date',prix='$prix' WHERE id='$id' ";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':nomc' => $nomc,
                        ':imgpath' => $imgpath,
                        ':nomf' => $nomf,
                        ':lieu' => $lieu,
                        ':img' => $img,
                        ':prix' => $prix,

                        ':id' => $_GET['id']
                    ]);
                    header("Location: Cours.php");
                }


                ?>
                <?php
                if (isset($_POST['edit-user'])) {
                    $id = $_POST['id'];
                    $url = "http://localhost/foodhaus_2A6-main/back/cours-update.php?id=" . $id;
                    header("Location: {$url}");
                }

                ?>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM cours WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':id' => $id]);
                    $cours = $stmt->fetch(PDO::FETCH_ASSOC);
                    $id = $cours['id'];
                    $nomc = $cours['nomc'];
                    $imgpath = $cours['imgpath'];
                    $nomf = $cours['nomf'];
                    $lieu = $cours['lieu'];
                    $date = $cours['date'];
                    $prix = $cours['prix'];
                }
                ?>

                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Edit cours</div>
                        <div class="card-body">
                            <form action="cours-update.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="cours-name">cours id:</label>
                                    <input value="<?php echo $id; ?>" name="id" class="form-control" id="cours-name" type="text" placeholder="cours Name..." />
                                </div>
                                <div class="form-group">
                                    <label for="cours-nickname">cours nomc :</label>
                                    <input value="<?php echo $nomc; ?>" name="nomc" class="form-control" id="cours-nickname"  onblur="lett(this)" type="text" placeholder="Enter nickname..." />
                                </div>
                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="img">Choose img:</label>
                                        <input  value="<?php echo $imgpath; ?>" name="img" class="form-control" id="img" type="file" />
                                    </div>
                                </div>
                              
                                <label>  nom du formateur: </label>
<?php
$mysqli = NEW MySQLi('localhost','root','','evenement');
$resultSet = $mysqli->query("SELECT nom FROM formateur");
?>
<select name="nomf" >
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $nom = $rows['nom'];
        echo "<option value='$nom'>$nom</option>";
    }
    ?>
</select> </br>
                                <div class="form-group">
                                    <label for="cours-email">cours lieu:</label>
                                    <input value="<?php echo $lieu; ?>" name="lieu" class="form-control" id="cours-email" type="text" placeholder="cours Email..." />
                                </div>
                                <div class="form-group">
                                    <label for="cours-email">cours date:</label>
                                    <input value="<?php echo $date; ?>" name="date" class="form-control" id="cours-email" type="date" placeholder="cours Email..." />
                                </div>
                                <div class="form-group">
                                    <label for="cours-email">cours prix:</label>
                                    <input value="<?php echo $prix; ?>" name="prix" class="form-control" id="cours-email"  onblur="numb(this)" type="text" placeholder="cours Email..." />
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
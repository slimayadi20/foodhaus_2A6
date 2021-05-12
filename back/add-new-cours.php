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
                                <span>Create New cours</span>
                            </h1>
                        </div>
                    </div>
                </div>







                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Create New cours</div>
                        <div class="card-body">

                            <?php
                            if (isset($_POST['create'])) {

                                $id = $_POST['id'];
                                $nomc = $_POST['nomc'];
                                $imgpath = $_FILES['imgpath'];
                                $nomf = $_POST['nomf'];
                                $lieu = $_POST['lieu'];
                                $date = $_POST['date'];
                                $prix = $_POST['prix'];
                                $sql = "INSERT INTO COURS (id,nomc,imgpath,nomf,lieu,date,prix) values (:id, :nomc,:imgpath,:nomf,:lieu,:date,:prix) ";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':nomc' => $nomc,
                                    ':imgpath' => $imgpath,
                                    ':nomf' => $nomf,
                                    ':lieu' => $lieu,
                                    ':date' => $date,
                                    ':prix' => $prix,

                                    ':id' => $id
                                ]);
                                // echo $id ; 
                                // echo $nomc ; 
                                // echo $imgpath ; 
                                // echo $nomf ; 
                                // echo $lieu ; 
                                // echo $img ; 
                                // echo $prix ; 

                                header("Location: Cours.php");
                            }

                            ?>
                            <form action="add-new-cours.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="id">cours id:</label>
                                    <input name="id" class="form-control" id="id" type="text" placeholder="id" />
                                </div>
                                <div class="form-group">
                                    <label for="nomc">cours nom:</label>
                                    <input name="nomc" class="form-control" id="nomc" type="text" onblur="lett(this)" placeholder="nomc" />
                                </div>
                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="img">Choose img:</label>
                                        <input name="imgpath" class="form-control" id="imgpath" type="file" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nomf">nomf</label>
                                    <input name="nomf" class="form-control" id="nomf"  onblur="lett(this)" type="nomf" placeholder="nomf." />
                                </div>
                                <div class="form-group">
                                    <label for="lieu">lieu</label>
                                    <input name="lieu" class="form-control" id="lieu"  type="text" placeholder="lieu" />
                                </div>
                                <div class="form-group">
                                    <label for="date">cours date:</label>
                                    <input name="date" class="form-control" id="date"  type="date" placeholder="cours date..." />
                                </div>
                            
                                <div class="form-group">
                                    <label for="prix">cours prix:</label>
                                    <input name="prix" class="form-control" id="prix" onblur="numb(this)" type="text" placeholder="cours prix..." />
                                </div>
                                <button name="create" class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>
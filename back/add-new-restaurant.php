<script>
	function ValidateEmail(inputText) {
										var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
										if (inputText.value.match(mailformat)) {
											document.form1.text1.focus();
											return true;
										} else {
											alert("You have entered an invalid email address!");
											document.form1.text1.focus();
											return false;
										}
									}

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
                                <span>Create New restaurant</span>
                            </h1>
                        </div>
                    </div>
                </div>







                <!--Start Table-->
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Create New restaurant</div>
                        <div class="card-body">

                            <?php
                            if (isset($_POST['create'])) {

                                $id = $_POST['id'];
                                $nom = $_POST['nom'];
                                $contact = $_POST['contact'];
                                $email = $_POST['email'];
                                $adresse = $_POST['adresse'];
                                $type = $_POST['type'];
                                $description = $_POST['description'];
                                $image = $_FILES['image'];

                                $sql = "INSERT INTO restaurant (id,nom,contact,email,adresse,type,description,image) values (:id, :nom , :contact, :email,:adresse,:type,:description,:image) ";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':id' => $id,
                                    ':nom' => $nom,
                                    ':contact' => $contact,
                                    ':email' => $email,
                                    ':adresse' => $adresse,
                                    ':type' => $type,
                                    ':description' => $description,
                                    ':image' => $image

                                ]);
                                // echo $id ; 
                                // echo $title ; 
                                // echo $nbplaces ; 
                                // echo $date ; 
                                // echo $description ; 
                                // echo $img ; 
                                // echo $adress ; 

                                header("Location: Restaurant.php");
                            }

                            ?>
                            <form action="new-restaurant.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="id">restaurant id:</label>
                                    <input name="id" class="form-control" id="id" type="text" placeholder="id" />
                                </div>
                                <div class="form-group">
                                    <label for="nom">restaurant nom:</label>
                                    <input name="nom" class="form-control" id="nom" type="text" onblur="lett(this)" placeholder="nom du restaurant" />
                                </div>
                                <div class="form-group">
                                    <label for="contact">restaurant contact:</label>
                                    <input name="contact" class="form-control" id="prenom" type="text" onblur="numb(this)" placeholder="contact du restaurant" />
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input name="email" class="form-control" id="specialite" type="text" onblur=" ValidateEmail(this)" placeholder="email." />
                                </div>
                                <div class="form-group">
                                    <label for="adresse">restaurant adresse:</label>
                                    <input name="adresse" class="form-control" id="id" type="text" placeholder="adresse" />
                                </div>
                                <div class="form-group">
                                    <label for="type">restaurant type:</label>
                                    <input name="type" class="form-control" id="nom" type="text" onblur="lett(this)" placeholder="type" />
                                </div>
                                <div class="form-group">
                                    <label for="description">restaurant description:</label>
                                    <input name="description" class="form-control" id="description" type="text"  placeholder="description" />
                                </div>
                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="image">Choose img:</label>
                                        <input name="image" class="form-control" id="img" type="file" />
                                    </div>
                                </div>


                                <button name="create" class="btn btn-primary mr-2 my-1" type="submit">Create now!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Table-->
            </main>

            <?php require_once('./includes/footer.php'); ?>
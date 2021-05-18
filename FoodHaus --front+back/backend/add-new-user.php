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
                                    <span>Créer utilisateur</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <?php
                        if(isset($_POST['create'])) {
                            $user_name = trim($_POST['user-name']);
                            $user_nickname = trim($_POST['nick-name']);
                            // nickname exist
                            $sql1 = "SELECT * FROM users WHERE user_nickname = :nickname";
                            $stmt1 = $pdo->prepare($sql1);
                            $stmt1->execute([':nickname' => $user_nickname]);
                            $nickname_count = $stmt1->rowCount();
                            if($nickname_count >= 1) {
                                $err_nickname = "Nickname already exist!";
                            }
                            $user_email = trim($_POST['user-email']);
                            // email exist
                            $sql2 = "SELECT * FROM users WHERE user_email = :email";
                            $stmt2 = $pdo->prepare($sql2);
                            $stmt2->execute([':email'=>$user_email]);
                            $email_count = $stmt2->rowCount();
                            if($email_count >= 1) {
                                $err_email = "Email already exist!";
                            }

                            if(!isset($err_nickname) || !isset($err_email)) {
                                $user_password = trim($_POST['user-password']);
                                $hash = password_hash($user_password, PASSWORD_BCRYPT, ['cost'=>10]);
                                $user_role = $_POST['user-role'];
                                $user_photo = $_FILES['user-photo']['name'];
                                $user_photo_temp = $_FILES['user-photo']['tmp_name'];
                                move_uploaded_file("{$user_photo}", "./assests/img/{$user_photo_temp}");


                                $sql = "INSERT INTO users (user_name, user_nickname, user_email, user_password, user_photo, registered_on, user_role) VALUES (:username, :nickname, :email, :password, :photo, :date, :role)";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':username' => $user_name,
                                    ':nickname' => $user_nickname,
                                    ':email' => $user_email,
                                    ':password' => $hash,
                                    ':photo' => $user_photo,
                                    ':date' => date("M n, Y") . ' at ' . date("h:i A"),
                                    ':role' => $user_role
                                ]);
                                header("Location: users.php");
                            }
                            
                        }
                    ?>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Créer utilisateur</div>
                            <div class="card-body">
                                <form action="add-new-user.php" method="POST" enctype="multipart/form-data">
                                    <?php 
                                        if(isset($err_email)) {
                                            echo "<p class='alert alert-danger'>{$err_email}</p>";
                                        } else if(isset($err_nickname)) {
                                            echo "<p class='alert alert-danger'>{$err_nickname}</p>";
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label for="user-name">Nom d'utilisateur:</label>
                                        <input name="user-name" class="form-control" id="user-name" type="text" placeholder="Nom..." />
                                    </div>
                                    <div class="form-group">
                                        <label for="nickname">Surnom:</label>
                                        <input name="nick-name" class="form-control" id="nickname" type="text" placeholder="Surnom..." />
                                    </div>
                                    <div class="form-group">
                                        <label for="user-email">User Email:</label>
                                        <input name="user-email" class="form-control" id="user-email" type="email" placeholder="Email..." />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">E-mail de l'utilisateur:</label>
                                        <input name="user-password" class="form-control" id="password" type="password" placeholder="Entrer password..." />
                                    </div>
                                    <div class="form-group">
                                        <label for="user-role">Rôle d'utilisateur:</label>
                                        <select name="user-role" class="form-control" id="user-role">
                                            <option value="admin">Abonné/e</option>
                                            <option value="subscriber">Admin</option>
                                        </select>
                                        <div class="form-group">
                                        <label for="user-photo">choisir photo:</label>
                                        <input name="user-photo" class="form-control" id="user-photo" type="file" />
                                    </div>
                                    </div>
                                    <button name="create" class="btn btn-primary mr-2 my-1" type="submit">Mettre à jour!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->
                </main>

<?php require_once('./includes/footer.php'); ?>
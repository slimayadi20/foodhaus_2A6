<nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
    <a class="navbar-brand d-none d-sm-block" href="index.php">Panneau d'administration

    </a><button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
    <ul class="navbar-nav align-items-center ml-auto">
        <?php
        $a = 0;
        $sql = "SELECT * FROM messages WHERE ms_state = :state";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':state' => 0
        ]);
        $count_comment = $stmt->rowCount();
        ?>

        <!--User Registration + New Comment Notification-->
        <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="messages.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="mail"></i>
                <?php
                if ($count_comment != 0) { ?>
                    <span class="badge badge-red"><?php echo $count_comment; ?></span>
                <?php }
                ?>

            </a>

            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="mr-2" data-feather="mail"></i>
                    Messages
                </h6>

                <?php
                $sql = "SELECT * FROM messages WHERE ms_state = :state";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':state' => 0
                ]);
                while ($com = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $com_mail = $com['ms_usermail'];
                    $com_detail = substr($com['ms_detail'], 0, 35); ?>
                    <a class="dropdown-item dropdown-notifications-item" href="messages.php">
                        <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="mail"></i></div>
                        <div class="dropdown-notifications-item-content">

                            <div class="dropdown-notifications-item-content-details">
                                <?php echo "Message from :", $com_mail; ?>
                            </div>
                            <div class="dropdown-notifications-item-content-text">
                                <?php echo $com_detail; ?>
                            </div>
                        </div>
                    </a>
                <?php }
                ?>

                <a class="dropdown-item dropdown-notifications-footer" href="messages.php">
                    Consulter les messages
                </a>
            </div>
        </li>





        <?php
        if (isset($_COOKIE['_uid_'])) {
            $user_id = base64_decode($_COOKIE['_uid_']);
        } else if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        } else {
            $user_id = -1;
        }
        $sql = "SELECT * FROM users WHERE user_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $user_id
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_name = $user['user_name'];
        $user_email = $user['user_email'];
        $user_photo = $user['user_photo'];
        ?>

        <li class="nav-item dropdown no-caret mr-3 dropdown-user">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="./assets/img/<?php echo $user_photo; ?>" /></a>
            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">

                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="./assets/img/<?php echo $user_photo; ?>" alt="<?php echo $user_name; ?>" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">
                            <?php echo $user_name; ?>
                        </div>
                        <div class="dropdown-user-details-email">
                            <?php echo $user_email; ?>
                        </div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="profile.php">
                    <div class="dropdown-item-icon">
                        <i data-feather="settings"></i>
                    </div>
                    Profile
                </a>



                <a class="dropdown-item" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="dropdown-item-icon">
                        <i data-feather="globe"></i>
                    </div>Language
                </a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <a class="dropdown-item" href="#">
                        <div class="dropdown-item-icon">
                            <i data-feather="chevron-right"></i>
                        </div>
                        <form action="index.php" method="POST">
                            <button class="btn btn-teal" type="submit" name="fr"> Francais </button>
                        </form>
                        <?php

                        if (isset($_POST['fr'])) {
                            $sql = "UPDATE globe SET lang='fr'  ";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                        }
                        ?>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="dropdown-item-icon">
                            <i data-feather="chevron-right"></i>
                        </div>
                        <form action="index.php" method="POST">
                            <button class="btn btn-teal" type="submit" name="eng"> English </button>
                        </form>
                        <?php
                        if (isset($_POST['eng'])) {
                            $sql = "UPDATE globe SET lang='eng'  ";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute();
                        }
                        ?>
                    </a>
                </div>
                <?php
                $sql = "SELECT lang FROM globe";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $lang = $stmt->fetch(PDO::FETCH_ASSOC);
                $lang = $lang['lang'];
                echo "-> selected lang is :",  $lang;
                ?>
                <a class="dropdown-item" href="../logout.php">
                    <div class="dropdown-item-icon">
                        <i data-feather="log-out"></i>
                    </div>
                    Logout
                </a>

            </div>
        </li>
    </ul>
</nav>
<?php $current_page = "menu";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>
<title> menu </title>
<link rel="stylesheet" type="text/css" href="css/bouton.css">

<!-- appel php -->
<?php
if (isset($_POST['idmenu'])) {
    $id = $_POST['id-r'];
    $url = "menu.php?id=" . $id;
    header("Location: {$url}");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM menu where id ='{$id}'";
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->execute([]);
    while ($menu = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        $idMenu = $menu['idMenu'];
        $id = $menu['id'];
        $nom = $menu['nom'];
        $entrees = $menu['entrees'];
        $platsPrincipal = $menu['platsPrincipal'];
        $dessert = $menu['dessert'];
        $Boisson = $menu['Boisson'];
        $prix = $menu['prix'];


?>
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

        ?>

        <?php
        if (isset($_POST['valider'])) {
            $id = $_GET['id'];
            $sql2 = "SELECT image FROM restaurant where id ='{$id}'";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute();
            $a = $stmt2->fetch(PDO::FETCH_ASSOC);
            $image = $a['image'];


            $sql = "INSERT INTO items (dir,email,name,price) values (:dir,:email, :nom,:prix) ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([

                ':dir' => $image,
                ':email' => $user_email,
                ':nom' => $user_name,
                ':prix' => $prix


            ]);

            echo '<body onLoad="alert(\'Item Ajouté\')">';
            echo '<meta http-equiv="refresh" content="0;URL=Restaurant.php">';
        }
        ?>

        <!-- Title Page -->
        <section>
            <form method="post">
                <div class="header-lunch parallax0 parallax100" style="background-image: url(images/header-menu-01.jpg);">
                    <div class="bg1-overlay t-center p-t-170 p-b-165">
                        <h4 class="tit4 t-center">
                            <input hidden class="tit4 t-center" name="nom">
                            Nom Menu : <?PHP echo $menu['nom']; ?>
                        </h4>
                        <h4 class="tit4 t-center">
                            <input hidden class="tit4 t-center" name="prix">
                            PRIX : <?PHP echo $menu['prix']; ?> DT
                        </h4>
                    </div>
                </div>
        </section>

        <!-- Entree -->
        <section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
            <div class="header-lunch parallax0 parallax100" style="background-image: url(images/bg-title-page-01.jpg);">
                <div class="bg1-overlay t-center p-t-170 p-b-165">
                    <h2 class="tit4 t-center">
                        Entree
                    </h2>
                </div>
            </div>
            <div>&nbsp;</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
                        <div class="wrap-item-mainmenu p-b-22">
                            <h3 class="tit-mainmenu tit10 p-b-25">
                                STARTERS
                            </h3>

                            <!-- Item mainmenu -->
                            <div class="blo3 flex-w flex-col-l-sm m-b-30">
                                <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                    <input hidden name="dir">
                                    <a href="#"><img name="dir" src="images/lunch-01.jpg" alt="IMG-MENU"></a>
                                </div>

                                <div class="text-blo3 size21 flex-col-l-m">
                                    <a class="txt21 m-b-3">
                                        <?PHP echo $menu['entrees']; ?>
                                    </a>

                                    <span class="txt23">
                                        <?PHP echo $menu['entrees']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>


        <!-- PlatsPrincipal -->
        <section class="section-lunch bgwhite">
            <div class="header-lunch parallax0 parallax100" style="background-image: url(images/header-menu-01.jpg);">
                <div class="bg1-overlay t-center p-t-170 p-b-165">
                    <h2 class="tit4 t-center">
                        PlatsPrincipal
                    </h2>
                </div>
            </div>

            <div class="container">
                <div class="row p-t-108 p-b-70">
                    <div class="col-md-8 col-lg-6 m-l-r-auto">
                        <!-- Block3 -->
                        <div class="blo3 flex-w flex-col-l-sm m-b-30">
                            <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                <img src="images/lunch-02.jpg" alt="IMG-MENU">
                            </div>

                            <div class="text-blo3 size21 flex-col-l-m">
                                <a class="txt21 m-b-3">
                                    <?PHP echo $menu['platsPrincipal']; ?>
                                </a>

                                <span class="txt23">
                                    <?PHP echo $menu['platsPrincipal']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Dessert -->
        <section class="section-dinner bgwhite">
            <div class="header-dinner parallax0 parallax100" style="background-image: url(images/header-menu-02.jpg);">
                <div class="bg1-overlay t-center p-t-170 p-b-165">
                    <h2 class="tit4 t-center">
                        Dessert
                    </h2>
                </div>
            </div>

            <div class="container">
                <div class="row p-t-108 p-b-70">
                    <div class="col-md-8 col-lg-6 m-l-r-auto">
                        <!-- Block3 -->
                        <div class="blo3 flex-w flex-col-l-sm m-b-30">
                            <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                <img src="images/dinner-05.jpg" alt="IMG-MENU">
                            </div>

                            <div class="text-blo3 size21 flex-col-l-m">
                                <a class="txt21 m-b-3">
                                    <?PHP echo $menu['dessert']; ?>
                                </a>

                                <span class="txt23">
                                    <?PHP echo $menu['dessert']; ?>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dessert -->
        <br class="section-dinner bgwhite">
        <div class="header-dinner parallax0 parallax100" style="background-image: url(images/header-menu-02.jpg);">
            <div class="bg1-overlay t-center p-t-170 p-b-165">
                <h2 class="tit4 t-center">
                    Boisson
                </h2>
            </div>
        </div>

        <div class="container">
            <div class="row p-t-108 p-b-70">
                <div class="col-md-8 col-lg-6 m-l-r-auto">
                    <!-- Block3 -->
                    <div class="blo3 flex-w flex-col-l-sm m-b-30">
                        <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                            <img src="images/photo-gallery-thumb-06.jpg" alt="IMG-MENU">
                        </div>

                        <div class="text-blo3 size21 flex-col-l-m">
                            <a class="txt21 m-b-3">
                                <?PHP echo $menu['Boisson']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div><?php }
        } ?></div>
        <!-- commander -->
        <div class="form-row justify-content-center">
            <!-- Button3 -->
            <?php
            if (isset($_COOKIE['_uid_']) || isset($_COOKIE['_uiid_']) || isset($_SESSION['login']))
            echo '<button type="submit" class="square_btn" name="valider"> commander menu </button>';
            else
            echo  '<p class=" alert alert-danger text-dark t-center">Vous devez Connecter dabord!</p>';
            ?>
          

        </div>

        <br>
        <br>

        </form>
        </section>




        <!-- Back to top -->
        <div class="btn-back-to-top bg0-hov" id="myBtn">
            <span class="symbol-btn-back-to-top">
                <i class="fa fa-angle-double-up" aria-hidden="true"></i>
            </span>
        </div>


        <?php require_once("./includes/footer.php"); ?>
        </body>

        </html>
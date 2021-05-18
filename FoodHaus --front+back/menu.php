<?php $current_page = "menu";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

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
if (isset($_POST['valider'])) {

    $name = $_POST['nom'];
    $price = $_POST['prix'];
    $dir = $_POST['dir'];


    $sql = "INSERT INTO items (dir,name,price) values (:dir, :nom,:prix) ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([

        ':dir' => $nom,
        ':nom' => $nom,
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
                            <input hidden value="" name="dir" class="info-item-mainmenu txt23">
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
                        <img src="images/lunch-01.jpg" alt="IMG-MENU">
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
                        <img src="images/dinner-01.jpg" alt="IMG-MENU">
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
                        <img src="images/dinner-01.jpg" alt="IMG-MENU">
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
        <button type="submit" class="square_btn" name="valider">Commander MENU</button>
        
    </div>

<br>
<br>

    </form>
</section>


<!-- Footer -->
<footer class="bg1">
    <div class="container p-t-40 p-b-70">
        <div class="row">
            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-33">
                    Contact Us
                </h4>

                <ul class="m-b-70">
                    <li class="txt14 m-b-14">
                        <i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
                        TUNIS
                    </li>

                    <li class="txt14 m-b-14">
                        <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
                        (+1) 96 716 6879
                    </li>

                    <li class="txt14 m-b-14">
                        <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
                        contact@fekretcom.com
                    </li>
                </ul>

            </div>


            <div class="col-sm-6 col-md-4 p-t-50">
                <!-- - -->
                <h4 class="txt13 m-b-38">
                    Gallery
                </h4>

                <!-- Gallery footer -->
                <div class="wrap-gallery-footer flex-w">
                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-01.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-01.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-02.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-02.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-03.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-03.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-04.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-04.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-05.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-05.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-06.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-06.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-07.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-07.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-08.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-08.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-09.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-09.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-10.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-10.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-11.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-11.jpg" alt="GALLERY">
                    </a>

                    <a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-12.jpg"
                       data-lightbox="gallery-footer">
                        <img src="images/photo-gallery-thumb-12.jpg" alt="GALLERY">
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="end-footer bg2">
        <div class="container">
            <div class="txt17 p-r-20 p-t-5 p-b-5">
                Copyright &copy; 2018 All rights reserved | This template is made with <i class="fa fa-heart">

                </i> by <a href="https://colorlib.com" target="_blank">Fekret'com</a>
            </div>
        </div>
    </div>
    </div>
</footer>


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>


<!--===============================================================================================-->
<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>

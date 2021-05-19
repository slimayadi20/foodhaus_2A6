<?php $current_page = "restaurant";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>
<title>Restaurant </title>

<!-- Title Page -->
<link rel="stylesheet" href="css/jihed.css">
<link rel="stylesheet" href="css/menu.css">
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"
         style="background-image: url(images/bg-title-page-01.jpg);">
    <h2 class="tit6 t-center">
        FOODHAUS Restaurant
    </h2>
</section>
<!-- Content page -->


<!-- restaurant -->

<!-- appel php -->
<?php
$sql1 = "SELECT * FROM restaurant ";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute([]);
while ($restaurant = $stmt1->fetch(PDO::FETCH_ASSOC)) {
$id = $restaurant['id'];
$nom = $restaurant['nom'];
$contact = $restaurant['contact'];
$email = $restaurant['email'];
$adresse = $restaurant['adresse'];
$type = $restaurant['type'];
$description = $restaurant['description'];
$image = $restaurant['image'];
?>

<!--affichage-->
<section class="tab">
    <table>
        <tr>


            <td><img src=" <?PHP echo $restaurant['image']; ?>" width="200" height="200"></td>
            <td><form action="menu.php" method="POST">
                    <input type="hidden" name="id-r" value="<?php echo $id; ?>">
                    <button name="idmenu" type="submit" class="square_btn"><span><i>MENU</i></span></button>
                </form>


        <td><h1>Nom Restaurant:</br><?PHP echo $restaurant['nom']; ?></h1></td>
        <td><h1>Type:</br><?PHP echo $restaurant['type']; ?></h1></td>
        <td><h1>email:</br><?PHP echo $restaurant['email']; ?></h1></td>
        <td><h1>description: </br><?PHP echo $restaurant['description']; ?></h1></td>
        <td>
            <iframe width="100%" height="200" src="https://maps.google.com/maps?q=<?php echo $restaurant['adresse'];
            ?>&output=embed"></iframe>
        </td>
        </tr>
        </tbody>
    </table>

</section>

<div><?php
    }
    ?>
</div>
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
<script src="js/script.js"></script>

</body>
</html>

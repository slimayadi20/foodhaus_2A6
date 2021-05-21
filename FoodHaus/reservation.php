<?php require_once("./includes/db.php"); ?>
<?php $current_page = "reservation";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Reservation</title>


<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-02.jpg);">
    <h2 class="tit6 t-center">
        Reservation
    </h2>
</section>
<!-- appel php -->
<?php
$name = $_GET['for'];





$sql1 = "SELECT telephone FROM reservation WHERE nom = :nom";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute([
    ':nom' => $name
]);
$ms = $stmt1->fetch(PDO::FETCH_ASSOC);
$phone = $ms['telephone'];



?>
<!-- Reservation -->
<section class="section-reservation bg1-pattern p-t-100 p-b-113">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 p-b-30">
                <div class="t-center">
                    <span class="tit2 t-center">
                        Reservation
                    </span>

                    <h3 class="tit3 t-center m-b-35 m-t-2">
                        Table booked!
                    </h3>
                </div>
                <br> <br>
                <h5> <?php echo "One of our agents will be contacting you soon for your confirmation on this number : ", $phone ?> </h5>
                <br>
                <br>
                <h5> <?php echo "Thank you for your trust Mr.", $name ?></h5>
            </div>
        </div>
    </div>
</section>




<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>


<?php require_once("./includes/footer.php"); ?>

</body>

</html>
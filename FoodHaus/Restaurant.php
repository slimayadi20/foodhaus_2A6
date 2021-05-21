<?php $current_page = "chefs";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Nos Restaurants! </title>
<link rel="stylesheet" href="css/jihed.css">
<link rel="stylesheet" href="css/menu.css">
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-01.jpg);">

    <h2 class="tit6 t-center">
        FOODHAUS Restaurant
    </h2>
</section>
<div class="bread-crumb bo5-b p-t-17 p-b-17">
    <div class="container">
        <a href="index.php" class="txt27">
            Home
        </a>

        <span class="txt29 m-l-10 m-r-10">/</span>

        <span class="txt29">
            Restaurants
        </span>
    </div>
</div>


<br> 




<div>
    <ul class="cards">

        <table colspam="6" class="table">



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


                <li class="cards_item">
                    <div class="__area text-center">
                        <a href="#" class="__card">
                            <a href="menu.php?id=<?php echo $id; ?> "><button class="btn btn-danger btn-lg btn-block">Voir Menu <i class="fa fa-book m-l-20" aria-hidden="true"></i></button> </a>
                            <img src="images/<?php echo $image; ?>" width="100%" height="500" />
                            <br> <br>
                            <div class="__card_detail text-left">
                                <h4><?PHP echo $nom; ?></h4>
                                <p>
                                    <?PHP echo $description; ?> </p>
                                <div class="__detail">
                                    <i class="fa fa-phone m-l-0 " aria-hidden="true"></i> <span>(+216)<?PHP echo $contact; ?></span>
                                    <br>
                                    <i class="fa fa-envelope m-l-0" aria-hidden="true"></i> <span><?PHP echo $email; ?></span>
                                </div>
                                <br> <br>
                                <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $adresse; ?>&output=embed"></iframe>


                            </div>
                        </a>
                    </div>
                </li>
            <?php
            }
            ?>

        </table>

    </ul>






</div>














<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
</div>


<?php require_once("./includes/footer.php"); ?>
</body>

</html>
<?php $current_page = "categ";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Evenement par Categorie!</title>



<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-03.jpg);">
    <h2 class="tit6 t-center">
        Evenement par Categorie!
    </h2>
</section>


<!-- Content page -->
<section>
    <div class="bread-crumb bo5-b p-t-17 p-b-17">
        <div class="container">
            <a href="index.php" class="txt27">
                Home
            </a>

            <span class="txt29 m-l-10 m-r-10">/</span>

            <span class="txt29">
                Evenement par Categorie!
            </span>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-8 col-lg-9">



                <?php



                $id_categ = $_GET['id_categ'];
                $sql1 = "SELECT * FROM evenement where id_categ= :id_categ ";
                $stmt1 = $pdo->prepare($sql1);
                $stmt1->execute([':id_categ' => $id_categ]);
                while ($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                    $title = $ms['title'];
                    $id = $ms['id'];

                    $nbplaces = $ms['nbplaces'];
                    $date = $ms['date'];
                    $description = $ms['description'];
                    $img = $ms['img'];
                    $adress = $ms['adress'];
                    $sql2 = "SELECT name FROM categorie where id_categ= :id_categ ";
					$stmt2 = $pdo->prepare($sql2);
					$stmt2->execute([':id_categ' => $id_categ]);
					while ($categ = $stmt2->fetch(PDO::FETCH_ASSOC)) {
					
						$name = $categ['name'];

                ?>



                    <!-- News Block Three -->
                    <br>
                    </br>
                    <div class="blo4 p-b-63">





                        <div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
                            <a href="event.php">

                                <img src="./images/<?php echo $img; ?>" />
                            </a>
                            <div class="date-blo4 flex-col-c-m">
                                <span class="txt30 m-b-4">


                                </span>
                                <span class="txt31">
                                    <?php

                                    $ArrivalDate = $date;

                                    $daydiff = floor((abs(strtotime(date("Y-m-d")) - strtotime($ArrivalDate)) / (60 * 60 * 24)));

                                    echo "j-\n$daydiff";

                                    ?>
                                </span>

                            </div>

                        </div>


                        <div class="text-blo4 p-t-33">
                            <h4 class="p-b-16">
                                <a href="event.php" class="tit9"><?php echo $title; ?> </a>
                            </h4>

                            <div class="txt32 flex-w p-b-24">
                                <span>
                                    Places: <?php echo $nbplaces; ?>
                                    <span class="m-r-6 m-l-4">|</span>
                                </span>

                                <span>
                                    <?php echo $date; ?>

                                    <span class="m-r-6 m-l-4">|</span>
                                </span>

                                <span>
                                <?php echo $name; ?>
                                    <span class="m-r-6 m-l-4">|</span>
                                </span>

                                <span>
                                    <?php echo $adress; ?>
                                </span>
                            </div>

                            <p>

                                <?php echo $description; ?>
                            </p>
                            <a href="event.php?id=<?PHP echo $id; ?>" class="dis-block txt4 m-t-30">
                                Continue Reading

                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>

                            </a>
                        </div>

                    </div>
                <?php
                    }

                }
                ?>




            
            </div>

            <div class="col-md-4 col-lg-3">
                <div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
                    <!-- Search -->
                    <div class="search-sidebar2 size12 bo2 pos-relative">
                        <input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
                        <button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
                    </div>

                    <!-- eventories -->
                    <div class="eventories">

                        <h4 class="txt33 bo5-b p-b-35 p-t-58">
                            Categories
                        </h4>
                        <?php
                        $sql = "SELECT * FROM Categorie";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        while ($participant = $stmt->fetch(PDO::FETCH_ASSOC)) {

                            $id_categ = $participant['id_categ'];
                            $name = $participant['name'];


                        ?>
                            <ul>
                                <li class="bo5-b p-t-8 p-b-8">
                                    <a href="categ.php?id_categ=<?PHP echo $id_categ; ?>" class="txt27">
                                        <?php echo $name; ?>
                                    </a>
                                </li>
                            </ul>
                        <?php }
                        ?>
                    </div>

                    <!-- Most Popular -->
                    <div class="popular">
                        <h4 class="txt33 p-b-35 p-t-58">
                            Recent Post
                        </h4>
                        <?php

                        $sql1 = "SELECT * FROM evenement ORDER BY date  DESC ";
                        $stmt1 = $pdo->prepare($sql1);
                        $stmt1->execute();
                        while ($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                            $title = $ms['title'];
                            $date = $ms['date'];
                            $img = $ms['img'];
							$id = $ms['id'];

                        ?>
                            <ul>
                                <li class="flex-w m-b-25">
                                    <div class="size17 bo-rad-10 wrap-pic-w of-hidden m-r-18">
                                        <a href="#">
                                            <img src="./images/<?php echo $img; ?>" alt="IMG-BLOG"> </a>

                                        </a>
                                    </div>

                                    <div class="size28">
                                        <a href="#" class="dis-block txt28 m-b-8">
                                            <?php echo $title; ?> </a>

                                        <span class="txt14">
                                            <?php echo $date; ?> </span>
                                    </div>
                                </li>


                            </ul>
                        <?php
                        }
                        ?>
                    </div>



                </div>
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



<?php require_once("./includes/footer.php"); ?>

</body>

</html>
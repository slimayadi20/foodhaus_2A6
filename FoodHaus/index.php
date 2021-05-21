<?php $current_page = "index";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Home </title>

<!-- Slide1 -->
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			>

			<div class="item-slick1 item1-slick1" style="background-image: url(images/slide1-01.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">

					<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
						Welcome to
					</span>

					<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
						FoodHaus
					</h2>

					<div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
						<!-- Button1 -->
						<a href="Restaurant.php" class="btn1 flex-c-m size1 txt3 trans-0-4">
							Our Restaurants
						</a>
					</div>
				</div>
			</div>

			<div class="item-slick1 item2-slick1" style="background-image: url(images/master-slides-02.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
						Welcome to
					</span>

					<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
						FoodHaus
					</h2>

					<div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
						<!-- Button1 -->
						<a href="chefs.php" class="btn1 flex-c-m size1 txt3 trans-0-4">
							check our Chefs
						</a>
					</div>
				</div>
			</div>

			<div class="item-slick1 item3-slick1" style="background-image: url(images/master-slides-01.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
						Welcome to
					</span>

					<h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
						FoodHaus
					</h2>

					<div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
						<!-- Button1 -->
						<a href="formation.php" class="btn1 flex-c-m size1 txt3 trans-0-4">
							Our sessions
						</a>
					</div>
				</div>
			</div>

		</div>

		<div class="wrap-slick1-dots"></div>
	</div>
</section>

<!-- Intro -->
<section class="section-intro">



	</div>
	<div class="content-intro bg-white p-t-77 p-b-133">
		<div class="container">

			<div class="title-section-ourmenu t-center m-b-22">
				<span class="tit2 t-center">
					Our Famous Chefs
				</span>
				<br> <br>
				<?php
				$sql1 = "SELECT * FROM chefs order by id_chef desc limit 1";
				$stmt1 = $pdo->prepare($sql1);
				$stmt1->execute([]);
				$sql2 = "SELECT * FROM chefs order by id_chef asc limit 1 ";
				$stmt2 = $pdo->prepare($sql2);
				$stmt2->execute([]);
				$sql3 = "SELECT * FROM chefs order by id_chef LIMIT 1 OFFSET 1";
				$stmt3 = $pdo->prepare($sql3);
				$stmt3->execute([]);


				$ms = $stmt1->fetch(PDO::FETCH_ASSOC);

				$mss = $stmt2->fetch(PDO::FETCH_ASSOC);
				$msss = $stmt3->fetch(PDO::FETCH_ASSOC);
				$id_chef = $ms['id_chef'];
				$nom = $ms['nom'];
				$img_chef = $ms['img_chef'];
				$img_plat1_chef = $ms['img_plat1_chef'];
				$citation = $ms['citation_chef'];

				$id_chef1 = $mss['id_chef'];
				$nom1 = $mss['nom'];
				$img_chef1 = $mss['img_chef'];
				$img_plat1_chef1 = $mss['img_plat1_chef'];
				$citation1 = $mss['citation_chef'];

				$id_chef2 = $msss['id_chef'];
				$nom2 = $msss['nom'];
				$img_chef2 = $msss['img_chef'];
				$img_plat1_chef2 = $msss['img_plat1_chef'];
				$citation2 = $msss['citation_chef'];


				?>


				<div class="row">

					<div class="col-md-4 p-t-30">

						<!-- Block1 -->
						<div class="blo1">
							<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
								<a href="#"><img src="images/<?php echo $img_chef; ?>" width="500" height="400" alt="IMG-INTRO"></a>
							</div>

							<div class="wrap-text-blo1 p-t-35">
								<a href="#">
									<h4 class="txt5 color0-hov trans-0-4 m-b-13">
										<?PHP echo $nom; ?>
									</h4>
								</a>

								<p class="m-b-20">
									<?PHP echo $citation; ?>
								</p>


							</div>
						</div>
					</div>

					<div class="col-md-4 p-t-30">
						<!-- Block1 -->
						<div class="blo1">
							<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
								<a href="#"><img src="images/<?php echo $img_chef1; ?>" width="500" height="400" alt="IMG-INTRO"></a>
							</div>

							<div class="wrap-text-blo1 p-t-35">
								<a href="#">
									<h4 class="txt5 color0-hov trans-0-4 m-b-13">
										<?php echo $nom1; ?> </h4>
								</a>

								<p class="m-b-20">
									<?php echo $citation1; ?> </p>

								<a href="chefs.php" class="txt4">
									See All
									<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
								</a>



							</div>
						</div>
					</div>

					<div class="col-md-4 p-t-30">
						<!-- Block1 -->
						<div class="blo1">
							<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
								<a href="#"><img src="images/<?php echo $img_chef2; ?>" width="500" height="400" alt="IMG-INTRO"></a>
							</div>

							<div class="wrap-text-blo1 p-t-35">
								<a href="#">
									<h4 class="txt5 color0-hov trans-0-4 m-b-13">
										<?php echo $nom2; ?> </h4>
								</a>

								<p class="m-b-20">
									<?php echo $citation2; ?> </p>


							</div>
						</div>
					</div>

				</div>
			</div>
			<?php
			// }
			?>
		</div>


</section>


<!-- Event -->
<section class="section-event">
	<div class="wrap-slick2">
		<div class="slick2">
			<div class="item-slick2 item1-slick2" style="background-image: url(images/bg-event-01.jpg);">
				<div class="wrap-content-slide2 p-t-115 p-b-208">
					<div class="container">
						<?php
						$sql1 = "SELECT * FROM evenement order by id desc limit 1 ";
						$stmt1 = $pdo->prepare($sql1);
						$stmt1->execute([]);
						$sql2 = "SELECT * FROM evenement order by id asc limit 1 ";
						$stmt2 = $pdo->prepare($sql2);
						$stmt2->execute([]);
						$sql3 = "SELECT * FROM evenement order by id LIMIT 1 OFFSET 1";
						$stmt3 = $pdo->prepare($sql3);
						$stmt3->execute([]);


						while (($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) && ($mss = $stmt2->fetch(PDO::FETCH_ASSOC)) && ($msss = $stmt3->fetch(PDO::FETCH_ASSOC))) {
							$title = $ms['title'];
							$id = $ms['id'];
							$nbplaces = $ms['nbplaces'];
							$date = $ms['date'];
							$description = $ms['description'];
							$img = $ms['img'];
							$adress = $ms['adress'];
							$id_categ = $ms['id_categ'];

							$title1 = $mss['title'];
							$id1 = $mss['id'];
							$nbplaces1 = $mss['nbplaces'];
							$date1 = $mss['date'];
							$description1 = $mss['description'];
							$img1 = $mss['img'];
							$adress1 = $mss['adress'];
							$id_categ1 = $mss['id_categ'];

							$title2 = $msss['title'];
							$id2 = $msss['id'];
							$nbplaces2 = $msss['nbplaces'];
							$date2 = $msss['date'];
							$description2 = $msss['description'];
							$img2 = $msss['img'];
							$adress2 = $msss['adress'];
							$id_categ2 = $msss['id_categ'];

						?>
							<!-- - -->
							<div class="title-event t-center m-b-52">
								<span class="tit2 p-l-15 p-r-15">
									Upcomming
								</span>

								<h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
									Events
								</h3>
							</div>


							<!-- Block2 -->
							<div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="zoomIn">
								<!-- Pic block2 -->
								<a href="event.php?id=<?PHP echo $id; ?>" class="wrap-pic-blo2 bg1-blo2" style="background-image: url(images/<?php echo $img; ?>);">
									<div class="time-event size10 txt6 effect1">
										<span class="txt-effect1 flex-c-m t-center">
											<?PHP echo $date; ?> </p>
										</span>
									</div>
								</a>

								<!-- Text block2 -->
								<div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
									<h4 class="tit7 t-center m-b-10">
										<?PHP echo $title; ?> </p>
									</h4>

									<p class="t-center">
										<?PHP echo $description; ?> </p>
									</p>
									<a href="event.php?id=<?PHP echo $id; ?>" class="txt4 m-t-40">
										View Details
										<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
									</a>
								</div>
							</div>
					</div>
				</div>
			</div>

			<div class="item-slick2 item2-slick2" style="background-image: url(images/bg-event-02.jpg);">
				<div class="wrap-content-slide2 p-t-115 p-b-208">
					<div class="container">
						<!-- - -->
						<div class="title-event t-center m-b-52">
							<span class="tit2 p-l-15 p-r-15">
								Upcomming
							</span>

							<h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
								Events
							</h3>
						</div>

						<!-- Block2 -->
						<div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="fadeInDown">
							<!-- Pic block2 -->
							<a href="event.php?id=<?PHP echo $id1; ?>" class="wrap-pic-blo2 bg2-blo2" style="background-image: url(images/<?php echo $img1; ?>);">
								<div class="time-event size10 txt6 effect1">
									<span class="txt-effect1 flex-c-m">
										<?php echo $date1; ?> </span>
								</div>
							</a>

							<!-- Text block2 -->
							<div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
								<h4 class="tit7 t-center m-b-10">
									<?php echo $title1; ?> </h4>

								<p class="t-center">
									<?php echo $description1; ?> </p>



								<a href="event.php?id=<?PHP echo $id1; ?>" class="txt4 m-t-40">
									View Details
									<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick2 item3-slick2" style="background-image: url(images/bg-event-04.jpg);">
				<div class="wrap-content-slide2 p-t-115 p-b-208">
					<div class="container">
						<!-- - -->
						<div class="title-event t-center m-b-52">
							<span class="tit2 p-l-15 p-r-15">
								Upcomming
							</span>

							<h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
								Events
							</h3>
						</div>

						<!-- Block2 -->
						<div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false" data-appear="rotateInUpLeft">
							<!-- Pic block2 -->
							<a href="event.php?id=<?PHP echo $id2; ?>" class="wrap-pic-blo2 bg3-blo2" style="background-image: url(images/<?php echo $img2; ?>);">
								<div class="time-event size10 txt6 effect1">
									<span class="txt-effect1 flex-c-m">
										<?php echo $date2; ?> </span>
								</div>
							</a>

							<!-- Text block2 -->
							<div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
								<h4 class="tit7 t-center m-b-10">
									<?php echo $title2; ?>
								</h4>

								<p class="t-center">
									<?php echo $description2; ?>
								</p>

								<a href="event.php?id=<?PHP echo $id2; ?>" class="txt4 m-t-40">
									View Details
									<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
								</a>

							</div>


						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="wrap-slick2-dots"></div>
	</div>
<?php
						}
?>
</section>

<?php
if (isset($_POST['book'])) {


	$name = $_POST['name'];
	$url = "http://localhost/FoodHaus/reservation.php?for=" . $name;



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


	$resto = $_POST['Restaurant'];
	$date = $_POST['date'];
	$heure = $_POST['time'];
	$person = $_POST['people'];
	$nom_prenom = $_POST['name'];
	$telephone = $_POST['phone'];



	$sql = "INSERT INTO reservation (resto,date,heure,person,nom,telephone,email) values (:resto, :date,:heure,:person,:nom_prenom,:telephone,:email) ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([

		':resto' => $resto,
		':date' => $date,
		':heure' => $heure,
		':person' => $person,
		':nom_prenom' => $nom_prenom,
		':telephone' => $telephone,
		':email' => $user_email
	]);
	echo '<body onLoad="alert(\'Reservartion confirmé\')">';
	header("Location: {$url}");
}
?>
<!-- Booking -->
<section class="section-booking bg1-pattern p-t-100 p-b-110">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 p-b-30">
				<div class="t-center">
					<span class="tit2 t-center">
						Reservation
					</span>

					<h3 class="tit3 t-center m-b-35 m-t-2">
						Book table
					</h3>
				</div>

				<form action="index.php" method="POST">
					<div class="row">
						<div class="col-md-6">
							<span class="txt9">
								Restaurant
							</span>

							<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<!-- Select2 -->


								<select class="bo-rad-10 sizefull txt10 p-l-20" name="Restaurant">
									<?php
									$sql1 = "SELECT * FROM restaurant order by  nom ASC";
									$stmt1 = $pdo->prepare($sql1);
									$stmt1->execute([]);
									while ($restaurant = $stmt1->fetch(PDO::FETCH_ASSOC)) {
										$nom = $restaurant['nom'];
									?>
										<option><?PHP echo $nom; ?></option>
									<?php } ?>
								</select>
							</div>
							<!-- Date -->
							<span class="txt9">
								Date
							</span>

							<div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" name="date">
								<i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18" aria-hidden="true"></i>
							</div>

							<!-- Time -->
							<span class="txt9">
								Time
							</span>

							<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<!-- Select2 -->
								<input class=" bo-rad-10 sizefull txt10 p-l-20" type="text" name="time" placeholder="When exactly">
							</div>

							<!-- People -->

						</div>

						<div class="col-md-6">
							<!-- Name -->
							<span class="txt9">
								Name
							</span>

							<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name">
							</div>

							<!-- Phone -->
							<span class="txt9">
								Phone
							</span>

							<div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone" placeholder="Phone">
							</div>

							<!-- Email -->
							<span class="txt9">
								People
							</span>

							<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="people" placeholder="how many">
							</div>
						</div>
					</div>

					<div class="wrap-btn-booking flex-c-m m-t-6">
						<!-- Button3 -->
						<button name="book" type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
							Book Table
						</button>
					</div>
				</form>
			</div>

			<div class="col-lg-6 p-b-30 p-t-18">
				<div class="wrap-pic-booking size2 bo-rad-10 hov-img-zoom m-l-r-auto">
					<img src="images/booking-01.jpg" alt="IMG-OUR">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Review -->
<section class="section-review p-t-115">
	<!-- - -->
	<div class="title-review t-center m-b-2">
		<span class="tit2 p-l-15 p-r-15">
			Customers Say
		</span>

		<h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
			Review
		</h3>
	</div>

	<!-- - -->
	<div class="wrap-slick3">
		<div class="slick3">
			<div class="item-slick3 item1-slick3">
				<div class="wrap-content-slide3 p-b-50 p-t-50">
					<div class="container">
						<div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
							<img src="images/avatar-01.jpg" alt="IGM-AVATAR">
						</div>

						<div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
							<p class="t-center txt12 size15 m-l-r-auto">
								“ One of the best places i've ever been to ”
							</p>

							<div class="star-review fs-18 color0 flex-c-m m-t-12">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
							</div>

							<div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
								Slim Ayadi ˗ Sfax
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick3 item2-slick3">
				<div class="wrap-content-slide3 p-b-50 p-t-50">
					<div class="container">
						<div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
							<img src="images/avatar-04.jpg" alt="IGM-AVATAR">
						</div>

						<div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
							<p class="t-center txt12 size15 m-l-r-auto">
								“This place is just awesome ”
							</p>

							<div class="star-review fs-18 color0 flex-c-m m-t-12">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
							</div>

							<div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
								Omar Nouri ˗ Sfax
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick3 item3-slick3">
				<div class="wrap-content-slide3 p-b-50 p-t-50">
					<div class="container">
						<div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
							<img src="images/avatar-05.jpg" alt="IGM-AVATAR">
						</div>

						<div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
							<p class="t-center txt12 size15 m-l-r-auto">
								“ incredible! ”
							</p>

							<div class="star-review fs-18 color0 flex-c-m m-t-12">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
								<i class="fa fa-star p-l-1" aria-hidden="true"></i>
							</div>

							<div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
								Karim Trabelsi ˗ Sfax
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="wrap-slick3-dots m-t-30"></div>
	</div>
</section>


<!-- Video -->
<section class="section-video parallax100" style="background-image: url(images/bg-cover-video-02.jpg);">
	<div class="content-video t-center p-t-225 p-b-250">
		<span class="tit2 p-l-15 p-r-15">
			Discover
		</span>

		<h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
			Our Video
		</h3>

		<div class="btn-play ab-center size16 hov-pointer m-l-r-auto m-t-43 m-b-33" data-toggle="modal" data-target="#modal-video-01">
			<div class="flex-c-m sizefull bo-cir bgwhite color1 hov1 trans-0-4">
				<i class="fa fa-play fs-18 m-l-2" aria-hidden="true"></i>
			</div>
		</div>
	</div>
</section>


<!-- Blog -->
<section class="section-blog bg-white p-t-115 p-b-123">
	<div class="container">
		<div class="title-section-ourmenu t-center m-b-22">
			<span class="tit2 t-center">
				Our Famous Restaurants
			</span>


		</div>
		<?php
		$sql1 = "SELECT * FROM restaurant order by id desc limit 1";
		$stmt1 = $pdo->prepare($sql1);
		$stmt1->execute([]);
		$sql2 = "SELECT * FROM restaurant order by id asc limit 1 ";
		$stmt2 = $pdo->prepare($sql2);
		$stmt2->execute([]);
		$sql3 = "SELECT * FROM restaurant order by id LIMIT 1 OFFSET 1";
		$stmt3 = $pdo->prepare($sql3);
		$stmt3->execute([]);


		$ms = $stmt1->fetch(PDO::FETCH_ASSOC);

		$nom = $ms['nom'];
		$type = $ms['type'];
		$image = $ms['image'];

		$mss = $stmt2->fetch(PDO::FETCH_ASSOC);

		$nom1 = $mss['nom'];
		$type1 = $mss['type'];
		$image1 = $mss['image'];

		$msss = $stmt3->fetch(PDO::FETCH_ASSOC);

		$nom2 = $msss['nom'];
		$type2 = $msss['type'];
		$image2 = $msss['image'];

		?>

		<div class="row">
			<div class="col-md-4 p-t-30">
				<!-- Block1 -->
				<div class="blo1">
					<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
						<a href="blog-detail.html"><img src="assets/img/<?php echo $image; ?>" width="500" height="400" alt="IMG-INTRO"></a>

						<div class="time-blog">
							Open
						</div>
					</div>

					<div class="wrap-text-blo1 p-t-35">
						<a href="blog-detail.html">
							<h4 class="txt5 color0-hov trans-0-4 m-b-13">
								<?php echo $nom; ?>
							</h4>
						</a>

						<p class="m-b-20">
							<?php echo $type; ?>
						</p>


					</div>
				</div>
			</div>

			<div class="col-md-4 p-t-30">
				<!-- Block1 -->
				<div class="blo1">
					<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
						<a href="blog-detail.html"><img src="assets/img/<?php echo $image1; ?>" width="500" height="400" alt="IMG-INTRO"></a>

						<div class="time-blog">
							Open
						</div>
					</div>

					<div class="wrap-text-blo1 p-t-35">
						<a href="blog-detail.html">
							<h4 class="txt5 color0-hov trans-0-4 m-b-13">
								<?php echo $nom1; ?>
							</h4>
						</a>

						<p class="m-b-20">
							<?php echo $type1; ?>
						</p>

						<a href="Restaurant.php" class="txt4">
							See All
							<i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
						</a>
					</div>
				</div>
			</div>

			<div class="col-md-4 p-t-30">
				<!-- Block1 -->
				<div class="blo1">
					<div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
						<a href="blog-detail.html"><img src="assets/img/<?php echo $image2; ?>" width="500" height="400" alt="IMG-INTRO"></a>

						<div class="time-blog">
							Open
						</div>
					</div>

					<div class="wrap-text-blo1 p-t-35">
						<a href="blog-detail.html">
							<h4 class="txt5 color0-hov trans-0-4 m-b-13">
								<?php echo $nom2; ?>
							</h4>
						</a>

						<p class="m-b-20">
							<?php echo $type2; ?>
						</p>


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

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

<!-- Modal Video 01-->
<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

	<div class="modal-dialog" role="document" data-dismiss="modal">
		<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

		<div class="wrap-video-mo-01">
			<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
			<div class="video-mo-01">
				<iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>



<?php require_once("./includes/footer.php"); ?>
</body>

</html>
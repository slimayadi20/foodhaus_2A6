<?php $current_page = "event";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Evenement Detaillé ! </title>

<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-03.jpg);">
	<h2 class="tit6 t-center">
		Evenement
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

			<a href="events.php" class="txt27">
				Evenement
			</a>



		</div>
	</div>





	<div class="container">

		<div class="row ">
			<div class="col-md-8 col-lg-9">
			
			
			
			<?PHP
				$id = $_GET['id'];
				$sql1 = "SELECT * FROM evenement where id=:id ";
				$stmt1 = $pdo->prepare($sql1);
				$stmt1->execute([
					':id' => $id
				]);
				while ($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) {
					$title = $ms['title'];
					$nbplaces = $ms['nbplaces'];
					$date = $ms['date'];
					$description = $ms['description'];
					$img = $ms['img'];
					$adress = $ms['adress'];
					$id_categ = $ms['id_categ'];

					$sql2 = "SELECT name FROM categorie where id_categ= :id_categ ";
					$stmt2 = $pdo->prepare($sql2);
					$stmt2->execute([':id_categ' => $id_categ]);
					while ($categ = $stmt2->fetch(PDO::FETCH_ASSOC)) {
					
						$name = $categ['name'];
					
				?>



					<div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">

						<!-- Block4 -->
						<div class="blo4 p-b-63">
							<!-- - -->
							<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
								<a href="blog-detail.html">
									<img src="./images/<?php echo $img; ?>" alt="IMG-BLOG"> </a>


							</div>

							<!-- - -->
							<div class="text-blo4 p-t-33">
								<h4 class="p-b-16">

									<a href="blog-detail.html" name="title" class="tit9"><?php echo $title; ?></a>


									<br>


								</h4>
							<?php
						}}
							?>
							<div class="txt32 flex-w p-b-24">

								<span>
									places : <?php echo $nbplaces; ?> <span class="m-r-6 m-l-4">|</span>
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
									<?php echo $adress ?>

								</span>
							</div>

							<p>
								<?php
								$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
								// https://www.codexworld.com/like-dislike-rating-system-jquery-ajax-php/
								// echo $actual_link;
								?>
								<?php echo $description;?>
								&emsp; 	<?php 	echo ' <iframe src="https://www.facebook.com/plugins/share_button.php?href=' . $actual_link . '  &layout=button_count&size=large&mobile_iframe=true&width=83&height=28&appId" width="110" height="28" style="margin:0px;border:none;overflow:hidden" scrolling="no" frameborder="11" allowTransparency="true"></iframe>'; ?> </p>
							</div>
							<br>
							</br>

							<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $adress; ?>&output=embed"></iframe>

						</div>

						<!-- Leave a comment -->
						<form class="leave-comment p-t-10" action="event.php" method="post">
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

							<?php

							//ajout
							include "./controller/participant_C.php";
							include "./model/participant.php";

							if (isset($_POST['submit'])) {

								$id = $_POST['id'];
								$particip = new participant($_POST['id_participant'], $_POST['name'], $_POST['mail'], $_POST['id']);
								$participant = new participant_C;
								$participant->ajouterparticipant($particip);



								$sql1 = "SELECT * FROM evenement where id=:id ";
								$stmt1 = $pdo->prepare($sql1);
								$stmt1->execute([
									':id' => $id
								]);
								while ($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) {
									$title = $ms['title'];
									$nbplaces = $ms['nbplaces'];
									$date = $ms['date'];
									$description = $ms['description'];
									$img = $ms['img'];
									$adress = $ms['adress'];






									$to_email = $_POST['mail'];
									$subject = "INVITATION EVENT !!";
									$message = "   Hello, " . $_POST['name'] . ",\r\n Thank you for registering for " . $ms['title'] . "! we are looking forward to seeing you there. \r\n Event details : \r\n When : " . $ms['date'] . "\r\n Where : " . $ms['adress'] . "\r\n Best Regard FOODHAUS.";

									$headers = 'From: FOODHAUS';
									mail($to_email, $subject, $message, $headers);
								}

								$sql = "UPDATE evenement SET nbplaces = nbplaces -1 where  id=:id ";

								$stmt1 = $pdo->prepare($sql);
								$stmt1->execute([
									':id' => $id
								]);



								echo '<body onLoad="alert(\'Votre participant a été ajoutée avec succès\')">';

								echo '<meta http-equiv="refresh" content="0;URL=events.php">';
								/*$req="insert INTO participant(refC,nomC,ideventcreation,description,quantity) values('".$_POST['refC']."','".$_POST['nomC']."',".$_POST['ideventcreation'].",'".$_POST['description']."','".$_POST['quantity']."')";
   
									$db=config::getConnexion();  
									$sql=$db->prepare($req); 
									$sql->execute(); */
							}
							?>
							<?php
							if (isset($_COOKIE['_uid_']) || isset($_COOKIE['_uiid_']) || isset($_SESSION['login'])) { ?>
								<form class="wrap-form-reservation size22 m-l-r-auto" action="contact.php" method="POST">
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
									<h4 class="txt33 p-b-14">
										Pour participer a cet evenement veuillez introduire ses champs :
									</h4>

									<div class="size30 bo2 bo-rad-10 m-t-3 m-b-20">
										<input value="<?php echo $user_name; ?>"  class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name">
									</div>

									<div class="size30 bo2 bo-rad-10 m-t-3 m-b-20">
										<input class="bo-rad-10 sizefull txt10 p-l-20" value="<?php echo $user_email; ?>" type="text" name="mail">
									</div>
									<input class="" type="hidden" name="id" value=" <?php echo $_GET['id'] ?>">


									<!-- Button3 -->
									<button type="submit" class="btn3 flex-c-m size31 txt11 trans-0-4" name="submit">
										Subscribe
									</button>

								<?php } else { ?>
									<div>
										<img class="rounded mx-auto d-block" height="300" width="500" src="images/login.svg" alt="">
										<p class=" alert alert-danger text-dark t-center">Veuillez connecter pour s'inscrire!</p>

									</div>

								<?php }
								?>


								<div class="wrap-btn-booking flex-c-m m-t-13">
									<!-- Button3 -->

								</div>
								</form>
					</div>

			</div>
			<div class="col-md-4 col-lg-3">
				<div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
					<!-- Search -->
					<div class="search-sidebar2 size12 bo2 pos-relative">
						<input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
						<button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
					</div>

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
									<a href="categ.php?id_categ=<?PHP echo $id_categ; ?>"  class="txt27">
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
										<a href="event.php?id=<?PHP echo $id; ?>">
											<img src="./images/<?php echo $img; ?>" alt="IMG-BLOG"> </a>

										</a>
									</div>

									<div class="size28">
										<a href="event.php?id=<?PHP echo $id; ?>" class="dis-block txt28 m-b-8">
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
						8th floor, 379 Hudson St, New York, NY 10018
					</li>

					<li class="txt14 m-b-14">
						<i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
						(+1) 96 716 6879
					</li>

					<li class="txt14 m-b-14">
						<i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
						contact@site.com
					</li>
				</ul>

				<!-- - -->
				<h4 class="txt13 m-b-32">
					Opening Times
				</h4>

				<ul>
					<li class="txt14">
						09:30 AM – 11:00 PM
					</li>

					<li class="txt14">
						Every Day
					</li>
				</ul>
			</div>

			<div class="col-sm-6 col-md-4 p-t-50">
				<!-- - -->
				<h4 class="txt13 m-b-33">
					Latest twitter
				</h4>

				<div class="m-b-25">
					<span class="fs-13 color2 m-r-5">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</span>
					<a href="#" class="txt15">
						@colorlib
					</a>

					<p class="txt14 m-b-18">
						Activello is a good option. It has a slider built into that displays the featured image in the slider.
						<a href="#" class="txt15">
							https://buff.ly/2zaSfAQ
						</a>
					</p>

					<span class="txt16">
						21 Dec 2017
					</span>
				</div>

				<div>
					<span class="fs-13 color2 m-r-5">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</span>
					<a href="#" class="txt15">
						@colorlib
					</a>

					<p class="txt14 m-b-18">
						Activello is a good option. It has a slider built into that displays
						<a href="#" class="txt15">
							https://buff.ly/2zaSfAQ
						</a>
					</p>

					<span class="txt16">
						21 Dec 2017
					</span>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 p-t-50">
				<!-- - -->
				<h4 class="txt13 m-b-38">
					Gallery
				</h4>

				<!-- Gallery footer -->
				<div class="wrap-gallery-footer flex-w">
					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-01.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-01.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-02.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-02.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-03.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-03.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-04.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-04.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-05.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-05.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-06.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-06.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-07.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-07.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-08.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-08.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-09.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-09.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-10.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-10.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-11.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-11.jpg" alt="GALLERY">
					</a>

					<a class="item-gallery-footer wrap-pic-w" href="images/photo-gallery-12.jpg" data-lightbox="gallery-footer">
						<img src="images/photo-gallery-thumb-12.jpg" alt="GALLERY">
					</a>
				</div>

			</div>
		</div>
	</div>

	<div class="end-footer bg2">
		<div class="container">
			<div class="flex-sb-m flex-w p-t-22 p-b-22">
				<div class="p-t-5 p-b-5">
					<a href="#" class="fs-15 c-white"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
					<a href="#" class="fs-15 c-white"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
					<a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
				</div>

				<div class="txt17 p-r-20 p-t-5 p-b-5">
					Copyright &copy; 2018 All rights reserved | This template is made with <i class="fa fa-heart"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
<script type="text/javascript" src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>

</html>
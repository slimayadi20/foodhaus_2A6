<?php $current_page = "panier";
$curr_page = basename(__FILE__); ?>

<title>Panier</title>

<?php require_once("./includes/navbar.php"); ?>

<body class="animsition">







	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-02.jpg);">
		<h2 class="tit6 t-center">
			Panier
		</h2>
	</section>

	<!-- Formule -->
	<link rel="stylesheet" href="css/panier.css">
	<section class="content-table">
		<div class="">
			<div class="">
				<div class="">
					<div class="">
						<?php
						if (isset($_COOKIE['_uid_']) || isset($_COOKIE['_uiid_']) || isset($_SESSION['login'])) { ?>

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

							<table class="content-table">
								<thead id="table">
									<tr>


										<th>Menu</th>
										<th>Nom</th>
										<th>Prix</th>
										<th></th>
										<th></th>
										<th>Action</th>

									</tr>
								</thead>
								<?php
								$sql = "SELECT * FROM items";
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								if ($stmt->rowCount() > 0) {

									while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {

										$id = $event['id'];
										$dir = $event['dir'];
										$name = $event['name'];
										$price = $event['price'];

								?>

										<tbody id="table">
											<tr>
												<td>
													<img src="
																<?php
																echo $dir;
																?>
																	" width="100" height="75">
												</td>
												<td>
													<?PHP echo $name; ?>
												</td>

												<td id="price" value="10">
													<?PHP echo $price;
													?>DT
												</td>
												<td>


					</div>
					</td>
					<td></td>
					<?php
										if (isset($_POST['supprimer'])) {
											$id = $_POST['com-id'];
											$sql = "DELETE FROM items WHERE id = :id";
											$stmt = $pdo->prepare($sql);
											$stmt->execute([':id' => $id]);
											header("Location: panier.php");
										}
					?>
					<td>
						<form method="POST" action="panier.php">
							<input type="hidden" name="com-id" value="<?php echo $id; ?>">
							<button id="btn" class="btn btn-outline-primary" type="submit" name="supprimer" value="supprimer"><i class="fa fa-trash"></i></button>

						</form>
					</td>

					</tr>
				<?php }
				?>
				</tbody>


				</table>
				<?php
									$conn = mysqli_connect('localhost', 'root', '', 'foodhaus');
									if (!$conn) {
										echo "DB error";
									}
									$query = "select sum(price) as 'totalprice' from items";
									$res = mysqli_query($conn, $query);
									$data = mysqli_fetch_array($res);
				?>
				<input hidden type="text" value="Prix total:<?php echo $data['totalprice'];  ?>"><i id="btn" class=" mx-auto d-block btn"> Prix total: <?php echo $data['totalprice'];  ?>DT </i></input>
				<a type="button" id="btn" class=" mx-auto d-block btn" href="payment.php" role="button"><i>Finaliser votre commande</i> </a>
				</div>
			<?php } else { ?>
				<script>
					document.getElementById("table").style.display = 'none';
				</script>
				<img class="rounded mx-auto d-block" height="300" width="500" src="images/empty.svg" alt="">
				<p class=" alert alert-danger text-dark t-center">Votre panier est vide!</p>
			<?php }
			?>
			<div>
			<?php } else { ?>
				<div>
					<img class="rounded mx-auto d-block" height="300" width="500" src="images/login.svg" alt="">
					<p class=" alert alert-danger text-dark t-center">Veuillez connecter pour passer une commande!</p>

				</div>
			<?php }
			?>
			</div>
			</div>
		</div>
		</div>
	</section>
	<!-- Formule -->


	<section>
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

		<!-- Container Selection1 -->
		<div id="dropDownSelect1"></div>

	</section>

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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>
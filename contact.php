<?php $current_page = "contact";
$curr_page = basename(__FILE__); ?>
<title>Contact</title>
<?php  require_once("./includes/navbar.php"); ?>



	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-02.jpg);">
		<h2 class="tit6 t-center">
			Contact
		</h2>
	</section>



	<!-- Contact form -->
	<section class="section-contact bg1-pattern p-t-90 p-b-113">
		<!-- Map -->
		<div class="container">
			<div class="map bo8 bo-rad-10 of-hidden">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3190.663777292153!2d10.189127709868018!3d36.89839089336073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e2cb7454c6ed51%3A0x683b3ab5565cd357!2sESPRIT!5e0!3m2!1sen!2stn!4v1619784865413!5m2!1sen!2stn" width="1160" height="455" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
		</div>

		<div class="container">
			<h3 class="tit7 t-center p-b-62 p-t-105">
				Send us a Message
			</h3>
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

					if (isset($_POST['send'])) {
						$message = trim($_POST['message']);
						date_default_timezone_set('Africa/Tunis');
						$sql = "INSERT INTO messages SET ms_username = :username, ms_usermail = :email, ms_detail = :detail, ms_date = :date";
						$stmt = $pdo->prepare($sql);
						$stmt->execute([
							':username' => $user_name,
							':email' => $user_email,
							':detail' => $message,
							':date' => date("D, M, Y") . ' at ' . date("h:i A")
						]);
						echo "<p class='alert alert-success'>Message has been send successfully!</p>";
					}
					?>
					<div class="row">
						<div class="col-md-6">
							<!-- Name -->
							<span class="txt9">
								Name
							</span>

							<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input value="<?php echo $user_name; ?>" readonly="true" class="form-control py-4" id="inputName" type="text" placeholder="Full name" />
							</div>
						</div>

						<div class="col-md-6">
							<!-- Email -->
							<span class="txt9">
								Email
							</span>

							<div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
								<input value="<?php echo $user_email; ?>" readonly="true" class="form-control py-4" id="inputEmail" type="email" placeholder="name@example.com" />
							</div>
						</div>



						<div class="col-12">
							<!-- Message -->
							<span class="txt9">
								Message
							</span>
							<textarea name="message" required maxlength="100" rows="6" class="form-control py-3" id="inputMessage" type="text" placeholder="Enter your message..." rows="4"></textarea>
						</div>
					</div>

					<div class="wrap-btn-booking flex-c-m m-t-13">
						<!-- Button3 -->
						<button name="send" type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
							Send
						</button>
					</div>
				</form>
				<div class="card-body">
					<div class="datatable table-responsive">
						<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Your messages:</th>
									<th>Answers:</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql1 = "SELECT * FROM messages WHERE ms_usermail = :email";
								$stmt1 = $pdo->prepare($sql1);
								$stmt1->execute([
									':email' => $user_email
								]);
								while ($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) {
									$ms_detail = $ms['ms_detail'];
									$reply = $ms['reply']; ?>
									<tr>
										<td>
											<readonly="true" textarea name="message" class="form-control py-3" id="inputMessage" type="text"><?php echo $ms_detail; ?></textarea>
										</td>
										<td><?php echo $reply; ?></td>
									</tr>
								<?php }
								?>
							</tbody>
						</table>
					</div>
				</div>

			<?php } else { ?>
				<a href="./backend/signin.php">Sign in to contact us!</a>
			<?php }
			?>


			<div class="row p-t-135">
				<div class="col-sm-8 col-md-4 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6">
							<img src="images/icons/mape-icon.png" alt="IMG-ICON">
						</div>

						<div class="flex-col-l">
							<span class="txt5 p-b-10">
								Location
							</span>

							<span class="txt23 size38">
								1, 2 rue André Ampère - 2083 - Pôle Technologique - El Ghazala.
							</span>
						</div>
					</div>
				</div>

				<div class="col-sm-8 col-md-3 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6">
							<img src="images/icons/phone-icon.png" alt="IMG-ICON">
						</div>


						<div class="flex-col-l">
							<span class="txt5 p-b-10">
								Call Us
							</span>

							<span class="txt23 size38">
								(216) 70 250 000
							</span>
						</div>
					</div>
				</div>

				<div class="col-sm-8 col-md-5 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6">
							<img src="images/icons/clock-icon.png" alt="IMG-ICON">
						</div>


						<div class="flex-col-l">
							<span class="txt5 p-b-10">
								Opening Hours
							</span>

							<span class="txt23 size38">
								09:30 AM – 11:00 PM <br />Every Day
							</span>
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
							1, 2 rue André Ampère - 2083 - Pôle Technologique - El Ghazala.

						</li>

						<li class="txt14 m-b-14">
							<i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
							(216) 70 250 000
						</li>

						<li class="txt14 m-b-14">
							<i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
							FoodHaus@site.com
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
							@user1
						</a>

						<p class="txt14 m-b-18">
							FoodHaus is a good option. It has a slider built into that displays the featured image in the slider.
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
							@user2
						</a>

						<p class="txt14 m-b-18">
							FoodHaus is a good option. It has a slider built into that displays
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


					<div class="txt17 p-r-20 p-t-5 p-b-5">
						Project 2A6 <i class="fa fa-heart"></i> by <a href=# target="_blank">Fekret'Com</a>
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





	<?php require_once("./includes/footer.php"); ?>
</body>

</html>
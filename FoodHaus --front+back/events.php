<?php $current_page = "events";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Evenement</title>



<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-03.jpg);">
	<h2 class="tit6 t-center">
		Evenements
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
				Evenements
			</span>
		</div>
	</div>

	<div class="container">
		<div class="row">

			<div class="col-md-8 col-lg-9">



				<?php



				$sql1 = "SELECT * FROM evenement order by date asc ";
				$stmt1 = $pdo->prepare($sql1);
				$stmt1->execute([]);
				while ($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) {
					$title = $ms['title'];
					$id = $ms['id'];

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



					<!-- News Block Three -->
					<br>
					</br>
					<div class="blo4 p-b-63">





						<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
							<a  href="event.php?id=<?PHP echo $id; ?>">

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
								<a href="event.php?id=<?PHP echo $id; ?>"name="title" class="tit9">
									<?php echo $title; ?> </a>
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

				}}
				?>




				<!-- Pagination -->
				<div class="pagination flex-l-m flex-w m-l--6 p-t-25">
					<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
					<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
				</div>

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
    

						?>
							<ul>
								<li class="flex-w m-b-25">
									<div class="size17 bo-rad-10 wrap-pic-w of-hidden m-r-18">
										<a href="events.php">
											<img src="./images/<?php echo $img; ?>" alt="IMG-BLOG"> </a>

										</a>
									</div>

									<div class="size28">
										<a href="events.php" class="dis-block txt28 m-b-8">
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


					<!-- Archive -->
					
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
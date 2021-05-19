<?php $current_page = "chef";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Nos Chefs! </title>


<?php


//$id_chef = $_GET['id_chef'];
//$url = "http://localhost/FoodHaus/FoodHaus/chef.php?id_chef=" . $id_chef;
//header("Location: {$url}");





$id_chef = $_GET['id_chef'];
$sql1 = "SELECT * FROM chefs where id_chef=:id_chef ";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute([
	':id_chef' => $id_chef
]);
while ($chef = $stmt1->fetch(PDO::FETCH_ASSOC)) {
	$id_chef = $chef['id_chef'];
	$img_chef = $chef['img_chef'];
	$chef_name = $chef['nom'];
	$chef_description = $chef['descriptions'];
	$link_vid = $chef['lien_video_chef'];
	$img_video_chef = $chef['img_video_chef'];
	$plat1 = $chef['nom_plat1_chef'];
	$plat2 = $chef['nom_plat2_chef'];
	$citation = $chef['citation_chef'];
	$Plat_image1 = $chef['img_plat1_chef'];
	$Plat_image2 = $chef['img_plat2_chef'];
	$id_recette = $chef['id_recette'];


?>
	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15">
		<img src="./images/<?php echo $chef["img_chef"]; ?>" alt="IMG-BLOG">
		<h2 class="tit6 t-center">

		</h2>
	</section>


	<!-- Our Story -->
	<section class="bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15">
		<span class="tit2 t-center">
			<?php echo $chef["nom"]; ?>
		</span>

		<h3 class="tit3 t-center m-b-35 m-t-5">
			Son Histoire
		</h3>

		<p class="t-center size32 m-l-r-auto">
			<?php echo $chef["descriptions"]; ?>
		</p>
	</section>



	<!-- Video -->
	<section class="section-video parallax100" style="background-image: url(images/<?php echo $chef["img_video_chef"]; ?>);">
		<div class="content-video t-center p-t-225 p-b-250">
			<span class="tit2 p-l-15 p-r-15">
				Découvrez
			</span>

			<h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">

			</h3>

			<div class="btn-play ab-center size16 hov-pointer m-l-r-auto m-t-43 m-b-33" data-toggle="modal" data-target="#modal-video-01">
				<div class="flex-c-m sizefull bo-cir bgwhite color1 hov1 trans-0-4">
					<i class="fa fa-play fs-18 m-l-2" aria-hidden="true"></i>
				</div>
			</div>
		</div>
	</section>


	<!-- Delicious & Romantic-->
	<section class="bg1-pattern p-t-120 p-b-105">
		<div class="container">
			<!-- Delicious -->
			<div class="row">
				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-delicious t-center">
						<br>
						<br>
						<br>
						<br>

						<span class="tit2 t-center">
							Ses Plats
						</span>
<br>
						<a href="recette.php?id_recette=<?PHP echo $id_recette; ?>" class="tit3 t-center m-b-35 m-t-5">
							<?php echo $chef["nom_plat1_chef"]; ?>
						</a>


					</div>
				</div>

				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-delicious size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img href="recette.php?id_recette=<?PHP echo $id_recette; ?>" src="./images/<?php echo $chef["img_plat1_chef"]; ?>" alt="IMG-BLOG">
					</div>
				</div>
			</div>


			<!-- Romantic -->
			<div class="row p-t-170">
				<div class="col-md-6 p-b-30">
					<div class="wrap-pic-romantic size2 bo-rad-10 hov-img-zoom m-l-r-auto">
						<img src="./images/<?php echo $chef["img_plat2_chef"]; ?>" alt="IMG-BLOG">
					</div>
				</div>

				<div class="col-md-6 p-t-45 p-b-30">
					<div class="wrap-text-romantic t-center">
						<br>
						<br>
						<span class="tit2 t-center">
							Ses Plats
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-5">
							<?php echo $chef["nom_plat2_chef"]; ?>
						</h3>


					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="parallax0 parallax100" style="background-image: url(images/bg-cover-video-02.jpg);">
		<div class="bg1-overlay t-center p-t-170 p-b-165">
			<h2 class="txt13 m-b-33">
				<?php echo $chef["citation_chef"]; ?>

			</h2>
		</div>




	</div>
<?php

}
?>




	

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

<!-- Modal Video 01-->
<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

	<div class="modal-dialog" role="document" data-dismiss="modal">
		<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

		<div class="wrap-video-mo-01">
			<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
			<div class="video-mo-01">
				<iframe src="https://www.youtube.com/embed/<?php echo $link_vid; ?>?rel=0&amp;showinfo=0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
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
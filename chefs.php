<?php $current_page = "chefs";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Nos Chefs! </title>

<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-01.jpg);">
		<h2 class="tit6 t-center">
			Chefs
		</h2>
	</section>
<section class="section-lunch bgwhite">
	<br>
	<br>
	<br>	<br>
	<div class="container t-center">
			<span class="tit2 t-center">
				Documentez Vous Sur
			</span>

			<h3 class="tit5 t-center m-b-50 m-t-5">
				 Nos Chef
			</h3>
	<?php




$sql1 = "SELECT * FROM chefs order by id_chef desc limit 3 ";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute([]);
$sql2 = "SELECT * FROM chefs order by id_chef asc limit 3 ";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute([]);


while (($ms = $stmt1->fetch(PDO::FETCH_ASSOC))&&($mss = $stmt2->fetch(PDO::FETCH_ASSOC))) {
	$id_chef = $ms['id_chef'];
	$nom = $ms['nom'];
	$img_chef = $ms['img_chef'];
	$img_plat1_chef = $ms['img_plat1_chef'];
	$id_chef1 = $mss['id_chef'];
	$nom1 = $mss['nom'];
	$img_chef1 = $mss['img_chef'];
	$img_plat1_chef1 = $mss['img_plat1_chef'];


?>
	
	<div class="container">
	&emsp; &emsp;	<div class="row p-t-108 p-b-70">
			<div class="col-md-8 col-lg-6 m-l-r">
				<!-- Block3 -->
				<div class="blo3 flex-w flex-col-l-sm m-b-30">
				<div class="blo5 pos-relative p-t-60">
						<div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
							<a href="chef.php?id_chef=<?PHP echo $id_chef; ?>"><img src="images/<?php echo $img_chef; ?>"  alt="IGM-AVATAR"></a>
						</div>

						<div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
							<a href="chef.php?id_chef=<?PHP echo $id_chef; ?>" class="txt34 dis-block p-b-6">
							<?php echo $nom; ?>
							</a>

							<span class="dis-block t-center txt35 p-b-25">
								Sa Spécialité
							</span>

							<p class="t-center">
							<a href="chef.php?id_chef=<?PHP echo $id_chef; ?>"><img src="images/<?php echo $img_plat1_chef; ?>" width="500" height="400" alt="IGM-AVATAR"></a>
							</p>
						</div>
					</div>
				</div>
			</div>
			

			<div class="col-md-8 col-lg-6 m-l-r-auto">
		
				<!-- Block3 -->
				<div class="blo3 flex-w flex-col-l-sm m-b-30">
				<div class="blo5 pos-relative p-t-60">
						<div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
							<a href="chef.php?id_chef=<?PHP echo $id_chef1; ?>"><img src="images/<?php echo $img_chef1; ?>" alt="IGM-AVATAR"></a>
						</div>

						<div class="text-blo5 size34 t-center bo-rad-10 bo7 p-t-90 p-l-35 p-r-35 p-b-30">
							<a href="chef.php?id_chef=<?PHP echo $id_chef1; ?>" class="txt34 dis-block p-b-6">
							<?php echo $nom1; ?>
							</a>

							<span class="dis-block t-center txt35 p-b-25">
							Sa Spécialité
							</span>

							<p class="t-center">
								<a href="chef.php?id_chef=<?PHP echo $id_chef1; ?>"><img src="images/<?php echo $img_plat1_chef1; ?>" width="500" height="400"  alt="IGM-AVATAR"></a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<?php
}
?>

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
<script src="js/main.js"></script>

</body>

</html>


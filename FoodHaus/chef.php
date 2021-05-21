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

<?php require_once("./includes/footer.php"); ?>

</body>

</html>
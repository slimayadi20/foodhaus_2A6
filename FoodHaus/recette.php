<?php $current_page = "Recette";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Notre Recette! </title>
<body class="animsition">

	

	<!-- Sidebar -->
	<aside class="sidebar trans-0-4">
		<!-- Button Hide sidebar -->
		<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

		<!-- - -->
		<ul class="menu-sidebar p-t-95 p-b-70">
			<li class="t-center m-b-13">
				<a href="index.html" class="txt19">Home</a>
			</li>

			<li class="t-center m-b-13">
				<a href="menu.html" class="txt19">Menu</a>
			</li>

			<li class="t-center m-b-13">
				<a href="gallery.html" class="txt19">Gallery</a>
			</li>

			<li class="t-center m-b-13">
				<a href="about.html" class="txt19">About</a>
			</li>

			<li class="t-center m-b-13">
				<a href="blog.html" class="txt19">Blog</a>
			</li>

			<li class="t-center m-b-33">
				<a href="contact.html" class="txt19">Contact</a>
			</li>

			<li class="t-center">
				<!-- Button3 -->
				<a href="reservation.html" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
					Reservation
				</a>
			</li>
		</ul>

		<!-- - -->
		<div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
			<!-- - -->
			<h4 class="txt20 m-b-33">
				Gallery
			</h4>

			<!-- Gallery -->
			<div class="wrap-gallery-sidebar flex-w">
				<a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-01.jpg" data-lightbox="gallery-footer">
					<img src="images/photo-gallery-thumb-01.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-02.jpg" data-lightbox="gallery-footer">
					<img src="images/photo-gallery-thumb-02.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-03.jpg" data-lightbox="gallery-footer">
					<img src="images/photo-gallery-thumb-03.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-05.jpg" data-lightbox="gallery-footer">
					<img src="images/photo-gallery-thumb-05.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-06.jpg" data-lightbox="gallery-footer">
					<img src="images/photo-gallery-thumb-06.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-07.jpg" data-lightbox="gallery-footer">
					<img src="images/photo-gallery-thumb-07.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-09.jpg" data-lightbox="gallery-footer">
					<img src="images/photo-gallery-thumb-09.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-10.jpg" data-lightbox="gallery-footer">
					<img src="images/photo-gallery-thumb-10.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="images/photo-gallery-11.jpg" data-lightbox="gallery-footer">
					<img src="images/photo-gallery-thumb-11.jpg" alt="GALLERY">
				</a>
			</div>
		</div>
	</aside>


	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/blog-05.jpg);">
		<h2 class="tit6 t-center">
			Recette
		</h2>
	</section>
	<?php


//$id_chef = $_GET['id_chef'];
//$url = "http://localhost/FoodHaus/FoodHaus/chef.php?id_chef=" . $id_chef;
//header("Location: {$url}");





$id_recette = $_GET['id_recette'];
$sql1 = "SELECT * FROM recette where id_recette=:id_recette ";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute([
   ':id_recette' => $id_recette
]);while ($recette = $stmt1->fetch(PDO::FETCH_ASSOC)) {
   $id_recette = $recette['id_recette'];
   $nom_recette = $recette['nom_recette'];
   $img_recette = $recette['img_recette'];
   $descprition_recette = $recette['descprition_recette'];
   $temp_recette = $recette['temp_recette'];
   $type_recette = $recette['type_recette'];
   $lien_video_recette = $recette['lien_video_recette'];
   
   


?>

	<!-- Content page -->
	<section>
		<div class="bread-crumb bo5-b p-t-17 p-b-17">
			<div class="container">
				<a href="index.html" class="txt27">
					Home
				</a>

				<span class="txt29 m-l-10 m-r-10">/</span>

				<a href="blog.html" class="txt27">
					Recette
				</a>

				<span class="txt29 m-l-10 m-r-10">/</span>

				<span class="txt29">
				<?php echo $recette["nom_recette"]; ?>
				</span>
			</div>
		</div>

		<div class="container">
			
						<!-- Block4 -->
						<div class="blo4 p-b-63">
							<!-- - -->
							<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
								<a href="blog-detail.html">
									<img src="images/<?php echo $recette["img_recette"]; ?>" alt="IMG-BLOG">
								</a>

								
							</div>

							<!-- - -->
							<div class="text-blo4 p-t-33">
								<h4 class="p-b-16">
									<a href="blog-detail.html" class="tit9"><?php echo $recette["nom_recette"]; ?></a>
								</h4>

								<div class="txt32 flex-w p-b-24">
									<span>
										Facile
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
									<?php echo $recette["temp_recette"]; ?> Minutes
										<span class="m-r-6 m-l-4">|</span>
									</span>

									<span>
									<?php echo $recette["type_recette"]; ?>
										
									</span>

									<span>
										
									</span>
								</div>

								<p>
								<?php echo $recette["descprition_recette"]; ?>
								</p>
							</div>
						</div>
						<?php

}
?>

						
					</div>
				</div>

				
			</div>
		</div>
	</section>
	

	<div class="container">
<iframe width="1200" height="400"  src="https://www.youtube.com/embed/<?php echo $lien_video_recette; ?>?rel=0&amp;showinfo=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<!-- <iframe width="1200" height="400" src="https://www.youtube.com/embed/oOJUxms0w8E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	</div> -->

</div>

<?php
	$conn = new mysqli('localhost', 'root', '', 'foodhaus');

	if (isset($_POST['save'])) {
		$uID = $conn->real_escape_string($_POST['uID']);
		$ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
		$ratedIndex++;

		if (!$uID) {
			$conn->query("INSERT INTO starz (rateIndex) VALUES ('$ratedIndex')");
			$sql = $conn->query("SELECT id FROM starz ORDER BY id DESC LIMIT 1");
			$uData = $sql->fetch_assoc();
			$uID = $uData['id'];
		} else
			$conn->query("UPDATE starz SET rateIndex='$ratedIndex' WHERE id='$uID'");

		exit(json_encode(array('id' => $uID)));
	}

	$sql = $conn->query("SELECT id FROM starz");
	$numR = $sql->num_rows;

	$sql = $conn->query("SELECT SUM(rateIndex) AS total FROM starz");
	$rData = $sql->fetch_array();
	$total = $rData['total'];

	$avg = $total / $numR;
	?>
	<!doctype html>
	<html lang="en">

	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Rating System</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	</head>

	<body>

		<div align="center" style="background: #000; padding: 50px;color:pink;">
			<h2 class="tit6 t-center">
				Notez notre recette !
			</h2>
			<br><br>
			<i class="fa fa-star fa-2x" data-index="0"></i>
			<i class="fa fa-star fa-2x" data-index="1"></i>
			<i class="fa fa-star fa-2x" data-index="2"></i>
			<i class="fa fa-star fa-2x" data-index="3"></i>
			<i class="fa fa-star fa-2x" data-index="4"></i>
			<br><br>
			<?php echo round($avg, 1) ?>
			<br><br>
			<h4 class="txt13 m-b-33">
				merci beaucoup !
			</h4>

		</div>

		<script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
		<script>
			var ratedIndex = -1,
				uID = 0;

			$(document).ready(function() {
				resetStarColors();

				if (localStorage.getItem('ratedIndex') != null) {
					setStars(parseInt(localStorage.getItem('ratedIndex')));
					uID = localStorage.getItem('uID');
				}

				$('.fa-star').on('click', function() {
					ratedIndex = parseInt($(this).data('index'));
					localStorage.setItem('ratedIndex', ratedIndex);
					saveToTheDB();

				});

				$('.fa-star').mouseover(function() {
					resetStarColors();
					var currentIndex = parseInt($(this).data('index'));
					setStars(currentIndex);
				});

				$('.fa-star').mouseleave(function() {
					resetStarColors();

					if (ratedIndex != -1)
						setStars(ratedIndex);
				});
			});

			function saveToTheDB() {
				$.ajax({
					url: "recette.php",
					method: "POST",
					dataType: 'json',
					data: {
						save: 1,
						uID: uID,
						ratedIndex: ratedIndex
					},
					success: function(r) {
						uID = r.id;
						localStorage.setItem('uID', uID);
					}

				});

			}

			function setStars(max) {
				for (var i = 0; i <= max; i++)
					$('.fa-star:eq(' + i + ')').css('color', 'red');
			}

			function resetStarColors() {
				$('.fa-star').css('color', 'white');
			}
		</script>
	</body>

	</html>


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
			<iframe src="https://www.youtube.com/embed/<?php echo $lien_video_recette; ?>?rel=0&amp;showinfo=0" allowfullscreen></iframe>
		</div>
	</div>
</div>
</div>

<?php require_once("./includes/footer.php"); ?>
</body>
</html>

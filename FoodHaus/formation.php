<?php $current_page = "formation";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Nos Formations! </title>
<?php
include "./controller/coursC.php";

$cours = new coursC;

$listC = $cours->affichercours();


?>


<!-- Title Page -->


<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-03.jpg);">
	<h2 class="tit6 t-center">
		NOS FORMATIONS
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
				NOS FORMATIONS
			</span>
		</div>

	</div>
	<br>
	</br>

	<div class="container">
		<iframe width="1200" height="400" src="https://www.youtube.com/embed/N8wzPaZCwbw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<!-- <iframe width="1200" height="400" src="https://www.youtube.com/embed/oOJUxms0w8E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	</div> -->

	</div>
	<br>
	<br>
	<!-- Block4 -->
	<div>
		<ul class="cards">

			<table colspam="6" class="table">

				<thead>

				</thead>
				<?php
				$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				// https://www.codexworld.com/like-dislike-rating-system-jquery-ajax-php/
				// echo $actual_link;
				?>

				<?PHP
				$total = 0;
				//les valeurs de liste sous forme de case

				foreach ($listC as $row) {
					$total++;
				?>


					<li class="cards_item">
						<div class="card">
							<div class="card_image"><img src="./assets/img/<?PHP echo $row['imgpath'];
																			?>" width="400" height="400"></div>
							<div class="card_content">
								<h2 class="card_title"><?PHP echo $row['nomc'];
														?></h2> <br>

								<a href="#1" class="card_text">Formateur: <?PHP echo $row['nomf'];

																			?></a>

								<p class="card_text">Prix: <?PHP echo $row['prix'];

															?>DT</p>
								<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $row['lieu']; ?>&output=embed"></iframe>
								<p>
									<?php
									$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
									// https://www.codexworld.com/like-dislike-rating-system-jquery-ajax-php/
									// echo $actual_link;
									?>
									&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <?php echo ' <iframe src="https://www.facebook.com/plugins/share_button.php?href=' . $actual_link . '  &layout=button_count&size=large&mobile_iframe=true&width=83&height=28&appId" width="110" height="28" style="margin:0px;border:none;overflow:hidden" scrolling="no" frameborder="11" allowTransparency="true"></iframe>'; ?> </p>

							</div>

						</div>
		</ul>


		<tbody>

		</tbody>
	<?php
				}
	?>
	</table>

	</div>
	<!-- end page title end breadcrumb -->





</section>
<!-- Review -->
<section class="section-review p-t-115" id="1">
	<!-- - -->
	<div class="title-review t-center m-b-2">
		<span class="tit2 p-l-15 p-r-15">
			Nos Chers
		</span>

		<h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
			Formateurs
		</h3>
	</div>

	<!-- - -->
	<div class="wrap-slick3 ">
		<div class="slick3">
			<div class="item-slick3 item1-slick3">
				<div class="wrap-content-slide3 p-b-50 p-t-50">
					<div class="container">
						<?php
						$sql1 = "SELECT * FROM formateur order by nom desc limit 1 ";
						$stmt1 = $pdo->prepare($sql1);
						$stmt1->execute([]);
						$sql2 = "SELECT * FROM formateur order by nom asc limit 1 ";
						$stmt2 = $pdo->prepare($sql2);
						$stmt2->execute([]);
						$sql3 = "SELECT * FROM formateur order by nom LIMIT 1 OFFSET 1";
						$stmt3 = $pdo->prepare($sql3);
						$stmt3->execute([]);


						while (($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) && ($mss = $stmt2->fetch(PDO::FETCH_ASSOC)) && ($msss = $stmt3->fetch(PDO::FETCH_ASSOC))) {
							$nom = $ms['nom'];
							$prenom = $ms['prenom'];
							$specialite = $ms['specialite'];
							$image = $ms['image'];
							$nom1 = $mss['nom'];
							$prenom1 = $mss['prenom'];
							$specialite1 = $mss['specialite'];
							$image1 = $mss['image'];
							$nom2 = $msss['nom'];
							$prenom2 = $msss['prenom'];
							$specialite2 = $msss['specialite'];
							$image2 = $msss['image'];

						?>


							<div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
								<img src="./images/<?php echo $image; ?>" alt="IGM-AVATAR" />
							</div>

							<div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
								<p class="t-center txt12 size15 m-l-r-auto">
									<?PHP echo $specialite; ?> </p>



								<div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
									<?PHP echo $nom; ?> <?PHP echo $prenom; ?> </div>
							</div>
					</div>
				</div>
			</div>

			<div class="item-slick3 item2-slick3">
				<div class="wrap-content-slide3 p-b-50 p-t-50">
					<div class="container">
						<div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
							<img src="./images/<?php echo $image1; ?>" alt="IGM-AVATAR" />
						</div>

						<div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
							<p class="t-center txt12 size15 m-l-r-auto">
								<?PHP echo $specialite1; ?>
							</p>



							<div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
								<?PHP echo $nom1; ?> <?PHP echo $prenom1; ?> </div>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick3 item3-slick3">
				<div class="wrap-content-slide3 p-b-50 p-t-50">
					<div class="container">
						<div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false" data-appear="zoomIn">
							<img src="./images/<?php echo $image2; ?>" alt="IGM-AVATAR" />
						</div>

						<div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
							<p class="t-center txt12 size15 m-l-r-auto">
								<?PHP echo $specialite2; ?>
							</p>



							<div class="more-review txt4 t-center animated visible-false m-t-32" data-appear="fadeInUp">
								<?PHP echo $nom2; ?> <?PHP echo $prenom2; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="wrap-slick3-dots m-t-30"></div>
	</div>
<?php
						}
?>
</section>
<div>


	<?php
	$conn = new mysqli('localhost', 'root', '', 'foodhaus');

	if (isset($_POST['save'])) {
		$uID = $conn->real_escape_string($_POST['uID']);
		$ratedIndex = $conn->real_escape_string($_POST['ratedIndex']);
		$ratedIndex++;

		if (!$uID) {
			$conn->query("INSERT INTO stars (rateIndex) VALUES ('$ratedIndex')");
			$sql = $conn->query("SELECT id FROM stars ORDER BY id DESC LIMIT 1");
			$uData = $sql->fetch_assoc();
			$uID = $uData['id'];
		} else
			$conn->query("UPDATE stars SET rateIndex='$ratedIndex' WHERE id='$uID'");

		exit(json_encode(array('id' => $uID)));
	}

	$sql = $conn->query("SELECT id FROM stars");
	$numR = $sql->num_rows;

	$sql = $conn->query("SELECT SUM(rateIndex) AS total FROM stars");
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
				Notez nos cours !
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
					url: "omar.php",
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
					$('.fa-star:eq(' + i + ')').css('color', 'pink');
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



	<?php require_once("./includes/footer.php"); ?>

	</body>

	</html>
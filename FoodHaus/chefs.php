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
	<div class="bread-crumb bo5-b p-t-17 p-b-17">
		<div class="container">
			<a href="index.php" class="txt27">
				Home
			</a>

			<span class="txt29 m-l-10 m-r-10">/</span>

			<span class="txt29">
				Chefs
			</span>
		</div>
	</div>

	<br>
	<br>
	<br> <br>
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


		while (($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) && ($mss = $stmt2->fetch(PDO::FETCH_ASSOC))) {
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
				&emsp; &emsp; <div class="row p-t-108 p-b-70">
					<div class="col-md-8 col-lg-6 m-l-r">
						<!-- Block3 -->
						<div class="blo3 flex-w flex-col-l-sm m-b-30">
							<div class="blo5 pos-relative p-t-60">
								<div class="pic-blo5 size14 bo4 wrap-cir-pic hov-img-zoom ab-c-t">
									<a href="chef.php?id_chef=<?PHP echo $id_chef; ?>"><img src="images/<?php echo $img_chef; ?>" alt="IGM-AVATAR"></a>
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
										<a href="chef.php?id_chef=<?PHP echo $id_chef1; ?>"><img src="images/<?php echo $img_plat1_chef1; ?>" width="500" height="400" alt="IGM-AVATAR"></a>
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









<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>


<?php require_once("./includes/footer.php"); ?>
</body>

</html>
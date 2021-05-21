<?php $current_page = "commandes";
$curr_page = basename(__FILE__); ?>


<title>Commandes</title>
<?php require_once("./includes/navbar.php"); ?>




<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-02.jpg);">
	<h2 class="tit6 t-center">
		Vos commandes
	</h2>
</section>
<div class="bread-crumb bo5-b p-t-17 p-b-17">
		<div class="container">
			<a href="index.php" class="txt27">
				Home
			</a>

			<span class="txt29 m-l-10 m-r-10">/</span>

			<span class="txt29">
				commandes
			</span>
		</div>
	</div>



<!-- Commandes -->
<div class="">
	<div class="">
		<div class="card m-b-30">
			<div class="card-body">

				<h4 class="mt-0 header-title"></h4>
				<table class="table" id="tblData" width="100%" cellspacing="0">

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
						<br>
						</br>

						<tbody>
							<?php
							$sql = "SELECT * FROM commande WHERE email = '{$user_email}'";

							$stmt = $pdo->prepare($sql);
							$stmt->execute();
							$i = 0;
							while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
								$i++;
								$idCommande = $event['idCommande'];
								$nom = $event['nom'];
								$email = $event['email'];
								$adresse = $event['adresse'];
								$codePostal = $event['codePostal'];
								$pays = $event['pays'];
								$ville = $event['ville'];
								$nomCarte = $event['nomCarte'];
								$numCarte = $event['numCarte'];
								$moisExp = $event['moisExp'];
								$anneeExp = $event['anneeExp'];
								$cvv = $event['cvv'];

							?>

								<tr>
									<link rel="stylesheet" href="css/commandes.css">
									<div class="container px-1 px-md-3 py-1 mx-auto">
										<div class="card">
											<div class="row d-flex justify-content-between px-3 top">
												<div class="d-flex">
													<h5>COMMANDE <span name="id" class="text-primary font-weight-bold">#<?php echo $idCommande; ?></span></h5>
												</div>
												<div class="d-flex flex-column text-sm-right">
													<p class="mb-0">CODE POSTAL <span><?php echo $codePostal; ?></span></p>
													<p>ADRESSE <span class="font-weight-bold"><?php echo $adresse; ?></span></p>
												</div>
												<?php
												if (isset($_POST['delete'])) {
													$idCommande = $_POST['com-id'];
													$sql = "DELETE FROM commande WHERE idCommande = :idCommande";
													$stmt = $pdo->prepare($sql);
													$stmt->execute([':idCommande' => $idCommande]);
													header("Location: commandes.php");
												}
												?>
												<form action="Commandes.php" method="POST">
													<input type="hidden" name="com-id" value="<?php echo $idCommande; ?>">
													<button name="delete" type="submit" class="btn btn-red ">Supprimer</button>
												</form>
											</div> <!-- Add class 'active' to progress -->
											<div class="row d-flex justify-content-center">
												<div class="col-12">

													<ul id="progressbar" class="text-center">
														<li id="T<?php echo $i; ?>" class=" step0"></li>
														<li id="E<?php echo $i;  ?>" class=" step0"></li>
														<li id="R<?php echo $i; ?>" class=" step0"></li>
														<li id="A<?php echo $i; ?>" class="step0"></li>

													</ul>

													<?php

													$sql2 = "SELECT * FROM livraisons WHERE  idCommande = '{$idCommande}'";
													$stmt2 = $pdo->prepare($sql2);
													$stmt2->execute();
													while ($active = $stmt2->fetch(PDO::FETCH_ASSOC)) {

														$idLivraison = $active['idLivraison'];
														$idCommande = $active['idCommande'];
														$nomLivreur = $active['nomLivreur'];
														$date = $active['date'];
														$etat = $active['etat'];
													?>

														<?php
														if ($etat == 'Traitée') {
														?>
															<script>
																document.getElementById('T<?php echo $i  ?>').classList.add('active');
															</script>
														<?php
														} elseif ($etat == 'Expédiée') {
														?>
															<script>
																document.getElementById('T<?php echo $i  ?>').classList.add('active');
																document.getElementById('E<?php echo $i  ?>').classList.add('active');
															</script>
														<?php
														} elseif ($etat == 'En Route') {
														?>
															<script>
																document.getElementById('T<?php echo $i  ?>').classList.add('active');
																document.getElementById('E<?php echo $i  ?>').classList.add('active');
																document.getElementById('R<?php echo $i  ?>').classList.add('active');
															</script>
														<?php
														} elseif ($etat == 'Arrivée') {
														?>
															<script>
																document.getElementById('T<?php echo $i  ?>').classList.add('active');
																document.getElementById('E<?php echo $i  ?>').classList.add('active');
																document.getElementById('R<?php echo $i  ?>').classList.add('active');
																document.getElementById('A<?php echo $i  ?>').classList.add('active');
															</script>
													<?php
														}
													}

													?>
													<script>
														console.log(<?php echo $i; ?>)
													</script>
												</div>
											</div>
											<div class="row justify-content-between top">
												<div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
													<div class="d-flex flex-column">
														<p class="font-weight-bold">Commande<br>Traitée</p>
													</div>
												</div>
												<div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
													<div class="d-flex flex-column">
														<p class="font-weight-bold">Commande<br>Expédiée</p>
													</div>
												</div>
												<div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
													<div class="d-flex flex-column">
														<p class="font-weight-bold">Commande<br>En Route</p>
													</div>
												</div>
												<div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
													<div class="d-flex flex-column">
														<p class="font-weight-bold">Commande<br>Arrivée</p>
													</div>
												</div>

											</div>
										</div>
									</div>

								<?php }
								?>
						</tbody>
				</table>
			<?php } else { ?>
				<div>
					<img class="rounded mx-auto d-block" height="300" width="500" src="images/login.svg" alt="">
					<p class=" alert alert-danger text-dark t-center">Veuillez connecter pour consulter vos commandes!</p>
				</div>
			<?php }
			?>

			</div>

		</div>
	</div>
</div>







<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>



<?php require_once("./includes/footer.php"); ?>
</body>

</html>
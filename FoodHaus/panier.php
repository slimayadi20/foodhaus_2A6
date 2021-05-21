<?php $current_page = "panier";
$curr_page = basename(__FILE__); ?>

<title>Panier</title>

<?php require_once("./includes/navbar.php"); ?>




<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-02.jpg);">
	<h2 class="tit6 t-center">
		Panier
	</h2>
</section>

<div class="bread-crumb bo5-b p-t-17 p-b-17">
		<div class="container">
			<a href="index.php" class="txt27">
				Home
			</a>

			<span class="txt29 m-l-10 m-r-10">/</span>

			<span class="txt29">
				panier
			</span>
		</div>
	</div>

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
							$sql = "SELECT * FROM items WHERE email='{$user_email}'";
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
												<img src="assets/img/<?php echo $dir ?>" width="100" height="75">
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
								$conn = mysqli_connect('localhost', 'root', '', 'FoodHaus');
								if (!$conn) {
									echo "DB error";
								}
								$query = "select sum(price) as 'totalprice' from items WHERE email='{$user_email}'";
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
			<img class="rounded mx-auto d-block" height="500" width="500" src="images/empty.svg" alt="">
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




<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>



<?php require_once("./includes/footer.php"); ?>
</body>

</html>
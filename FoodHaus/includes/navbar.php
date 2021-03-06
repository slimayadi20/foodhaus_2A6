<?php require_once("./includes/header.php"); ?>


<body class="animsition">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
				<div class="wrap_header trans-0-3">
					<!-- Logo -->
					<div class="logo">
						<a href="index.php">
							<img src="images/icons/logoo.png" alt="IMG-LOGO" data-logofixed="images/icons/logoo.png">
						</a>
					</div>

					<!-- Menu -->
					<div class="wrap_menu p-l-45 p-l-0-xl">
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="events.php">Evenement</a>
								</li>
								<li>
									<a href="formation.php">formation</a>
								</li>
								<li>
									<a href="chefs.php">Chef</a>
								</li>
								<li>
									<a href="Recettes.php">Recette</a>
								</li>
								<li>
									<a href="Restaurant.php">Restaurant</a>
								</li>
								<li>
									<div class="social flex-w flex-l-m p-r-20">
										<a href="commandes.php"><i class="fa fa-shopping-bag"></i></a>

										<a href="panier.php"><i class="fa ti-shopping-cart m-l-21"></i>

											<?php
											if (isset($_COOKIE['uid']) || isset($_COOKIE['uiid']) || isset($_SESSION['login'])) { ?>
												<?php

												if (isset($_COOKIE['uid'])) {
													$user_id = base64_decode($_COOKIE['uid']);
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

												$sql = "select * from items WHERE email='{$user_email}'";
												$stmt = $pdo->prepare($sql);
												$stmt->execute();
												$count_comment = $stmt->rowCount();
												?>

												<span class="badge badge-danger"> <?php echo $count_comment;  ?></span>
											<?php } ?>
										</a>

										<a href="Contact.php"><i class="fa fa-phone m-l-21"></i></a>
									</div>
								</li>
								<?php

								require_once("./includes/registration.php");
								?>
							</ul>
						</nav>
					</div>



				</div>
			</div>
		</div>
	</header>
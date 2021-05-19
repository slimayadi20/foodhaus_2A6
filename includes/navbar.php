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
									<a href="omar.php">formation</a>
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
										<a href="commandes.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>

										<a href="panier.php"><i class="fa ti-shopping-cart m-l-21" aria-hidden="true"></i>
						            
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
															$conn=mysqli_connect('localhost','root','','FoodHaus');
															if(!$conn){
																echo "DB error";
															}
															$query="select COUNT(id) as 'total' from items WHERE email='{$user_email}'";
															$res=mysqli_query($conn, $query);
															$data=mysqli_fetch_array($res);
			?>
									<span  class="badge badge-danger"> <?php echo $data['total'];  ?></span>
									<?php } ?>
					
                                        <a href="Contact.php"><i class="fa fa-square m-l-21" data-feather="calendar" aria-hidden="true"></i></a>
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
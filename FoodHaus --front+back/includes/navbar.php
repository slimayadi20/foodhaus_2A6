<?php require_once("./includes/header.php"); ?>

<?php 

$conn=mysqli_connect('localhost','root','','FoodHaus');
												if(!$conn){
													echo "DB error";
												}
												$query="select COUNT(id) as 'total' from items";
												$res=mysqli_query($conn, $query);
												$data=mysqli_fetch_array($res);
												?>
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
									<a href="omar.php">formations</a>
								</li>
								<li>
									<a href="chefs.php">Chefs</a>
								</li>
								<li>
									<a href="Recettes.php">Recettes</a>
								</li>
								<li>
									<a href="Restaurant.php">Restaurant</a>
								</li>
								<li>
									<div class="social flex-w flex-l-m p-r-20">
										<a href="commandes.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>


										<a href="panier.php"><i class="fa ti-shopping-cart m-l-21" aria-hidden="true" ></i><span class="badge badge-danger"> <?php echo $data['total'];  ?></span></a>
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
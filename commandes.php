
<?php $current_page = "commandes"; 
$curr_page = basename(__FILE__);?>


<title>Commandes</title>
<?php require_once("./includes/navbar.php"); ?>


	

	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-02.jpg);">
		<h2 class="tit6 t-center">
			Vos commandes
		</h2>
	</section>



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
										$i=0;
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
											<li id="A<?php echo $i  ;?>" class="step0"></li>
											
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
											if ($etat == 'Traitée')
											{
												?>
												<script>
													document.getElementById('T<?php echo $i  ?>').classList.add('active');
												</script>
												<?php
											}
											elseif ($etat == 'Expédiée')
											{
												?>
												<script>
												document.getElementById('T<?php echo $i  ?>').classList.add('active');
													document.getElementById('E<?php echo $i  ?>').classList.add('active');
												</script>
												<?php
											}
											elseif ($etat == 'En Route')
											{
												?>
												<script>
												document.getElementById('T<?php echo $i  ?>').classList.add('active');
													document.getElementById('E<?php echo $i  ?>').classList.add('active');
													document.getElementById('R<?php echo $i  ?>').classList.add('active');
												</script>
												<?php
											}
											elseif  ($etat == 'Arrivée')
											{
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
						Copyright &copy; 2018 All rights reserved  |  This template is made with <i class="fa fa-heart"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
	<script type="text/javascript" src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

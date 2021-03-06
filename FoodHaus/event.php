<?php $current_page = "event";
$curr_page = basename(__FILE__); ?>
<?php require_once("./includes/navbar.php"); ?>

<title>Evenement Detaillé ! </title>

<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-03.jpg);">
	<h2 class="tit6 t-center">
		Evenement
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

			<a href="events.php" class="txt27">
				Evenement
			</a>



		</div>
	</div>





	<div class="container">

		<div class="row ">
			<div class="col-md-8 col-lg-9">



				<?PHP
				$id = $_GET['id'];
				$sql1 = "SELECT * FROM evenement where id=:id ";
				$stmt1 = $pdo->prepare($sql1);
				$stmt1->execute([
					':id' => $id
				]);
				while ($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) {
					$title = $ms['title'];
					$nbplaces = $ms['nbplaces'];
					$date = $ms['date'];
					$description = $ms['description'];
					$img = $ms['img'];
					$adress = $ms['adress'];
					$id_categ = $ms['id_categ'];

					$sql2 = "SELECT name FROM categorie where id_categ= :id_categ ";
					$stmt2 = $pdo->prepare($sql2);
					$stmt2->execute([':id_categ' => $id_categ]);
					while ($categ = $stmt2->fetch(PDO::FETCH_ASSOC)) {

						$name = $categ['name'];

				?>



						<div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">

							<!-- Block4 -->
							<div class="blo4 p-b-63">
								<!-- - -->
								<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
									<a href="blog-detail.html">
										<img src="./images/<?php echo $img; ?>" alt="IMG-BLOG"> </a>


								</div>

								<!-- - -->
								<div class="text-blo4 p-t-33">
									<h4 class="p-b-16">

										<a href="blog-detail.html" name="title" class="tit9"><?php echo $title; ?></a>


										<br>


									</h4>
							<?php
						}
					}
							?>
							<div class="txt32 flex-w p-b-24">

								<span>
									places : <?php echo $nbplaces; ?> <span class="m-r-6 m-l-4">|</span>
								</span>

								<span>
									<?php echo $date; ?>
									<span class="m-r-6 m-l-4">|</span>
								</span>

								<span>
									<?php echo $name; ?>
									<span class="m-r-6 m-l-4">|</span>
								</span>

								<span>
									<?php echo $adress ?>

								</span>
							</div>

							<p>
								<?php
								$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
								// https://www.codexworld.com/like-dislike-rating-system-jquery-ajax-php/
								// echo $actual_link;
								?>
								<?php echo $description; ?>
								&emsp; <?php echo ' <iframe src="https://www.facebook.com/plugins/share_button.php?href=' . $actual_link . '  &layout=button_count&size=large&mobile_iframe=true&width=83&height=28&appId" width="110" height="28" style="margin:0px;border:none;overflow:hidden" scrolling="no" frameborder="11" allowTransparency="true"></iframe>'; ?> </p>
								</div>
								<br>
								</br>

								<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $adress; ?>&output=embed"></iframe>

							</div>

							<!-- Leave a comment -->
							<form class="leave-comment p-t-10" action="event.php" method="post">
								<script>
									function ValidateEmail(inputText) {
										var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
										if (inputText.value.match(mailformat)) {
											document.form1.text1.focus();
											return true;
										} else {
											alert("You have entered an invalid email address!");
											document.form1.text1.focus();
											return false;
										}
									}

									function numb(inputtxt) {
										var numbers = /^[-+]?[0-9]+$/;
										if (inputtxt.value.match(numbers)) {
											return true;
										} else {
											alert('Prière de saisir uniquement des nombres');
											return false;
										}
									}

									function lett(inputtxt) {
										var letters = /^[A-Za-z\s]+$/;
										if (inputtxt.value.match(letters)) {
											return true;
										} else {
											alert('Prière de saisir uniquement des lettres');
											return false;
										}
									}
								</script>

								<?php

								//ajout
								include "./controller/participant_C.php";
								include "./model/participant.php";

								if (isset($_POST['submit'])) {



									$id = $_POST['id'];
									$particip = new participant($_POST['id_participant'], $_POST['name'], $_POST['mail'], $_POST['id']);
									$participant = new participant_C;
									$participant->ajouterparticipant($particip);



									$sql1 = "SELECT * FROM evenement where id=:id ";
									$stmt1 = $pdo->prepare($sql1);
									$stmt1->execute([
										':id' => $id
									]);
									$ms = $stmt1->fetch(PDO::FETCH_ASSOC);
									$title = $ms['title'];
									$nbplaces = $ms['nbplaces'];
									$date = $ms['date'];
									$description = $ms['description'];
									$img = $ms['img'];
									$adress = $ms['adress'];




									require './backend/phpmailer/PHPMailerAutoload.php';
									$mail = new PHPMailer;
									$to_email = $_POST['mail'];
									$mail->addBCC($to_email, $to_email);


									$messagee =  $_POST['name'] . ",\r\n Thank you for registering for " . $ms['title'] . "! we are looking forward to seeing you there. \r\n Event details : \r\n When : " . $ms['date'] . "\r\n Where : " . $ms['adress'] . "\r\n .";

									$subject = "INVITATION EVENT!";
									$message = '<div class="app font-sans min-w-screen min-h-screen bg-grey-lighter py-8 px-4">

									<div class="mail__wrapper max-w-md mx-auto">
								  
									  <div class="mail__content bg-white p-8 shadow-md">
								  
										<div class="content__header text-center tracking-wide border-b">
										
										<h1 class="text-3xl h-48 flex items-center justify-center">E-mail Confirmation</h1>
										</div>
								  
										<div class="content__body py-8 border-b">
										  <p>
											Hey, <br><br> '.$messagee.'
										  </p>
										  <a href="http://localhost/FoodHaus/index.php" <button class="btn3 flex-c-m size31 txt11 trans-0-4" >Visit our website</button> </a>
										  <p class="text-sm">
											Keep Rockin!<br> FoodHaus Team
										  </p>
										</div>
								  
										<div class="content__footer mt-8 text-center text-grey-darker">
										  <h3 class="text-base sm:text-lg mb-4">Thanks for using Our site!</h3>
										 
										</div>
								  
									  </div>
								  
									  <div class="mail__meta text-center text-sm text-grey-darker mt-8">
								  
										
								  
										<div class="meta__help">
										  <p class="leading-loose">
											Questions or concerns? <a href="http://localhost/FoodHaus/contact.php" class="text-grey-darkest">help@Foodhaus.com</a>
								  
										  </p>
										</div>
								  
									  </div>
								  
									</div>
								  
								  </div>';

									$mail->isSMTP();                                      // Set mailer to use SMTP
									$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
									$mail->SMTPAuth = true;                               // Enable SMTP authentication
									$mail->Username = 'foodhaus.esprittn@gmail.com';                 // SMTP username
									$mail->Password = '(azerty12345)';                           // SMTP password
									$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
									$mail->Port = 587;                                    // TCP port to connect to

									$mail->AddReplyTo('foodhaus.esprittn@gmail.com');
									$mail->From = 'foodhaus.esprittn@gmail.com';
									$mail->FromName = 'FoodHaus';





									$mail->isHTML(true);                                  // Set email format to HTML
									$mail->Subject = $subject;
									$mail->Body = $message;
									$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

									//$headers = 'From: FOODHAUS';
									$mail->send();


									$sql = "UPDATE evenement SET nbplaces = nbplaces -1 where  id=:id ";

									$stmt1 = $pdo->prepare($sql);
									$stmt1->execute([
										':id' => $id
									]);



									echo '<body onLoad="alert(\'Votre participant a été ajoutée avec succès\')">';

									echo '<meta http-equiv="refresh" content="0;URL=events.php">';
									/*$req="insert INTO participant(refC,nomC,ideventcreation,description,quantity) values('".$_POST['refC']."','".$_POST['nomC']."',".$_POST['ideventcreation'].",'".$_POST['description']."','".$_POST['quantity']."')";
   
									$db=config::getConnexion();  
									$sql=$db->prepare($req); 
									$sql->execute(); */
								}
								?>
								<?php
								if (isset($_COOKIE['_uid_']) || isset($_COOKIE['_uiid_']) || isset($_SESSION['login'])) { ?>
									<form class="wrap-form-reservation size22 m-l-r-auto" action="contact.php" method="POST">
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
										<h4 class="txt33 p-b-14">
											Pour participer a cet evenement veuillez introduire ses champs :
										</h4>

										<div class="size30 bo2 bo-rad-10 m-t-3 m-b-20">
											<input value="<?php echo $user_name; ?>" class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name">
										</div>

										<div class="size30 bo2 bo-rad-10 m-t-3 m-b-20">
											<input class="bo-rad-10 sizefull txt10 p-l-20" value="<?php echo $user_email; ?>" type="text" name="mail">
										</div>
										<input class="" type="hidden" name="id" value=" <?php echo $_GET['id'] ?>">


										<!-- Button3 -->
										<button type="submit" class="btn3 flex-c-m size31 txt11 trans-0-4" name="submit">
											Subscribe
										</button>

									<?php } else { ?>
										<div>
											<img class="rounded mx-auto d-block" height="300" width="500" src="images/login.svg" alt="">
											<p class=" alert alert-danger text-dark t-center">Veuillez connecter pour s'inscrire!</p>

										</div>

									<?php }
									?>


									<div class="wrap-btn-booking flex-c-m m-t-13">
										<!-- Button3 -->

									</div>
									</form>
						</div>

			</div>
			<div class="col-md-4 col-lg-3">
				<div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">


					<div class="eventories">

						<h4 class="txt33 bo5-b p-b-35 p-t-58">
							Categories
						</h4>
						<?php
						$sql = "SELECT * FROM Categorie";
						$stmt = $pdo->prepare($sql);
						$stmt->execute();
						while ($participant = $stmt->fetch(PDO::FETCH_ASSOC)) {

							$id_categ = $participant['id_categ'];
							$name = $participant['name'];


						?>
							<ul>
								<li class="bo5-b p-t-8 p-b-8">
									<a href="categ.php?id_categ=<?PHP echo $id_categ; ?>" class="txt27">
										<?php echo $name; ?>
									</a>
								</li>
							</ul>
						<?php }
						?>
					</div>

					<!-- Most Popular -->
					<div class="popular">
						<h4 class="txt33 p-b-35 p-t-58">
							Recent Post
						</h4>
						<?php

						$sql1 = "SELECT * FROM evenement ORDER BY date  DESC ";
						$stmt1 = $pdo->prepare($sql1);
						$stmt1->execute();
						while ($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) {
							$title = $ms['title'];
							$date = $ms['date'];
							$img = $ms['img'];
							$id = $ms['id'];

						?>
							<ul>
								<li class="flex-w m-b-25">
									<div class="size17 bo-rad-10 wrap-pic-w of-hidden m-r-18">
										<a href="event.php?id=<?PHP echo $id; ?>">
											<img src="./images/<?php echo $img; ?>" alt="IMG-BLOG"> </a>

										</a>
									</div>

									<div class="size28">
										<a href="event.php?id=<?PHP echo $id; ?>" class="dis-block txt28 m-b-8">
											<?php echo $title; ?> </a>

										<span class="txt14">
											<?php echo $date; ?> </span>
									</div>
								</li>


							</ul>
						<?php
						}
						?>
					</div>



				</div>
			</div>
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
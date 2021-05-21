<script>
	function surligne(myform, erreur) {
		if (erreur)
			myform.style.backgroundColor = "#fba";
		else
			myform.style.backgroundColor = "";
	}

	function verifqteP(myform) {
		var qteP = parseInt(myform.value);
		if (isNaN(qteP) || qteP < 0) {
			surligne(myform, true);
			return false;
		} else {
			surligne(myform, false);
			return true;
		}
	}




	function verifRef(myform) {
		if (myform.value.length == 0) {
			surligne(myform, true);
			return false;
		} else {
			surligne(myform, false);
			return true;
		}

	}

	function verifForm(f) {

		var qtePOk = verifqteP(f.qteP);
		var refCOk = verifRef(f.refC);

		if (qtePOk && refCOk)
			return true;
		else {
			alert("Veuillez remplir correctement tous les myforms");
			return false;
		}
	}

	function ok() {
		alert("Votre commande a été ajoutée avec succès!");
	}
</script>
<?php $current_page = "payment";
$curr_page = basename(__FILE__); ?>

<title>Paiement</title>
<?php require_once("./includes/navbar.php"); ?>


<?php
//include "../config.php";



if (isset($_POST['valider'])) {
	$sql1 = "DELETE FROM items WHERE email='{$user_email}'";
	$stmt1 = $pdo->prepare($sql1);
	$stmt1->execute();

	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$adresse = $_POST['adresse'];
	$codePostal = $_POST['codePostal'];
	$pays = $_POST['pays'];
	$ville = $_POST['ville'];
	$nomCarte = $_POST['nomCarte'];
	$numCarte = $_POST['numCarte'];
	$moisExp = $_POST['moisExp'];
	$anneeExp = $_POST['anneeExp'];
	$cvv = $_POST['cvv'];



	$sql = "INSERT INTO commande (nom,email,adresse,codePostal,pays,ville,nomCarte,numCarte,moisExp,anneeExp,cvv)
                    VALUES (:nom,:email,:adresse,:codePostal,:pays,:ville,:nomCarte,:numCarte,:moisExp,:anneeExp,:cvv) ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([


		':nom' => $nom,
		':email' => $email,
		':adresse' => $adresse,
		':codePostal' => $codePostal,
		':pays' => $pays,
		':ville' => $ville,
		':nomCarte' => $nomCarte,
		':numCarte' => $numCarte,
		':moisExp' => $moisExp,
		':anneeExp' => $anneeExp,
		':cvv' => $cvv


	]);
	require './backend/phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;


	$mail->addBCC($email, $nom);


	//MAILER

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

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
	
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


	

	$subject = 'Foodhaus: Commandes';
	$message = '<div class=content>
<div class="wrapper-1" style ="width:100%;
height:65vh;
box-sizing:border-box;
display: flex;
align_items:center;
justify_content: center;
flex-direction: column;
background: #FF416C;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FF4B2B, #FF416C); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
  <div class="wrapper-2" style="padding :30px;
  text-align:center;">
	<h1 style="font-size:4em;
	letter-spacing:3px;
	color:#FFF ;
	margin:0;
	margin-bottom:20px;" >Commande confirmée !</h1>
   
	<p style="margin:0;
	font-size:1.3em;
	color:#FFF;
  letter-spacing:1px;">Merci Mr/Mme ' . $_POST['nomCarte'] . ' pour votre fidélité.  </p>
	<p style="margin:0;
	font-size:1.3em;
	color:#FFF;
  letter-spacing:1px;">Un livreur vous contactera lors de la livraison. </p> <br>
	<img src="https://image.freepik.com/vecteurs-libre/food-house-restaurant-logo_7791-250.jpg" width="100" height="100" alt="logo" />
  </div>
  
</div>
</div>



<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">';
	$headers = 'Content-type: text/html; charset=iso-8859-1';

	$mail->Subject = $subject;
	$mail->Body = $message;
	$mail->send();
	
	echo '<body onLoad="alert(\'Votre commande a été ajoutée avec succès\')">';
	echo '<meta http-equiv="refresh" content="0;URL=commandes.php">';

}
?>








<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/bg-title-page-02.jpg);">
	<h2 class="tit6 t-center">
		Paiement et Livraison
	</h2>
</section>

<!-- Formule -->

<link rel="stylesheet" href="css/payment.css">
<section class="formule">
	<div class="row1">
		<div class="col-750">
			<div class="container1">

				<form id="form" method="POST" onsubmit="return verifForm(this)">


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
							<div class="row1">
								<div class="col-500">
									<h3>Informations</h3>
									<label for="nom"><i class="fa fa-user"></i> Nom</label>
									<input value="" onblur="allLetter(this)" type="text" id="nom" name="nom" placeholder="John M. Doe">
									<label for="email"><i class="fa fa-envelope"></i> Email</label>
									<input value="<?php echo $user_email; ?>" readonly="true" type="text" onblur="allLetter(this)" id="email" name="email" placeholder="john@example.com">
									<label for="adresse"><i class="fa fa-address-card-o"></i> Addresse</label>
									<input type="text" id="adr" name="adresse" placeholder="542 W. 15th Street">
									<label for="pays"><i class="fa fa-institution"></i> Pays</label>
									<input type="text" onblur="allLetter(this)" id="pays" name="pays" placeholder="New York">

									<div class="row1">
										<div class="col-500">
											<label for="ville">Ville</label>
											<input type="text" onblur="allLetter(this)" id="ville" name="ville" placeholder="NY">
										</div>
										<div class="col-500">
											<label for="codePostal">Code postal</label>
											<input type="text" onblur="allnumeric(this)" id="codePostal" name="codePostal" placeholder="10001">
										</div>
									</div>
								</div>

								<div class="col-500">
									<h3>Paiement</h3>
									<label for="fname">Cartes acceptées</label>
									<div class="icon-container">
										<i class="fa fa-cc-visa" style="color:navy;"></i>
										<i class="fa fa-cc-amex" style="color:blue;"></i>
										<i class="fa fa-cc-mastercard" style="color:red;"></i>
										<i class="fa fa-cc-discover" style="color:orange;"></i>
									</div>
									<label for="nomCarte">Nom sur la carte</label>
									<input value="<?php echo $user_name; ?>" readonly="true" type="text" onblur="allLetter(this)" id="nomCarte" name="nomCarte" placeholder="John More Doe">
									<label for="numCarte">Numéro du carte</label>
									<input type="text" onblur="allnumeric(this)" id="numCarte" name="numCarte" placeholder="1111-2222-3333-4444">
									<label for="moisExp">Mois d'éxpiration</label>
									<input type="text" id="moisExp" onblur="allLetter(this)" name="moisExp" placeholder="September">

									<div class="row1">
										<div class="col-500">
											<label for="anneeExp">Année d'éxpiration</label>
											<input type="text" id="anneExp" onblur="allnumeric(this)" name="anneeExp" placeholder="2018">
										</div>
										<div class="col-500">
											<label for="cvv">CVV</label>
											<input type="text" id="cvv" onblur="allnumeric(this)" name="cvv" placeholder="352">
										</div>




										</h4>

										<button type="submit" href="gallery.php?email=" class="btn fa fa-plus-square" value="valider" name="valider"><i></i></button>
										<button type="reset" class="btn fa ti-eraser" value="Reset"><i></i></button>

						</form>
			</div>
		</div>
	<?php } else { ?>
		<div>
			<img class="rounded mx-auto d-block" height="300" width="500" src="images/login.svg" alt="">
			<p class="  alert alert-danger text-dark t-center">Veuillez connecter pour passer une commande!</p>
		</div>
	<?php }
	?>

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

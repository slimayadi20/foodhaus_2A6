<script>
  function surligne(myform, erreur)
{
   if(erreur)
      myform.style.backgroundColor = "#fba";
   else
      myform.style.backgroundColor = "";
}

  function verifqteP(myform)
{
   var  qteP= parseInt(myform.value);
   if(isNaN(qteP) || qteP < 0 )
   {
      surligne(myform, true);
      return false;
   }
   else
   {
      surligne(myform, false);
      return true;
   }
}



 
  function verifRef(myform)
{  
  if(myform.value.length==0)
   {
      surligne(myform, true);
      return false;
   }
   else
   {
      surligne(myform, false);
      return true;
   }

}

function verifForm(f)
{
  
   var qtePOk = verifqteP(f.qteP);
    var refCOk = verifRef(f.refC);
  
   if(qtePOk && refCOk )
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les myforms");
      return false;
   }
}
 function ok()
  {
alert("Votre commande a été ajoutée avec succès!");
}

  </script>
<?php $current_page = "payment"; 
$curr_page = basename(__FILE__);?>

<title>Paiement</title>
<?php require_once("./includes/navbar.php"); ?>


<?php 
//include "../config.php";



if (isset($_POST['valider']))
{
   
	                
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
                   
   
$to_email = $_POST['email'];
$subject = 'Foodhaus: Commandes';
$body = '<div class=content>
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
  letter-spacing:1px;">Merci Mr/Mme '.$_POST['nomCarte'].' pour votre fidélité.  </p>
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

//mail($to_email,$subject,$body,$headers);

   
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
	  <section class="formule" >
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
		  <label for="nom"  ><i  class="fa fa-user"></i> Nom</label>
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
		  <input value="<?php echo $user_name; ?>" readonly="true" type="text" onblur="allLetter(this)"  id="nomCarte" name="nomCarte" placeholder="John More Doe">
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

<button type="submit" href="gallery.php?email=<?php echo $row['email']; ?>" class="btn fa fa-plus-square" value="valider" name="valider"><i></i></button>
<button type="reset" class="btn fa ti-eraser" value="Reset"><i ></i></button>

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

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

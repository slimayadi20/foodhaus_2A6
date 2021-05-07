<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from technext.github.io/dashtreme/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Apr 2020 22:20:07 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">
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


<?php 
//include "../config.php";

include "../controller/commandeC.php";
	include "../model/commande.php";
	
//ajout
if (isset($_POST['valider']))
{
   
	$com = new commande($_POST['nom'],$_POST['email'],$_POST['adresse'],$_POST['codePostal'],$_POST['pays'],$_POST['ville'],$_POST['nomCarte'],
         $_POST['numCarte'],$_POST['moisExp'],$_POST['anneeExp'],$_POST['cvv']) ;
	 $comm=new commandeC;
   $comm->ajouterCommande($com) ;
   echo '<body onLoad="alert(\'Votre commande a été ajoutée avec succès\')">';
		echo '<meta http-equiv="refresh" content="0;URL=gcb.php">';
  /*$req="insert INTO categorie(refC,nomC,datecreation,description,quantity) values('".$_POST['refC']."','".$_POST['nomC']."',".$_POST['datecreation'].",'".$_POST['description']."','".$_POST['quantity']."')";
   
  $db=config::getConnexion();  
  $sql=$db->prepare($req); 
  $sql->execute(); */
 
}
?>
	
   <div width="100%" class="card mb-3">
          <div width="100%" class="card-header">
            <i class="fas fa-table"></i>
            Ajouter une nouvelle commande </div>
            
          <div class="card-body">
            <div class="table-responsive">
<form id="myform" method="POST" onsubmit="return verifForm(this)" > 
<label> Nom de commande: </label>
<input type="text" class="form-control" name="nom" required pattern="[a-zA-Z\s]+" value="" onblur="verifRef(this)" style="width:500px">  </br>  
<label> Email: </label>
<input type="text" class="form-control" name="email" required pattern=".+@gmail.com|.+@esprit.tn" value="" onblur="verifRef(this)" style="width:500px">  </br>

<label> Adresse: </label>
<input type="text" class="form-control" name="adresse" required  value="" onblur="verifRef(this)" style="width:500px">  </br>
<label> Code Postal: </label>
<input type="text" class="form-control" name="codePostal" required pattern="\d{5}" value="" onblur="verifRef(this)" style="width:500px">  </br>
<label> Pays: </label>
<input type="text" class="form-control" name="pays" required pattern="[a-zA-Z\s]+"  value="" onblur="verifRef(this)" style="width:500px">  </br>
<label> Ville: </label>
<input type="text" class="form-control" name="ville" required pattern="[a-zA-Z\s]+" value="" onblur="verifRef(this)" style="width:500px">  </br>
<label> Nom sur Carte: </label>
<input type="text" class="form-control" name="nomCarte" required pattern="[a-zA-Z\s]+" value="" onblur="verifRef(this)" style="width:500px">  </br>
<label> Num de carte: </label>
<input type="text" class="form-control" name="numCarte" required pattern="\d{12}" value="" onblur="verifRef(this)" style="width:500px">  </br>
<label> Mois d'exp: </label>
<input type="text" class="form-control" name="moisExp" required pattern="[a-zA-Z\s]+" value="" onblur="verifRef(this)" style="width:500px">  </br>
<label> Annee d'exp: </label>
<input type="text" class="form-control" name="anneeExp" required pattern="\d{4}" value="" onblur="verifRef(this)" style="width:500px">  </br>
<label> CVV: </label>
<input type="text" class="form-control" name="cvv" required pattern="\d{3}" value="" onblur="verifRef(this)" style="width:500px">  </br>

			  
		 
		 

</table>




</h4>

<button type="submit" class="btn btn-outline-success" value="valider" name="valider"><i class="fas fa-check"></i></button>
<!--<button   class="btn btn-outline-success" type="submit" ></i> Valider</button>-->


<button type="reset" class="btn btn-outline-danger" value="Reset"><i class="fas fa-times"></i></button>

</form>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</br>
</br>
</br>
</br>

</body>
</html>
 
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
alert("Votre livraison a été ajoutée avec succès!");
}
  </script>


<?php 
//include "../config.php";

include "../controller/livraisonC.php";
	include "../model/livraison.php";
	
//ajout
if (isset($_POST['valider']))
{
   
	$liv = new livraison($_POST['idCommande'],$_POST['nomLivreur'],$_POST['date'],$_POST['etat']) ;
	 $livv=new livraisonC;
   $livv->ajouterLivraison($liv) ;
   echo '<body onLoad="alert(\'Votre livraison a été ajoutée avec succès\')">';
		echo '<meta http-equiv="refresh" content="0;URL=gb.php">';
  /*$req="insert INTO categorie(refC,nomC,datecreation,description,quantity) values('".$_POST['refC']."','".$_POST['nomC']."',".$_POST['datecreation'].",'".$_POST['description']."','".$_POST['quantity']."')";
   
  $db=config::getConnexion();  
  $sql=$db->prepare($req); 
  $sql->execute(); */
 
}
?>
	
   <div width="100%" class="card mb-3">
          <div width="100%" class="card-header">
            <i class="fas fa-table"></i>
            Ajouter une nouvelle livraison </div>
            
          <div class="card-body">
            <div class="table-responsive">
<form id="myform" method="POST" onsubmit="return verifForm(this)" > 
<label> Commande numéro: </label>
<?php
$mysqli = NEW MySQLi('localhost','root','','test');
$resultSet = $mysqli->query("SELECT idCommande FROM commande");
?>
<select name="idCommande" >
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $idCommande = $rows['idCommande'];
        echo "<option value='$idCommande'>$idCommande</option>";
    }
    ?>
</select> </br>
<label> Nom du livreur: </label>
<input type="text" class="form-control" name="nomLivreur" required placeholder="Saisir le nom" value="" onblur="verifRef(this)" style="width:500px">  </br>  
<label> Date de Livraison: </label>
<input type="text" class="form-control" name="date" required placeholder="Saisir la date" value="" onblur="verifRef(this)" style="width:500px">  </br>
<label> Etat: </label>
<select name="etat" >
<option >En cours</option>
</select>


			  
		 
		 

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
 

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
   
      
 
 /* function surligne(myform, erreur)
{
   if(erreur)
      myform.style.backgroundColor = "#fba";
   else
      myform.style.backgroundColor = "#7CFC00";
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

}*/


function numb(inputtxt)
 {
 var numbers = /^[-+]?[0-9]+$/;
 if(inputtxt.value.match(numbers))
 {
 return true;
 }
 else
 {
 alert('Prière de saisir uniquement des nombres');
 return false;
 }
 }

function lett(inputtxt)
 {
   var letters = /^[A-Za-z\s]+$/; if(inputtxt.value.match(letters))
 {
 return true;
 }
 else
 {
 alert('Prière de saisir uniquement des lettres');
 return false;
 }
 }


  </script>

<?php 
//include "../config.php";

include "../controller/categorieC.php";
	include "../model/categorie.php";
	
//ajout
if (isset($_POST['valider']))
{
  
	$categ = new categorie($_POST['id_categ'],$_POST['name']) ;
	 $categorie=new categorieC;
   $categorie->ajoutercategorie($categ) ;
   
   echo '<body onLoad="alert(\'Votre categorie a été ajoutée avec succès\')">';
		echo '<meta http-equiv="refresh" content="0;URL=gc.php">';
  /*$req="insert INTO evenement(refC,nomC,datecreation,description,quantity) values('".$_POST['refC']."','".$_POST['nomC']."',".$_POST['datecreation'].",'".$_POST['description']."','".$_POST['quantity']."')";
   
  $db=config::getConnexion();  
  $sql=$db->prepare($req); 
  $sql->execute(); */
 
}
?>
	
	 <div width="100%" class="card mb-3">
          <div width="100%" class="card-header">
            <i class="fas fa-table"></i>
            Ajouter une categorie </div>
            
          <div class="card-body">
            <div class="table-responsive">
<form id="myform" method="POST" onsubmit="" > 
<label> id : </label>
<input type="text" class="form-control" name="id_categ"  placeholder="Saisir l'id" value="" onblur="" style="width:500px">  </br>  

<label> name: </label>
<input type="text" class="form-control" name="name"  placeholder="Saisir name" value="" onblur="lett(this)" style="width:500px">  </br>  

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
 
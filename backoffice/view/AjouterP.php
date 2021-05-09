
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from technext.github.io/dashtreme/tables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Apr 2020 22:20:07 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta nom_recette="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <meta nom_recette="description" content=""/>
  <meta nom_recette="author" content=""/>
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
function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.text1.focus();
return false;
}
}
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
 var letters = /^[A-Za-z]+$/;
 if(inputtxt.value.match(letters))
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

include "../controller/recette_C.php";
	include "../model/recette.php";
	
//ajout
if (isset($_POST['valider']))
{
	$recettee = new recette($_POST['nom_recette'],$_POST['id_recette'],$_POST['img_recette'],$_POST['descprition_recette'],$_POST['temp_recette'],$_POST['type_recette']) ;
	 $recette=new recette_C;
   $recette->ajouterrecette($recettee) ;
   
   echo '<body onLoad="alert(\'Votre recette a été ajoutée avec succès\')">';
		echo '<meta http-equiv="refresh" content="0;URL=gb.php">';
  /*$req="insert INTO recette(refC,nomC,ideventcreation,description,quantity) values('".$_POST['refC']."','".$_POST['nomC']."',".$_POST['ideventcreation'].",'".$_POST['description']."','".$_POST['quantity']."')";
   
  $db=config::getConnexion();  
  $sql=$db->prepare($req); 
  $sql->execute(); */
 
}
?>
	
	 <div width="100%" class="card mb-3">
          <div width="100%" class="card-header">
            <i class="fas fa-table"></i>
            Ajouter une recette </div>
            
          <div class="card-body">
            <div class="table-responsive">
<form id="myform" method="POST" onsubmit="" > 
<label> nom_recette: </label>
<input type="text" class="form-control" name="nom_recette"  placeholder="Saisir le nom" value="" onblur="lett(this)" style="width:500px">  </br>  

<label> id_recette : </label>
<input type="text" class="form-control" name="id_recette" placeholder="Saisir l'id_recette" value="" onblur="" style="width:500px">  </br>  


<label> img_recette	: </label>
<input type="text" class="form-control" name	="img_recette"  placeholder="Saisir img_recette" value="" onblur="" style="width:500px">  </br>  

<label> descprition_recette: </label>
<input type="text" class="form-control" name="descprition_recette"  placeholder="Saisir descprition_recette" value="" onblur="" style="width:500px">  </br>  

<label> temp_recette: </label>
<input type="text" class="form-control" name="temp_recette"  placeholder="Saisir temp_recette" value="" onblur="" style="width:500px">  </br>  

<label> type_recette: </label>
<input type="text" class="form-control" name="type_recette"  placeholder="Saisir type_recette" value="" onblur="" style="width:500px">  </br>  

 
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
 
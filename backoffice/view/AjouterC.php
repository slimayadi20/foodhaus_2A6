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
   
   function allLetter(inputtxt)
 {
 var letters = /^[A-Za-z\s]+$/;
 if(inputtxt.value.match(letters))
 {
 return true;
 }
 else
 {
 alert("Seulement des lettres");
 return false;
 }
 }
     
 function allnumeric(inputtxt)
 {
 var numbers = /^[0-9]+$/;
 if(inputtxt.value.match(numbers))
 {
 alert('Votre enregistrement a été accepté....');
 document.form1.text1.focus();
 return true;
 }
 else
 {
 alert('Prière de saisir des chiffres uniquement');
 document.form1.text1.focus();
 return false;
 }
 }

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
alert("Votre cours a été ajouté avec succès!");
}
  </script>


<?php 
//include "../config.php";

include "../controller/coursC.php";
	include "../model/cours.php";
	
//ajout
if (isset($_POST['valider']))
{
	$cat = new cours($_POST['id'],$_POST['nomc'],$_POST['imgpath'],$_POST['nomf'],$_POST['lieu'],$_POST['date'],$_POST['prix']) ;
	 $categ=new coursC;
   $categ->ajoutercours($cat) ;
   echo '<body onLoad="alert(\'Votre cours a été ajouté avec succès\')">';
		echo '<meta http-equiv="refresh" content="0;URL=gcb.php">';
  
 


//the subject
$sub = "Fekret'Com ";
//the message
$msg = "Un cours a ete ajouté avec succes !";
//recipient email here
$rec = "omar.nouri@esprit.tn";
//send email
mail($rec,$sub,$msg);


}
?>
	
	 <div width="100%" class="card mb-3">
          <div width="100%" class="card-header">
            <i class="fas fa-table"></i>
            Ajouter un cours</div>
            
          <div class="card-body">
            <div class="table-responsive">
<form id="myform" method="POST" onsubmit="return verifForm(this)" > 

<label> ID du cours: </label>
<input type="text" class="form-control" name="id" placeholder="Saisir le id" value="" onblur="allnumeric(this)" style="width:500px">  </br>  

<label> nom du cours: </label>
<input type="text" class="form-control" name="nomc" placeholder="Saisir le nom du cours" value="" onblur="verifRef(this)" style="width:500px">  </br>  
<label> image du cours: </label>
<input type="text" class="form-control" name="imgpath" placeholder="" value=""  style="width:500px">  </br>


<label>  nom du formateur: </label>
<?php
$mysqli = NEW MySQLi('localhost','root','','formation');
$resultSet = $mysqli->query("SELECT nom FROM formateur");
?>
<select name="nomf" >
    <?php
    while($rows = $resultSet->fetch_assoc())
    {
        $nom = $rows['nom'];
        echo "<option value='$nom'>$nom</option>";
    }
    ?>
</select> </br>



<label> lieu: </label>
<input type="text" class="form-control" name="lieu" placeholder="Saisir le lieu " value="" onblur="verifRef(this)" style="width:500px">  </br>  

<label> date </label>
<input type="date" class="form-control" name="date" placeholder="" value="" onblur="verifRef(this)" style="width:500px">  </br> 

<label> prix: </label>
<input type="text" class="form-control" name="prix" placeholder="Saisir le prix " value="" onblur="allnumeric(this)" style="width:500px">  </br>  
	 
	 





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
 

    <script>
	
	 function allLetter(inputtxt)
 {
 var letters = /^[A-Za-z]+$/;
 if(inputtxt.value.match(letters))
 {
 return true;
 }
 else
 {
 alert("message");
 return false;
 }
 }
     
 function allnumeric(inputtxt)
 {
 var numbers = /^[0-9]+$/;
 if(inputtxt.value.match(numbers))
 {
 alert('Votre enregistrement a été accépté....');
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
 </script>
             <?php 
			 
include "../config.php";
$total = 0 ;
//modification bel id
if (isset($_GET['id']))
{
	$total++;
	$req="select * from formateur where id=".$_GET['id'];
	$db=config::getConnexion();
	$result=$db->query($req);
       foreach($result as $row)

	   {   
		   $id=$row['id'];
           $nom=$row['nom'];
	       $prenom=$row['prenom'];
		   $specialite=$row['specialite'];
           
	       
		   
		   
	   }
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
          
<form align="center" id="myForm" method="get" action="updateF.php">

<input type="hidden" value="<?php echo $id; ?>" name="id">
<tr><td>

<label> nom du formateur </label></td>
<td><input type="text"  value="<?php echo $nom;?>" class="form-control" name="nom" placeholder="nom du formateur" onblur="allLetter(this)"style="width:400px"> </td></tr>
</tr>
<tr><td><label> prenom du formateur </label></td>
<td><input type="text" value="<?php echo $prenom;?>" class="form-control" name="prenom" placeholder="prenom"onblur="allLetter(this)" style="width:400px"> </td></tr>
</table>
<label> specialite du formateur </label></td>
<td><input type="text"  value="<?php echo $specialite;?>" class="form-control" name="specialite" placeholder="specialite"onblur="verifRef(this)" style="width:400px"> </td></tr>
</tr>








<button type="submit" class="btn btn-outline-success" value="valider" name="valider"><i class="fas fa-check"></i></button>
</a>
	  </form>

    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
	  </table> 
 <h5  style="color: white; background-color: green; width: 200px;" align="center"> <?php echo('Total de blog:'.$total)?></h5>
<form method="get" action="ajouterF.php" >
   <button align="center" style="background-color: #0c6071; width: 300px" class="btn btn-primary btn-block" type="submit" > <a>  Ajouter un autre formateur  </a> </button>
</form>
</br>

  
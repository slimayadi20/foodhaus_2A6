
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
	$req="select * from cours where id=".$_GET['id'];
	$db=config::getConnexion();
	$result=$db->query($req);
       foreach($result as $row)

	   {   
		   $id=$row['id'];
           $nomc=$row['nomc'];
		   $nomf=$row['nomf'];
		   $lieu=$row['lieu'];
           $date=$row['date'];
		   $prix=$row['prix'];
           
	       
		   
		   
	   }
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
          
<form align="center" id="myForm" method="get" action="updateC.php">
<div>
<input type="hidden" value="<?php echo $id; ?>" name="id">
<tr><td>

<label> nom du cours </label></td>
<td><input type="text"  value="<?php echo $nomc;?>" class="form-control" name="nomc" placeholder="nom du cours" onblur="allLetter(this)"style="width:400px"> </td></tr>
</tr>
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
</table>
<label> lieu </label></td>
<td><input type="text"  value="<?php echo $lieu;?>" class="form-control" name="lieu" placeholder="lieu" style="width:400px"> </td></tr>
</tr>
<tr><td><label> date </label></td>
<td><input type="date" value="<?php echo $date;?>" class="form-control" name="date" placeholder="date" style="width:400px"> </td></tr>
</table>
<label> prix </label></td>
<td><input type="text"  value="<?php echo $prix;?>" class="form-control" name="prix" placeholder="prix"onblur="allnumeric(this)" style="width:400px"> </td></tr>
</tr>
</div>








<button type="submit" class="btn btn-outline-success" value="valider" name="valider"><i class="fas fa-check"></i></button>
</a>
	  </form>

    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
	  </table> 
 <h5  style="color: white; background-color: green; width: 200px;" align="center"> <?php echo('Total de blog:'.$total)?></h5>
<form method="get" action="ajouterC.php" >
   <button align="center" style="background-color: #0c6071; width: 300px" class="btn btn-primary btn-block" type="submit" > <a>  Ajouter un autre cours  </a> </button>
</form>
</br>

  
<script>
	
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
include "../config.php";
$total = 0 ;
//modification bel id
if (isset($_GET['id']))
{
	$total++;
	$req="select * from evenement where id=".$_GET['id'];
	$db=config::getConnexion();
	$result=$db->query($req);
       foreach($result as $row)

	   {   
		   $id=$row['id'];
           $title=$row['title'];
	       $description=$row['description'];
		   $img=$row['img'];
           $date=$row['date'];
	       $nbplaces=$row['nbplaces'];
		   $adress=$row['adress'];

		   
	   }
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
          
<form align="center" id="myForm" method="get" action="updateC.php">

<input type="hidden" value="<?php echo $id; ?>" name="id">
<tr><td>
<label> id </label></td>
<td><input type="text"  value="<?php echo $id;?>" class="form-control" name="id" placeholder="id" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> title </label></td>
<td><input type="text"  value="<?php echo $title;?>" class="form-control" name="title" placeholder="title" onblur="lett(this)" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> nbplaces </label></td>
<td><input type="text"  value="<?php echo $nbplaces;?>" class="form-control" name="nbplaces" placeholder="nbplaces" onblur="numb(this)" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> date </label></td>
<td><input type="text"  value="<?php echo $date;?>" class="form-control" name="date" placeholder="date" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> adress </label></td>
<td><input type="text"  value="<?php echo $adress;?>" class="form-control" name="adress" placeholder="adress" style="width:400px"> </td></tr>
</tr>
<tr><td><label> description </label></td>
<td><input type="text" value="<?php echo $description;?>" class="form-control" name="description" placeholder="description de l'evenement" style="width:400px"> </td></tr>
</table>
<tr><td>
<label> img </label></td>
<td><input type="text"  value="<?php echo $img;?>" class="form-control" name="img" placeholder="img" style="width:400px"> </td></tr>
</tr>





<button type="submit" class="" value="valider" name="valider"><i class="fas fa-check"></i></button>
</a>
	  </form>

    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
	  </table> 
<form method="get" action="ajouterC.php" >
</form>
</br>
  
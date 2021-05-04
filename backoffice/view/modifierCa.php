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
if (isset($_GET['id_categ']))
{
	$total++;
	$req="select * from categorie where id_categ=".$_GET['id_categ'];
	$db=config::getConnexion();
	$result=$db->query($req);
       foreach($result as $row)

	   {   	
		   $id_categ=$row['id_categ'];
           $name=$row['name'];
	   }
	}
	    ?> 

		   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
          
<form align="center" id="myForm" method="get" action="updateC.php">

<input type="hidden" value="<?php echo $id_categ; ?>" name="id">
<tr><td>
<label> id </label></td>
<td><input type="text"  value="<?php echo $id_categ;?>" class="form-control" name="id" placeholder="id" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> title </label></td>
<td><input type="text"  value="<?php echo $name;?>" class="form-control" name="title" placeholder="title" onblur="lett(this)" style="width:400px"> </td></tr>
</tr>



<button type="submit" class="" value="valider" name="valider"><i class="fas fa-check"></i></button>
</a>
	  </form>

    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
	  </table> 
<form method="get" action="ajouterCa.php" >
</form>
</br>
  
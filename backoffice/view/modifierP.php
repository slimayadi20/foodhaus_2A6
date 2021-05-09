
    
             <?php 
include "../config.php";
$total = 0 ;
//modification bel id_recette
if (isset($_GET['id_recette']))
{
	$total++;
	$req="select * from recette where id_recette=".$_GET['id_recette'];
	$db=config::getConnexion();
	$result=$db->query($req);
       foreach($result as $row)

	   {   
		   $nom_recette=$row['nom_recette'];
		   $id_recette=$row['id_recette'];
		   $img_recette=$row['img_recette'];
		   $descprition_recette=$row['descprition_recette'];
		   $temp_recette=$row['temp_recette'];
		   $type_recette=$row['type_recette'];
	      
		   
	   }
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
             <table class="table table-bordered" id_recette="dataTable" wid_recetteth="100%" cellspacing="0"> 
          
<form align="center" id="myForm" method="get" action="updateC.php">

<input type="hid_recetteden" value="<?php echo $id_recette; ?>" name="id_recette">
<tr><td>
<label> id_recette </label></td>
<td><input type="text"  value="<?php echo $id_recette;?>" class="form-control" name="id_recette" placeholder="id_recette" style="wid_recetteth:400px"> </td></tr>
</tr>
<tr><td>
<label> nom_recette </label></td>
<td><input type="text"  value="<?php echo $nom_recette;?>" class="form-control" name="nom_recette" placeholder="nom_recette" style="wid_recetteth:400px"> </td></tr>
</tr>
<tr><td>
<label> img_recette </label></td>
<td><input type="text"  value="<?php echo $img_recette;?>" class="form-control" name="img_recette" placeholder="img_recette" style="wid_recetteth:400px"> </td></tr>
</tr>
<tr><td>
<label> descprition_recette </label></td>
<td><input type="text"  value="<?php echo $descprition_recette;?>" class="form-control" name="descprition_recette" placeholder="descprition_recette" style="wid_recetteth:400px"> </td></tr>
</tr>
<tr><td>
<label> temp_recette </label></td>
<td><input type="text"  value="<?php echo $temp_recette;?>" class="form-control" name="temp_recette" placeholder="temp_recette" style="wid_recetteth:400px"> </td></tr>
</tr>
<tr><td>
<label> type_recette </label></td>
<td><input type="text"  value="<?php echo $type_recette;?>" class="form-control" name="type_recette" placeholder="type_recette" style="wid_recetteth:400px"> </td></tr>
</tr>





<button type="submit" class="btn btn-outline-success" value="valid_recetteer" name="valid_recetteer"><i class="fas fa-check"></i></button>
</a>
	  </form>

    <!-- End container-fluid_recette-->
    
    </div><!--End content-wrapper-->
	  </table> 
 <h5  style="color: white; background-color: green; wid_recetteth: 200px;" align="center"> <?php echo('Total de recette:'.$total)?></h5>

</br>
  
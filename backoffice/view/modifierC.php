
    
             <?php 
include "../config.php";
$total = 0 ;
//modification avec id
if (isset($_GET['id_chef']))
{ 
	$total++;
	$req="select * from chefs where id_chef=".$_GET['id_chef'];
	$db=config::getConnexion();
	$result=$db->query($req);
       foreach($result as $row)

	   {   
		   $img_chef=$row['img_chef'];
           $nom=$row['nom'];
	       $descriptions=$row['descriptions'];
		   $lien_video_chef=$row['lien_video_chef'];
           $img_video_chef=$row['img_video_chef'];
	       $nom_plat1_chef=$row['nom_plat1_chef'];
		   $nom_plat2_chef=$row['nom_plat2_chef'];
		   $citation_chef=$row['citation_chef'];
		   $img_plat1_chef=$row['img_plat1_chef'];
		   $img_plat2_chef=$row['img_plat2_chef'];
		   $id_chef=$row['id_chef'];
		   
	   }
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
          
<form align="center" id="myForm" method="get" action="updateC.php">

<input hidden type="text" value="<?php echo $id_chef; ?>" name="id_chef">
<tr><td>
<label> id_chef </label></td>
<td><input type="text"  value="<?php echo $id_chef;?>" class="form-control" name="id_chef" placeholder="id_chef" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> img_chef </label></td>
<td><input type="text"  value="<?php echo $img_chef;?>" class="form-control" name="img_chef" placeholder="img_chef" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> nom </label></td>
<td><input type="text"  value="<?php echo $nom;?>" class="form-control" name="nom" placeholder="nom" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> descriptions </label></td>
<td><input type="text"  value="<?php echo $descriptions;?>" class="form-control" name="descriptions" placeholder="descriptions" style="width:400px"> </td></tr>
</tr>
<tr><td><label> lien_video_chef </label></td>
<td><input type="text" value="<?php echo $lien_video_chef;?>" class="form-control" name="lien_video_chef" placeholder="lien_video_chef" style="width:400px"> </td></tr>
</table>
<tr><td>
<label> img_video_chef </label></td>
<td><input type="text"  value="<?php echo $img_video_chef;?>" class="form-control" name="img_video_chef" placeholder="img_video_chef" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> nom_plat1_chef </label></td>
<td><input type="text"  value="<?php echo $nom_plat1_chef;?>" class="form-control" name="nom_plat1_chef" placeholder="nom_plat1_chef" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> nom_plat2_chef </label></td>
<td><input type="text"  value="<?php echo $nom_plat2_chef;?>" class="form-control" name="nom_plat2_chef" placeholder="nom_plat2_chef" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> citation_chef </label></td>
<td><input type="text"  value="<?php echo $citation_chef;?>" class="form-control" name="citation_chef" placeholder="citation_chef" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> img_plat1_chef </label></td>
<td><input type="text"  value="<?php echo $img_plat1_chef;?>" class="form-control" name="img_plat1_chef" placeholder="img_plat1_chef" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> img_plat2_chef </label></td>
<td><input type="text"  value="<?php echo $img_plat2_chef;?>" class="form-control" name="img_plat2_chef" placeholder="img_plat2_chef" style="width:400px"> </td></tr>
</tr>





<button type="submit" class="btn btn-outline-success" value="valider" name="valider"><i class="fas fa-check"></i></button>
</a>
	  </form>

    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
	  </table> 
 <h5  style="color: white; background-color: green; width: 200px;" align="center"> <?php echo('Total de chefs:'.$total)?></h5>

</br>
  
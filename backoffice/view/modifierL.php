
    
             <?php 
include "../config.php";





$total = 0 ;
//modification bel id
if (isset($_GET['idLivraison']))
{
	$total++;
	$req="SELECT * from livraisons where idLivraison=".$_GET['idLivraison'];
	$db=config::getConnexion();
	$result=$db->query($req);
       foreach($result as $row)

	   {   
           $idLivraison=$row['idLivraison'];
		   $idCommande=$row['idCommande'];
	       $nomLivreur=$row['nomLivreur'];
		   $date=$row['date'];
           $etat=$row['etat'];
		   
		   
		   
	   }
	   
}

?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
          
<form align="center" id="myForm" method="get" action="updateL.php">

<input type="hidden" value="<?php echo $idLivraison; ?>" name="idLivraison">
<tr><td>
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
</tr>
<tr><td><label> Nom du livreur </label></td>
<td><input type="text" value="<?php echo $nomLivreur; ?>" class="form-control" name="nomLivreur" required  style="width:400px"> </td></tr>
<tr><td>
<label> Date de Livraison</label></td>
<td><input type="text"  value="<?php echo $date; ?>" class="form-control" name="date" required  style="width:400px"> </td></tr>
</tr>
<label> Etat: </label>
<select name="etat" >
<option >En cours</option>
<option >Livrée</option>
</select>

</table>




<button type="submit" class="btn btn-outline-success" value="valider" name="valider" ><i class="fas fa-check"></i></button>
</a>
	  </form>

    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
	  </table> 
 <h5  style="color: white; background-color: green; width: 200px;" align="center"> <?php echo('Total de livraisons:'.$total)?></h5>
<form method="get" action="ajouterL.php" >
   <button align="center" style="background-color: #0c6071; width: 300px" class="btn btn-primary btn-block" type="submit" > <a>  Ajouter une autre livraison  </a> </button>
</form>
</br>
  

    
             <?php 
include "../config.php";





$total = 0 ;
//modification bel id
if (isset($_GET['idCommande']))
{
	$total++;
	$req="SELECT * from commande where idCommande=".$_GET['idCommande'];
	$db=config::getConnexion();
	$result=$db->query($req);
       foreach($result as $row)

	   {   
		   $idCommande=$row['idCommande'];
           $nom=$row['nom'];
	       $email=$row['email'];
		   $adresse=$row['adresse'];
		   $codePostal=$row['codePostal'];
		   $pays=$row['pays'];
		   $ville=$row['ville'];
		   $nomCarte=$row['nomCarte'];
		   $numCarte=$row['numCarte'];
		   $moisExp=$row['moisExp'];
		   $anneeExp=$row['anneeExp'];
		   $cvv=$row['cvv'];

		   
		   
	   }
	   
}

?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
          
<form align="center" id="myForm" method="get" action="updateC.php">

<input type="hidden" value="<?php echo $idCommande; ?>" name="idCommande">
<tr><td>
<label> Nom commande </label></td>
<td><input type="text"  value="<?php echo $nom; ?>" class="form-control" name="nom" required pattern="[a-zA-Z\s]+" placeholder="nom du categorie" style="width:400px"> </td></tr>
</tr>
<tr><td><label> Email </label></td>
<td><input type="text" value="<?php echo $email; ?>" class="form-control" name="email" required pattern=".+@gmail.com|.+@esprit.tn" placeholder="description du categorie" style="width:400px"> </td></tr>
<tr><td>
<label> Adresse</label></td>
<td><input type="text"  value="<?php echo $adresse; ?>" class="form-control" name="adresse" required placeholder="nom du categorie" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> Code Postal </label></td>
<td><input type="text"  value="<?php echo $codePostal; ?>"  class="form-control" name="codePostal" pattern="\d{5}" required ="nom du categorie" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> Pays </label></td>
<td><input type="text"  value="<?php echo $pays; ?>" class="form-control" name="pays" required pattern="[a-zA-Z\s]+" placeholder="nom du categorie" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> Ville </label></td>
<td><input type="text"  value="<?php echo $ville; ?>" class="form-control" name="ville" required pattern="[a-zA-Z\s]+" placeholder="nom du categorie" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> Nom sur carte </label></td>
<td><input type="text"  value="<?php echo $nomCarte; ?>" class="form-control" name="nomCarte" required pattern="[a-zA-Z\s]+" placeholder="nom du categorie" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> Numéro de carte </label></td>
<td><input type="text"  value="<?php echo $numCarte; ?>" class="form-control" name="numCarte" required pattern="\d{12}" placeholder="nom du categorie" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> Mois d'exp </label></td>
<td><input type="text"  value="<?php echo $moisExp; ?>" class="form-control" name="moisExp" required pattern="[a-zA-Z\s]+" placeholder="nom du categorie" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> Année d'exp </label></td>
<td><input type="text"  value="<?php echo $anneeExp; ?>" class="form-control" name="anneeExp" required pattern="\d{4}" placeholder="nom du categorie" style="width:400px"> </td></tr>
</tr>
<tr><td>
<label> cvv </label></td>
<td><input type="text"  value="<?php echo $cvv; ?>" class="form-control" name="cvv" required pattern="\d{3}" placeholder="nom du categorie" style="width:400px"> </td></tr>
</tr>
</table>




<button type="submit" class="btn btn-outline-success" value="valider" name="valider" ><i class="fas fa-check"></i></button>
</a>
	  </form>

    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
	  </table> 
 <h5  style="color: white; background-color: green; width: 200px;" align="center"> <?php echo('Total de commandes:'.$total)?></h5>
<form method="get" action="ajouterC.php" >
   <button align="center" style="background-color: #0c6071; width: 300px" class="btn btn-primary btn-block" type="submit" > <a>  Ajouter une autre commande  </a> </button>
</form>
</br>
  
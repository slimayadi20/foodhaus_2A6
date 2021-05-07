<?php
$link = mysqli_connect("localhost", "root", "", "test"); 
$idCommande=$_GET['idCommande'];
$nom=$_GET['nom'];
$email=$_GET['email'];
$adresse=$_GET['adresse'];
$codePostal=$_GET['codePostal'];
$pays=$_GET['pays'];
$ville=$_GET['ville'];
$nomCarte=$_GET['nomCarte'];
$numCarte=$_GET['numCarte'];
$moisExp=$_GET['moisExp'];
$anneeExp=$_GET['anneeExp'];
$cvv=$_GET['cvv'];

echo($idCommande);
if($link === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error());
} 
  
$sql = "UPDATE commande SET nom='$nom',email='$email',adresse='$adresse',codePostal='$codePostal',
                        pays='$pays',ville='$ville',nomCarte='$nomCarte',numCarte='$numCarte',moisExp='$moisExp',anneeExp='$anneeExp',cvv='$cvv' WHERE idCommande='$idCommande' "; 
if(mysqli_query($link, $sql)){ 
    header('location:gcb.php');
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
}  
mysqli_close($link); 
?> 
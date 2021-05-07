<?php
$link = mysqli_connect("localhost", "root", "", "test"); 
$idLivraison=$_GET['idLivraison'];
$idCommande=$_GET['idCommande'];
$nomLivreur=$_GET['nomLivreur'];
$date=$_GET['date'];
$etat=$_GET['etat'];


echo($idLivraison);
if($link === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error());
} 
  
$sql = "UPDATE livraisons SET idCommande='$idCommande',nomLivreur='$nomLivreur',date='$date',etat='$etat' WHERE idLivraison='$idLivraison'";
$sql2 ="DELETE FROM livraisons where etat='Livrée'";     
if(mysqli_query($link, $sql)){  
    mysqli_query($link, $sql2);
    header('location:gb.php');
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
}  

mysqli_close($link); 
?> 
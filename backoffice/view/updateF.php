<?php
$link = mysqli_connect("localhost", "root", "", "formation"); 
$id=$_GET['id'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$specialite=$_GET['specialite'];

echo($nomc);
if($link === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error());
} 
  
$sql = "UPDATE formateur SET id='$id',nom='$nom',prenom='$prenom',specialite='$specialite' WHERE id='$id' "; 
if(mysqli_query($link, $sql)){ 
    header('location:gb.php');
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
}  
mysqli_close($link); 
?> 
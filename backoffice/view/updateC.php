<?php
$link = mysqli_connect("localhost", "root", "", "formation"); 
$id=$_GET['id'];
$nomc=$_GET['nomc'];
$nomf=$_GET['nomf'];
$lieu=$_GET['lieu'];
$date=$_GET['date'];
$prix=$_GET['prix'];

echo($id);
if($link === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error());
} 
  
$sql = "UPDATE cours SET id='$id',nomc='$nomc',nomf='$nomf',lieu='$lieu',date='$date',prix='$prix' WHERE id='$id' "; 
if(mysqli_query($link, $sql)){ 
    header('location:gcb.php');
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
}  
mysqli_close($link); 
?> 
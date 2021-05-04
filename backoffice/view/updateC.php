<?php
$link = mysqli_connect("localhost", "root", "", "evenement"); 
$id=$_GET['id'];
$title=$_GET['title'];
$description=$_GET['description'];
$img=$_GET['img'];
$nbplaces=$_GET['nbplaces'];
$date=$_GET['date'];
$adress=$_GET['adress'];

echo($id);
if($link === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error());
} 
  
$sql = "UPDATE evenement SET title='$title',nbplaces='$nbplaces',date='$date',description='$description',img='$img',adress='$adress' WHERE id='$id' "; 
if(mysqli_query($link, $sql)){ 
    header('location:gcb.php');
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
}  
mysqli_close($link); 
?> 
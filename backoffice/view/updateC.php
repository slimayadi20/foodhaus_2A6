<?php
include "../controller/Chef_C.php";
include "../model/Chef.php";

$link = mysqli_connect("localhost", "root", "", "foodhaus"); 
$img_chef = $_GET['img_chef'];
$nom = $_GET['nom'];
$descriptions = $_GET['descriptions'];
$lien_video_chef = $_GET['lien_video_chef'];
$img_video_chef = $_GET['img_video_chef'];
$nom_plat1_chef = $_GET['nom_plat1_chef'];
$nom_plat2_chef = $_GET['nom_plat2_chef'];
$citation_chef = $_GET['citation_chef'];
$img_plat1_chef = $_GET['img_plat1_chef'];
$img_plat2_chef = $_GET['img_plat2_chef'];
$id_chef = $_GET['id_chef'];
echo($id_chef);
if($link === false){ 
    die("ERROR: Could not connect. "  
                . mysqli_connect_error());
} 
  
$sql = "UPDATE chefs SET img_chef='$img_chef',nom='$nom',descriptions='$descriptions',lien_video_chef='$lien_video_chef',
img_video_chef='$img_video_chef',nom_plat1_chef='$nom_plat1_chef',nom_plat2_chef='$nom_plat2_chef',citation_chef='$citation_chef',img_plat1_chef='$img_plat1_chef'
,img_plat2_chef='$img_plat2_chef' WHERE id_chef='$id_chef' "; 
if(mysqli_query($link, $sql)){ 
    header('location:gcb.php');
} else { 
    echo "ERROR: Could not able to execute $sql. "  
                            . mysqli_error($link); 
}  
mysqli_close($link); 
?> 
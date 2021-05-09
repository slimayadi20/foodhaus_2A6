<?php 
//include "../config.php";

include "../controller/Chef_C.php";
	include "../model/Chef.php";


    $sql = " SELECT * FROM chefs ORDER BY id_chef DESC";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }



?>
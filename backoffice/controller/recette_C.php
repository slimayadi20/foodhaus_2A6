<?PHP
include "config.php";//la connexion avec la bd
class recette_C
{
 
	function ajouterrecette($recette)
	{
		 $sql = "INSERT INTO recette (nom_recette,id_recette,img_recette,descprition_recette,temp_recette,type_recette) values (:nom_recette,:id_recette, :img_recette,:descprition_recette,:temp_recette,:type_recette) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment 
			$req->bindValue(':nom_recette' ,$recette->getnom_recette());
			$req->bindValue(':id_recette', $recette->getid_recette());
			$req->bindValue(':img_recette' ,$recette->getimg_recette());
			$req->bindValue(':descprition_recette' ,$recette->getdescprition_recette());
			$req->bindValue(':temp_recette' ,$recette->gettemp_recette());
			$req->bindValue(':type_recette' ,$recette->gettype_recette());
			
			$req->execute();
			
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}


	function afficherrecette()
	{
		$sql = " SELECT * FROM recette ORDER BY id_recette ASC";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimerecette($id_recette)
	{
		$sql = "DELETE FROM recette where id_recette= :id_recette";
		$db = config::getConnexion();
		$req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment
		$req->bindValue(':id_recette', $id_recette);// supprimer par le nom 
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function rechercherecette($key)
	{
		$sql = "SELECT * FROM recette WHERE id_recette LIKE '%$key%' ";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
}

<?PHP
include "config.php";//la connexion avec la bd
class categorieC
{
 
	function ajoutercategorie($categorie)
	{
		 $sql = "INSERT INTO categorie (id_categ,name) values (:id_categ, :name ) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment 
			$req->bindValue(':name', $categorie->getname());
			$req->bindValue(':id_categ', $categorie->getid());
			$req->execute();
			
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
	function rechercheCateg($key)
	{
		$sql = "SELECT * FROM categorie WHERE name LIKE '%$key%'  OR id_categ LIKE '%$key%'"; 
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function affichercategorie()
	{
		$sql = " SELECT * FROM categorie ORDER BY name ASC";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimercategorie($id)
	{
		$sql = "DELETE FROM categorie where id_categ= :id";
		$db = config::getConnexion();
		$req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment
		$req->bindValue(':id_categ', $id);// supprimer par le nom 
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}

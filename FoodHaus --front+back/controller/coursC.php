<?PHP
include "config.php";//la connexion avec la bd
class coursC
{
 
	function ajoutercours($cours)
	{
		 $sql = "INSERT INTO cours (id,nomc,imgpath,nomf,lieu,date,prix) values (:id,:nomc,:nomf,:imgpath,:lieu,:date,:prix) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment 
			$req->bindValue(':id', $cours->getid());
			$req->bindValue(':nomc', $cours->getnomc());
			$req->bindValue(':imgpath', $cours->getimgpath());
			$req->bindValue(':nomf', $cours->getnomf());
			$req->bindValue(':lieu', $cours->getlieu());
			$req->bindValue(':date', $cours->getdate());
			$req->bindValue(':prix', $cours->getprix());
			$req->execute();
			
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
	function recherchecours($key)
	{
		$sql = "SELECT * FROM cours WHERE nomc LIKE '%$key%'  OR nomf LIKE '%$key%' OR id LIKE '%$key%'";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function affichercours()
	{
		$sql = " SELECT * FROM cours ORDER BY id ASC";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimercours($id)
	{
		$sql = "DELETE  FROM cours where id= :id";
		$db = config::getConnexion();
		$req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment
		$req->bindValue(':id', $id);// supprimer par le nom 
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}

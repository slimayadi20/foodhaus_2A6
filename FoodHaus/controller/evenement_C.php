<?PHP
include "config.php";//la connexion avec la bd
class evenement_C
{
 
	function ajouterevenement($evenement)
	{
		 $sql = "INSERT INTO evenement (id,title,nbplaces,date,description,img,adress) values (:id, :title,:nbplaces,:date,:description,:img,:adress) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment 
			$req->bindValue(':id', $evenement->getid());
			$req->bindValue(':title' ,$evenement->gettitle());
			$req->bindValue(':nbplaces', $evenement->getnbplaces());
			$req->bindValue(':date', $evenement->getdate());
			$req->bindValue(':description' ,$evenement->getdescription());
			$req->bindValue(':img', $evenement->getimg());
			$req->bindValue(':adress', $evenement->getadress());

			$req->execute();
			
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}


	function afficherevenement()
	{
		$sql = " SELECT * FROM evenement ORDER BY id ASC";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimerevenement($id)
	{
		$sql = "DELETE FROM evenement where id= :id";
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
	public function recuperevenement($id){

		$sql = " SELECT * FROM evenement where id=:'$id'";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}



 
    }
	function rechercherevent($key)
	{
		$sql = "SELECT * FROM evenement WHERE title LIKE '%$key%'  OR nbplaces LIKE '%$key%' OR date LIKE '%$key%' OR description LIKE '%$key%' ";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}

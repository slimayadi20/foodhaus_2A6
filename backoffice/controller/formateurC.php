<?PHP
include "config.php";
class formateurC
{
 
	function ajouterformateur($formateur)
	{
		 $sql = "INSERT INTO formateur (id,nom,prenom,specialite) values (:id, :nom , :prenom, :specialite) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);
			$req->bindValue(':id', $formateur->getid());
			$req->bindValue(':nom', $formateur->getnom());
            $req->bindValue(':prenom', $formateur->getprenom());
			$req->bindValue(':specialite', $formateur->getspecialite());
            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
	function rechercheformateur($key)
	{
		$sql = "SELECT * FROM formateur WHERE nom LIKE '%$key%'  OR prenom LIKE '%$key%' OR id LIKE '%$key%'";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function afficherformateur()
	{
		$sql = " SELECT * FROM formateur ";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimerformateur($nom)
	{
		$sql = "DELETE FROM formateur where nom= :nom";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':name', $name);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}

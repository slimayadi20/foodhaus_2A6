<?PHP
include "config.php";//la connexion avec la bd
class commandeC
{
 
	function ajouterCommande($commande)
	{
		 $sql = "INSERT INTO commande (nom,email,adresse,codePostal,pays,ville,nomCarte,numCarte,moisExp,anneeExp,cvv)
		 VALUES (:nom,:email,:adresse,:codePostal,:pays,:ville,:nomCarte,:numCarte,:moisExp,:anneeExp,:cvv) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment 
			$req->bindValue(':nom', $commande->getnom());
			$req->bindValue(':email', $commande->getemail());
			$req->bindValue(':adresse', $commande->getadresse());
			$req->bindValue(':codePostal', $commande->getcodePostal());
			$req->bindValue(':pays', $commande->getpays());
			$req->bindValue(':ville', $commande->getville());
			$req->bindValue(':nomCarte', $commande->getnomCarte());
			$req->bindValue(':numCarte', $commande->getnumCarte());
			$req->bindValue(':moisExp', $commande->getmoisExp());
			$req->bindValue(':anneeExp', $commande->getanneeExp());
			$req->bindValue(':cvv', $commande->getcvv());


			$req->execute();
			
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
	function rechercheCommande($key)
	{
		$sql = "SELECT * FROM commande WHERE email LIKE '%$key%' ";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function afficherCommande()
	{
		$sql = " SELECT * FROM commande ORDER BY nom ASC";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimerCommande($idCommande)
	{
		$sql = "DELETE FROM commande where idCommande= :idCommande";
		$db = config::getConnexion();
		$req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment
		$req->bindValue(':idCommande', $idCommande);// supprimer par le nom 
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}

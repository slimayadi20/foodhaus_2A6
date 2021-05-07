<?PHP
include "config.php";
class livraisonC
{
 
	function ajouterlivraison($livraison)
	{
		 $sql = "INSERT INTO livraisons (idCommande,nomLivreur,date,etat) values (:idCommande, :nomLivreur , :date, :etat) ";
	$db = config::getConnexion();
	try{
		$query = $db->prepare($sql);
		
		$query->execute([
			'idCommande' => $livraison->getidCommande(),
			'nomLivreur' => $livraison->getnomLivreur(),
			'date' => $livraison->getdate(),
			'etat' => $livraison->getetat()
			
			]);			
	}catch (Exception $e){
		echo 'Erreur: '.$e->getMessage();
	}}
	function rechercheLivraison($key)
	{
		$sql = "SELECT * FROM livraisons WHERE idLivraison LIKE '%$key%' ";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function afficherLivraison()
	{
		$sql = " SELECT * FROM livraisons ";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimerLivraison($idLivraison)
	{
		$sql = "DELETE FROM livraisons where idLivraison= :idLivraison";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':idLivraison', $idLivraison);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}

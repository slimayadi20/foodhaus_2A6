<?PHP
include "config.php";
class panierC
{
	function ajouterPanier($panier)
	{
		 $sql = "INSERT INTO items (name,dir,price) values (:name, :dir , :price) ";
	$db = config::getConnexion();
	try{
		$query = $db->prepare($sql);
		
		$query->execute([
			'name' => $panier->getname(),
			'dir' => $panier->getdir(),
			'price' => $panier->getprice()
			
			]);			
	}catch (Exception $e){
		echo 'Erreur: '.$e->getMessage();
	}}
	
	function afficherPanier()
	{
		$sql = " SELECT * FROM items ";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function supprimerPanier($id)
	{
		$sql = "DELETE FROM items where id= :id";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id', $id);
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	
}

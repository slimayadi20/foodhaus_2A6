<?PHP
include "config.php";//la connexion avec la bd
class Chef_C
{
 
	function ajouterchef($chef)
	{
		 $sql = "INSERT INTO chefs (img_chef,nom,descriptions,lien_video_chef,img_video_chef,nom_plat1_chef,nom_plat2_chef,citation_chef,img_plat1_chef,img_plat2_chef,id_chef) values
		  (:img_chef, :nom,:descriptions,:lien_video_chef,:img_video_chef,:nom_plat1_chef ,:nom_plat2_chef,:citation_chef,:img_plat1_chef,:img_plat2_chef,:id_chef) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment 
			$req->bindValue(':img_chef', $chef->getimg_chef());
			$req->bindValue(':nom' ,$chef->getnom());
			$req->bindValue(':descriptions', $chef->getdescriptions());
			$req->bindValue(':lien_video_chef', $chef->getlien_video_chef());
			$req->bindValue(':img_video_chef' ,$chef->getimg_video_chef());
			$req->bindValue(':nom_plat1_chef', $chef->getnom_plat1_chef());
			$req->bindValue(':nom_plat2_chef', $chef->getnom_plat2_chef());
			$req->bindValue(':citation_chef', $chef->getcitation_chef());
			$req->bindValue(':img_plat1_chef', $chef->getimg_plat1_chef());
			$req->bindValue(':img_plat2_chef', $chef->getimg_plat2_chef());
			$req->bindValue(':id_chef', $chef->getid_chef());
			$req->execute();
			
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}


	function afficherchef()
	{
		$sql = " SELECT * FROM chefs ORDER BY id_chef ASC";
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
		$sql = "DELETE FROM chefs where id= :id_chef";
		$db = config::getConnexion();
		$req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment
		$req->bindValue(':id_chef', $id);// supprimer par le nom 
		try {
			$req->execute();
			// header('Location: index.php');
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	


	function recherchechef($key)
	{
		$sql = "SELECT * FROM chefs WHERE id_chef LIKE '%$key%' ";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

}
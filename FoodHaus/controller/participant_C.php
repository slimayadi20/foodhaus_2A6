<?PHP
include "config.php";//la connexion avec la bd
class participant_C
{
 
	function ajouterparticipant($participant)
	{
		 $sql = "INSERT INTO participant (id_participant,name,mail,id) values (:id_participant,:name,:mail,:id) ";
        $db = config::getConnexion(); 
        try {
            $req = $db->prepare($sql);//prepare la requete et renvoie le resultat en un objet pdostatment 
			$req->bindValue(':id_participant', $participant->getid());
			$req->bindValue(':name' ,$participant->getname());
			$req->bindValue(':mail', $participant->getmail());
			$req->bindValue(':id', $participant->getid_event());
			$req->execute();
			
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}


	function afficherparticipant()
	{
		$sql = " SELECT * FROM participant ORDER BY id_participant ASC";
        $db = config::getConnexion();
		try {
			$liste = $db->query($sql);//retourne le resultat en un objet PDOstatement
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}


	
}

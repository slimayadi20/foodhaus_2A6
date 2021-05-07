<?PHP
class livraison
{
    public $idLivraison;
    public $idCommande;
    public $nomLivreur;
    public $date;
    public $etat;
    
 	public function getidLivraison()
    {
        return $this->idLivraison;
    }
    function getidCommande()
    {
        return $this->idCommande;
    }
    function getnomLivreur()
    {
        return $this->nomLivreur;
    }
    function getdate()
    {
        return $this->date;
    }
    function getetat()
    {
        return $this->etat;
    }
   
  
    // setter 
     function setidLivraison($idLivraison)
    {
        return $this->idLivraison= $idLivraison;
    }
    function setidCommande($idCommande)
    {
        return $this->idCommande =$idCommande;
    }
    function setnomLivreur($nomLivreur)
    {
        return $this->nomLivreur= $nomLivreur;
    }
    function setdate($date)
    {
        return $this->date= $date;
    }
    function setettat($etat)
    {
        return $this->etat= $etat;
    }
    function __construct($idCommande,$nomLivreur,$date,$etat)
    {    
        $this->idCommande = $idCommande;
        $this->nomLivreur = $nomLivreur;
        $this->date = $date;
        $this->etat = $etat;
        
    }
    // getter 
   
 
}
  ?>

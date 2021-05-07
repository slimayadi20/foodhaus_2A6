<?PHP
class commande
{

    public $idCommande;
    public $nom;
    public $email;
    public $adresse;
    public $codePostal;
    public $pays;
    public $ville;
    public $nomCarte;
    public $numCarte;
    public $moisExp;
    public $anneeExp;
    public $cvv;
    
    function getid(){
        return $this->idCommande;
    }
 	public  function getnom(){
		return $this->nom;
    }
    function getemail(){
		return $this->email;
    }
    function getadresse(){
		return $this->adresse;
    }
    function getcodePostal(){
    return $this->codePostal;
    }
    function getpays(){
		return $this->pays;
    }
    function getville(){
		return $this->ville;
    }
    
    function getnomCarte(){
		return $this->nomCarte;
    }
    function getnumCarte(){
		return $this->numCarte;
    }
    function getmoisExp(){
		return $this->moisExp;
    }
    function getanneeExp(){
		return $this->anneeExp;
    }
    function getcvv(){
		return $this->cvv;
    }
   
  
    // setter 
     function setnom($nom)
    {
        return $this->nom= $nom;
    }
    function setemail($email)
    {
        return $this->email =$email;
    }
    function setadresse($adresse)
    {
        return $this->adresse= $adresse;
    }
    function setcodePostal($codePostal)
    {
        return $this->codePostal= $codePostal;
    }
    function setpays($pays)
    {
        return $this->pays= $pays;
    }
    function setville($ville)
    {
        return $this->ville= $ville;
    }
    function setnomCarte($nomCarte)
    {
        return $this->nomCarte= $nomCarte;
    }
    function setnumCarte($numCarte)
    {
        return $this->numCarte= $numCarte;
    }
    function __construct(string $nom,string $email,string $adresse,int $codePostal,string $pays,string $ville,
    string $nomCarte,int $numCarte,string $moisExp,int $anneeExp,int $cvv){

		
		$this->nom=$nom;
		$this->email=$email;
		$this->adresse=$adresse;
    $this->codePostal=$codePostal;
		$this->pays=$pays;
		$this->ville=$ville;
        $this->nomCarte=$nomCarte;
        $this->numCarte=$numCarte;
        $this->moisExp=$moisExp;
        $this->anneeExp=$anneeExp;
        $this->cvv=$cvv;
	}
    // getter 
   
 
}
  ?>

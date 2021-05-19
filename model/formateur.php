<?PHP
class formateur
{
    public $id;
    public $nom;
    public $prenom;
    public $specialite;
    
 	public function getid()
    {
        return $this->id;
    }
    function getnom()
    {
        return $this->nom;
    }
    function getprenom()
    {
        return $this->prenom;
    }
    function getspecialite()
    {
        return $this->specialite;
    }
   
  
    // setter 
     function setid($id)
    {
        return $this->id= $id;
    }
    function setnom($nom)
    {
        return $this->nom =$nom;
    }
    function setprenom($prenom)
    {
        return $this->prenom= $prenom;
    }
    function setspecialite($specialite)
    {
        return $this->specialite= $specialite;
    }
    function __construct($id,$nom,$prenom,$specialite)
    {   $this->id = $id; 
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->specialite = $specialite;
        
    }
    // getter 
   
 
}
  ?>

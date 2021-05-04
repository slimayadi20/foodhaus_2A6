<?PHP
class categorie
{
    public $name;
    public $id_categ;
    public $description;
    
 	public function getname()
    {
        return $this->name;
    }
    function getid()
    {
        return $this->id_categ;
    }
 
   
  
    // setter 
     function setname($name)
    {
        return $this->name= $name;
    }
    function setid($id_categ)
    {
        return $this->id_categ =$id_categ;
    }
    
    function __construct($id_categ,$name)
    {   $this->name = $name; 
        $this->id_categ = $id_categ;
  
        
    }
    // getter 
   
 
}
  ?>

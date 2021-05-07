<?PHP
class panier
{
    public $id;
    public $dir;
    public $name;
    public $price;
   
    
 	public function getid()
    {
        return $this->id;
    }
    function getname()
    {
        return $this->name;
    }
    function getprice()
    {
        return $this->price;
    }
    function getdir()
    {
        return $this->dir;
    }
  
    // setter 
     function setid($id)
    {
        return $this->id= $id;
    }
    function setname($name)
    {
        return $this->name= $name;
    }
    function setprice($price)
    {
        return $this->price= $price;
    }
    function setdir($dir)
    {
        return $this->dir= $dir;
    }
    function __construct($name,$price,$dir)
    {    
       
        $this->name = $name;
        $this->price = $price;
        $this->dir = $dir;
        
    }
    // getter 
   
 
}
  ?>

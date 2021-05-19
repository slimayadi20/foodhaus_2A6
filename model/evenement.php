<?PHP
class evenement
{
    public $id;
    public $title;
    public $nbplaces;
    public $date;
    public $description;
    public $img;
    public $adress;

    
 	public function getid()
    {
        return $this->id;
    }
    public function getadress()
    {
        return $this->adress;
    }
    function gettitle()
    {
        return $this->title;
    }
    function getnbplaces()
    {
        return $this->nbplaces;
    }
    function getdate()
    {
        return $this->date;
    }
    function getdescription()
    {
        return $this->description;
    }
    function getimg()
    {
        return $this->img;
    }
  
    // setter 
     function setid($id)
    {
        return $this->id= $id;
    }
    function settitle($title)
    {
        return $this->title =$title;
    }
    function setnbplaces($nbplaces)
    {
        return $this->nbplaces= $nbplaces;
    }
    function setdate($date)
    {
        return $this->date= $date;
    }
    function setdescription($description)
    {
        return $this->description =$description;
    }
    function setimg($img)
    {
        return $this->img= $img;
    }
    function setadress($adress)
    {
        return $this->adress= $adress;
    }
    function __construct($id,$title,$nbplaces,$date,$description,$img,$adress)
    {   $this->id = $id; 
        $this->title = $title;
        $this->nbplaces = $nbplaces;
        $this->date = $date; 
        $this->description = $description;
        $this->img = $img;
        $this->adress = $adress;

    }
    // getter 
   
 
}
  ?>

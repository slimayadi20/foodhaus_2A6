<?PHP
class participant
{
    private $id_participant ;
    private $name ;
    private $mail ;
    private $id;
    
 	public function getid()
    {
        return $this->id_participant;
    }
    function getname()
    {
        return $this->name;
    }
    function getmail()
    {
        return $this->mail;
    }
    function getid_event()
    {
        return $this->id;
    }

  
    // setter 
     function setid($id_participant)
    {
        return $this->id_participant= $id_participant;
    }
    function setname($name)
    {
        return $this->name =$name;
    }
    function setmail($mail)
    {
        return $this->mail= $mail;
    }
    function setid_event($id)
    {
        return $this->id= $id;
    }
 
  
    function __construct($id_participant,$name,$mail,$id)
    {   $this->id_participant = $id_participant; 
        $this->name = $name;
        $this->mail = $mail;
        $this->id=$id; 
    }
    // getter 
   
 
}
  ?>

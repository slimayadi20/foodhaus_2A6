<?PHP
class cours
{
    public $id;
    public $nomc;
    public $imgpath;
    public $nomf;
    public $lieu;
    public $date;
    public $prix;
    
    public function getid()
    {
        return $this->id;
    }
 	public function getnomc()
    {
        return $this->nomc;
    }
    public function getimgpath()
    {
        return $this->imgpath;
    }
    function getnomf()
    {
        return $this->nomf;
    }
    function getlieu()
    {
        return $this->lieu;
    }
    function getdate()
    {
        return $this->date;
    }
    function getprix()
    {
        return $this->prix;
    }
   
  
    // setter 
    function setid($id)
    {
        return $this->id= $id;
    }
     function setnomc($nomc)
    {
        return $this->nomc= $nomc;
    }
    function setimgpath($imgpath)
    {
        return $this->imgpath= $imgpath;
    }
    function setnomf($nomf)
    {
        return $this->nomf =$nomf;
    }
 
    function setlieu($lieu)
    {
        return $this->lieu= $lieu;
    }  
    function setdate($date)
    {
        return $this->date= $date;
    }
    function setprix($prix)
    {
        return $this->prix= $prix;
    }
    function __construct($id,$nomc,$imgpath,$nomf,$lieu,$date,$prix)
    {   $this->id = $id; 
        $this->nomc = $nomc; 
        $this->imgpath = $imgpath;
        $this->nomf = $nomf;
        $this->lieu = $lieu;
        $this->date = $date;
        $this->prix = $prix;
        
    }
    // getter 
   
 
}
  ?>

<?PHP
class recette
{
    public $id_recette ;
    public $nom_recette ;
    public $img_recette ;
    public $descprition_recette ;
    public $temp_recette ;
    public $type_recette ;

    
    
 	
    function getnom_recette()
    {
        return $this->nom_recette;
    }
    public function getid_recette()
    {
        return $this->id_recette;
    }
    function getimg_recette()
    {
        return $this->img_recette;
    }
    function getdescprition_recette()
    {
        return $this->descprition_recette;
    }
    function gettemp_recette()
    {
        return $this->temp_recette;
    }
    function gettype_recette()
    {
        return $this->type_recette;
    }
    

  
    // setter 
    
    function setnom_recette($nom_recette)
    {
        return $this->nom_recette =$nom_recette;
    }
    function setid_recette($id_recette)
    {
        return $this->id_recette= $id_recette;
    }
    
    function setimg_recette($img_recette)
    {
        return $this->img_recette =$img_recette;
    }
    function setdescprition_recette($descprition_recette)
    {
        return $this->descprition_recette =$descprition_recette;
    }
    function settemp_recette($temp_recette)
    {
        return $this->temp_recette =$temp_recette;
    }
    function settype_recette($type_recette)
    {
        return $this->type_recette =$type_recette;
    }
   
    
 
  
    function __construct($nom_recette,$id_recette,$img_recette,$descprition_recette,$temp_recette,$type_recette)
    {   
        $this->nom_recette = $nom_recette;
        $this->id_recette = $id_recette; 
        $this->img_recette = $img_recette;
        $this->descprition_recette = $descprition_recette;
        $this->temp_recette = $temp_recette;
        $this->type_recette = $type_recette;
        
    }
    // getter 
   
 
}
  ?>

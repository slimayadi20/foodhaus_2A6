<?PHP
class Chef
{
    public $img_chef;
    public $nom;
    public $descriptions;
    public $lien_video_chef;
    public $img_video_chef;
    public $nom_plat1_chef;
    public $nom_plat2_chef;
    public $citation_chef;
    public $img_plat1_chef;
    public $img_plat2_chef;
    public $id_chef;
    
 	public function getimg_chef()
    {
        return $this->img_chef;
    }
    function getnom()
    {
        return $this->nom;
    }
    function getdescriptions()
    {
        return $this->descriptions;
    }
    function getlien_video_chef()
    {
        return $this->lien_video_chef;
    }
    function getimg_video_chef()
    {
        return $this->img_video_chef;
    }
    function getnom_plat1_chef()
    {
        return $this->nom_plat1_chef;
    }
    function getnom_plat2_chef()
    {
        return $this->nom_plat2_chef;
    }
    function getcitation_chef()
    {
        return $this->citation_chef;
    }
    function getimg_plat1_chef()
    {
        return $this->img_plat1_chef;
    }
    function getimg_plat2_chef()
    {
        return $this->img_plat2_chef;
    }
    function getid_chef()
    {
        return $this->id_chef;
    }
  
    // setter 
    function setimg_chef($img_chef)
    {
        return $this->img_chef=$img_chef;
    }
    function setnom($nom)
    {
        return $this->nom=$nom;
    }
    function setdescriptions($descriptions)
    {
        return $this->descriptions=$descriptions;
    }
    function setlien_video_chef($lien_video_chef)
    {
        return $this->lien_video_chef=$lien_video_chef;
    }
    function setimg_video_chef($img_video_chef)
    {
        return $this->img_video_chef=$img_video_chef;
    }
    function setnom_plat1_chef($nom_plat1_chef)
    {
        return $this->nom_plat1_chef=$nom_plat1_chef;
    }
    function setnom_plat2_chef($nom_plat2_chef)
    {
        return $this->nom_plat2_chef=$nom_plat2_chef;
    }
    function setcitation_chef($citation_chef)
    {
        return $this->citation_chef=$citation_chef;
    }
    function setimg_plat1_chef($img_plat1_chef)
    {
        return $this->img_plat1_chef=$img_plat1_chef;
    }
    function setimg_plat2_chef($img_plat2_chef)
    {
        return $this->img_plat2_chef=$img_plat2_chef;
    }
    function setid_chef($id_chef)
    {
        return $this->id_chef=$id_chef;
    }
    function __construct($img_chef,$nom,$descriptions,$lien_video_chef,$img_video_chef,$nom_plat1_chef,$nom_plat2_chef,$citation_chef,$img_plat1_chef,$img_plat2_chef,$id_chef)
    {   $this->img_chef=$img_chef;
        $this->nom=$nom;
        $this->descriptions=$descriptions;
        $this->lien_video_chef=$lien_video_chef; 
        $this->img_video_chef=$img_video_chef;
        $this->nom_plat1_chef=$nom_plat1_chef;
        $this->nom_plat2_chef=$nom_plat2_chef;
        $this->citation_chef=$citation_chef;
        $this->img_plat1_chef=$img_plat1_chef;
        $this->img_plat2_chef=$img_plat2_chef;
        $this->id_chef=$id_chef;
    }
    // getter 
   
 
}
  ?>

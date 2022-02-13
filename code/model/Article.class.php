<?php 
class Article{

    private $imageArticle;
    private $nomArticle;
    private $descriptionArticle;
    private $datePublication;
    private $idArticle;
    private $idUser;

    function __construct($imageArticle, $nomArticle, $descriptionArticle, $datePublication, $idArticle, $idUser)
    {
       $this-> imageArticle = $imageArticle;
       $this-> nomArticle = $nomArticle;
       $this-> descriptionArticle = $descriptionArticle;
       $this-> datePublication = $datePublication;
       $this-> idArticle = $idArticle;
       $this->idUser = $idUser;

    }
    
	public function getImageArticle() {
        
		return htmlspecialchars($this->imageArticle);
	}

    public function setImageArticle($imageArticle): self
    {
        $this->imageArticle = $imageArticle;

        return $this;
    }

    public function getNomArticle(){
        return htmlspecialchars($this-> nomArticle);
    }

    public function setNomArticle($nomArticle): self{

        $this->nomArticle = $nomArticle;

        return $this; 
    }

    public function getDescriptionArticle(){
        return htmlspecialchars($this-> descriptionArticle);
    }

    public function setDescriptionArticle($descriptionArticle): self{
        $this->descriptionArticle = $descriptionArticle;

        return $this; 
    }

    public function getDatePublication(){
        return htmlspecialchars($this->datePublication);
    }

    public function setDatePublication($datePublication): self{
        $this->datePublication = $datePublication;

        return $this; 
    }

    public function getIdArticle(){
      return htmlspecialchars($this->idArticle);
    }

    public function getIdUtil(){
        return htmlspecialchars($this->idUser);
    }
}
?>
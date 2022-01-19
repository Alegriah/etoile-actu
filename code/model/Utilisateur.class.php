<?php 

class Utilisateur{

    private $pseudo;
    private $mdp;
    private $email;
    private $imageProfil;
    private $idUtil;

    function __construct($pseudo, $mdp, $email, $imageProfil,$idUtil)
    {
       $this-> pseudo = $pseudo;
       $this-> mdp = $mdp;
       $this-> email = $email;
       $this-> imageProfil = $imageProfil;
       $this-> id_util = $idUtil;
    }
    
	public function getPseudo() {
        
		return $this->pseudo;
	}

    public function setPseudo($pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMdp(){
        return $this->mdp;
    }

    public function setMdp($mdp): self {
        $this->mdp = $mdp;
        return $this;
    }

    public function getEmail(){
        return $this -> email;

    }

    public function setEmail($email): self{
        $this->email=$email;
        return $this;
    }

    public function getImage(){
        return $this->imageProfil;
    }

    public function setImage($imageProfil): self {
        $this->imageProfil=$imageProfil;
        return $this;
    }

    public function getIdUtil(){
        return $this->IdUtil;
    }

    
}

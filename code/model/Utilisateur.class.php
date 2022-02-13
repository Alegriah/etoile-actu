<?php 

class Utilisateur{

    private $pseudo;
    private $mdp;
    private $email;
    private $imageProfil;
    private $idUser;
    private $idRole;

    function __construct($idUser, $pseudo, $mdp, $email, $imageProfil, $idRole)
    {
        $this-> idUser = $idUser;
       $this-> pseudo = $pseudo;
       $this-> mdp = $mdp;
       $this-> email = $email;
       $this-> imageProfil = $imageProfil;
       $this-> idRole = $idRole;
    }
    
	public function getPseudo() {
        
		return htmlspecialchars($this->pseudo);
	}

    public function setPseudo($pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    public function getIdRole(){
        return htmlspecialchars($this->idRole);
    }

    public function setIdRole($idRole): self{
        $this->idRole = $idRole;
        return $this;
    }

    public function getMdp(){
        return htmlspecialchars($this->mdp);
    }

    public function setMdp($mdp): self {
        $this->mdp = $mdp;
        return $this;
    }

    public function getEmail(){
        return htmlspecialchars($this->email);
    }

    public function setEmail($email): self{
        $this->email=$email;
        return $this;
    }

    public function getImage(){
        return htmlspecialchars($this->imageProfil);
    }

    public function setImage($imageProfil): self {
        $this->imageProfil=$imageProfil;
        return $this;
    }

    public function getIdUtil(){
        return htmlspecialchars($this->IdUtil);
    }

    
}

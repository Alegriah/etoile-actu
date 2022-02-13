<?php 

include "model/Utilisateur.class.php";
include ("./model/UtilisateurManager.class.php");

class UtilisateurController{

    private $utilisateurManager;


    function __construct(){
        $this -> utilisateurManager = new UtilisateurManager;   
    }

    public function profil(){
        require './view/profil.view.php';
        $this -> utilisateurManager ->FindImage();
    }

    public function connect(){
        require './view/connexion.view.php';
    }

    public function deconnexion(){
        session_destroy ();
        header("Location: ".URL. 'accueil');
    }
       
    public function sessionUser($user){
        $_SESSION['user'] = $user;
    }

    public function connexion(){
        if(empty($_POST['pseudo']) || empty($_POST['mdp'])){
            throw new Exception("Renseignez tous les champs");   
        }
        $user = $this->utilisateurManager->findUserByPseudoDB($_POST['pseudo']);
        if(!empty($user)){
            if($_POST['pseudo'] == $user->getPseudo() && password_verify($_POST['mdp'],$user->getMdp())){
                $this->sessionUser($user);
                header("Location: ".URL."accueil");
            }else{
                 header("Location: ".URL."etoile/connexion");
            }
        }
    }

    public function inscription(){
        require './view/inscription.view.php';
    }

    public function register(){
        if(empty($_POST['pseudo']) || empty($_POST['mdp'])){
            throw new Exception("Merci de renseigner tout les champs");   
        }
        if(!empty($_POST['mdp']) && !empty($_POST['email']) && !empty($_POST['pseudo'])){
            $userExist = $this->utilisateurManager->findUserByPseudoDB($_POST['pseudo']);
            if(!$userExist){
                $hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                $this->utilisateurManager->insertUserDB($_POST['pseudo'],$hash, $_POST['email'], "avatar.jpg", 2);
            }else{
                throw new Exception("L'utilisateur existe déjà.");
            }
        }
       header("Location: ".URL. 'etoile/connexion');
    }
        
 

    public function modifyUser(){
        require "view/modifierProfil.view.php";
    }

    function modifyUserValidate(){
            $currentImage = $this->utilisateurManager->findUserByIdDB($_SESSION['user'])->getImage();
            $file = $_FILES['photo'];
            if ($file['size'] > 0) {
                $dir = "public/image/";
                $imageToAdd = GlobalController::addImage($_SESSION['user']->getPseudo(), $file, $dir);
            } else {
                $imageToAdd = $currentImage;
            }if(!empty($_POST['mdp'])){
            $hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $this->utilisateurManager->modifUserDB($_SESSION['user']->getIdUtil(), $_POST['pseudo'], $hash, $_POST['email'], $imageToAdd);
            header("Location: " . URL . "etoile/profil");
            }else{
                $this->utilisateurManager->modifUserNoMdp($_SESSION['user']->getIdUtil(), $_POST['pseudo'], $_POST['email'], $imageToAdd);

            }
    }

}
?>
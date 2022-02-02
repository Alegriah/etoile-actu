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

    public function connexion(){  
        $this -> utilisateurManager -> getUser();
    }

    public function deconnexion(){
        session_start ();
        session_unset ();
        session_destroy ();
        header("Location: ".URL. 'accueil');
    }

    public function inscription(){
        require './view/inscription.view.php';
    }

    public function register(){
        if(empty($_POST['pseudo']) || empty($_POST['mdp'])){
            throw new Exception("Merci de renseigner tout les champs");   
        }
        if(!empty($_POST['mdp'])){
            $userExist = $this->utilisateurManager->FindUserByPseudoDB($_POST['pseudo']);
            if(!$userExist){
                $hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                $this->utilisateurManager->insertUserDB($_POST['pseudo'],$hash, $_POST['email']);
            }else{
                throw new Exception("L'utilisateur existe déjà.");
            }
        }else{
            throw new Exception("Les deux mots de passes ne sont pas identiques.");
        }
        $user = new Utilisateur($this->utilisateurManager->lastId(),$_POST['pseudo'],$hash,$_POST['email'],2);
        $this->sessionUser($user);
        GlobalController::alert("success", "Compte crée avec succès");
        header("Location: ".URL. 'etoile/connexion');
    }
        
    
    public function sessionUser($user){
        $_SESSION['user'] = $user;
    }

    public function modifyUser(){
        require "view/modifierProfil.view.php";
    }

    function modifyUserValidate(){
            $currentImage = $this->utilisateurManager->findUserByIdDB($_SESSION['id_user'])->getImage();
            $file = $_FILES['photo'];
            if ($file['size'] > 0) {
                $dir = "public/image/";
                $imageToAdd = GlobalController::addImage($_SESSION['pseudo'], $file, $dir);
            } else {
                $imageToAdd = $currentImage;
            }
            $hash = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $this->utilisateurManager->modifUserDB($_SESSION['id_user'], $_POST['pseudo'], $hash, $_POST['email'], $imageToAdd);
            $_SESSION['pseudo'] =  $_POST['pseudo'];
            $_SESSION['email'] =  $_POST['email'];
            $_SESSION['image'] = $currentImage;
            $_SESSION['mdp'] = $_POST['mdp'];
            header("Location: " . URL . "etoile/profil");
    }

}
?>
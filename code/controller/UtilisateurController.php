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

        function modifyBookValidate()
    {
        
            $currentImage = $this->utilisateurManager->FindUserByIdDB($_POST['id'])->getImage();
            $file = $_FILES['image'];
            if ($file['size'] > 0) {
                $dir = "public/images/";
                $imageToAdd = GlobalController::addImage($_POST['title'], $file, $dir);
                unlink("public/images/$currentImage");
            } else {
                $imageToAdd = $currentImage;
                // if ($this->bookManager->getBookById($_POST['id'])->getTitle() !== $_POST['title']) {
                //     $extension = strtolower(pathinfo($imageToAdd, PATHINFO_EXTENSION));
                //     $random = rand(0, 99999);
                //     $imageToAdd = str_replace(" ", "_", $random . "_" . $_POST['title'] . "." . $extension);
                //     rename("public/images/" . $currentImage, "public/images/" . $imageToAdd);
                // }
            }
            $this->utilisateurManager->modifyUser($_POST['id'], $_POST['pseudo'], $_POST['email'],$_POST['mdp'], $imageToAdd);
            GlobalController::alert("success","Modification Réalisée");
            header("Location: " . URL . "livres");
    }
    
    

    
}
?>
<?php 
include 'Model.class.php';

    class UtilisateurManager extends Model{

 /**
     * FindUserById
     *
     * @param  mixed $id
     * @return user by id
     */
    public function FindUserByIdDB($id){
        $sql = "SELECT * FROM utilisateur WHERE id_util = :id_util";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            "id_util"=>$id
        ]);
        $data = $req->fetch(PDO::FETCH_OBJ);

        $user = new Utilisateur($data->id_util,$data->pseudo,$data->mdp, $data->email,$data->id_role);
        // var_dump($user);
     

        return $user;
    }

  
    public function FindUserByPseudoDB($pseudo){
        $sql = "SELECT * FROM utilisateur WHERE pseudo = :pseudo";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":pseudo"=>$pseudo
        ]);
        $data = $req->fetch(PDO::FETCH_OBJ);
        if (!empty($data)){
            $users = new Utilisateur($data->id_util,$data->pseudo,$data->mdp,$data->email,$data->id_role);
            return $users;
        }
        else{
            return null;
        }
    }


    public function insertUserDB($pseudo,$password, $email){
        $sql = ("INSERT INTO utilisateur(pseudo,mdp,email) VALUES(:pseudo, :pass, :email)");
        $req = $this -> getDB() -> prepare($sql);
        $result = $req->execute([
        ":pseudo" => $pseudo,
        ":pass" =>$password, 
        ":email" => $email,

        ]);
        return $result;
    }
    public function lastId(){
        $lastId = $this->getDB()->lastInsertId();
        return $lastId;
    } 


    public function getUser(){
        $sql = "SELECT * FROM  utilisateur";
        $req =  $this -> getDB() -> prepare($sql);
        $result = $req -> execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        $util = $this->FindUserByPseudoDB($_POST['pseudo']);
        session_start();
        if(isset($_POST['connexion'])){
            if(empty($_POST['pseudo'])){
                echo 'Veuillez renseigner un pseudo';
            }elseif(empty(['mdp'])){
                echo "Veuillez renseigner un mot de passe";
            }if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
                foreach($data as $valeur){
                    if($_POST['pseudo'] == $valeur -> pseudo && $_POST['mdp '] == password_verify($_POST['mdp'],$util->getMdp())){
                        $_SESSION['pseudo'] = $valeur ->pseudo;
                        $_SESSION['id_user'] = $valeur -> id_util;
                        $_SESSION['id_role'] = $valeur -> id_role;
                        $_SESSION['email'] = $valeur-> email;
                        $_SESSION['image'] = $valeur -> image_profil;
                       header("Location: " . URL . "accueil");
               }else{
                header("Location: " . URL . "etoile/connexion");
    
            }
           
            }
        }

        }   
    }

    public function modifUserDB($id, $pseudo, $mdp, $email, $image){
        $sql = "UPDATE utilisateur set pseudo = :pseudo, mdp = :mdp, email = :email, image_profil = :image WHERE id_util = :id";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":pseudo"=>$pseudo,
            ":mdp"=>$mdp,
            ":email"=>$email,
            ":image"=>$image,
            ":id"=>$id
        ]);
        if($result){
            $this-> FindUserByIdDB($id)->setPseudo($pseudo);
            $this->  FindUserByIdDB($id)->setMdp($mdp);
            $this-> FindUserByIdDB($id)->setEmail($email);
            $this-> FindUserByIdDB($id)->setImage($image);
    }
    }
}

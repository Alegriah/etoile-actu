<?php 
include 'Model.class.php';

    class UtilisateurManager extends Model{

 /**
     * findUserById
     *
     * @param  mixed $id
     * @return user by id
     */
    public function findUserByIdDB($id){
        $sql = "SELECT * FROM utilisateur WHERE id_util=:id_util";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            "id_util"=>$id
        ]);
        $data = $req->fetch(PDO::FETCH_OBJ);
        if (!empty($data)) {
            $user = new Utilisateur($data->id_util,$data->pseudo,$data->mdp, $data->image_profil, $data->email,$data->id_role);
            return $user;
        } else {
            return null;
        }
    }

    public function findUserByPseudoDB($pseudo){
        $sql = "SELECT * FROM utilisateur WHERE pseudo=:pseudo";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":pseudo"=>$pseudo
        ]);
        $data = $req->fetch(PDO::FETCH_OBJ);
        if (!empty($data)){
            $users = new Utilisateur($data->id_util,$data->pseudo,$data->mdp, $data->image_profil, $data->email,$data->id_role);
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

    public function getAllUser(){
        $sql = "SELECT * FROM  utilisateur";
        $req =  $this -> getDB() -> prepare($sql);
        $result = $req -> execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);

    }

    public function getUser(){
        $sql = "SELECT * FROM  utilisateur";
        $req =  $this -> getDB() -> prepare($sql);
        $result = $req -> execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $util = $this->FindUserByPseudoDB($_POST['pseudo']);
        if(isset($_POST['connexion'])){
                if(empty($_POST['pseudo'])){
                    echo 'Veuillez renseigner un pseudo';
                }elseif(empty(['mdp'])){
                    echo "Veuillez renseigner un mot de passe";
                }if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
                    foreach($data as $value){
                        if($_POST['pseudo'] == $value -> pseudo && $_POST['mdp'] == password_verify($_POST['mdp'],$value -> mdp)){
                            $_SESSION['pseudo'] = $value ->pseudo;
                            $_SESSION['id_user'] = $value -> id_util;
                            $_SESSION['id_role'] = $value -> id_role;
                            $_SESSION['email'] = $value-> email;
                            $_SESSION['image'] = $value -> image_profil;
                            $_SESSION['mdp']= $_POST['mdp'];
                            header("Location: " . URL . "accueil");
                        }else{
                            header("Location: " . URL . "etoile/connexion");

                        }

                    }
                }

        }
    }

        public function modifUserDB($id, $pseudo, $mdp, $email, $image){
        $sql = "UPDATE utilisateur set pseudo=:pseudo, mdp=:mdp, email=:email, image_profil=:image WHERE id_util=:id";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":pseudo"=>$pseudo,
            ":mdp"=>$mdp,
            ":email"=>$email,
            ":image"=>$image,
            ":id"=>$id
        ]);
    }
}

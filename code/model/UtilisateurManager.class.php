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
            ":id_util"=>$id
        ]);
        $data = $req->fetch(PDO::FETCH_OBJ);
        if (!empty($data)) {
            $user = new Utilisateur($data->id_util,$data->pseudo,$data->mdp, $data->email, $data->image_profil, $data->id_role);
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
            $user = new Utilisateur($data->id_util,$data->pseudo,$data->mdp, $data->email, $data->image_profil,$data->id_role);
            return $user;
        }
        else{
            return null;
        }
    }


    public function insertUserDB($pseudo,$password, $email, $image){
        $sql = ("INSERT INTO utilisateur(pseudo,mdp,email, image_profil) VALUES(:pseudo, :pass, :email, :image)");
        $req = $this -> getDB() -> prepare($sql);
        $result = $req->execute([
            ":pseudo" => $pseudo,
            ":pass" =>$password, 
            ":email" => $email,
            ":image"=> $image,
        ]);
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

    public function modifUserNoMdp($id, $pseudo, $email, $image){
        $sql = "UPDATE utilisateur set pseudo=:pseudo, email=:email, image_profil=:image WHERE id_util=:id";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":pseudo"=>$pseudo,
            ":email"=>$email,
            ":image"=>$image,
            ":id"=>$id
        ]);
    }
}

<?php
include_once 'Model.class.php';
class ArticleManager extends Model{

    private $articleList;

    public function addArticle($newArticles){
        $this -> articleList[] = $newArticles;
    }

    public function getArticleList(){
        return $this -> articleList;
    }

    function loadingArticle(){  
        $sql = "SELECT * FROM  article";
        $req =  $this -> getDB() -> prepare($sql);
        $result = $req -> execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);    
        $utilisateurManager = new UtilisateurManager;
        foreach($data as $article){
            $add = new Article($article->image_article, $article ->  nom_article, $article -> description_article, $article-> date_publication, $article->id_article,$utilisateurManager->FindUserByIdDB($article->id_util));
            $this->addArticle($add);
        }       
    }

    function getArticleById($id){
        foreach($this -> articleList as $article ){
            if($id == $article -> getIdArticle() ){
                return $article;
            }
        }
    }

    function addArticleDB($title, $description, $image, $date, $id_util){
        $sql = "INSERT INTO article(image_article, nom_article,description_article, date_publication, id_util) VALUES(:image, :nom, :description, :date, :id)";
        $req =  $this -> getDB() -> prepare($sql);
        $result = $req->execute([
            ":image"=>$image,
            ":nom"=>$title,
            ":description"=>$description,
            ":date" => $date,
            "id" => $id_util
        ]);
        $req->closeCursor(); 
        if($result){
            $article = new Article($this-> getDB() -> lastInsertID(), $title, $description, $image,$date,$id_util);
            $this -> addArticle($article);
        }
    }

    public function getArticleByName($name){
        foreach($this->articleList as $article){
            if($article->getNomArticle() == $name){
                return $article;
            }
        }
    }     

        // Cette méthode devrait retourner un boolean selon si l'article a été supprimé ou non
    public function deleteArticleById($id){
        $sql = "DELETE FROM article WHERE id_article = :id_article";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":id_article"=>$id
        ]);
        if($result){
            $articleToDelete = $this->getArticleById($id);
            unset($articleToDelete);
        }
        return "delete complete"; 
    }
}
?>
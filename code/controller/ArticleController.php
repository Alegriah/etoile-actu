<?php 

include ("./model/Article.class.php");
include_once ("./model/ArticleManager.class.php");
include_once("GlobalController.php");

class ArticleController{

    private $articleManager;
    
    function __construct(){
        $this -> articleManager = new ArticleManager;  // dans l'idéal il faudrait utiliser l'injection de dépendances pour éviter d'instancier un objet (mais c'est un peu plus avancé)
        $this -> articleManager->loadingArticle();
    }

    public function displayArticle(){
        $newArticle  = $this->articleManager->getArticleList(); 
        require './view/display.view.php';
    }
    public function displayArticles($id){
        $article = $this->articleManager->getArticleById($id);
        require './view/thisarticle.view.php';
    }
    public function addArticle(){
        require './view/addarticle.view.php';
    }
    public function addArticleValidate(){
        require "view/validate.view.php";
        $file = $_FILES['image'];
        $dir = "public/image/"; 
        $date =  date('Y-m-d');
        $userId = $_SESSION['id_user']; 
        $image = GlobalController::addImage($_POST['titre'], $file, $dir); 
        if (!empty($image)){  
            $this->articleManager->addArticleDB($_POST['titre'], $_POST["description"], $image, $date, $userId);
            header("Location: " . URL . "etoile/article");
        }
    }

    public function deleteArticle($id){
        try {
            $response = $this->articleManager->deleteArticleById($id);
            if (empty($response)) { 
                throw new Exception("L'article n'existe pas");
            }
            header("Location: " . URL . "etoile/article");
        }catch (Exception $e) {
            GlobalController::alert("danger", $e->getMessage());
        }
    }
}
?>
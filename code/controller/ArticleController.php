<?php 

include ("./model/Article.class.php");
include_once ("./model/ArticleManager.class.php");
include_once("GlobalController.php");

class ArticleController{

    private $articleManager;

    function __construct(){
        $this -> articleManager = new ArticleManager;   
        $this -> articleManager -> loadingArticle();
     
    }


    public function displayArticle(){
        $newArticle  = $this -> articleManager -> getArticleList();
        require './view/display.view.php';
    }

    public function displayArticles($id){

        $article = $this -> articleManager ->  getArticleById($id);
        require './view/thisarticle.view.php';


    }

    function addArticle(){
        require './view/addarticle.view.php';

    }
    function addArticleValidate(){
        
        require "view/validate.view.php";
        $file = $_FILES['image'];
        $dir = "public/image/";
        $date =  date('Y-m-d');
       
            $id_util = $_SESSION['id_user'];
            $image = GlobalController::addImage($_POST['titre'], $file, $dir);
            if (!empty($image)) {
                $this->articleManager->addArticleDB($_POST['titre'], $_POST["description"], $image, $date, $id_util);
                header("Location: " . URL . "etoile/article");

            }
        }

        

    

    public function deleteArticle($id)
    {
    
             
        try {
            $response = $this->articleManager->deleteArticleById($id);
            header("Location: " . URL . "etoile/article");

            if (empty($response)) {
                throw new Exception("L'article n'existe pas");
            }
            GlobalController::alert("success", "Article supprimé avec succès");
        } catch (Exception $e) {
            GlobalController::alert("danger", $e->getMessage());
        }

    }
    }


?>
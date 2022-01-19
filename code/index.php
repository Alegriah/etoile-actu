<?php 

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "
https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

include_once 'controller/UtilisateurController.php';
include_once 'controller/ArticleController.php';

$user = new UtilisateurController;
$controller = new ArticleController;
try{
    if(empty($_GET['page'])){

        require 'view/accueil.view.php';
    }else{
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    
        switch($url[0]){
    
            case 'accueil';
            require 'view/accueil.view.php';
            break;
            case 'etoile';
                if(empty($url[1])){

                }else if($url[1] == "article"){
                   $controller -> displayArticle();
                }else if($url[1] == "afficher"){
                    $controller-> displayArticles($url[2]);
                }else if($url[1] == "galerie"){                
                }else if($url[1] == "jeux"){
                }else if($url[1] == "inscription"){
                    $user -> inscription();
                }else if($url[1] == "validation_inscription"){
                    $user -> register();
                }else if($url[1] == "connexion"){
                   $user -> connect();
                }else if($url[1] == "validation_connexion"){
                    $user -> connexion();
                }else if($url[1] == "evenement"){
                }else if($url[1] == "validate"){
                    $controller -> addArticleValidate();
                }else if($url[1] == "ajouter"){
                    $controller-> addArticle();
                }else if($url[1] == "deconnexion"){
                    $user -> deconnexion();
                }else if($url[1] == "profil"){
                    require 'view/profil.view.php';
                }else if($url[1] == "suppression"){
                    $controller -> deleteArticle($url[2]);
                }else if($url[1] == "modifier_profil"){
                    require "view/modifierProfil.view.php";
                }

                    else{
                    throw new exception("page inexistante");
                }
            break;
         
           
            defaut: throw new exception("page inexistante");
        }
    }
}catch(Exception $e){

    $error = $e->getMessage();
    require "view/error.view.php";
}

?>


<?php session_start(); 
ob_start();

$titre = "Ajouter un article";
$content = ob_get_clean();
require_once "template.php";
?>


<div class="main ">


    <div class="title-news">
        <h2 class="connexion title-float">
            <?=$titre?>
        </h2>
    </div>
    <h2 class="responsive-title "><?=$titre?></h2>
    <div class="d-flex justify-content-center">
        <form action="validate" method="POST" enctype="multipart/form-data">
            <div class="mb-3 input">
                <label for="titre" class="form-label">Titre de l'article</label>
                <input type="text" name="titre" class="form-control label" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Contenu de l'article</label>
                <input type="text" name="description" class="form-control text" id="exampleInputPassword1">
            </div>
            <input type="file" name="image" id="fileToUpload"><br>
            <button type="submit" class="btn btn-primary btn-post">Poster</button>

        </form>
    </div>
</div>

<?php require 'footer.php';
?> 
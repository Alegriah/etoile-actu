<?php
ob_start();

$titre = "Ajouter un article";
$content = ob_get_clean();
require_once "template.php";
?>


<main>
    <section>
        <article class="title-news">
            <h1 class="connexion title-float"><?=$titre?></h1>
        </article>
        <h2 class="responsive-title "><?=$titre?></h2>
        <article class="d-flex justify-content-center">
            <form action="validate" method="POST" enctype="multipart/form-data">
                <div class="mb-3 input">
                    <label for="titre" class="form-label">Titre de l'article</label>
                    <input type="text" name="titre" class="form-control label">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Contenu de l'article</label>
                    <textarea rows="5" cols="80" name ="description" class="form-control text"></textarea>
                </div>
                <input type="file" name="image" id="fileToUpload"><br>
                <button type="submit" class="btn btn-primary btn-post">Poster</button>
            </form>
        </article>
    </section>
</main>
<?php require 'footer.php';
?> 
<?php 
ob_start();
    $titre = "Lire";
    $content = ob_get_clean();
    require_once "./view/template.php";
?>

<main>
    <section class="row">
        <article class="col-12 col-lg-6 col-md-12 col-sm-12">
            <img src="<?=URL?>public/image/<?=$article->getImageArticle()?>" alt="<?=$article->getNomArticle()?>" class="bigImg">
        </article>
        <article class="col-6">
            <p> <?=$article->getNomArticle()?></p>
            <p> <?=$article->getDescriptionArticle()?></p>
            <p>Publié le: <?=date('d-m-Y', strtotime($article->getDatePublication()))?>, par: je sais pas et ça m'énerve  </p>
        </article>
    </section>
</main>


  


<?php require 'footer.php'
?> 
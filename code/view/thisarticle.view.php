<?php 
ob_start();
    $titre = "Lire";
    $content = ob_get_clean();
    require_once "./view/template.php";
?>

    <div class="main">
    <div class="row">
        <div class="col-12 col-lg-6 col-md-12 col-sm-12">
            <img src="<?=URL?>public/image/<?=$article->getImageArticle()?>" alt="<?=$article->getNomArticle()?>" class="bigImg">
        </div>
        <div class="col-6">
            <p> <?=$article->getNomArticle()?></p>
            <p> <?=$article->getDescriptionArticle()?></p>
            <p>Publié le: <?=date('d-m-Y', strtotime($article->getDatePublication()))?>, par: je sais pas et ça m'énerve  </p>
        </div>
       
    </div>
    </div>


  


<?php require 'footer.php'
?> 
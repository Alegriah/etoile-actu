<?php 

session_start(); 
ob_start();

$titre = "articles";
$content = ob_get_clean();
require_once "template.php";

?>
<div class="main">

<div class="d-flex flex-row">


    <?php 
   // var_dump($newArticle);exit;
    foreach($newArticle as $value):?>


        <div class="card" style="width: 18rem;" class="p2">
        
            <img class="imgArticle" src="<?=URL?>public/image/<?= $value-> getImageArticle()?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$value-> getNomArticle()?></h5>
                <a href="<?= URL ?>etoile/afficher/<?=$value->getIdArticle()?>" class="btnArticle btn btn-primary" >Lire l'article</a>
                <?php if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 1){ ?>
                <form action="<?= URL ?>etoile/suppression/<?= $value->getIdArticle()?>" onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?');"  >
                    <button type="submit" class="button is-danger articleButton ml-5"  >Supprimer l'article</button>
                </form>
                <?php }?>

            </div>
        
        </div>
    <?php endforeach ?>
    </div>
</div>

<?php require 'footer.php';
?> 


<?php 

ob_start();

$titre = "Article";
$content = ob_get_clean();
require_once "template.php";

?>
<div class="main">
    <div>
        <div>
            <h2 class="connexion title-float">
                <?=$titre?>
            </h2>
        </div>
        <h3 class="responsive-title ">
            <?=$titre?>
        </h3>
        <div class="d-flex flex-row responsive">
            <?php 
            foreach($newArticle as $value):?>
            <div class="card" style="width: 18rem;" class="p2">
                <img class="imgArticle" src="<?=URL?>public/image/<?= $value-> getImageArticle()?>" class="card-img-top"
                    alt="...">
                <div class="card-body">
                    <h4 class="card-title">
                        <?=$value-> getNomArticle()?>
                    </h4>
                    <a href="<?= URL ?>etoile/afficher/<?=$value->getIdArticle()?>"
                        class="btnArticle btn btn-primary">Lire
                        l'article</a>
                    <?php if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 1){ ?>
                    <form action="<?= URL ?>etoile/suppression/<?= $value->getIdArticle()?>"
                        onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                        <button type="submit" class=" btn-delete button is-danger articleButton ml-5 btn">Supprimer l'article</button>
                    </form>
                    <?php }?>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?php require 'footer.php';
?> 


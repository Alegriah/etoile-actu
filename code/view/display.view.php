<?php 

ob_start();

$titre = "Article";
$content = ob_get_clean();
require_once "template.php";

?>
<main>
    <section>
        <article>
            <h1 class="connexion title-float"><?=$titre?></h1>
        </article>
        <h2 class="responsive-title "><?=$titre?></h2>
        <article class="d-flex flex-row responsive">
            <?php foreach($newArticle as $value):?>
            <div class="card" style="width: 18rem;" class="p2">
                <img class="imgArticle" src="<?=URL?>public/image/<?= $value-> getImageArticle()?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title"><?=$value-> getNomArticle()?></h3>
                    <a href="<?= URL ?>etoile/afficher/<?=$value->getIdArticle()?>"class="btnArticle btn btn-primary">Lire l'article</a>
                    <?php if (!empty($_SESSION) && $_SESSION['user']->getIdRole() == 1){ ?>
                    <form action="<?= URL ?>etoile/suppression/<?= $value->getIdArticle()?>" onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                        <button type="submit" class=" btn-delete button is-danger articleButton ml-5 btn">Supprimer l'article</button>
                    </form>
                    <?php }?>
                </div>
            </div>
            <?php endforeach ?>
        </article>
    </section>
</main>
<?php require 'footer.php';
?> 


<?php
ob_start();

$titre = "Mon profil";
$content = ob_get_clean();
require_once "template.php";
?>

<main>
    <section class="profil">
        <article>
            <h2 class="connexion title-float"><?=$titre?></h2>
        </article>
        <article class="row profil-grid">
            <div></div>
            <div class="grid1">
                <img class="bigImg" src="<?=URL?>public/image/<?=$_SESSION['user']->getImage()?>">
            </div>
            <div class="grid1">
                <p><?=$_SESSION['user']->getPseudo()?></p>
                <p><?=$_SESSION['user']->getEmail()?></p>
                <form action="<?= URL ?>etoile/modifier_profil">
                    <button type="submit" class="button is-danger articleButton ml-5">Modifier le profil</button>
                </form>
            </div>
        </article>
    </section>
</main>
<?php
  require 'footer.php'
?> 
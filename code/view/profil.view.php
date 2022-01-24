<?php
session_start(); 
ob_start();

$titre = "Mon profil";
$content = ob_get_clean();
require_once "template.php";
//var_dump($_SESSION);
?>

<div class="main">
    <div class="profil">
        <div>
            <h2 class="connexion title-float">
                <?=$titre?>
            </h2>
        </div>
        <div class="row profil-grid">
            <div></div>
            <div class="grid1">
                <img class="bigImg" src="<?=URL?>public/image/<?=$_SESSION['image']?>">
            </div>
            <div class="grid1">
                <p>
                    <?=$_SESSION['pseudo']?>
                </p>
                <p>
                    <?=$_SESSION['email']?>
                </p>
                <form action="<?= URL ?>etoile/modifier_profil">
                    <button type="submit" class="button is-danger articleButton ml-5">Modifier le profil</button>
                </form>
            </div>
        </div>

        </html>
    </div>
</div>
<?php
  require 'footer.php'
?> 
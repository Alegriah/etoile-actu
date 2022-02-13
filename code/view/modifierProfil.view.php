<?php
ob_start();
$titre = "Modifier mon profil";
$content = ob_get_clean();
require_once "template.php";

?>

<main>
    <section>
        <article>
            <h1 class="connexion title-float"><?=$titre?></h1>
        </article>
        <h2 class="responsive-title "><?=$titre?></h2>
        <article class="form">
            <form method="post" action="<?=URL."etoile/profil_validate"?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo </label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" name="pseudo" value="<?=$_SESSION['user']->getPseudo()?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="mdp" class="form-label">Mot de passe </label>
                    <div class="control has-icons-left">
                        <input type="password" class="input" name="mdp" >
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"> Adresse mail </label>
                    <div class="control has-icons-left">
                        <input type="email" class="input" name="email" value="<?=$_SESSION['user']->getEmail()?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label"> Photo de profil</label>
                    <div class="control has-icons-left">
                        <input type="file" class="input upload" name="photo">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-connexion">Modifier</button>
            </form>
        </article>
    </section>
</main>



<?php require_once "footer.php"?> 
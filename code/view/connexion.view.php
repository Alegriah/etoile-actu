<?php 
ob_start();

$titre = "Connexion";
$content = ob_get_clean();
require_once "template.php";
if (isset($_SESSION['pseudo'])){
  header("Location: " . URL . "accueil");

}
?>
<main>  
  <section>
    <article>
      <h1 class="connexion title-float"><?=$titre?></h1>
    </article>
    <h2 class="responsive-title "><?=$titre?></h2>
    <article class="form">
      <form method="post" action='<?=URL."etoile/validation_connexion"?>'>
        <div class="mb-3">
          <label for="pseudo" class="form-label"> pseudo </label>
          <div class="control has-icons-left">
            <input type="text" class="input" name="pseudo">
            <span class="icon is-small is-left"><i class="fa fa-envelope"></i></span>
          </div>
        </div>
        <div class="mb-3">
          <label for="mdp" class="form-label"> Mot de passe </label>
          <div class="control has-icons-left">
            <input type="password" class="input" name="mdp" required>
            <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
          </div>
        </div>
        <div class="mb-3">
          <p class="membre"> Pas encore membre ? <a href="<?=URL?>etoile/inscription">Inscris toi !</a></p>
        </div>
        <input type="submit" name="connexion" value="Connexion" class="input-connexion">
      </form>
    </article>
  </section>
</main>

<?php require 'footer.php'
?> 
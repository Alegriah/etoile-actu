<?php 
ob_start();

$titre = "Connexion";
$content = ob_get_clean();
require_once "template.php";
if (isset($_SESSION['email'])){
  header("Location: " . URL . "accueil");

}
?>

<div class="main">

<div class="connec">
<h2 class="connexion">Connexion</h2>
<div class="form">
    <form method="post" action='<?=URL."etoile/validation_connexion"?>'>
        <div class="mb-3">
            
            <label for="pseudo" class="form-label"> pseudo </label>
            <div class="control has-icons-left">
            <input type="text"  class="input" name="pseudo">
            <span class="icon is-small is-left">
                  <i class="fa fa-envelope"></i>
            </span>
            </div>
        </div>
        <div class="control has-icons-left">
            <label for="mdp" class="form-label"> Mot de passe </label>
            <input type="password"  class="input" name="mdp" required>
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
      
  <div class="mb-3">
      <p> Pas encore membre ? <a href="<?=URL?>etoile/inscription">Inscris toi !</a></p>
</div>
      <input type="submit" name="connexion" class="btn btn-primary btn-connexion">  
    </form>
</div>
</div>



</div>

<?php require 'footer.php'
?> 
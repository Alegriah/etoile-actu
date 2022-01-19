<?php 
session_start(); 
ob_start();

$titre = "Inscription";
$content = ob_get_clean();
require_once "template.php";
if (isset($_SESSION['email'])){
    header("Location: " . URL . "accueil");

}
?>

<div class="main">

<h2 class="connexion"><?=$titre?></h2>
<div class="form">
    <form method="post" action="<?=URL."etoile/validation_inscription"?>">
    <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo </label>
            <div class="control has-icons-left">
                <input type="text" class="input" required name="pseudo">
                <span class="icon is-small is-left">
                  <i class="fa fa-envelope"></i>
                </span>
              </div>
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe</label>
            <div class="control has-icons-left">
                <input type="password" class="input" name="mdp" required>
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </div>        
            </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse mail </label>
            <div class="control has-icons-left">
                <input type="text" class="input" required name="email">
                <span class="icon is-small is-left">
                  <i class="fa fa-envelope"></i>
                </span>
              </div>
            </div>
            
      <button type="submit" onClick="" class="btn btn-primary btn-connexion">S'inscrire</button>
    </form>
</div>
</div>

<?php //    require 'footer.php'
?> 
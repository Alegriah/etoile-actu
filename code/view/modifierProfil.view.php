<?php session_start(); 
ob_start();
$titre = "Modifier mon profil";
$content = ob_get_clean();
require_once "template.php";
var_dump($_POST);

?>


<div class="main">

<h2 class="connexion"><?=$titre?></h2>
<div class="form">
    <form method="post" action="<?=URL.""?>" enctype="multipart/form-data">
    <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo </label>
            <div class="control has-icons-left">
                <input type="text" class="input"  name="pseudo">
              </div>
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe </label>
            <div class="control has-icons-left">
                <input type="password" class="input"  name="mdp">
              </div>
        </div>
        <div class="mb-3">
            <label for="confirm" class="form-label">Confirmer mot de passe </label>
            <div class="control has-icons-left">
                <input type="password" class="input"  name="confirm">
              </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"> Adresse mail </label>
            <div class="control has-icons-left">
                <input type="email" class="input"  name="email">
              </div>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">  Photo de profil</label>
            <div class="control has-icons-left">
                <input type="file" class="input"  name="photo">
              </div>
        </div>
            
      <button type="submit" onClick="" class="btn btn-primary btn-connexion">Modifier</button>
    </form>
</div>
</div>




<?php require_once "footer.php"?>
<?php
ob_start();
$titre = "Accueil";
$content = ob_get_clean();
require_once "template.php";
?>
<main>  
  <h2 class="redacteur">Rédacteur de la semaine</h2>
    <p class="twitter">@pseudotwitter</p>
    <img src="public/image/chibi.png" alt="" class="chibi">
    
    <div id="trait_dessus"></div>
    <clip-path></clip-path>
    </div>
  <div class="push"></div>
</main>
<?php require 'footer.php'
?>
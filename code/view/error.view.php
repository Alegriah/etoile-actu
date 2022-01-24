<?php
ob_start();
?>
<p><?=$error?></p>
<?php
$title = "Page d'erreur";
$content = ob_get_clean();
require_once "template.php";

?>

<h1 class='h1'>erreur</h1>
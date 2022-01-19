<?php session_start(); 
ob_start();

$titre = "Accueil";
$content = ob_get_clean();
require_once "template.php";


?>
  <div class="main">
  <h2 class="redacteur">Rédacteur de la semaine</h2>
    <p class="twitter">@pseudotwitter</p>
    <img src="public/image/chibi.png" alt="" class="chibi">
    
    <div id="trait_dessus"></div>
    <clip-path></clip-path>
    </div>

    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <i class="fa-brands fa-instagram"></i>
          </div>
          <div class="carousel-item">
            <img src="" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div> -->
  <div class="push"></div>
  </div>
<?php require 'footer.php'
?>
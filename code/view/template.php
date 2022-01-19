<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link href="<?=URL?>public/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="ifconnected">
            <?php if(!empty($_SESSION['email'])){
             echo 'Bienvenue '.$_SESSION["pseudo"].' !';}
             if (!isset($_SESSION['email'])){
             ?>
            <a class="coheader" href="<?=URL?>etoile/connexion"> Se connecter</a>
            <?php }?>
            <?php if (isset($_SESSION['email'])){?>
            <a class="coheader" href="<?=URL?>etoile/deconnexion"> Se déconnecter</a>

            <?php }?>
        </div>

        <img class="logo" src="<?=URL?>public/image/logo.png" alt="etoile'actu">

        <nav>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link  lien" aria-current="page" href="<?= URL ?>accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lien" href="<?= URL ?>etoile/article">Article</a>
                </li>
                <?php if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 1){?>
                <li class="nav-item">
                    <a class="nav-link lien" href="<?= URL ?>etoile/ajouter">Ajouter</a>
                </li>
                <?php }?>
                <li class="nav-item">
                    <a class="nav-link lien" href="<?= URL ?>">Evenement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lien" href="<?= URL?>">Jeux</a>
                </li>
                <?php if(isset($_SESSION['email'])){?>

                <li class="nav-item">
                    <a class="nav-link lien" href="<?= URL ?>etoile/profil">Mon profil</a>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <nav class="nav-responsive" role="navigation">
            <div id="menu">
                <input type="checkbox" id="burger">
                <div id="menu_links">
                    <div id="menu_link"><a href="<?= URL ?>accueil">Accueil</a></div>
                    <div id="menu_link"><a href="<?= URL ?>etoile/article">Article</a></div>
                    <?php if (isset($_SESSION['id_role']) && $_SESSION['id_role'] == 1){?>
                    <div id="menu_link"><a href="<?= URL ?>etoile/ajouter">Ajouter</a></div>
                    <?php }?>
                    <div id="menu_link"><a href="#">Evenement</a></div>
                    <div id="menu_link"><a href="#">Jeux</a></div>
                    <?php if(isset($_SESSION['email'])){?>
                    <div id="menu_link"><a href="<?= URL ?>etoile/profil">Mon profil</a></div>
                    <?php } ?>
                    <?php if(isset($_SESSION['email'])){?>
                    <div id="menu_link"><a href="<?=URL?>etoile/deconnexion">Deconnexion</a></div>
                    <?php } ?>
                    <?php if(!isset($_SESSION['email'])){?>
                    <div id="menu_link"><a href="<?=URL?>etoile/connexion">Connexion</a></div>
                    <?php } ?>
                </div>
            </div>
            </div>
            </div>

        </nav>

    </header>


</body>
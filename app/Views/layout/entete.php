<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title> <?=$titre ?> </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/starter-template/">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?= link_tag("css/bootstrap.min.css")?>
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
    
<div class="col-lg-8 mx-auto p-3 py-md-5">
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="<?= base_url(); ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
       <?= img("img/logo.jpeg"); ?>
      </a>
      <?php if(session()->get("profil")=="adherent"): ?>
        <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?= base_url(); ?>/adherent" class="nav-link <?= $menuActif=="adherentAcc"?"active":"" ?>">Acceuil</a></li>
        <li class="nav-item"><a href="<?= base_url(); ?>/adherent/adhesion" class="nav-link <?= $menuActif=="adhesion"?"active":"" ?>">Adhésion</a></li>
        <li class="nav-item"><a href="<?= base_url(); ?>/utilisateur/deconnexion " class="nav-link">Deconnexion</a></li>
        </ul>
      <?php elseif(session()->get("profil")=="administrateur"): ?>
        <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?= base_url(); ?>/administrateur" class="nav-link <?= $menuActif=="administrateurAcc"?"active":"" ?>">Acceuil</a></li>
        <li class="nav-item"><a href="<?= base_url(); ?>/utilisateur/gestion" class="nav-link <?= $menuActif=="gestionUtilisateurs"?"active":"" ?>">Utilisateurs</a></li>
        <li class="nav-item"><a href="<?= base_url(); ?>/utilisateur/deconnexion " class="nav-link">Deconnexion</a></li>
        </ul>
      <?php else: ?>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?= site_url(); ?>" class="nav-link <?= $menuActif=="acceuil"?"active":"" ?>" aria-current="page">Acceuil</a></li>
        <li class="nav-item"><a href="<?= site_url(); ?>/utilisateur" class="nav-link <?= $menuActif=="connexion"?"active":"" ?>">Connexion</a></li>
        <li class="nav-item"><a href="<?= site_url(); ?>/utilisateur/inscription " class="nav-link <?= $menuActif=="inscription"?"active":"" ?>">Inscription</a></li>
        <li class="nav-item"><a href="<?= site_url(); ?>/home/contact" class="nav-link <?= $menuActif=="contact"?"active":"" ?>">Contact</a></li>
        <li class="nav-item"><a href="<?= site_url(); ?>/quisommesnous" class="nav-link <?= $menuActif=="presentation"?"active":"" ?>">Qui sommes nous</a></li>
      </ul>
      <?php endif ?>
    </header>
  <main class="<?= $menuActif=="connexion"?"form-signin text-center":""?>">
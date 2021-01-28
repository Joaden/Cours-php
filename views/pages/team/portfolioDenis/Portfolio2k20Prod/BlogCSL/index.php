<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog CSL Training Homepage</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/csl-logo.png">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

</head>

<body>

<?php 

//include 'header.php'; 

// include __DIR__ . '/../BlogCSL/header.php';

?>
  <h1 class="site-heading text-center text-white d-none d-lg-block">
  <span class="site-heading-upper text-primary mb-3">Un corps Sain ça donne des L </span>
  <span class="site-heading-lower">C. S. L. Training</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="index.php">CSL Training</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="index.php">Home
              <span class="sr-only">(current)regrg</span>
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="about.php">A propos de nous</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="training.php">Training</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="store.php">Boutique</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="reservation.php">Reservation</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/team1.jpg" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper">10h30-12h</span>
            <span class="section-heading-lower">CSL-Training Day </span>
          </h2>
          <p class="mb-3">Tous les samedis et dimanches sur l'esplanade Edouard Glissant à Stains!
          </p>
          <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="reservation.html">Réservez votre place!</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Notre promesse</span>
              <span class="section-heading-lower">envers vous</span>
            </h2>
            <p class="mb-0">Lorsque vous entrez dans notre team pour commencer un training, nous nous engageons à vous offrir un encadrement et suivi professionnel, une ambiance familliale, une atmosphère accueillante et, par-dessus tout, un entrainement efficace qui vous fera repousser vos limites! Aussi, d'excellents produits fabriquation française de marque CSL. Vous irez jusqu'au bout du training avec pour récompense un déjeuner de qualité et votre santé boostée. Vous serez satisfait, vous voulez faire un essai ou juste regarder et supporter la team, faites-le nous savoir et nous ferons tout notre possible pour que les choses se passent bien !</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php include('footer.inc.php'); ?>

<script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('li').on('click', function(){
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            })
        })
    </script>
</body>

</html>

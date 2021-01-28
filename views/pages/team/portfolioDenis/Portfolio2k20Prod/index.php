<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Portfolio">
  <meta name="author" content="denis-chanet.fr">
  <meta name="language" content="fr">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="copyright" content="//denis-chanet.fr">
  <meta property="og:url" content="https://www.denis-chanet.fr">
  <meta property="type" content="website">
  <meta property="og:description" content="Site-web-portfolio">
  
  <title>Denis Chanet website Portfolio developer web</title>
  <link rel="canonical" href="https://www.denis-chanet.fr">
  <link rel="apple-touch-icon" href="favicon.png">

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/stylish-portfolio.min.css" rel="stylesheet">

  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.min.css" rel="stylesheet"> -->

  <!-- <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300,400,600i&display=swap" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->


  <?php
  // Récupère l'heure du serveur

     $localtime = localtime();

     $seconde =  $localtime[0];
     $minute =  $localtime[1];
     $heure =  $localtime[2];

  ?>

  <script>

        bcle=0;

function clock()
{
if (bcle == 0)
{
  heure = <?php echo $heure ?>;
  min = <?php echo $minute ?>;
  sec = <?php echo $seconde ?>;
}
else
{
  sec ++;
  if (sec == 60)
  {
    sec=0;
    min++;
    if (min == 60)
    {
      min=0;
      heure++;
    };
  };
};
txt="";
if(heure < 10)
{
  txt += "0";
}
txt += heure+ ":";
if(min < 10)
{
  txt += "0"
}
txt += min + ":";
if(sec < 10)
{
  txt += "0"
}
txt += sec ;
timer = setTimeout("clock()",1000);
bcle ++;

document.clock.date.value = txt ;
}
        
  </script>


  <style type="text/css">
  .clock{
    position: relative;
    padding-top: -100px;
    margin-top: -100px;
        }
  #clock{
      display:inline;
      
  }
  .style {
    border-width: 0;
    background-color: transparent;
    color:#000;}
  </style>





</head>

<body id="page-top" onLoad="clock()">


  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li class="sidebar-brand">	
        <a class="coucheTextTop" href="#page-top">Denis Chanet</a>
      </li><img src="img/laos.png"alt="logo" style="width: 25%;">
	  <!-- <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="../agency3/public">Agency</a>
      </li> -->
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#page-top">Menu</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#about">A propos</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#training">Formations</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#experience">Expériences</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#skill">Compétences</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#portfolio">Portfolio</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#contacts">Contact</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="formulairePage">Formulaire</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#">Date <?php echo date('d/m/Y'); ?></a>
      </li>
    </ul>
  </nav>

  <!-- Header top -->
  <!-- <div id="header-top" class="">
    <div class="container"> 
      <div class="row">
        <div class="col-xs-12 header-top">
          <ul class="list-inline info-list">
            <li>
              <a class="tel" href="tel:+33646076660">
                <i class="fa fa-phone" aria-hidden="true">
                </i>
                (+33) 6.46.07.66.60
              </a>
            </li>
            <li>
              <a href="mailto:chanet.denis@hotmail.fr">
                <i class="fa fa-envelope" aria-hidden="true">
                </i>
                chanet.denis@hotmail.fr
              </a>
            </li>
          </ul>
          <ul class="head-socialnetworks list-inline"></ul>
        </div>
      </div>  
    </div>
  </div> -->

  <!-- Header -->

  <header class="masthead d-flex">
    <!--  Charge la fonction clock dans le corps de la page  -->
<div class="clock">
  <!--  Affiche l'heure  -->
  <?php echo date('d/m/Y'); ?>
  <form id="clock" name="clock" onSubmit="0">
  <input type="text" name="date" size="5" readonly="true" class="style">
  </form>
  <br>

  
  <!-- <section id="appMeteo">
    <h2 class="tooltipM">
      <span id="ville">Paris</span>
    </h2>
    <br>
    <h4 class="tooltipM">
      <span class="tooltipV">Tapez une autre ville</span>
    </h4>
    <br>
    <i class="wi fas fa-cloud-sun"></i>
    <h3>
      <span id="temperature">
        25 C° ( <span id="conditions">Ciel dégagé</span> )
      </span>
    </h3>
  </section>-->
  <br>
  <br>
  
</div>

   <!--  END de la fonction clock dans le corps de la page  -->

    <div id="" class="container text-white text-center my-auto">
      <h1 id="text-denis" class="mb-1"><span class=""></span>Denis Chanet</h1>
      <h3 id="text-junior" class="mb-5">
          <em><span class="dynamic2"></span></em>
      </h3>
      
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">En savoir plus</a>
    </div>
    <div class="overlay"></div>
  </header>

  <!-- About -->
  <section class="content-section bg-light" id="about">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2 class="coucheTextLeft">A propos de moi !</h2>
            <div class="infocardContainer">
              <div id="main">
                <img src="img/photoprofil.jpg" alt="image profil" width="200px"></img>
              </div>
              <div id="textbois">
                <h2>Denis Chanet</h2>
                <h4>Développeur web junior</h4>
                <a href="mailto:chanet.denis@hotmail.fr">chanet.denis@hotmail.fr</a>
                <a class="tel" href="tel:+33646076660">
                  (+33) 6.46.07.66.60
                </a>
                <a href="formulairePage">
                  Contact
                </a>
              </div>
              <br>
            </div>
          <p class="lead mb-5">Dès mon plus jeune âge, j'ai su être quelqu'un de <strong><em><bold>motivé</bold></em></strong> et <strong><em><bold>curieux</bold></em></strong> faisant toujours preuve d'une grande détermination. Explorer de nouvelles opportunités, apprendre de nouvelles compétences, rencontrer de nouvelles personnes, tout cela a toujours été naturel chez moi, aussi bien dans la sphère personnelle que professionnelle.
            Etant autodidacte en développement lors de mes temps libres, j'ai décidé de faire une reconversion afin d'exercer un métier que j'aime et qui me passionne. J'ai donc effectué une formation de <strong><bold>Développeur Logiciel (titre RNCP)</bold></strong>, que j'ai validé en avril 2019 chez <a href="http://www.nextformation.com" target="_blank" data-content="http://www.nextformation.com" data-type="external" rel="nofollow" role="button">Nextformation</a> à Paris.<br>
            Je suis à ce jour disponible pour une éventuelle collaboration.
            Pour en savoir plus sur mon parcours, parcourez le site ou contactez-moi directement &#9755;
            <a href="mailto:chanet.denis@hotmail.fr" >chanet.denis@hotmail.fr </a> <a href="tel:+33646076660" >(+33) 6.46.07.66.60 </a><a href="formulairePage" > Contact </a></p><br><br>


            <div class="container text-center">
      <h2 class="coucheTextShow">Mon Travail en tant que Développeur
      </h2>
      <div class="row">
        <div class="col-lg-6">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fas fa-file-code"></i>
            </span>DEVELOPPEUR WEB FRONT-END
            <p>Je développe toute l'interface visible du site web à partir d'une maquette.<br>
            Pour aboutir à une interface ergonomique et interactive.</p>
            <span>HTML, CSS, Javascript, jQuery.</span>
        </div>

        <div class="col-lg-6">
            <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="fab fa-php"></i>
            </span>DEVELOPPEUR WEB BACK-END
            <p>Je réponds au cahier des charges en développant toutes les fonctionnalités invisible à l'utilisateur et nécessaire au fonctionnement du site.</p>
            <span>MySQL, PHP(Symfony).</span>
        </div>
      </div>
    </div><br><br>

          <a class="btn btn-dark btn-xl js-scroll-trigger" href="#training">Formations</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Formation -->
  <section class="content-section bg-primary text-white text-center" id="training">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0">Education</h3>
        <h2 class="mb-5">Mes Formations &#127891;</h2>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="fas fa-code"></i>
          </span>
          <h4>
            <strong>Développeur Logiciel</strong>
          </h4>
          <p class="text-faded mb-0">Titre RNCP niveau III obtenu au centre Nextformation Paris 8e.<br>
            Développer une application client-serveur / application web.<br>
            Présentation oral et démonstration de projet terminé devant un jury.<br>
            <strong>Août 2018 - avril 2019</strong></p>
            <a href="download/PlanningDL.pdf" target="_blank" data-toggle="tooltip" title="Voir le planning de la formation!" class="btn btn-xs btn-dark mr-4" download="PlanningDL.pdf">
            <span></span>Planning</a> 
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="fas fa-book-reader"></i>
          </span>
          <h4>
            <strong>Autodidacte</strong>
          </h4>
          <p class="text-faded mb-0">
            OpenClassRoom, php, <a href="https://symfony.com/" target="_blank" data-content="https://symfony.com/" data-type="external" rel="nofollow" role="button">Symfony</a>, Responsive Design, <a href="https://getbootstrap.com/docs/4.3/getting-started/introduction/" target="_blank" data-content="https://getbootstrap.com/docs/4.3/getting-started/introduction/" data-type="external" rel="nofollow" role="button">Bootstrap</a>, <a href="https://api.jquery.com/" target="_blank" data-content="https://api.jquery.com/" data-type="external" rel="nofollow" role="button">Javascipt/jQuery</a>, HTML/CSS.<br>
            Janvier 2018 - à ce jour</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="fas fa-school"></i>
          </span>
          <h4>
            <strong>Bac Pro M.E.I. </strong>
          </h4>
          <p class="text-faded mb-0">
              <a href="https://lyc-verlaine.monbureaunumerique.fr/" target="_blank" data-content="https://lyc-verlaine.monbureaunumerique.fr/" data-type="external" rel="nofollow" role="button">Lycée Paul Verlaine</a><br>
            Maintenance des Equipements Industriels.<br>
            Septembre 2007 - juin 2009</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="fas fa-school"></i>
          </span>
          <h4>
            <strong>BEP M.S.M.A. </strong>
          </h4>
          <p class="text-faded mb-0">
              <a href="https://lyc-verlaine.monbureaunumerique.fr/" target="_blank" data-content="https://lyc-verlaine.monbureaunumerique.fr/" data-type="external" rel="nofollow" role="button">Lycée Paul Verlaine</a><br>
            BEP Maintenance des Systèmes Mécaniques Automatisés.<br>
            Septembre 2005 - juin 2007</p>
        </div>
      </div>
      <a class="btn btn-dark mt-5 btn-xl js-scroll-trigger" href="#experience">Parcours</a>
    </div>
  </section>

    <!-- Experiences -->
    <section class="content-section bg-bluelight text-black text-center" id="experience">
      <div class="container">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">Parcours et spécialisation</h3>
          <h2 class="mb-5">Expériences professionnelles</h2>
        </div>
       
        <div class="row">
        <!-- Emploi chez ID Logistic -->
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fas fa-heart"></i>
            </span>
            <h4>
              <strong>Chef d'équipe ID Logistic / AMAZON</strong>
            </h4>
            <p class="text-muted mb-0">Client Amazon<br>
              Management.<br>
              Suivi d'activité.<br>
              Reporting outband inbound.<br>
              Admin logiciels amazon/Infolog.<br>
              <strong>Janvier 2021 - à ce jour</strong></p>
          </div>
          <!-- Emploi chez Cshort -->
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fas fa-heart"></i>
            </span>
            <h4>
              <strong>Développeur PHP / Symfony chez CSHORT</strong>
            </h4>
            <p class="text-muted mb-0">CDI Développeur PHP/Symfony 2<br>
              Maintenance des solutions existantes.<br>
              Développement de nouvelles fontionnalités.<br>
              Intégration de solution de paiement.<br>
              Rédaction de la documentation technique.<br>
              PHP, Symfony, jQuery, Ajax, Json, MySQL, windows.<br>
              <strong>Novembre 2019 - à juillet 2020</strong></p>
          </div>

          <!-- Emploi chez Dachser -->
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="fas fa-chart-line"></i>
            </span>
            <h4>
              <strong>Contrôleur qualité chez DACHSER</strong>
            </h4>
            <p class="text-muted mb-0">Mission Intérim de 2 mois.<br>
              Contrôle des commandes, fiche produit, intégration dans la base de données<br>
              <strong>Septembre 2019 - octobre 2019</strong></p>
          </div>
          <!-- Emploi chez Studizz -->
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fas fa-heart"></i>
            </span>
            <h4>
              <strong>Développeur Back-end PHP chez STUDIZZ</strong>
            </h4>
            <p class="text-muted mb-0">Stage de développeur back PHP Symfony 4<br>
              Développement d'une API Webhook Facebook Messenger.<br>
              PHP, Symfony, Json, Mongodb, Apache, Docker, RabbitMQ, Ubuntu.<br>
              <strong>Février 2019 - avril 2019</strong></p>
          </div>

          <!-- Emploi chez Adveo -->
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fas fa-warehouse"></i>
            </span>
            <h4>
              <strong>Cariste chez ADVEO</strong>
            </h4>
            <p class="text-muted mb-0">Gestion comptes clients, affrètements,<br> gestion d'équipe, prépa de comm.<br>
              Cariste 1- 5 - 5+<br>
              Formation Excel avancé<br>
              Sauveteur secouriste du travail.<br>
              <strong>Septembre 2013 - avril 2019</strong></p>
          </div>
          
          <button id="flip" type="button" class="btn btn-primary btn-lg btn-block">Cliquez pour voir plus</button>

          <!-- Emploi chez Haut du Pavé -->
          <div id="pane1" class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-like"></i> 
            </span>
            <h4>
              <strong>Serveur chez Le-Haut-du-Pavé Hyères-les-Palmiers</strong>
            </h4>
            <p class="text-muted mb-0">Serveur.<br>
              <strong>Juin 2013 - août 2013</strong></p>
          </div>

          <!-- Emploi chez Inter Drive -->
          <div id="pane2" class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
            </span>
            <h4>
              <strong>Préparateur chez Intermarché Drive</strong>
            </h4>
            <p class="text-muted mb-0">Préparation de commandes.<br>
              <strong>Décembre 2012 - mars 2013</strong></p>
          </div>

          <!-- Emploi chez E.Leclerc Drive -->
            <div id="pane3" class="col-lg-3 col-md-6 mb-5 mb-lg-0">
              <span class="service-icon rounded-circle mx-auto mb-3">
              </span>
              <h4>
                <strong>Préparateur chez E.Leclerc Drive</strong>
              </h4>
              <p class="text-muted mb-0">Préparation de commandes, réapprovisionnement, réception.<br>
                <strong>Février 2012 - novembre 2012</strong></p>
            </div>

          <!-- Emploi chez Toys"R"us -->
            <div id="pane4" class="col-lg-3 col-md-6 mb-5 mb-lg-0">
              <span class="service-icon rounded-circle mx-auto mb-3">
              </span>
              <h4>
                <strong>Vendeur chez Toys"R"us Reims</strong>
              </h4>
              <p class="text-muted mb-0">Vendeur puériculture.<br>
                <strong>Novembre 2011 - décembre 2011</strong></p>
            </div>

          <!-- Emploi chez Matsuri -->
            <div id="pane5" class="col-lg-3 col-md-6 mb-5 mb-lg-0">
              <span class="service-icon rounded-circle mx-auto mb-3">
              </span>
              <h4>
                <strong>Cuisinier chez Matsuri Reims</strong>
              </h4>
              <p class="text-muted mb-0">Cuisinier, serveur, livreur.<br>
                <strong>Juin 2011 - septembre 2011</strong></p>
            </div>

          <!-- Emploi chez Boulanger -->
            <div id="pane6" class="col-lg-3 col-md-6 mb-5 mb-lg-0">
              <span class="service-icon rounded-circle mx-auto mb-3">
              </span>
              <h4>
                <strong>Livreur électroménager chez Boulanger Reims</strong>
              </h4>
              <p class="text-muted mb-0">Livraison installation.<br>
                <strong>Novembre 2010 - mars 2011</strong></p>
            </div>

          <!-- Emploi chez Animalis -->
            <div id="pane7" class="col-lg-3 col-md-6 mb-5 mb-lg-0">
              <span class="service-icon rounded-circle mx-auto mb-3">
              </span>
              <h4>
                <strong>Vendeur Aquariophilie Reims</strong>
              </h4>
              <p class="text-muted mb-0">Vendeur Aquariophilie, réception, installation, maintenance.<br>
                <strong>Septembre 2010 - octobre 2010</strong></p>
            </div>

          <!-- Emploi chez Valéo -->
            <div id="pane8" class="col-lg-3 col-md-6 mb-5 mb-lg-0">
              <span class="service-icon rounded-circle mx-auto mb-3">
              </span>
              <h4>
                <strong>Opérateur chez Valéo T.M. Reims</strong>
              </h4>
              <p class="text-muted mb-0">Opérateur de fabrication, contrôleur.<br>
                <strong>Juin 2009 - juillet 2009</strong></p>
            </div>
      </div>
      <a class="btn btn-dark mt-5  btn-xl js-scroll-trigger" href="#skill">Compétences</a>

    </section>

  <!-- Skills -->
  <section class="callout bg-secondary" id="skill">
    <div class="container bg-bluelight text-center">
      <h2 class="mx-auto mb-5">
        <em>Mes compétences</em>
      </h2>
      <h3>Frameworks, langages &amp; outils</h3>
      <div class="mx-auto mb-3">
        <ul id="icon-skill" class="list-inline dev-icons">
          <li class="list-inline-item">
            <i class="fab fa-symfony"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-bootstrap"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-wordpress"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-html5"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-css3-alt"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-js-square"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-php"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-node-js"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-sass"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-npm"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-github"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-ubuntu"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-windows"></i>
          </li>
          <li class="list-inline-item">
            <i class="fab fa-google-drive"></i>
          </li>
        </ul>
      </div>
        <div class="row no-gutters">
          <div class="col-lg-6">
            <a class="portfolio-item">
              <span class="caption">
                <span class="caption-content">
                  <h2>Frameworks et Librairies</h2>
                  <p class="mb-0">
                    Symfony 4<br>
                    JQuery<br>
                    Bootstrap<br>
                    Chartjs<br>
                    MJML
                  </p>
                </span>
              </span>
              <img class="img-fluid" src="img/symfony.jpg" alt="Symfony framework librairie img-skill">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item">
              <span class="caption">
                <span class="caption-content">
                  <h2>Langages Web et CMS</h2>
                  <p class="mb-0">
                    HTML/CSS<br>
                    Javascript/JQuery<br>
                    PHP/POO<br>
                    MySQL/Mongodb<br>
                    Wordpress<br>
                  </p>
                </span>
              </span>
              <img class="img-fluid" src="img/languages1.jpg" alt="language web CMS html css php javascript img-skill">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item">
              <span class="caption">
                <span class="caption-content">
                  <h2>Outils et OS</h2>
                  <p class="mb-0">
                    Maitrise des environnements Windows et Ubuntu.<br>
                    Versionning et partage de projet avec Git et GitHub.<br>
                    Créations de Media Queries afin de gérer la responsivité des sites Web.<br>
                    Photoshop, Word, Draw.io , Google App, afin d'intégrer et créer des maquettes et schémas.<br>
                    Composer, npm, VSCode, Phpstorm, PhpMyAdmin.
                  </p>
                </span>
              </span>
              <img class="img-fluid" src="img/tools.jpg" alt="tools outils img-skill">
            </a>
          </div>
          <div class="col-lg-6">
            <a class="portfolio-item">
              <span class="caption">
                <span class="caption-content">
                  <h2>Les plus</h2>
                  <p class="mb-0">
                    Gestion de projet : UML, Merise, Powerpoint, Trello.<br>
                    Web Mobile, Design Pattern, créativité.<br>
                    SST (Sauveteur secouriste du travail).<br>
                    Anglais Technique B1.<br>
                  </p>
                </span>
              </span>
              <img class="img-fluid" src="img/skill.jpg" alt="Skills competences img-skill">
            </a>
          </div>
        </div>
      <a class="btn btn-primary mt-5 btn-xl js-scroll-trigger" href="#portfolio">Projets</a>
    </div>
  </section>

  <!-- Portfolio -->
  <section class="content-section" id="portfolio">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Portfolio</h3>
        <h2 class="mb-5">Mes réalisations</h2>
      </div>
      <div class="row no-gutters">
        <!-- agence project -->                
        <div class="col-lg-6">
          <a class="portfolio-item" href="https://github.com/Joaden/AgenceImmo" target="_blank" data-content="https://github.com/Joaden/AgenceImmo" data-type="external" rel="nofollow" role="button">
            <span class="caption">
              <span class="caption-content">
                <p class="mb-0"><strong>Agence Immobilière<br> j'ai réalisé ce site en autonomie avec le framework Symfony en appliquant la logique CRUD.<br>Technologies : PHP, Bootstrap, HTML/CSS, Javascript jQuery, Symfony 4, MJML, MailDev...<br>
                Cliquer içi pour voir le SLIDE !</strong>
                <br></p>
              </span>
            </span>
            <br>
            <br>
                <img class="img-fluid" src="img/agenceimmook.PNG" alt="agence immobiliere agency immovable buy Sell website">
            <!-- <button type="button" class="btn btn-info"><a href="">Voir diapo du projet</a></button> -->
            <div>projet en cours: <progress value="80" max="100"></progress></div>
          </a>
            <!-- test modal!!! -->
            <div class="container">

              <!-- Trigger the modal with a button -->
              <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Voir diapo modal du projet</button> -->

              <!-- Trigger the modal with a button -->
              <!-- <button id="#flip1" type="button" class="btn btn-info btn-sm" data-toggle="carousel" data-target="#carouselFade">Voir diapo fade du projet</button> -->

              <!-- Trigger the modal with a button -->
              <button id="flip1" type="button" class="btn btn-info btn-sm btn-block">Cliquez pour voir le github</button>
              
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;
                      <h4 class="modal-title">Close project</h4></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <h2>Slide Agence Immobilière!</h2>
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                            <li data-target="#myCarousel" data-slide-to="6"></li>
                            <li data-target="#myCarousel" data-slide-to="7"></li>
                            <li data-target="#myCarousel" data-slide-to="8"></li>
                            <li data-target="#myCarousel" data-slide-to="9"></li>
                            <li data-target="#myCarousel" data-slide-to="10"></li>
                            <li data-target="#myCarousel" data-slide-to="11"></li>
                            <li data-target="#myCarousel" data-slide-to="12"></li>
                            <li data-target="#myCarousel" data-slide-to="13"></li>
                          </ol>
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                            <div class="item active">
                              <img src="img/diapo/agence-diapo/agencediapo0.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3></h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo1.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo2</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo2.png" alt="New York" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo3</h3>
                                <p>We love the BigDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo3.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo4</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo4.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo5</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo5.png" alt="New York" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo6</h3>
                                <p>We love the BigDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo6.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo7</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo7.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo8</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo8.png" alt="New York" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo9</h3>
                                <p>We love the BiDiapo!</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo9.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo10</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo10.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo11</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo11.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo12</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo12.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/agence-diapo/agencediapo13.png" alt="New York" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo13</h3>
                                <p>We love the BigDiapo</p>
                              </div>
                            </div>
                          </div>
                          <!-- Left and right controls -->
                          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- fin modal -->
        </div>
        <!-- test carousel fade -->
        <div id="carouselFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div id="carouselFade-inner" class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/diapo/agence-diapo/agencediapo0.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item">
                <img src="img/diapo/agence-diapo/agencediapo1.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item">
                <img src="img/diapo/agence-diapo/agencediapo2.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item ">
                  <img src="img/diapo/agence-diapo/agencediapo3.png" class="d-block w-100" alt="agence immobiliere website">
                </div>
                <div class="carousel-item">
                  <img src="img/diapo/agence-diapo/agencediapo4.png" class="d-block w-100" alt="agence immobiliere website">
                </div>
                <div class="carousel-item">
                  <img src="img/diapo/agence-diapo/agencediapo5.png" class="d-block w-100" alt="agence immobiliere website">
                </div>
                <div class="carousel-item ">
                    <img src="img/diapo/agence-diapo/agencediapo6.png" class="d-block w-100" alt="agence immobiliere website">
                  </div>
                  <div class="carousel-item">
                    <img src="img/diapo/agence-diapo/agencediapo7.png" class="d-block w-100" alt="agence immobiliere website">
                  </div>
                  <div class="carousel-item">
                    <img src="img/diapo/agence-diapo/agencediapo8.png" class="d-block w-100" alt="agence immobiliere website">
                  </div>
                  <div class="carousel-item ">
                      <img src="img/diapo/agence-diapo/agencediapo9.png" class="d-block w-100" alt="agence immobiliere website">
                    </div>
                    <div class="carousel-item">
                      <img src="img/diapo/agence-diapo/agencediapo10.png" class="d-block w-100" alt="agence immobiliere website">
                    </div>
                    <div class="carousel-item">
                      <img src="img/diapo/agence-diapo/agencediapo11.png" class="d-block w-100" alt="agence immobiliere website">
                    </div>
                    <div class="carousel-item">
                        <img src="img/diapo/agence-diapo/agencediapo12.png" class="d-block w-100" alt="agence immobiliere website">
                      </div>
                      <div class="carousel-item">
                        <img src="img/diapo/agence-diapo/agencediapo13.png" class="d-block w-100" alt="agence immobiliere website">
                      </div>
            </div>
            <a class="carousel-control-prev" href="#carouselFade" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselFade" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
            <!-- fin carousel fade -->
            <!-- fin div agence -->

        <!-- Padawan project -->        
        <div class="col-lg-6">
          <a class="portfolio-item" href="https://github.com/Joaden/padawan" target="_blank" data-content="https://github.com/Joaden/padawan" data-type="external" rel="nofollow" role="button">
            <span class="caption">
              <span class="caption-content">
                <h4>Padawan project</h4>
                <p class="mb-0">Projet développé en PHP avec le framework Symfony,<br> en appliquant la logique CRUD en créant un blog regroupant des projets collaboratifs.<br>
                  Technologies : <br>
                  HTML/CSS, PHP, Symfony 4, Bootstrap
                  <br>Cliquer içi pour voir mon GITHUB !
                  <br></p>
              </span>
            </span>
            <br>
            <br>
            <img class="img-fluid" src="img/padawanok.PNG" alt="site padawan website co-worker blog">
            <br>
            <!-- <button type="button" class="btn btn-light"><a href="">Voir diapo du projet</a></button> -->
            <div>projet en cours: <progress value="50" max="100"></progress></div>
          </a>
          <!--  modal!!! -->
          <div class="container">
              <!-- Trigger the modal with a button -->
              <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal1">Voir diapo du projet</button> -->
              <!-- Trigger the modal with a button -->
              <button id="flip2" type="button" class="btn btn-info btn-sm btn-block">Cliquez pour voir le slide</button>
              <!-- Modal Padawan -->
              <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;
                      <h4 class="modal-title">Close project</h4></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <h2>Slide Padawan project</h2>
                        <div id="myCarousel1" class="carousel slide" data-ride="carousel1">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                            <li data-target="#myCarousel" data-slide-to="6"></li>
                            <li data-target="#myCarousel" data-slide-to="7"></li>
                          </ol>
                          <!-- Wrapper for slides Padawan -->
                          <div class="carousel-inner">
                            <div class="item active">
                              <img src="img/diapo/padawan-diapo/padawandiapo1.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo1</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/padawan-diapo/padawandiapo2.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo2</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/padawan-diapo/padawandiapo3.png" alt="New York" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo3</h3>
                                <p>We love the BigDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/padawan-diapo/padawandiapo4.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo4</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/padawan-diapo/padawandiapo5.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo5</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/padawan-diapo/padawandiapo6.png" alt="New York" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo6</h3>
                                <p>We love the BigDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/padawan-diapo/padawandiapo7.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo7</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                          </div>
                          <!-- Left and right controls -->
                          <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- fin modal -->
            <!-- test carousel fade -->
        <div id="carouselFade1" class="carousel slide carousel-fade" data-ride="carousel">
            <div id="carouselFade-inner1" class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/diapo/padawan-diapo/padawandiapo0.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item">
                <img src="img/diapo/padawan-diapo/padawandiapo1.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item">
                <img src="img/diapo/padawan-diapo/padawandiapo2.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item ">
                <img src="img/diapo/padawan-diapo/padawandiapo3.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item">
                <img src="img/diapo/padawan-diapo/padawandiapo4.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item">
                <img src="img/diapo/padawan-diapo/padawandiapo5.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item ">
                <img src="img/diapo/padawan-diapo/padawandiapo6.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselFade1" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselFade1" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
            <!-- fin carousel fade -->
        </div>
        <!-- Mon T-shirt -->
        <div class="col-lg-6">
          <a class="portfolio-item" href="https://github.com/Joaden/montshirt" target="_blank" data-content="https://github.com/Joaden/montshirt" data-type="external" rel="nofollow" role="button">
            <span class="caption">
              <span class="caption-content">
                <h4>Mon T-shirt</h4>
                <p class="mb-0">Création d'un site e-commerce de vente de vêtements<br> En utilisant le framework Laravel.<br>
                  Technologies :<br>
                  HTML/CSS, PHP, Laravel, Bootstrap, Javascript jQuery.
                  <br>Cliquer içi pour voir mon GITHUB !
                <br></p>
                <br></p>
              </span>
            </span>
            <br>
            <br>
            <img class="img-fluid" src="img/portfolio-3.jpg" alt="Website e-commerce blog site shop clothe logo t-shirt">
            <br>
            <br>
            <!-- <button type="button" class="btn btn-light"><a href="">Voir diapo du projet</a></button> -->
            <div>projet en cours: <progress value="50" max="100"></progress></div>
          </a>
          <!-- Mon T-shirt modal!!! -->
          <div class="container">
              <!-- Trigger the modal with a button -->
              <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal2">Voir diapo du projet</button> -->
              <!-- Trigger the modal with a button -->
              <button id="flip3" type="button" class="btn btn-info btn-sm btn-block">Cliquez pour voir le slide</button>
              <!-- Modal Mon T-shirt -->
              <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;
                      <h4 class="modal-title">Close project</h4></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <h2>Slide Mon T-shirt</h2>
                        <div id="myCarousel2" class="carousel slide" data-ride="carousel2">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                            <li data-target="#myCarousel" data-slide-to="6"></li>
                            <li data-target="#myCarousel" data-slide-to="7"></li>
                            <li data-target="#myCarousel" data-slide-to="8"></li>
                          </ol>
                          <!-- Wrapper for slides Mon T-shirt -->
                          <div class="carousel-inner">
                            <div class="item active">
                              <img src="img/diapo/monTshirt-diapo/tshirtdiapo0.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo1</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                              </div>
                              <div class="item">
                                <img src="img/diapo/monTshirt-diapo/tshirtdiapo1.png" alt="Chicago" style="width:100%;">
                                <div class="carousel-caption">
                                  <h3>Diapo2</h3>
                                  <p>Thank you, CDiapo</p>
                                </div>
                              </div>
                              <div class="item">
                                <img src="img/diapo/monTshirt-diapo/tshirtdiapo2.png" alt="New York" style="width:100%;">
                                <div class="carousel-caption">
                                  <h3>Diapo3</h3>
                                  <p>We love the BigDiapo</p>
                                </div>
                              </div>
                              <div class="item">
                                <img src="img/diapo/monTshirt-diapo/tshirtdiapo3.png" alt="Los Angeles" style="width:100%;">
                                <div class="carousel-caption">
                                  <h3>Diapo4</h3>
                                  <p>LA is always so muDiapo</p>
                                </div>
                              </div>
                              <div class="item">
                                <img src="img/diapo/monTshirt-diapo/tshirtdiapo4.png" alt="Chicago" style="width:100%;">
                                <div class="carousel-caption">
                                  <h3>Diapo5</h3>
                                  <p>Thank you, CDiapo</p>
                                </div>
                              </div>
                              <div class="item">
                                <img src="img/diapo/monTshirt-diapo/tshirtdiapo5.png" alt="New York" style="width:100%;">
                                <div class="carousel-caption">
                                  <h3>Diapo5</h3>
                                  <p>We love the BigDiapo</p>
                                </div>
                              </div>
                              <div class="item">
                                <img src="img/diapo/monTshirt-diapo/tshirtdiapo6.png" alt="New York" style="width:100%;">
                                <div class="carousel-caption">
                                  <h3>Diapo6</h3>
                                  <p>We love the BigDiapo</p>
                                </div>
                              </div>
                              <div class="item">
                                <img src="img/diapo/monTshirt-diapo/tshirtdiapo7.png" alt="New York" style="width:100%;">
                                <div class="carousel-caption">
                                  <h3>Diapo7</h3>
                                  <p>We love the BigDiapo</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Left and right controls Mon T-shirt -->
                          <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
            </div>
            <!-- fin modal Mon T-shirt -->
            <!-- test carousel fade -->
        <div id="carouselFade2" class="carousel slide carousel-fade" data-ride="carousel">
            <div id="carouselFade-inner2" class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/diapo/monTshirt-diapo/tshirtdiapo0.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item">
                <img src="img/diapo/monTshirt-diapo/tshirtdiapo1.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item">
                <img src="img/diapo/monTshirt-diapo/tshirtdiapo2.png" class="d-block w-100" alt="agence immobiliere website">
              </div>
              <div class="carousel-item ">
                  <img src="img/diapo/monTshirt-diapo/tshirtdiapo3.png" class="d-block w-100" alt="agence immobiliere website">
                </div>
                <div class="carousel-item">
                  <img src="img/diapo/monTshirt-diapo/tshirtdiapo4.png" class="d-block w-100" alt="agence immobiliere website">
                </div>
                <div class="carousel-item">
                  <img src="img/diapo/monTshirt-diapo/tshirtdiapo5.png" class="d-block w-100" alt="agence immobiliere website">
                </div>
                <div class="carousel-item ">
                    <img src="img/diapo/monTshirt-diapo/tshirtdiapo6.png" class="d-block w-100" alt="agence immobiliere website">
                  </div>
                  <div class="carousel-item">
                    <img src="img/diapo/monTshirt-diapo/tshirtdiapo7.png" class="d-block w-100" alt="agence immobiliere website">
                  </div>
            </div>
            <a class="carousel-control-prev" href="#carouselFade2" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselFade2" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
            <!-- fin carousel fade -->
        </div>
        <!-- CSL Training -->
        <div class="col-lg-6">
          <a class="portfolio-item" href="#" target="_blank" data-content="" data-type="external" rel="nofollow" role="button">
            <span class="caption">
              <span class="caption-content">
                <h4>CSL Training</h4>
                <p class="mb-0">Site e-commerce de vente de vêtements et accessoires<br>
                  En cours de développement avec le CMS Wordpress.
                  <br>Cliquer içi pour voir le site !
                  <br></p>
              </span>
            </span>
            <img class="img-fluid" src="img/diapo/csl-diapo/csldiapo23.png" style="max-width: 100%;" alt="logo csl">
            <br>
            <!-- <button type="button" class="btn btn-light"><a href="">Voir diapo du projet</a></button> -->
            <!-- <div>projet en cours: <progress value="22" max="100"></progress></div> -->
          </a>
          <!-- CSL Training modal!!! -->
          <div class="container">
              <!-- Trigger the modal with a button -->
              <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal3">Voir diapo du projet</button> -->
              <!-- Modal CSL Training -->
              <div class="modal fade" id="myModal3" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;
                      <h4 class="modal-title">Close project</h4></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <h2>Slide CSL Training</h2>
                        <div id="myCarousel3" class="carousel slide" data-ride="carousel3">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            <li data-target="#myCarousel" data-slide-to="5"></li>
                            <li data-target="#myCarousel" data-slide-to="6"></li>
                            <li data-target="#myCarousel" data-slide-to="7"></li>
                            <li data-target="#myCarousel" data-slide-to="8"></li>
                            <li data-target="#myCarousel" data-slide-to="9"></li>
                            <li data-target="#myCarousel" data-slide-to="10"></li>
                            <li data-target="#myCarousel" data-slide-to="11"></li>
                            <li data-target="#myCarousel" data-slide-to="12"></li>
                            <li data-target="#myCarousel" data-slide-to="13"></li>
                            <li data-target="#myCarousel" data-slide-to="14"></li>
                            <li data-target="#myCarousel" data-slide-to="15"></li>
                            <li data-target="#myCarousel" data-slide-to="16"></li>
                            <li data-target="#myCarousel" data-slide-to="17"></li>
                            <li data-target="#myCarousel" data-slide-to="18"></li>
                            <li data-target="#myCarousel" data-slide-to="19"></li>
                            <li data-target="#myCarousel" data-slide-to="20"></li>
                          </ol>
                          <!-- Wrapper for slides CSL Training -->
                          <div class="carousel-inner">
                            <div class="item active">
                              <img src="img/diapo/csl-diapo/csldiapo0.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo1</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo1.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo2</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo2.png" alt="New York" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo3</h3>
                                <p>We love the BigDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo3.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo4</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo4.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo5</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo5.png" alt="New York" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo6</h3>
                                <p>We love the BigDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo6.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo7</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo7.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo8</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo8.png" alt="New York" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo9</h3>
                                <p>We love the BiDiapo!</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo9.png" alt="Los Angeles" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo10</h3>
                                <p>LA is always so muDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo10.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo11</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo11.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo12</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo12.png" alt="Chicago" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo</h3>
                                <p>Thank you, CDiapo</p>
                              </div>
                            </div>
                            <div class="item">
                              <img src="img/diapo/csl-diapo/csldiapo13.png" alt="New York" style="width:100%;">
                              <div class="carousel-caption">
                                <h3>Diapo13</h3>
                                <p>We love the BigDiapo</p>
                              </div>
                            </div>
                          </div>
                          <!-- Left and right controls CSL Training -->
                          <a class="left carousel-control" href="#myCarousel3" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel3" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- fin modal CSL Training -->
        </div>
        <!-- Task Manager -->
        <div class="col-lg-6">
          <a class="portfolio-item" href="TaskManager/index.html" target="_blank" data-content="https://github.com/Joaden/TaskManager" data-type="external" rel="nofollow" role="button">
            <span class="caption">
              <span class="caption-content">
                <h4>Task Manager</h4>
                <p class="mb-0">Programmation d'une todo list<br>
                  Avec htlm/css javascript/jQuery.
                  <br>Cliquer içi pour voir le projet !
                  <br></p>
              </span>
            </span>
            <img class="img-fluid" src="TaskManager/img/overlay.png" alt="logo csl">
          </a>
        </div>
        <!-- Surligneur -->        
        <div class="col-lg-6">
          <a class="portfolio-item" href="Surligneur/index.html" target="_blank" data-content="https://github.com/Joaden/TaskManager" data-type="external" rel="nofollow" role="button">
            <span class="caption">
              <span class="caption-content">
                <h4>Surligneur</h4>
                <p class="mb-0">Programmation d'une todo list<br>
                  Avec htlm/css javascript/jQuery.
                  <br>Cliquer içi pour voir le projet !
                  <br></p>
              </span>
            </span>
            <img class="img-fluid" src="Surligneur/img/surligneur.png" alt="logo csl">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section id="contacts" class="content-section bg-primary text-white">
    <div class="container text-center">
      <h2 class="coucheTextRight"> N'hésitez pas à télécharger mon CV et me contacter. 
      </h2>
      <div class="row">
        <div class="col-lg-6">
          <a href="download/CVdevJanv2021.pdf" target="_blank" data-type="external" rel="nofollow" class="btn btn-xl btn-dark mr-4" download="CVdevJanv2021.pdf">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fas fa-file-pdf"></i>
            </span>Mon CV
          </a>
        </div>
        <div class="col-lg-6">
          <a href="mailto:chanet.denis@hotmail.fr" class="btn btn-xl btn-dark">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="fas fa-envelope"></i>
            </span>Me contacter
          </a>
        </div>
      </div>
      <button type="button" class="btn btn-light btn-sm btn-block"><a href="formulairePage.php">Afficher le formulaire</a></button>
    </div>
  </section>



  


  <!-- Map -->

  <section id="contact" class="map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2633.676699248463!2d2.5957225156685033!3d48.69254557927155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e60821b2908575%3A0x908fc3e2089178ca!2s3%20Route%20de%20Mandres%2C%2077170%20Brie-Comte-Robert!5e0!3m2!1sfr!2sfr!4v1597407597806!5m2!1sfr!2sfr" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    
  </section>
  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div>
        <p>
            Vous pouvez également me retrouver sur les sites suivants !
        </p>
      </div>
      <ul class="list-inline mb-5">
        <!-- <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://facebook.com/denis.chanet" target="_blank">
            <i class="icon-social-facebook"></i>
          </a>
        </li> -->
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://codepen.io/Joaden" target="_blank">
            <i class="fab fa-codepen"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="https://fr.linkedin.com/in/denis-chanet-b07366172" target="_blank">
            <i class="icon-social-linkedin"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white" href="https://github.com/Joaden/repositories" target="_blank">
            <i class="icon-social-github"></i>
          </a>
        </li>
      </ul>
      <p class="text-muted small mb-0">Copyright &copy; Denis Chanet Portfolio 2020</p>
    </div>
  </footer>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>

  <!-- Animation Header core JavaScript -->
  <script src="js/fluidtype.fade.js"></script>
  <script src="js/app.js"></script>
  <script src="js/appMeteo.js"></script>

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/stylish-portfolio.min.js"></script>
  
  <!-- Custom Carousel -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</body>
</html>
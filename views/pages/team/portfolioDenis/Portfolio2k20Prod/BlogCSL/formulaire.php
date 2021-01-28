<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Blog CSL">
  <meta name="author" content="denis-chanet.fr">

  <title>Réservation CSL Training </title>

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
<style>
  #antibot{
  display: none;
  visibility: hidden;

}
</style>

<body>

<?php 
    include 'header.php'; 
?>
   


  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">5 € seulement payable sur place ou d'avance</span>
              <span class="section-heading-lower">Formulaire de réservation</span>
            </h2>
            <p class="mb-0">Vous pouvez payer votre d'avance ou juste réserver votre place en choisissant une date dans le formulaire.Les places prépayer sont non remboursables mais échangeable pour une autre date si vous ne pouvez venir pour x raison.</p>
            <div class="intro-button mx-auto">
                <a class="btn btn-primary btn-xl" href="formulaire.html">Je réserve ma place</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; CSL Training 2020</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

/******************************** */
  <title>Denis Chanet formulaire</title>
  <link rel="canonical" href="https://www.denis-chanet.fr">
  <link rel="apple-touch-icon" href="favicon.png">

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  

</head>
<style>
  #antibot{
  display: none;
  visibility: hidden;

}
</style>
  <body id="page-top">

    <!-- Header top -->
    

  <!-- Contact Section -->
  <section class="page-section" id="contactFormulaire">
      <div class="container">

        <!-- Contact Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Formulaire de contact !</h2>

        <button type="button" class="btn btn-info btn-sm btn-block"><a href="index.php">Revenir sur le portfolio</a></button>

        
          
          <?php if(array_key_exists('errors', $_SESSION)): ?>
              <div class="alert alert-danger">
                <?= implode('<br>', $_SESSION['errors']);?>
              </div>
          <?php endif; ?>
          
          <?php  if(array_key_exists('success', $_SESSION)): ?>
              <div class="alert alert-success">
                <?= implode('<br>', $_SESSION['success']);?>
                Votre email a bien été envoyé
              </div>
          <?php endif; ?>

          
          <?php
            if(isset($reussi) && $reussi==1)
            echo "Votre message a été envoyé avec succès";
            else
            echo "<div>Veuillez remplir tous les champs</div>";
            $cookieFin = time()+60+60+24;
          ?>

        <!-- ***********Contact Section Form********** -->

        <div class="row"  id="FormulaireC">
          <div class="col-lg-8 mx-auto">

            <form action="post_contact.php" method="POST" name="sentMessage" id="contactForm">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="name">Nom</label>
                  <input name="name" class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name." value="<?php echo isset( $_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="control-group">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <label for="lastname">Prénom</label>
                    <input name="lastname" class="form-control" id="lastname" type="text" placeholder="Lastname" required="required" data-validation-required-message="Please enter your lastname." value="<?php echo isset( $_SESSION['inputs']['lastname']) ? $_SESSION['inputs']['lastname'] : ''; ?>">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="email">Adresse mail</label>
                  <input name="email" class="form-control" id="email" type="email" placeholder="example@email.com" required="required" data-validation-required-message="Please enter your email address."value="<?php echo isset( $_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>">
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="phone">Téléphone</label>
                  <input name="phone" class="form-control" maxlength="15" id="phone" type="tel" placeholder="Phone Number"  data-validation-required-message="Please enter your phone number." value="<?php echo isset( $_SESSION['inputs']['phone']) ? $_SESSION['inputs']['phone'] : ''; ?>">
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="sujet">Sujet</label>
                  <input name="sujet" class="form-control" id="sujet" rows="5" placeholder="Sujet" required="required" data-validation-required-message="Please enter a sujet." value="<?php echo isset( $_SESSION['inputs']['sujet']) ? $_SESSION['inputs']['sujet'] : ''; ?>">
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="message">Message</label>
                  <textarea name="message" class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."><?php echo isset( $_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="captcha"></label>
                  <input type="text" class="form-control" id="captcha" name="captcha" placeholder="7 + 3 = ?" autocomplete="off" required="required" data-validation-required-message="Please enter the response.">
                </div>
              </div>

                <div id="antibot" class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="antibot"></label>
                  <input type="text"  name="antibot" placeholder="" value="">
                </div>

              <div class="form-row col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="form-check pl-0">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck29" required>
                  <label class="form-check-label" for="invalidCheck29">Agree to terms and conditions</label>
                  <div class="invalid-feedback">You  shall not pass!</div>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl btn-rounded" id="inputmessage">Envoyer</button>
              </div>
            </form>

            <p style="color: red;" id="erreur"></p>

            <!--<button type="button" class="btn btn-info btn-xl btn-rounded" id="dataTest" onclick="dataFake()">dataTest</button>-->

           
          </div>
        </div>
      </div>
    </section>


    <!-- END Form -->
    

    <script src="js/appForm.js"></script>

  </body>
</html>

<?php unset($_SESSION['inputs']); ?>
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['errors']); ?>






?>
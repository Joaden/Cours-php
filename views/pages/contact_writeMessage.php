<?php 
    session_start();

    $_SESSION["varsessiontest"]= "Session de test OK";
    $pathToRootFolder = "../../";
    $PAGE_TITLE = "Contact ";

    include($pathToRootFolder."debug_functions.php");

    // Connection
    //require_once('vendor/autoload.php');

    require_once($pathToRootFolder.'config/connect.php');

    require_once($pathToRootFolder.'config/functions.php');

    require_once($pathToRootFolder.'next_src_wip_denis/Models/Article.php');

    // check if user is connected
    require($pathToRootFolder."views/common/checkSessionUser.php");
?>

<!DOCTYPE html>
<html lang="fr">

    <?php include($pathToRootFolder."views/common/head.php");?>

    <!-- style antibot should stay here -->
    <style>
        #antibot{
        display: none;
        visibility: hidden;
        }
    </style>
<body>
    <!-- =================================================== -->
    <!-- ================ DEBUT HTML  ================ -->
    <?php include($pathToRootFolder."views/common/header.php"); ?>

    <div class="container-fluid">
        <?php 
            // define a $alertMessage="..message.." if necessary
            include($pathToRootFolder."views/common/alertMessageIfExist.php");
        ?>
            <div class="container">
                <div class="row">    
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <h1><?php echo $PAGE_TITLE ?></h1>
                        <!-- H3 show var de session for check the session -->
                        <h3>
                            <?php #echo $_SESSION["varsessiontest"]; ?>
                        </h3>
                    </div>
                    <div class="col-md-4">

                    </div>

                </div>   
                <p style="color: red;" id="erreur">
                    <?php 
                        if(isset($erreur))
                        {
                        echo $erreur;  
                        }
                    ?>
                </p>



  <!-- Contact Section -->
  <section class="page-section" id="contactFormulaire">
      <div class="container">
        
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
          // optional part, Christophe, you can choose to put it or not !
            if(isset($reussi) && $reussi==1)
            echo "Votre message a été envoyé avec succès";
            else
            #echo "<div>Veuillez remplir tous les champs</div>";
          ?>



        
      
        <!-- ***********Contact Section Form********** -->

        <div class="row"  id="FormulaireC">
          <div class="col-lg-8 mx-auto">

            <form action="contact_post.php" method="POST" name="sentMessage" id="contactForm">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="name">Nom</label>
                  <input name="name" class="form-control" id="name" type="text" placeholder=" nom" required="required" data-validation-required-message="Please enter your name." value="<?php echo isset( $_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ''; ?>">
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="control-group">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <label for="lastname">Prénom</label>
                    <input name="lastname" class="form-control" id="lastname" type="text" placeholder=" prénom" required="required" data-validation-required-message="Please enter your lastname." value="<?php echo isset( $_SESSION['inputs']['lastname']) ? $_SESSION['inputs']['lastname'] : ''; ?>">
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

              <div class="form-group">
                  <label for="sujet">Objet</label>
                  <select name="sujet" class="form-control" id="sujet" placeholder=" objet" required="required" data-validation-required-message="Please enter a sujet." value="<?php echo isset( $_SESSION['option']['sujet']) ? $_SESSION['option']['sujet'] : ''; ?>">
                    <option></option>
                    <option>Subscribtion</option>
                    <option>Unsubscribe</option>
                    <option>Payments</option>
                    <option>Data</option>
                    <option>Other</option>
                  </select>
                  <p class="help-block text-danger"></p>
              </div>

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="message">Message</label>
                  <textarea name="message" class="form-control" id="message" rows="5" placeholder=" message" required="required" data-validation-required-message="Please enter a message."><?php echo isset( $_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ''; ?></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="captcha"></label>
                  <input type="text" class="form-control" id="captcha" name="captcha" placeholder="7 + 3 + 10 = ?" autocomplete="off" required="required" data-validation-required-message="Please enter the response.">
                </div>
              </div>

                <div id="antibot" class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label for="antibot"></label>
                  <input type="text"  name="antibot" placeholder="" value="">
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

<br>
    <br>
    <br>

    <!-- FOOTER -->
    <?php #include($pathToRootFolder."views/common/footer.php");?>
    <?php #include($pathToRootFolder."views/common/footer_dev_mode.php");?>
    
    <!-- ================ FIN HTML  ================ -->
    <!-- =================================================== -->

    <?php include($pathToRootFolder."views/common/load_js_scripts.php");?>
    <script src="js/appForm.js"></script>


</body>

</html>

<?php unset($_SESSION['inputs']); ?>
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['errors']); ?>
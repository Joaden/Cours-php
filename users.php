<?php 

// require_once('vendor/autoload.php');

// require_once('config/functions.php');
//  $bdd = new PDO("mysql:host=localhost;dbname=cours_denis", "root", "");

//  $req = $bdd->query('SELECT * FROM users_infos');

//  while($resultat = $req->fetch())
//  {
//   echo $resultat['users_id'] . ". date d'anniversaire le : " . $resultat['birth'] . " inscrit le : " . $resultat['date_inscription'] . " tel : " . $resultat['phone'] . "<br/>";
//  }
 

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Blog php profil</title>
    <?php 
        include("src/Views/import/header.html"); 
    ?>
    <style>
      table {
        width: 100%;
        border-collapse: collapse;
      }

      table, td, th {
        border: 1px solid black;
        padding: 5px;
      }

      th {text-align: left;}
      #notes div{
        padding: 5px;
        margin: 5px;
      }
    </style>
  </head>
  <body class="layout with-sidenav">
  <?php 
    include("src/Views/import/navbar-front.php"); 
  ?>
  <div class="container-fluid">
    <div class="container">
      <h1>Profil page</h1>
      <main>
        <hr>
        <!-- Code here the main content -->
        <button data-target="example-sidenav"
          class="btn rounded-1 press amaranth dark-1 sidenav-trigger hide-md-up">
            Open sidenav
        </button>
        <span>Choose your hero !</span>
          <img width="80px" class="sidenav-logo dropshadow-1" src="../../assets/photos/profils/super-heros (3).jpg" alt="Image profil" />
        <form>
        <select name="users" onchange="showUser(this.value)">
        <option value="">Select a person:</option>
        <option value="1">Hero</option>
        <option value="2">Hero</option>
        <option value="3">Hero</option>
        <option value="4">Hero</option>
        <option value="5">Hero</option>
        <option value="6">Hero</option>
        <option value="7">Hero</option>
        </select>
        </form>
        <br>
        <div id="txtHint"><b>Person info will be listed here.</b></div>
      </main>
    </div>
    <hr><br>
    <div id="notes" class="container shadow-1 rounded-2 bd-solid bd-3">
      <button id="myNotes"  class="btn btn-success rounded-1 press">Mes Notes</button> Intégrer le crud de la class notes, button green hide/show notes. 
      <div class="notes">
        <div id="notes-div" class="grix xs1 sm2 ">
          <div class="grix xs3 shadow-1 rounded-2 bd-blue bd-solid bd-3 ">
            <div class="col-xs3 ">
              <button class="btn btn-primary rounded-2 press">Add Notes</button> | <button class="btn btn-danger rounded-2 press">Supp Notes</button>
            </div>
            <div>box 2</div>
            <div>box 3</div>
            <div>box 4</div>
          </div>
          <div class="grix xs3 shadow-1 rounded-2 bd-blue bd-solid bd-3">
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis at, dolore itaque quisquam dolorem rem distinctio eaque! Excepturi, quasi placeat, assumenda deserunt maiores odio id recusandae, aut modi odit enim.</div>
            <div>box 2</div>
            <div>box 3</div>
          </div>
        </div>
      </div>
    </div>
    <br><hr><br>

    <?php
      // session_start();

      $bdd = new PDO("mysql:host=localhost;dbname=cours_denis", "root", "");

      // '(B) ->prepare est utilisé quand on ne connait pas la valeur
      // '(A) ->query est utilisé quand on sait ce que l'on veut récupérer
      $req = $bdd->query('SELECT * FROM users_infos');

      $req1 = $bdd->query('SELECT * FROM espèces');

      $req2 = $bdd->query('SELECT * FROM users WHERE is_verified = 1 ');

      // while($reqUserData = $req1->fetch())
      // {
      //   echo "Nom : "  . $reqUserData['name'] . ". Email : "  . $reqUserData['email'] . "<br/> Caractéristique : " ;

      // }

      while($reqUserData = $req2->fetch())
      {
        echo "Nom : "  . $reqUserData['name'] . ". Email : "  . $reqUserData['email'] . "Vérifié : oui <br/> " ;

      }

      while($resultat = $req->fetch())
      {
      echo $resultat['users_id'] . ". date d'anniversaire le : " . $resultat['birth'] . " inscrit le : " . $resultat['date_inscription'] . " tel : " . $resultat['phone'] . "<br/>";
      }


    ?>



    <?php 
      include("src/Views/import/footer.php"); 
    ?>
  </div>
  <?php

    // if($value == 1) {
    //   echo "<img width=\"80px\" class=\"sidenav-logo dropshadow-1\" src=\"../../assets/photos/profils/super-heros (2).jpg\" alt=\"Image profil\" />";
    // } elseif ($value == 2) {
    //   echo "<img width=\"80px\" class=\"sidenav-logo dropshadow-1\" src=\"../../assets/photos/profils/super-heros (3).jpg\" alt=\"Image profil\" />";
    // } elseif ($value == 3) {
    //   echo "<img width=\"80px\" class=\"sidenav-logo dropshadow-1\" src=\"../../assets/photos/profils/super-heros (4).jpg\" alt=\"Image profil\" />";
    // } elseif ($value == 4) {
    //   echo "<img width=\"80px\" class=\"sidenav-logo dropshadow-1\" src=\"../../assets/photos/profils/super-heros (5).jpg\" alt=\"Image profil\" />";
    // } elseif ($value == 5) {
    //   echo "<img width=\"80px\" class=\"sidenav-logo dropshadow-1\" src=\"../../assets/photos/profils/super-heros (6).jpg\" alt=\"\Image profil\" />";
    // } else {
    //   echo "<img width=\"80px\" class=\"sidenav-logo dropshadow-1\" src=\"../../assets/photos/profils/super-heros (7).jpg\" alt=\"Image profil\" />";
    //   } 
    //<script src="jquery-3.5.1.min.js"></script>
  ?>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function(){
      $("#myNotes").click(function(){
        $(".notes").fadeToggle("2000");
      });
    });
     

  function showUser(str) {
    if (str=="") {
      document.getElementById("txtHint").innerHTML="";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("txtHint").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.send();
  }
  </script>
  </body>
</html>

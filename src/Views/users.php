<?php 

// require_once('vendor/autoload.php');

// require_once('config/functions.php');

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php 
        include("header.html"); 
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
</style>
  </head>
  <body>
  <?php 
    include("navbar-front.php"); 
  ?>
  <span>Choose your hero !</span>
  <main>
      <!-- Code here the main content -->
      <button data-target="example-sidenav"
        class="btn rounded-1 press amaranth dark-1 sidenav-trigger hide-md-up">
          Open sidenav
      </button>

      <form>
      <select name="users" onchange="showUser(this.value)">
      <option value="">Select a person:</option>
      <option value="1">Peter Griffin</option>
      <option value="2">Lois Griffin</option>
      <option value="3">Joseph Swanson</option>
      <option value="4">Glenn Quagmire</option>
      <option value="5">Glenn Quagmire</option>
      <option value="6">Glenn Quagmire</option>
      <option value="7">Glenn Quagmire</option>
      </select>
      </form>
      <br>
      <div id="txtHint"><b>Person info will be listed here.</b></div>
  </main>
  
  <?php

    // if($value == 1)
    // <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (2).jpg" alt="Image profil" />
    // elseif($value == 2)
    // <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (3).jpg" alt="Image profil" />
    // elseif($value == 3)
    // <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (4).jpg" alt="Image profil" />
    // elseif($value == 4)
    // <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (5).jpg" alt="Image profil" />
    // elseif($value == 5)
    // <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (6).jpg" alt="Image profil" />
    // elseif($value == 6)
    // <img width="80px" class="sidenav-logo dropshadow-1" src="assets/photos/profils/super-heros (7).jpg" alt="Image profil" />
    // endif;
    
  ?>

  <script>
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

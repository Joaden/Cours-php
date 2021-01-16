# Changelogs
    (recents firsts)

### branch christophe (commit 8dec2020 15h19 )
    - added file "nommage des fichiers.txt". Let's remove it when done.
    - reactivated the old navbar for now.

### branch christophe (commit 25nov2020 20h13)
    - created a navbar_top.php
    - de-activated Axentix (css in head.php and js in footer.php)
    - correction de la balise </header> non ouverte dans connexion.php
    - created  src/Views/common/scripts_loader.html AND included in all pages files.
    - created a navbar_side.php (not filled)

### branch master (commit 24nov20 16h00)
    - add UPDATE profil(speudo & email)
    - modif profil.php / editProfil.php 
    - Test : Create a user, connexion, in profil(click on editer mon profil)

### branch christophe (commit 21nov20 17h52)
    - corrected error line 66 in functions.php

### branch christophe  (commit 21nov20 14h08)
    - added folder DOCS + files AUTHORS.md , BUGS.md , Changelog.md , INSTALL.md , NEWS.md , README.md , TODO.md
    - filled these files with informations
    - added informations and re-organised the README.md file written by Denis.
    - modifications on __.sql files
      - rename 2 files :  aaaammdd_database_installation.sql
      - move them in folder 'database_installation'

### branch newdesign 
    - moved every pages files into ./old_pages/
    - renamed folders :
      - in ./
        src             -> become old_src
        pages           -> become old_pages
      - in ./assets/
        css             -> become old_css
        js              -> become old_js
    - imported from  my 'prepa_frontend' project into this project :
      - in ./assets/    -> added folders 'js' and 'scss'
      - in ./           -> added index.php
      - in ./           -> added /views/  folder  and his content.
    - in ./views/       -> created /pages/
    - in ./views/pages  -> created /pages/home.php
    - in ./views/       -> changed the paths in every include(.....)
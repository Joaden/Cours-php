# TODO

## HOW TO USE THIS FILE

### Write your line this way

- [date] [nom ou email du demandeur] 
    [copier coller la demander, en vo ET une trad] ou noter notre phrase.

### Meaning of emojis colors

🔴 critical
🟠 important
🟡 useful
🔵 when we have time

__________________________________________________________________________________________

## CRITICAL

- [25nov 2020 19h07] Christophe

  - 🔴 the file contact.php should be in Views/common/ , as it's not a page.
  - 🔴 the file logout.php should be in Views/common/ , as it's not a page.
  - 🔴 the file redirect-mailto.php should be in Views/common/ , as it's not a page.

- [25nov 2020 19h22] Christophe
  - 🔴 use alternate PHP syntax in editProfil.php

- [25nov 2020 19h25] Christophe
  - 🔴 for each  'pageTitle'.php   >> move the script from the bottom to a separate file in assets/script/'pageTitle'.js

## IMPORTANT

- [21nov 13h24] Christophe
  - 🟠 remove one of the two images (under 'Blog Php Denis') + (under Home page)

- [21nov 13h24] Christophe
  - 🟠 hide unfinished [features, sections, buttons, ...] (better to program one thing at a time and make it fully-fonctional)

- [25nov 11h30] Christophe
  - 🟠 Navbars :  sur une copie de chaque navbar: remettre les classes en version bootstrap.
  - 🟠 Navbars :  séparer chaque navbar dans un fichier séparé.
  - 🟠 Navbars :  la navbar du haut affichera:  connexion/déconnexion ET SI CONNECTÉ : pseudo, déconnexion, photo

  - 🟠 top-navbar : nom du profil à droite

- [27nov 19h47] Christophe
  - 🟠 article.php doesn't use the common/head.php , but his head is written inline.

- [26nov 2021 23h50] Denis
  - 🟠 All fields newdesign branch
  - 🟠 integrate $session in branch session

## USEFUL

- [21nov 13h24] Christophe
  - 🟡 rename project with a more explicit name
- [21nov 13h24] Christophe
  - 🟡 rename database with a more explicit name
- [21nov 14h04] Christophe
  - 🟡 delete file 'etapes.txt' and write its content in /DOCS/ TODO.md or INSTALL.md

- [22nov 2020 23h20] Denis
  - 🟡 Choose a design [DONE]

- [27nov 2020 19h54] Christophe  [DONE]
  - 🟡 remove the checkbox "agree terms and ..." on connection page  (not coherent)

- [27nov 2020 20h00] Christophe
  - 🟡 the file connexion.php (in french) should be renamed connection.php (in english)

- [28nov 2020 16h05] Christophe
  - 🟡 create a file common/buttons_dark_light.php and move the code inside.
  - 🟡 then replace the html by the include(....buttons_dark_light.php) . 

- [28nov 2020 16h40] Christophe
  - 🟡 file indexAdmin.php :  regroup the 3 tables of Users, they are duplicates.

- [28nov 2020 16h40] Christophe
  - 🟡 file indexAdmin.php :  the tables to manage Users should be in [usersAdmin.php], not in [indexAdmin.php].

## WHEN WE HAVE TIME

- [22nov 2020 23h20] Denis
  - 🔵 bug size footer inside connexion.php [DONE]
- [22nov 2020 23h20] Denis
  - 🔵 Delete all comment(die();) in all files [DONE]
- [22nov 2020 23h40] Denis
  - 🔵 Bug button (Open Sidenav) in profil.php table and smartphone version
- [03dec 2020 15h40] Denis
  - 🔵 Lecteur audio de la description de l'article, lors de la création du post, on créé un fichier audio , on l'intègre dans une balise src en control

- [25nov 11h30] Christophe
  - 🔵 3 roles : reader (fr: ?) , writer (fr: abonnés), administrator (fr: régulateur)

- [25nov 11h30] Denis
  - 🔵 creer un fichier translate (par exemple pour traduire les noms de roles)

## IDEES A RANGER

...

## IT'S DONE ✅

- [21nov 13h24] Christophe
    🔴 rename file containing 'html head' information (BAD: 'header.php' GOOD:'head.php') ✅

- [22nov 2020 23h10] Denis => Completed tasks ✅
    🔴 integration : files register.php, connexion.php, profil.php, appForm.js and logout.php

- [22nov 2020 23h20] Denis ✅
    🔴 Integration : SCSS / VARIABLE ROOT / all include(connect.php)

- [25nov 11h30] Christophe
  - 🟠 désactiver le framework css axentix                     [DONE]

- [22nov 2020 23h16] Denis => Must be optimized [DONE]
  - 🟠 Improved the connexion form (register and connexion and $_SESSION)

- [22nov 2020 23h16] Denis
  - 🟠 Add if else with $_SESSION  login || logout [DONE]

- [25nov 11h30] Christophe
  - 🟠 Navbars :  dupliquer le code avant de toucher                [DONE]
  - 🟠 top-navbar : centrer le titre du site    [DONE]
  - 🟠 top-navbar : boutons de connexion à droite [DONE]
  - 🟠 top-navbar : role actuel du user à droite   [DONE] à gauche

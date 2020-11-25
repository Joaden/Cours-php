# TODO
## CRITICAL :
- [21nov 13h24] Christophe
    rename file containing 'html head' information (BAD: 'header.php' GOOD:'head.php')

- [22nov 2020 23h10] Denis => Completed tasks
    integration : files register.php, connexion.php, profil.php, appForm.js and logout.php
- [22nov 2020 23h20] Denis
    Integration : SCSS / VARIABLE ROOT / all include(connect.php)


## IMPORTANT :

- [21nov 13h24] Christophe
    remove one of the two navbars
- [21nov 13h24] Christophe
    remove one of the two images (under 'Blog Php Denis') + (under Home page)
- [21nov 13h24] Christophe
    hide unfinished [features, sections, buttons, ...] (better to program one thing at a time and make it fully-fonctional)

- [22nov 2020 23h16] Denis => Must be optimized
    Improved the connexion form (register and connexion and $_SESSION)
- [22nov 2020 23h16] Denis 
    Add if else with $_SESSION  login || logout


## USEFUL
- [21nov 13h24] Christophe
    rename project with a more explicit name
- [21nov 13h24] Christophe
    rename database with a more explicit name
- [21nov 14h04] Christophe
    delete file 'etapes.txt' and write its content in /DOCS/ TODO.md or INSTALL.md

- [22nov 2020 23h20] Denis
    Choose a design

## WHEN WE HAVE TIME
- ...

- [22nov 2020 23h20] Denis
    bug size footer inside connexion.php
- [22nov 2020 23h20] Denis
    Delete all comment(die();) in all files
- [22nov 2020 23h40] Denis
    Bug button (Open Sidenav) in profil.php table and smartphone version 

## how to use this file:
- [date] [nom ou email du demandeur] 
    [copier coller la demander, en vo ET une trad] ou noter notre phrase.


## IDEES A RANGER :
    3 roles : reader (fr: ?) , writer (fr: abonnés), administrator (fr: régulateur)

    désactiver le framework css axentix

    navbars:
        - dupliquer le code avant de toucher
        - sur une copie de chaque navbar: remettre les classes en version bootstrap.
        - séparer chaque navbar dans un fichier séparé :
  
        - la navbar du haut affichera:  connexion/déconnexion ET SI CONNECTÉ : pseudo, déconnexion, photo, 

    top-navbar : 
        - centrer le titre du site
        - boutons de connexion à droite
        - nom du profil à droite
        - role actuel du user à droite
    
    creer un fichier translate
        - par exemple pour traduire les noms de roles

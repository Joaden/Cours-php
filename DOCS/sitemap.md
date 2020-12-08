# Homepage
index.php
    - champ recherche
    - articles les plus récents
    - boutons connexion et s'inscrire
    - (peut être un carrousel défilant 3 aricles sous la navbar ?)
===================================================================== 
# Signin / SignUp
register.php
    - formulaire d'inscription
    - acceptation des conditions générales 
        (non existantes pour l'instant)
    - boutons 'connexion' pour ceux déjà inscrits

connexion.php       (attention renommer connection.php)
    - formulaire de connexion
    - acceptation des conditions générales   [PROB] : à retirer car pas logique à la connexion

logout.php
    
===================================================================== 
# contact 

contact.php

redirect-mailto.php

===================================================================== 
# pages for 'not connected people'

article.php : 
    - afficher un article
    - formulaire pour entrer un commentaire 
    - liste de commentaires
  
===================================================================== 
# pages for 'Writers'

(createArticle.php)  not created yet  :  creation is inside articles.php  for now


articles.php :
    - créer un article (pas bien) 
    - Grille des articles 
    - champ recherche.

===================================================================== 
# pages for 'Admins'

indexAdmin.php
    - tableau de filtre de Users (par menu déroulant).
    - tableau de tous les Users : [id, nom, email, vérifié, age, pseudo].
    - tableau de Users  +  bouton 'vérifier' et 'Supprimer'.
    - tableau de Commentaires  +  bouton 'vérifier' et 'Supprimer'.

    TODO 1 => IL FAUT REGROUPER CES 3 TABLEAUX, CAR ILS FONT PRESQUE PAREIL.

    TODO 2 => CES TABLEAUX DEVRAIENT ÊTRE DANS [usersAdmin.php] pas ici.

    TODO 3 => LA PAGE indexAdmin devrait seulement afficher au choix:
        - les liens vers les différentes choses à gérer.   OU
        - un résumé des infos, DONC un tableau de bord de plusieurs encadrés : (nbr d'articles, nbr de Users à valider, nbr de personnes connectées,  nbr d'images à valider, ...)

usersAdmin.php
    - PROBLÈME : CONTIENT LES MÊMES 3 POINTS QUE indexAdmin.php.

articlesAdmin.php : 


editProfil.php


profil.php

users.php


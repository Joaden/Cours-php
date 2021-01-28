# ENONCÉ

1. Déclarer les fonctions `surligne()` et `surligneClear()`
   comme des fonctions de plugin jQuery.

2. Remplir la fonction `surligne()` qui cherche le mot en
   paramètre dans le texte de l'objet selectionné et
   insère du code :
   * `<span class="surligne">` avant le mot,
   * `</span>` après le mot.

3. Remplir la fonction `surligneClear()` dont le travail est
   de chercher, dans le texte de l'objet selectionné, 
   les balises `<span class="surligne">XXXX</span>`
   et les remplace par XXXXX (leur contenu)

4. Modifier `app.js` pour pouvoir chercher plusieurs mots
   en simultané, sans que les mots se suivent.
   
   Exemple: une recherche de "je te" doit surligner tous les "je" et tous les "te", même s'ils ne se suivent pas.

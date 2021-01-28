/*jslint browser:true, devel:true*/
/*global $, window */
$(function () {
    "use strict";

    // comme #content ne bouge pas, on a pas besoin de le re-re-re-chercher
    // a chaque appui de lettre. On le définit ici une fois pour toutes.
    var $content = $("#content");

    // fonction qui cherche les mots choisis
    function chercheMot() {
        var query, mots;
        
        query = $('#control .query > input').val();
        // console.log("Recherche de : " + query);
        
        // enlever le surlignage précédent
        $content.surligneClear();

        // on nettoie la chaîne
        query = query.replace(/[<>]/,'');

        // on découpe en un tableau de mots avec une Regexp
        // \s  => un espace (space, TAB, etc.)
        // \s+ => un ou plusieurs espaces
        var mots = query.split(/\s+/); 

        // pour chacun des mots, j'ajoute le nouveau surlignage
        mots.forEach(function(mot) {
            $content.surligne(mot);
        });
    }

    // on attache à chaque evenement input
    // la fonction qui cherche les mots
    $('#control .query > input').on('input', chercheMot);

});
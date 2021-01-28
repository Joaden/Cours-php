/*jslint browser:true, devel:true, this:true */
/*global $, window */
$(function () {
    "use strict";

    // je distingue bien mon code HTML 
    // pour ne pas le mélanger avec le reste
    var SPAN_BEGIN = '<span class="surligne">',
        SPAN_END = '</span>';

    // pour chaque SPAN fourni par $.each, 
    // on retire le SPAN du DOM
    // on pourrait récupérer span avec this (puisqu'on utilise .each)
    function enleveSpan(index, span) {
        var html, $span;

        // on jquery-fie l'objet donné
        $span = $(span);

        // on extrait son contenu (code HTML)
        html = $span.html();

        // on remplace l'objet par son propre contenu
        $span.replaceWith(html);
    }

    // on traite le texte donné pour ajouter un SPAN
    // avant et apres chaque occurence du mot 
    // et retourner le texte modifié s'il y a lieu de le modifier.
    function ajouteSpanGroup(texte, mot) {
        var position,
            fauxTexte,
            texteAvant,
            texteEntre,
            texteApres,
            texteAvecSpan;

        var espaceMemeLongueur = function(match,p1,p2,offset,str){
            return match.replace(/./g, ' ');
        };

        // on prépare un faux texte sans balises, sans entités, etc.
        fauxTexte = (
            texte
            .replace(/(<.*?>)/g, espaceMemeLongueur)
            .replace(/(&.*?;)/g, espaceMemeLongueur)
        );

        // on cherche la position du mot
        position = fauxTexte.indexOf(mot);

        // on quitte s'il n'y a rien à ajouter/modifier dans le texte
        // (car le mot n'a pas été trouvé)
        if (position < 0) {
            return texte;
        }

        // si je suis là, c'est qu'on a trouvé une position
        // on découpe le texte en morceaux
        texteAvant = texte.slice(0, position);
        texteApres = texte.slice(position + mot.length); // jusqu'à la fin
        texteEntre = SPAN_BEGIN + mot + SPAN_END;

        // on reconstruit la chaine
        // en insèrant des SPAN dans la suite du texte
        // (si des occurences du mot existent)
        texteAvecSpan = (
            texteAvant +
            texteEntre +
            // on continue sur le morceau qui n'est pas traité
            ajouteSpanGroup(texteApres, mot) 
        );

        return texteAvecSpan;
    }

    // point d'entrée n°1
    // supprime les balises SPAN de l'objet selectionné
    function surligneClear() {
        // on jquery-fie l'objet selectionné
        var $container = $(this);

        // on cherche les span (parmi les enfants de $container)
        // et pour chacun span trouvé, on l'enleve
        $container
            .find('span[class="surligne"]')
            .each(enleveSpan);
    }

    // point d'entrée n°2
    function surligne(mot) {
        var $container,
            html, nouveauHtml;

        // on quitte si le mot est pas vide
        if (mot.length < 1) { return; }

        // on jquery-fie l'objet selectionné
        $container = $(this);

        // on extrait le code HTML
        html = $container.html();

        // on ajoute autant de SPAN qu'il faut
        // dans ce code HTML (string) autour de chaque
        // occurence de mot
        nouveauHtml = ajouteSpanGroup(html, mot);

        // met le code modifié dans sa balise
        $container.html(nouveauHtml);
    }

    // on déclare les deux fonctions à jQuery 
    // (en tant que plugin)
    // elle seront désormais utilisable en tant que
    // $(selector).surligneClear et $(selector)
    $.fn.surligneClear = surligneClear;
    $.fn.surligne = surligne;
});
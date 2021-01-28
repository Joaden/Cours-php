/*jslint browser: true, white:true, devel:true */
/*global $, window */
$(function () {
    "use strict";
  
    function afficheEtape($container, options, counter) {
  
      // disparaitre
      $container
      .css({
        'white-space': 'nowrap',
        'position': 'relative'
      })
      .animate(
        {
          left: 10,
          opacity: 0
        }, 
        function () {
          // fonction qui sera appelée quand fadeOut sera terminé
          // (c-a-d que le $container n'est plus visible)
  
          // mettre à jour (remplace) le texte
          $container.text(options.texts[counter]);
  
        }
      ).animate(
        {
          left: 0,
          opacity: 1
        }, 
        function () {
          // fonction qui sera appelée quand fadeIn sera terminé
          // (c-a-d que le $container est à nouveau visible)
          // passer à la valeur suivante
          var nextCounter = (counter + 1) % options.texts.length;
  
          // on rappelle la fonction avec un contexte modifié
          setTimeout(function () {
            afficheEtape($container, options, nextCounter);
          }, options.waitTime);
          
        }
      );
    }
  
    function fluidType(selector, options) {
      // etat de mon animation à un instant T
      // chaque appel de fluidType donne naissance
      // à un état isolé/ distinct
      afficheEtape($(selector), options, 0);
    }
  
    // rendre la fonction publique
    window.fluidType = fluidType;
  });
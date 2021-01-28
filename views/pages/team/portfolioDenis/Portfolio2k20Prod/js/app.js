/*jslint browser: true, white:true, devel:true */

/*global $, fluidType*/

$(function () {

	"use strict";



	// parametres pour initialiser fluidType

    var optionsDenis = {

		// les différents textes à afficher

	    texts: ["Denis Chanet", "DAO CNT"],

		// temps d'attente une fois que le texte est affiché

		waitTime: 1250

	};



	var optionsJunior = {

		// les différents textes à afficher

		texts: ["Développeur web junior", "Logique ", "Organisé", 

		"Curieux." ],

		// temps d'attente une fois que le texte est affiché

		waitTime: 550

	};



	// appeller la fonction fluidType qui lance et réalise l'animation

	fluidType("#text-denis .dynamic1", optionsDenis);

	fluidType("#text-junior .dynamic2", optionsJunior);

});

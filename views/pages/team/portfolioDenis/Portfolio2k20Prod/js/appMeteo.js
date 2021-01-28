 /*global $, fluidType*/

 
$(function () {

	"use strict";


        
     function capitalize(str){
         return str[0].toUpperCase() + str.slice(1);

     }

    async function main(){

        console.log("start : strict");
        // 1. choper ladresse ip du pc
        
        const ip = await fetch('https://api.ipify.org?format=json')
            .then(resultat => resultat.json())
            .then(json => json.ip)
            console.log("1er fetch : " + ip);

        // http://ip-api.com/json/24.48.0.1
        const ville = await fetch('https://ip-api.com/json/' + ip)
            .then(resultat => resultat.json())
            .then(json => json.city);
                    console.log("fetch ip-api");
                    console.log("Affichage de la ville : " + ville);

        const meteo = await fetch('https://samples.openweathermap.org/data/2.5/weather?q=${ville}&appid=439d4b804bc8187953eb36d2a8c26a02')
            .then(resultat => resultat.json())
            .then(json => json);
            //const ville = json.city;
            console.log("fetch meteo");

            console.log(meteo);
        
        };

         console.log("en dehors : fin");
         console.log(meteo);

        // console.log(resultat);

        // 2. choper la ville

        // 3. choper les info meteo de la ville
        // https://samples.openweathermap.org/data/2.5/weather?q=London,uk&appid=439d4b804bc8187953eb36d2a8c26a02

        // 4. afficher les info dsur la page

    });

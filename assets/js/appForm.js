document.getElementById("contactForm").addEventListener("submit", function(e) {
    // e.preventDefault();

    var erreur;

    var inputs = this.getElementsByTagName("input");

    // for(var i = 0; i< inputs.length; i++) {
    //     if(!inputs[i].value) {
    //         erreur = "Veuillez renseigner tous les champs et répondre correctement à la question";
    //     } 
    // }

    // if(erreur) {
    //     e.preventDefault();
    //     document.getElementById("erreur").innerHTML = erreur;
    //     return false;
    // } else {
    //     alert('Formulaire envoyé');
    // }


    var name = document.getElementById("name");
    var lastname = document.getElementById("lastname");
    var email = document.getElementById("email");
    var phone = document.getElementById("phone");
    var sujet = document.getElementById("sujet");
    var message = document.getElementById("message");
    var antibot = document.getElementById("antibot");
    var captcha = document.getElementById("captcha");

    if(!name.value) {
        erreur = "Veuillez renseigner votre nom";
    }
    if(!lastname.value) {
        erreur = "Veuillez renseigner votre prénom";
    }
    if(!email.value) {
        erreur = "Veuillez renseigner votre email";
    }
    if(!sujet.value) {
        erreur = "Veuillez renseigner votre sujet";
    }
    if(!message.value) {
        erreur = "Veuillez écrire un message";
    }
    if(antibot.value) {
        erreur = "Un champs vide caché à été rempli";
    }
    if(captcha.value != 10) {
        erreur = "Veuillez répondre correctement à la question";
    }
    if(erreur) {
        e.preventDefault();
        document.getElementById("erreur").innerHTML = erreur;
        return false;
    } else {
        alert('Formulaire bien envoyé, merci !');
    }

    
})
// Function for test data form contact
// function dataFake() {

//     alert('Données test');

//     document.getElementById("name").setAttribute('value', "Doe");

//     document.getElementById("lastname").setAttribute('value', "Jhon");

//     document.getElementById("email").setAttribute('value', "Jhon.doe@gmail.fr");

//     document.getElementById("phone").setAttribute('value', "0600000000");

//     document.getElementById("sujet").setAttribute('value', "Test send mail");

//     document.getElementById("message").innerHTML = "Hello World this is my message";

    
//   }


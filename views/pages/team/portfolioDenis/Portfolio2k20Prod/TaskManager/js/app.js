$(function() {
    var taskCounter = 0;

    function filterOpen() {
        // cacher les terminées
        $(".tasklist input:checked").parent().hide();

        // afficher les en cours
        $(".tasklist input:not(:checked)").parent().fadeIn() // fadeIn = show avec un effet

        $('#filter-open, #filter-closed, #filter-all').attr('class', '');
        $('#filter-open').attr('class', 'active');
    }

    function filterClosed() {
        // cacher les terminées
        $(".tasklist input:not(:checked)").parent().hide() // fadeOut = hide avec un effet


        // afficher les en cours
        $(".tasklist input:checked").parent().fadeIn() // fadeIn = show avec un effet

        $('#filter-open, #filter-closed, #filter-all').attr('class', '');
        $('#filter-closed').attr('class', 'active');
    }

    function filterAll() {
        // afficher les en cours
        $(".tasklist input").parent().fadeIn() // fadeIn = show avec un effet

        $('#filter-open, #filter-closed, #filter-all').attr('class', '');
        $('#filter-all').attr('class', 'active');
    }

    // 1. fonction qui va être appelée lors du clic
    function addTask(ev) {
        // empeche de faire les actions par défaut pour cet evenement
        ev.preventDefault(); 


        // lire le texte du champ
        var taskName = $('.form-group [type=text]').val();
        if (taskName.length < 1) { return; }

        var taskId = 'task-' + taskCounter;
        taskCounter += 1;

        // construit le HTML puis le DOM en mémoire
        var htmlString = '<p class="task">' + 
            '<input type="checkbox" id="' + taskId + '" />' + 
            '<label for="' + taskId + '">' + taskName + '</label>' +
            '</p>';
        var $htmlElem = $(htmlString);
        // inutile pour l'instant - on l'utilisera pour la liste
       
        $('.tasklist').append($htmlElem);
        $('.form-group [type=text]').val('');
    }

    // 2. Gérer les evenements clic et l'associer au bouton
    $('#filter-open').on('click', filterOpen);
    $('#filter-closed').on('click', filterClosed);
    $('#filter-all').on('click', filterAll);

    $('.form-group [type=submit]').on('click', addTask);

////////// fonction de recherche ciblée
    
function contientAliquam(index, elem) {
    var texteDuPara = $(elem).text();
    console.log(texteDuPara);
    if (texteDuPara.match(/aliquam/i)) {
        return true;
    }
        return false;
}

$('p')
.filter(contientAliquam)
.css('background-color', 'yellow');



});

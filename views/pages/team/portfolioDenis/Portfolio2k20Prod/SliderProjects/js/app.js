$(document).ready(function () {

    var count=0;
    // var actuel= ;
    function pageBefore() {

        var $elem1 =  $('#slider > div').last().show(2000);
        $('#slider').prepend($elem1);

        //console.log("before!");
        // alert('before');

    }

    function pageAfter() {

             var $elem = $('#slider > div').first().detach();

             $('#slider').append($elem);

            // $('#slider').click(function(){
            //  var $elem = $("p").first().detach();
            //  $('body').append($elem);
            // });
        // $('#slider > div').first().hide(2000);
        // $('#slider > div').first().remove(2000);
        // $('#slider > div').hide(2000);
     
        //console.log("after!");
        // alert('after');
    }

    $("#navigation .btn-before").on('click', pageBefore);
    $("#navigation .btn-after").on('click', pageAfter);
});

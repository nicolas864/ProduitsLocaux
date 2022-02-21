$(document).ready(function(){
    $('.formRegisterAjax').submit(function (){
        var nom_societe = $('.name_society_register').val();
        var pw1 = $('.pwIns1').val();
        var pw2 = $('.pwIns2').val();
        var mail = $('.mailIns').val();
        
        $.post("register.php", {name_society: nom_societe, password1: pw1, password2: pw2, email: mail}, function (donnees){
            $('.return').html(donnees).slideDown();
            //alert("coucou");
        });
        return false;
    });
    

});
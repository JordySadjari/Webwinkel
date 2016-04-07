$(document).ready( function() {
    var loginInhoud = $('#Log').detach();
    var registerInhoud = $('#Reg').detach();
    
    
    // modaal  venster plaatsen
    $('#L').on('click', function() {
        regisVenObj.openen({inhoud: loginInhoud});
    });
    
    $('#R').on('click', function() {
        regisVenObj.openen({inhoud: registerInhoud});
    });
});
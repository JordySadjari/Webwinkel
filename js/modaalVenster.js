var regisVenObj = (function() {

    $window = $(window);
    $regisVenster = $('<div class="regis-venster"/>');
    $regisInhoud = $('<div class="regis-inhoud"/>');
    $sluitKnop = $('<span class="sluit-knop">&#10005;</span>');
    
    $regisVenster.append($regisInhoud);
    
    return {
        centreren: function() {
            // opdrachten centreren
        },
        openen: function(instellingen) {
            $regisInhoud.append(instellingen.inhoud, $sluitKnop);
            $regisVenster.appendTo('body');
            $sluitKnop.on('click', regisVenObj.sluiten);
        
        },
        sluiten: function() {
            // opdrachten sluiten
            $regisInhoud.empty().off('click',regisVenObj.sluiten)
            $regisVenster.detach();
            $window.off();
            
        }
    }
}());
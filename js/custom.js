$(document).ready(function(e) {   

    ajaxCall();
    
    $('img[usemap]').rwdImageMaps();

    $(function() {
        $('.berlin-map').maphilight();
    });
    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $('input').click(function() {
        if($('#parteifilter1').is(':checked')) { 
            $('#0').css('fill','rgba(255,0,0,1.0)')
            $('#1').css('fill','rgba(255,0,0,0.85)')
            $('#2').css('fill','rgba(255,0,0,0.7)')
            $('#3').css('fill','rgba(255,0,0,0.6)')
            $('#4').css('fill','rgba(255,0,0,0.55)')
            $('#5').css('fill','rgba(255,0,0,0.5)')
            $('#6').css('fill','rgba(255,0,0,0.45)')
            $('#7').css('fill','rgba(255,0,0,0.4)')
            $('#8').css('fill','rgba(255,0,0,0.3)')
            $('#9').css('fill','rgba(255,0,0,0.35)')
            $('#10').css('fill','rgba(255,0,0,0.2)')
            $('#11').css('fill','rgba(255,0,0,0.25)')            
        }
        if($('#parteifilter2').is(':checked')) { 
            $('#0').css('fill','rgba(0,0,0,1.0)')
            $('#1').css('fill','rgba(0,0,0,0.85)')
            $('#2').css('fill','rgba(0,0,0,0.7)')
            $('#3').css('fill','rgba(0,0,0,0.6)')
            $('#4').css('fill','rgba(0,0,0,0.55)')
            $('#5').css('fill','rgba(0,0,0,0.5)')
            $('#6').css('fill','rgba(0,0,0,0.45)')
            $('#7').css('fill','rgba(0,0,0,0.4)')
            $('#8').css('fill','rgba(0,0,0,0.3)')
            $('#9').css('fill','rgba(0,0,0,0.35)')
            $('#10').css('fill','rgba(0,0,0,0.2)')
            $('#11').css('fill','rgba(0,0,0,0.25)')            
        }
        if($('#parteifilter3').is(':checked')) { 
            $('#0').css('fill','rgba(255,214,0,1.0)')
            $('#1').css('fill','rgba(255,214,0,0.85)')
            $('#2').css('fill','rgba(255,214,0,0.7)')
            $('#3').css('fill','rgba(255,214,0,0.6)')
            $('#4').css('fill','rgba(255,214,0,0.55)')
            $('#5').css('fill','rgba(255,214,0,0.5)')
            $('#6').css('fill','rgba(255,214,0,0.45)')
            $('#7').css('fill','rgba(255,214,0,0.4)')
            $('#8').css('fill','rgba(255,214,0,0.3)')
            $('#9').css('fill','rgba(255,214,0,0.35)')
            $('#10').css('fill','rgba(255,214,0,0.2)')
            $('#11').css('fill','rgba(255,214,0,0.25)')            
        }
        if($('#parteifilter4').is(':checked')) { 
            $('#0').css('fill','rgba(49,154,206,1.0)')
            $('#1').css('fill','rgba(49,154,206,0.85)')
            $('#2').css('fill','rgba(49,154,206,0.7)')
            $('#3').css('fill','rgba(49,154,206,0.6)')
            $('#4').css('fill','rgba(49,154,206,0.55)')
            $('#5').css('fill','rgba(49,154,206,0.5)')
            $('#6').css('fill','rgba(49,154,206,0.45)')
            $('#7').css('fill','rgba(49,154,206,0.4)')
            $('#8').css('fill','rgba(49,154,206,0.3)')
            $('#9').css('fill','rgba(49,154,206,0.35)')
            $('#10').css('fill','rgba(49,154,206,0.2)')
            $('#11').css('fill','rgba(49,154,206,0.25)')            
        }
        if($('#parteifilter5').is(':checked')) { 
            $('#0').css('fill','rgba(49,154,206,1.0)')
            $('#1').css('fill','rgba(49,154,206,0.85)')
            $('#2').css('fill','rgba(49,154,206,0.7)')
            $('#3').css('fill','rgba(49,154,206,0.6)')
            $('#4').css('fill','rgba(49,154,206,0.55)')
            $('#5').css('fill','rgba(49,154,206,0.5)')
            $('#6').css('fill','rgba(49,154,206,0.45)')
            $('#7').css('fill','rgba(49,154,206,0.4)')
            $('#8').css('fill','rgba(49,154,206,0.3)')
            $('#9').css('fill','rgba(49,154,206,0.35)')
            $('#10').css('fill','rgba(49,154,206,0.2)')
            $('#11').css('fill','rgba(49,154,206,0.25)')            
        }
        if($('#parteifilter6').is(':checked')) { 
            $('#0').css('fill','rgba(100,161,45,1.0)')
            $('#1').css('fill','rgba(100,161,45,0.85)')
            $('#2').css('fill','rgba(100,161,45,0.7)')
            $('#3').css('fill','rgba(100,161,45,0.6)')
            $('#4').css('fill','rgba(100,161,45,0.55)')
            $('#5').css('fill','rgba(100,161,45,0.5)')
            $('#6').css('fill','rgba(100,161,45,0.45)')
            $('#7').css('fill','rgba(100,161,45,0.4)')
            $('#8').css('fill','rgba(100,161,45,0.3)')
            $('#9').css('fill','rgba(100,161,45,0.35)')
            $('#10').css('fill','rgba(100,161,45,0.2)')
            $('#11').css('fill','rgba(100,161,45,0.25)')            
        }
        if($('#parteifilter7').is(':checked')) { 
            $('#0').css('fill','rgba(255,136,0,1.0)')
            $('#1').css('fill','rgba(255,136,0,0.85)')
            $('#2').css('fill','rgba(255,136,0,0.7)')
            $('#3').css('fill','rgba(255,136,0,0.6)')
            $('#4').css('fill','rgba(255,136,0,0.55)')
            $('#5').css('fill','rgba(255,136,0,0.5)')
            $('#6').css('fill','rgba(255,136,0,0.45)')
            $('#7').css('fill','rgba(255,136,0,0.4)')
            $('#8').css('fill','rgba(255,136,0,0.3)')
            $('#9').css('fill','rgba(255,136,0,0.35)')
            $('#10').css('fill','rgba(255,136,0,0.2)')
            $('#11').css('fill','rgba(255,136,0,0.25)')            
        }
        if($('#parteifilter8').is(':checked')) { 
            $('#0').css('fill','rgba(49,154,206,1.0)')
            $('#1').css('fill','rgba(49,154,206,0.85)')
            $('#2').css('fill','rgba(49,154,206,0.7)')
            $('#3').css('fill','rgba(49,154,206,0.6)')
            $('#4').css('fill','rgba(49,154,206,0.55)')
            $('#5').css('fill','rgba(49,154,206,0.5)')
            $('#6').css('fill','rgba(49,154,206,0.45)')
            $('#7').css('fill','rgba(49,154,206,0.4)')
            $('#8').css('fill','rgba(49,154,206,0.3)')
            $('#9').css('fill','rgba(49,154,206,0.35)')
            $('#10').css('fill','rgba(49,154,206,0.2)')
            $('#11').css('fill','rgba(49,154,206,0.25)')            
        }
    });
});
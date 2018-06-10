//wait for the document to be loaded and then execute our scripts
$(document).ready(function(e) {   

    //function to get our data from the database
    ajaxCall();

    //initialize bootstrap popover on all elements with the data-toggle popover attribute
    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    //fill every district with correct party colors in different opacities to show the value of each district for the chosen party
    //ids for the corresponding districts:
    //0 = Mitte, 1 = Friedrichshain-Kreuzberg, 2 = Pankow, 3 = Charlottenburg-Wilmersdorf, 4 = Spandau, 5 = Steglitz-Zehlendorf
    //6 = Tempelhof-Schöneberg, 7 = Neukölln, 8 = Treptow-Köpenick, 9 = Marzahn-Hellersdorf, 10 = Lichtenberg, 11 = Reinickendorf
    
    $('input').click(function() {
        if($('#parteifilter1').is(':checked')) { 
            $('#0').css('fill','rgba(255,0,0,0.45)')
            $('#1').css('fill','rgba(255,0,0,0.2)')
            $('#2').css('fill','rgba(255,0,0,0.55)')
            $('#3').css('fill','rgba(255,0,0,1.0)')
            $('#4').css('fill','rgba(255,0,0,0.5)')
            $('#5').css('fill','rgba(255,0,0,0.85)')
            $('#6').css('fill','rgba(255,0,0,0.7)')
            $('#7').css('fill','rgba(255,0,0,0.6)')
            $('#8').css('fill','rgba(255,0,0,0.35)')
            $('#9').css('fill','rgba(255,0,0,0.25)')
            $('#10').css('fill','rgba(255,0,0,0.3)')
            $('#11').css('fill','rgba(255,0,0,0.4)')            
        }
        if($('#parteifilter2').is(':checked')) {
            $('#0').css('fill','rgba(0,0,0,0.35)')
            $('#1').css('fill','rgba(0,0,0,0.2)')
            $('#2').css('fill','rgba(0,0,0,0.55)')
            $('#3').css('fill','rgba(0,0,0,0.85)')
            $('#4').css('fill','rgba(0,0,0,0.5)') 
            $('#5').css('fill','rgba(0,0,0,1.0)')
            $('#6').css('fill','rgba(0,0,0,0.7)') 
            $('#7').css('fill','rgba(0,0,0,0.45)')
            $('#8').css('fill','rgba(0,0,0,0.3)') 
            $('#9').css('fill','rgba(0,0,0,0.4)')
            $('#10').css('fill','rgba(0,0,0,0.25)') 
            $('#11').css('fill','rgba(0,0,0,0.6)')       
        }
        if($('#parteifilter3').is(':checked')) { 
            $('#0').css('fill','rgba(255,214,0,0.55)') 
            $('#1').css('fill','rgba(255,214,0,0.35)')
            $('#2').css('fill','rgba(255,214,0,0.5)') 
            $('#3').css('fill','rgba(255,214,0,0.85)') 
            $('#4').css('fill','rgba(255,214,0,0.4)') 
            $('#5').css('fill','rgba(255,214,0,1.0)') 
            $('#6').css('fill','rgba(255,214,0,0.6)') 
            $('#7').css('fill','rgba(255,214,0,0.45)') 
            $('#8').css('fill','rgba(255,214,0,0.3)') 
            $('#9').css('fill','rgba(255,214,0,0.35)')
            $('#10').css('fill','rgba(255,214,0,0.2)')
            $('#11').css('fill',' rgba(255,214,0,0.7) ')    
        }
        if($('#parteifilter4').is(':checked')) { 
            $('#0').css('fill','rgba(49,154,206,0.35)') 
            $('#1').css('fill','rgba(49,154,206,0.25)')
            $('#2').css('fill','rgba(49,154,206,1.0)') 
            $('#3').css('fill','rgba(49,154,206,0.55)') 
            $('#4').css('fill','rgba(49,154,206,0.3)') 
            $('#5').css('fill','rgba(49,154,206,0.85)') 
            $('#6').css('fill','rgba(49,154,206,0.7)') 
            $('#7').css('fill','rgba(49,154,206,0.2)') 
            $('#8').css('fill','rgba(49,154,206,0.4)') 
            $('#9').css('fill','rgba(49,154,206,0.6)') 
            $('#10').css('fill','rgba(49,154,206,0.45)') 
            $('#11').css('fill','rgba(49,154,206,0.5)')        
        }
        if($('#parteifilter5').is(':checked')) { 
            $('#0').css('fill','rgba(223, 4, 4,0.55)')
            $('#1').css('fill','rgba(223, 4, 4,0.5)')
            $('#2').css('fill','rgba(223, 4, 4,0.85)') 
            $('#3').css('fill','rgba(223, 4, 4,0.3)')
            $('#4').css('fill','rgba(223, 4, 4,0.25)')
            $('#5').css('fill','rgba(223, 4, 4,0.35)')
            $('#6').css('fill','rgba(223, 4, 4,0.4)')
            $('#7').css('fill','rgba(223, 4, 4,0.45)')
            $('#8').css('fill','rgba(223, 4, 4,1.0)') 
            $('#9').css('fill','rgba(223, 4, 4,0.6)') 
            $('#10').css('fill','rgba(223, 4, 4,0.7)') 
            $('#11').css('fill','rgba(223, 4, 4,0.2)')            
        }
        if($('#parteifilter6').is(':checked')) { 
            $('#0').css('fill','rgba(100,161,45,0.6)')
            $('#1').css('fill','rgba(100,161,45,1.0)')
            $('#2').css('fill','rgba(100,161,45,0.85)')
            $('#3').css('fill','rgba(100,161,45,0.55)')
            $('#4').css('fill','rgba(100,161,45,0.5)')
            $('#5').css('fill','rgba(100,161,45,0.2)')
            $('#6').css('fill','rgba(100,161,45,0.7)')
            $('#7').css('fill','rgba(100,161,45,0.45)')
            $('#8').css('fill','rgba(100,161,45,0.3)')
            $('#9').css('fill','rgba(100,161,45,0.25)')
            $('#10').css('fill','rgba(100,161,45,0.35)')
            $('#11').css('fill','rgba(100,161,45,0.4)')           
        }
        if($('#parteifilter7').is(':checked')) {
            $('#0').css('fill','rgba(255,136,0,0.7)') 
            $('#1').css('fill','rgba(255,136,0,0.55)') 
            $('#2').css('fill','rgba(255,136,0,1.0)') 
            $('#3').css('fill','rgba(255,136,0,0.45)') 
            $('#4').css('fill','rgba(255,136,0,0.2)') 
            $('#5').css('fill','rgba(255,136,0,0.4)') 
            $('#6').css('fill','rgba(255,136,0,0.6)') 
            $('#7').css('fill','rgba(255,136,0,0.85)')
            $('#8').css('fill','rgba(255,136,0,0.3)') 
            $('#9').css('fill','rgba(255,136,0,0.35)') 
            $('#10').css('fill','rgba(255,136,0,0.5)') 
            $('#11').css('fill','rgba(255,136,0,0.25)')           
        }
        if($('#parteifilter8').is(':checked')) { 
            $('#0').css('fill','rgba(242, 0, 30,0.3)')
            $('#1').css('fill','rgba(242, 0, 30,0.25)')
            $('#2').css('fill','rgba(242, 0, 30,0.6)')
            $('#3').css('fill','rgba(242, 0, 30,0.2)')
            $('#4').css('fill','rgba(242, 0, 30,0.45)')
            $('#5').css('fill','rgba(242, 0, 30,0.35)')
            $('#6').css('fill','rgba(242, 0, 30,0.4)')
            $('#7').css('fill','rgba(242, 0, 30,0.55)')
            $('#8').css('fill','rgba(242, 0, 30,0.85)')
            $('#9').css('fill','rgba(242, 0, 30,1.0)')
            $('#10').css('fill','rgba(242, 0, 30,0.7)')
            $('#11').css('fill','rgba(242, 0, 30,0.5)')            
        }
    });
});
$(document).ready(function(e) {   

    var data = ajaxCall();   
    
    $('img[usemap]').rwdImageMaps();
    
    $(function() {
        $('.berlin-map').maphilight();
    });
    $(function () {
        $('[data-toggle="popover"]').popover()
    });
    var waehlerzahl = 12;
    $('#steglitz-zehlendorf').attr('data-html', 'true').attr('data-content','<div class="popover-content"><ul class="popover-list"><li>' + waehlerzahl + '</li><li>' + waehlerzahl + '</li></ul></div>');    
    $('#mitte').attr('data-html', 'true');

    $('input').click(function() {
        if($('#parteifilter1').is(':checked')) { 
            $('#mitte').css('fill','grey')
        }
        if($('#parteifilter2').is(':checked')) { 
            $('#friedrichshain-kreuzberg').css('fill','orange')
        }
        if($('#parteifilter3').is(':checked')) { 
            $('#pankow').css('fill','blue')
        }
        if($('#parteifilter4').is(':checked')) { 
            $('#charlottenburg-wilmersdorf').css('fill','red')
        }
    });
});
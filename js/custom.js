$(document).ready(function(e) {   

    var data = ajaxCall();   
    
    $('img[usemap]').rwdImageMaps();
    
    $(function() {
        $('.berlin-map').maphilight();
    });
    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $('input').click(function() {
        if($('#parteifilter1').is(':checked')) { 
            $('#0').css('fill','grey')
        } else {
            $('#0').css('fill','#28c57a')
        }
        if($('#parteifilter2').is(':checked')) { 
            $('#1').css('fill','orange')
        }
        if($('#parteifilter3').is(':checked')) { 
            $('#2').css('fill','blue')
        }
        if($('#parteifilter4').is(':checked')) { 
            $('#3').css('fill','red')
        }
    });
});
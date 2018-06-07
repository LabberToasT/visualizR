$(document).ready(function(e) {
    
    var data = test();
    
    $('img[usemap]').rwdImageMaps();
    
    $(function() {
        $('.berlin-map').maphilight();
    });
    $(function () {
        $('[data-toggle="popover"]').popover()
    });
    var waehlerzahl = 12;
    $('#steglitz-zehlendorf').attr('data-html', 'true').attr('data-content','<div class="popover-content"><ul class="popover-list"><li>' + waehlerzahl + '</li></ul></div>');    
    
    console.log(data);
    
});
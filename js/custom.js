$(document).ready(function(e) {
    $('img[usemap]').rwdImageMaps();
    
    $(function() {
        $('.berlin-map').maphilight();
    });
    $(function () {
        $('[data-toggle="popover"]').popover()
    });
    var waehlerzahl = 12;
    $('path').attr('data-html', 'true').attr('data-content','<div class="popover-content"><ul class="popover-list"><li>' + waehlerzahl + '</li></ul></div>').css("fill", "#ccc");
});
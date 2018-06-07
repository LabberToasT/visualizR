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
    
    
    
    function test123(_callback) {
        var data = test();
        _callback(data);
    };
    
    function test456(){
        test123(function(data){
            console.log(data[0]['bezirk_name']);
        });
    };
    
});
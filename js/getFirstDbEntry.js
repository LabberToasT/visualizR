//Das ist ein beispiel, um zu zeigen, dass man auch dynmaisch über javascript neue daten vom server abfragen kann
//und somit nicht jedes mal die ganze seite vom server anzufragen

function queryData() {
//alternative möglichkeit über javascript anfragen an den server zu senden ohne JQuery
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && 200 == this.status) {

            console.log(this.responseText);
            return this.responseText;
        }
    };
    xmlhttp.open("POST", "/api/all_election_results", true);
    xmlhttp.send();
}

function ajaxCall() {
//möglichkeit um mit JQuery anfragen an den server zu senden
    $.ajax({
        'dataType': 'JSON',
        'method': 'POST',
        'url': "http://localhost/api/all_election_results",
        'data': {
            //hier kann man die post parameter übergeben, welche dann im code mittels $request->paramPost()->get('PARAMETER_NAME') ausgelesen werden können
        },
        'beforeSend': function() {
            //funktion die vor dem senden der anfrage ausgefüht wird
        },
        'success': function(data) {
            //funktion die aufgerufen wird, wenn die anfrage verarbeitet wurde und kein fehler ausgegeben wurde
            //die rückgabe des servers ist in der variable "data" gespeichert
            console.log(data); 
            var nMitte = data[0]['bezirk_name'];
            var waeMitte = data[0]['gueltig'];
            var spdMitte = data[0]['spd'];
            var cduMitte = data[0]['cdu'];
            var linkeMitte = data[0]['die_linke'];
            var afdMitte = data[0]['afd'];
            var dieParteiMitte = data[0]['die_partei'];
            var fdpMitte = data[0]['fdp'];
            var piratenMitte = data[0]['piraten'];
            var grueneMitte = data[0]['gruene'];              
            $('#mitte').attr('data-content','<div class="popover-content"><ul class="popover-list"><li>Gültige Stimmen: ' + waeMitte + '</li><li>SPD: ' + spdMitte + '</li><li>CDU: ' + cduMitte + '</li><li>FDP: ' + fdpMitte + '</li><li>Piraten: ' + piratenMitte + '</li><li>Grüne: ' + grueneMitte + '</li><li>AFD: ' + afdMitte + '</li></ul></div>'); 
            return data;
        },
        'error': function() {
            //funktion die aufgerufen wurde, wenn ein fehler bei der verabeitung auf dem server aufgetreten ist
            //könnte man zum beispiel mit dem folgenden snipped generisch abgefangen werden:
            alert('Sorry a error occured!');
        },
        'complete': function() {
            //funktion die augerufen wird, wenn response oder error handling abgeschlossen wurde
        }
    })
}
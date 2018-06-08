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
    $.ajax({
        'dataType': 'JSON',
        'method': 'POST',
        'url': "http://localhost/api/all_election_results",
        'data': {
        },
        'beforeSend': function() {
        },
        'success': function(data) {
            var i;
            var liste = "";
            var element;
            for (i = 0; i < data.length; i++) {
                var current = 0;
                for (element in data[i]) {
                    current++;
                    //todo: entfernen
                    if (current == 9) {
                        break;
                    }
                    liste += '<li>' + element + ': ' + data[i][element] + '</li>';
                }
                $('#' + i).attr('data-content','<div class="popover-content"><ul class="popover-list">' + liste + '</ul></div>');
                liste = "";
            }  
            return data;
        },
        'error': function() {
            alert('Sorry a error occured!');
        },
        'complete': function() {
        }
    })
}
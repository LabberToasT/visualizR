function getDataForParty(party) {

    $.ajax({
        'dataType': 'JSON',
        'method': 'POST',
        'url': "http://localhost:8888/api/party_election_results",
        'data': {
            //hier kann man die post parameter übergeben, welche dann im code mittels $request->paramPost()->get('PARAMETER_NAME') ausgelesen werden können
            request_party: district
        },
        'beforeSend': function() {
            //funktion die vor dem senden der anfrage ausgefüht wird
        },
        'success': function(districtData) {

            console.log(districtData);
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
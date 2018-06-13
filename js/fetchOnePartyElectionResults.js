function fetchElectionDataForParty(party) {

    $.ajax({
        'dataType': 'JSON',
        'method': 'POST',
        'url': "http://localhost:8888/api/party_election_results", //todo remove port
        'data': {

            // parameter which is send with the request
            requested_party: party
        },
        'success': function (districtData) {

            console.log(districtData);
        },
        'error': function () {
            // error handling
            alert('Sorry an error occurred!');
        }
    })
}
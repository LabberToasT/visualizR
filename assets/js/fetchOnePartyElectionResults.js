function fetchElectionDataForParty(party) {

    $.ajax({
        'dataType': 'JSON',
        'method': 'POST',
        'url': "http://localhost/api/party_election_results",
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
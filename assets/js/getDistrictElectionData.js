function getDataToDistrict(district) {

    $.ajax({
        'dataType': 'JSON',
        'method': 'POST',
        'url': "http://localhost:8888/api/district_election_results",// todo remove port
        'data': {

            // parameter which is send with the post request
            requested_district: district
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
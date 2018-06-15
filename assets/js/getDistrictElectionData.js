function getDataToDistrict(district) {

    $.ajax({
        'dataType': 'JSON',
        'method': 'POST',
        'url': "http://localhost/api/district_election_results",
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
function fetchAllElectionResults() {

    // asynchronous request to the server
    $.ajax({
        'dataType': 'JSON',// return type = json string
        'method': 'POST',// server query to be handled as post request
        'url': "http://localhost:8888/api/all_election_results", // url of endpoint todo remove port
        'success': function (allElectionResults) {

            var districtIndex;
            var list = "";
            for (districtIndex = 0; districtIndex < allElectionResults.length; districtIndex++) {

                var party;
                var counter = 0;
                // now we loop through all parties in the response json to build the html for the individual district pop ups
                for (party in allElectionResults[districtIndex]) {

                    list += '<li>' + party + ': ' + allElectionResults[districtIndex][party] + '</li>';

                    //stop loop execution after the first 8 entries
                    if (7 === counter++) {
                        break;
                    }
                }
                // build party entry html for the pop up list
                $('#' + districtIndex).attr('data-content', '<div class="popover-content"><ul class="popover-list">' + list + '</ul></div>');

                // clear list for next district
                list = "";
            }
        },
        'error': function () {
            // error handling if the server responded with status other than 200
            alert('Sorry a error occured!');
        }
    });
}
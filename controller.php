<?php
/**
 * Controller that handles all incoming traffic.
 * Is a url route matched then the corresponding callback is invoked.
 */
include 'assets/config/config.php';

use db\DbAdmin;
use Klein\Request;
use Klein\Response;
use Klein\ServiceProvider;
use template\Template;

require_once __DIR__ . '/vendor/autoload.php';
require_once 'autoloader.php';

$klein = new \Klein\Klein();
$klein->respond(
    function (Request $request, Response $response, ServiceProvider $service) use ($CONFIG) {
        
        // configure database connection for all requests
        $dbConfig = $CONFIG[ENV];
        $conn = new DbAdmin($dbConfig['dbName'], $dbConfig['user'], $dbConfig['password']);
        
        // save databse connection object in ServiceProvider
        $service->db = $conn;
    }
);

//#######################
//#### API Callbacks ####
//#######################

// callback that handles requests which query all election results for one party
$onePartyElectionResultsApiCallback = function (Request $request, Response $response, ServiceProvider $service) {
    
    /** @var DbAdmin $conn */
    $conn = $service->db;
    
    // extract requested party from the request
    $requestedParty = $request->paramsPost()->get('requested_party');
    
    // get election results for the specified party
    $result = $conn->getElectionDataForOneParty($requestedParty);
    
    // append results to the response as json encoded string
    $response->append(json_encode($result));
};
$klein->respond(
    'POST', // define accepted request type
    '/api/party_election_results', // define exposed endpoint
    $onePartyElectionResultsApiCallback // define behaviour that is triggered when a request with the specified type and url reaches the controller
);

// callback that handles requests which query all election results for one district
$districtElectionResultsApiCallback = function (Request $request, Response $response, ServiceProvider $service) {
    
    /** @var DbAdmin $conn */
    $conn = $service->db;
    
    $requestedDistrict = $request->paramsPost()->get('requested_district');
    
    $result = $conn->getResultsForOneDistrict($requestedDistrict);
    
    $response->append(json_encode($result));
};
$klein->respond(
    'POST',
    '/api/district_election_results',
    $districtElectionResultsApiCallback
);

// callback that handles requests which query all election results
$allElectionResultsApiCallback = function (Request $request, Response $response, ServiceProvider $service) {
    /** @var DbAdmin $conn */
    $conn = $service->db;
    
    $result = $conn->getElectionResults();
    
    // sort party result arrays descending
    foreach ($result as $key => $district) {
        
        natcasesort($district);
        unset($district['gueltig'], $district['gesamt']);
        $result[$key] = array_reverse($district);
    }
    
    $response->append(json_encode($result));
};
$klein->respond(
    'POST',
    '/api/all_election_results',
    $allElectionResultsApiCallback
);

//#######################
//######## Views ########
//#######################

// callback that is invoked when the main landing page is requested
$indexCallback = function (Request $request, Response $response, ServiceProvider $service) {
    
    // load default page
    $defaultPage = new Template('views/berlinMap.html');
    
    // append the page to the response
    $response->append($defaultPage->render());
};
$klein->respond(
    'GET',
    '/',
    $indexCallback
);

$klein->dispatch();

<?php
include 'config/config.php';

use db\DbAdmin;
use Klein\Request;
use Klein\Response;
use Klein\ServiceProvider;
use template\Template;
use api\GetFirstDBRow;

require_once __DIR__ . '/vendor/autoload.php';
require_once 'autoloader.php';

$klein = new \Klein\Klein();
$klein->respond(function (Request $request, Response $response, ServiceProvider $service) use ($CONFIG) {

    $dbConfig = $CONFIG[ENV];
    $conn = new DbAdmin($dbConfig['dbName'], $dbConfig['user'], $dbConfig['password']);
    $service->db = $conn;
});


//#######################
//#### API Callbacks / In den Controller schieben ####
//#######################

$apiCallback = function(Request $request, Response $response, ServiceProvider $service) {
    
    $getFirstDbRow = new GetFirstDBRow($request);
    $result = $getFirstDbRow->getFirstDbRow($service);
    
    $response->append($result);
};
$klein->respond('GET', '/api/first_row', $apiCallback);


// Test if controller AllResultsControlle.php works by commenting this part (keep the klein->respond here?)
$allElectionResultsApiCallback = function(Request $request, Response $response, ServiceProvider $service) {

    /** @var DbAdmin $conn */
    $conn = $service->db;
    
    $result = $conn->getElectionResults();
    
    $response->append(json_encode($result));
};
// test for controller class: $allElectionResultsApiCallback = new AllResultsController();
$klein->respond(['POST', 'GET'], '/api/all_election_results', $allElectionResultsApiCallback);


//#######################
//######## Pages ########
//#######################

$testCallback = function(Request $request, Response $response, ServiceProvider $service) {

    $testPage = new Template('views/testHtmlFile.html');
    $response->append($testPage->render());
};
$klein->respond(['GET', 'POST'], '/test', $testCallback);

$indexCallback = function (Request $request, Response $response, ServiceProvider $service) {
    
    $defaultPage = new Template('views/berlinMap.html');
    $response->append($defaultPage->render());
};
$klein->respond('GET', '/', $indexCallback);

$klein->dispatch();

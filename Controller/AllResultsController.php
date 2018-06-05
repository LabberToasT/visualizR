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
$allElectionResultsApiCallback = function(Request $request, Response $response, ServiceProvider $service) {
    
    
    /** @var DbAdmin $conn */
    $conn = $service->db;
    
    $result = $conn->getElectionResults();
    
    $response->append(json_encode($result));
};
$klein->respond('POST', '/api/all_election_results', $allElectionResultsApiCallback);
    

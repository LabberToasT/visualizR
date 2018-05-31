<?php
include 'config/config.php';

use db\DbAdmin;
use Klein\Request;
use Klein\Response;
use Klein\ServiceProvider;
use template\Template;

require_once __DIR__ . '/vendor/autoload.php';
require_once 'autoloader.php';

$klein = new \Klein\Klein();
$klein->respond(function (Request $request, Response $response, ServiceProvider $service) use ($CONFIG) {

    $dbConfig = $CONFIG[ENV];
    $conn = new DbAdmin($dbConfig['dbName'], $dbConfig['user'], $dbConfig['password']);
    $service->db = $conn;
});

$testCallback = function(Request $request, Response $response, ServiceProvider $service) {

    return 'Hallo ich bin auch da';
};
$klein->respond(['GET', 'POST'], '/test', $testCallback);

$indexCallback = function (Request $request, Response $response, ServiceProvider $service) {
    
    $defaultPage = new Template('views/berlinMap.php');
    $response->append($defaultPage->render());
};
$klein->respond('GET', '/', $indexCallback);

$klein->dispatch();

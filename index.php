<?php
include("config/config.php");

use db\DbAdmin;
use Klein\Request;
use Klein\Response;
use Klein\ServiceProvider;
use template\Template;

require_once __DIR__ . '/vendor/autoload.php';
require_once('autoloader.php');

$klein = new \Klein\Klein();
$klein->respond(function (Request $request, Response $response, ServiceProvider $service) use ($CONFIG) {

    $dbConfig = $CONFIG[ENV];
    $conn = new DbAdmin($dbConfig['dbName'], $dbConfig['user'], $dbConfig['password']);
    $service->db = $conn;
});

$indexCallback = function (Request $request, Response $response, ServiceProvider $service) {

    echo $request->pathname();
    $defaultPage = new Template('views/index.php');
    $response->append($defaultPage->render());
};
$klein->respond('GET', '/', $indexCallback);
$klein->respond('GET', '/test', $indexCallback);

$klein->dispatch();

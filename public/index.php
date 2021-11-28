<?php 

ini_set('display_errors', 1);
require_once(dirname(__FILE__, 2) . '/src/config/config.php');

$parsedUri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$uri = urldecode($parsedUri);

if ($uri === "/" || $uri === "" || $uri === "/index.php") {
    $uri = "/dayRecordsController.php";
}

require_once(CONTROLLER_PATH . "/{$uri}");

?>
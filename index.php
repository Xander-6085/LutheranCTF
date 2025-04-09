<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,PUT,POST,DELETE,GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Required-With");

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$uri = explode("/", $uri);

$requestMethod = $_SERVER["REQUEST_METHOD"]; 

$path = null;
if (isset($uri[2])) {
    $path = $uri[2];
}

/*if (isset($uri[1]) && $uri[1] != "index" && $uri[1] != ""){
    switch ($uri[1]) {
        case "sleep":
            $controller = new SleepController($requestMethod, $pdo);
            $controller->processRequest();
            break;
        case "leaderboard":
        case "users":
            $controller = new UserController($requestMethod, $path, $pdo);
            $controller->processRequest();
            break;
    }
}
else {
    header("Location: landing.php");
}
*/

header("Location: landing.html");

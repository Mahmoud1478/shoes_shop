<?php
ob_start();
require_once 'autoload.php';

use Cores\DotEnv;
use Cores\Response;
use Http\Request;
use Session\Session;
use Http\Server;

$session = new Session();
$session->start();

$server = new Server($_SERVER);

$request = Request::capture($server);
$response = new Response($request, $session);

$env = DotEnv::CreateFromDir(__DIR__);

define('APP_NAME', $env->get('APP_NAME'));

require_once 'config.php';

require_once 'helpFunctions.php';
//
//echo 11;
//try {
//    throw new \Cores\Exception('123654');
//} catch (Exception $exception) {
////    var_dump($exception);
//    echo 123;
//    $response->serverError()->sendJson((array)$exception);
//}

//$body = json_decode(http_get_request_body());
//var_dump(http_get_request_body());
//die();
//$response->sendJson(json_last_error());
;
//$fh   = file_get_contents('php://input', 'r');

//var_dump($fh);
//die();

$response->created()->sendJson([
//    'server' => $server->all(),
    'header' => $request->headers(),
    'request' => $request->all(),
    'body' => [],
    'excepts_json' => $request->expectsJson()
]);








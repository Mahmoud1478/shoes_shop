<?php
ob_start();

use Cores\DotEnv;
use Http\Request;
use Session\Session;
use Http\Server;

require_once 'autoload.php';
$env = DotEnv::CreateFromDir(__DIR__);
$session = new Session();
$session->start();
$server = new Server($_SERVER);
$request = Request::capture($server);

require_once 'config.php';
require_once 'helpFunctions.php';


dd($server->script_name);








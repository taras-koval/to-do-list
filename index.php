<?php

// FRONT CONTROLLER

// General settings
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Include system files
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

// Run the Router
$router = new Router();
$router->run();

?>
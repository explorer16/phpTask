<?php

require_once __DIR__.'/vendor/autoload.php';

session_start();

$router = new \Routes\Router();
$router->callController();


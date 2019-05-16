<?php

/**
 * Composer autoloader
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and exception handling
 */
error_reporting(E_ALL);
set_error_handler('Framework\Error::errorHandler');
set_exception_handler('Framework\Error::exceptionHandler');

function prevardump($x) {
    echo "<pre>";
    var_dump($x);
    echo "</pre>";
}

$router = new Framework\Router();

if (!isset($_SERVER['REDIRECT_URL'])) {
    $_SERVER['REDIRECT_URL'] = "";
}

$router->add('', ['controller' => 'Standard', 'action' => 'index']);
$router->add('/', ['controller' => 'Standard', 'action' => 'index']);
$router->add('/{controller}', ['action' => 'index']);
$router->add('/{controller}/', ['action' => 'index']);
$router->add('/{controller}/{action}');

$router->parseActionParameter($_SERVER['QUERY_STRING']);
$router->dispatch($_SERVER['REDIRECT_URL']);

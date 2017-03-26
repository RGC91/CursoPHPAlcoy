<?php
require 'config/autoload.php'; // Comprueba la ruta
use CasoP\Bootstrap\Request;
$request = new Request();

$controller = $request->getParam('controller') ?? 'page';

$controller = ucfirst($controller) . 'Controller';
$controller = 'CasoP\\Pisos\Controller\\'. $controller;

$action = $request->getParam('action') ?? 'index';

$controller = new $controller;

$controller->$action($request->getParam('id'));

?>
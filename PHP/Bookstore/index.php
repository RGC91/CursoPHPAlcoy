<?php
require 'config/autoload.php'; // Comprueba la ruta
use Talentum\Bootstrap\Request;
$request = new Request();

$controller = $request->getParam('controller') ?? 'page';

$controller = ucfirst($controller) . 'Controller';
$controller = 'Talentum\\Bookstore\Controller\\'. $controller;

$action = $request->getParam('action') ?? 'index';

$controller = new $controller;

$controller->$action($request->getParam('id'));

?>
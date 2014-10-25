<?php 
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection(); // Route Rule Set
$routes->add('hello', new Route('/hello/{name}', 
	array('name' => 'World')));
$routes->add('bye', new Route('/bye'));
$routes->add('foo', new Route('/foo'));
$routes->add('goo', new Route('/goo'));
?>
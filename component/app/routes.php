<?php 
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection(); // Route Rule Set
$routes->add('hello', new Route('/hello/{name}/{school}', 
	array(
		'_controller'	=> 'HelloController::actionIndex'
		)
	)
);
$routes->add('bye', new Route('/bye',
	array(
		'_controller' => 'ByeController::actionIndex'
		)
	)
);
$routes->add('home', new Route('/',
	array(
		'_controller' => 'HomeController::actionIndex'
		)
	)
);

return $routes;
?>
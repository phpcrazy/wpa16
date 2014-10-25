<?php 

define("DD" , __DIR__ . "/..");
require DD . "/vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

// Get the user request object
$request = Request::createFromGlobals();

include DD . '/app/routes.php';

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
	$anon = $matcher->match($request->getPathInfo());
	var_dump($anon);
	die();
	ob_start();
	include sprintf( DD . '/app/view/%s.php', $_route);
	$response = new Response(ob_get_clean());
} catch(ResourceNotFoundException $e) {
	$response = new Response('Not Found', 404);
} catch(Exception $e) {
	$response = new Reponse('An error occured', 500);
}
$response->send();
?>
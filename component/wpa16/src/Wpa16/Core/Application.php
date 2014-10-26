<?php namespace Wpa16\Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

class Application 
{
	private $request;
	private $context;

	public function __construct() {
		$this->request = Request::createFromGlobals();
		$this->context = new RequestContext();
		$this->context->fromRequest($this->request);
	}

	public function run() {
		$routes = include DD . '/app/routes.php';
		$matcher = new UrlMatcher($routes, $this->context);
		try {
			extract($matcher->match($this->request->getPathInfo()));
			ob_start();
			include sprintf( DD . '/app/view/%s.php', $_route);
			$response = new Response(ob_get_clean());
		} catch(ResourceNotFoundException $e) {
			$response = new Response('Not Found', 404);
		} catch(Exception $e) {
			$response = new Reponse('An error occured', 500);
		}
		$response->send();
	}
}
?>

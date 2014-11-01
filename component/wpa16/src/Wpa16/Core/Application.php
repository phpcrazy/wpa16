<?php namespace Wpa16\Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
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
			$this->request->attributes->add($matcher->match($this->request->getPathInfo()));
			$resolver = new ControllerResolver();
			$controller = $resolver->getController($this->request);
			$arguments = $resolver->getArguments($this->request, $controller);
			$response = new Response(call_user_func_array($controller, $arguments));

		} catch(ResourceNotFoundException $e) {
			$response = new Response('Not Found', 404);
		} catch(Exception $e) {
			$response = new Reponse('An error occured', 500);
		}
		$response->send();
	}
}
?>

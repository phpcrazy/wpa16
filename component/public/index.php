<?php 

define("DD" , __DIR__ . "/..");

require DD . "/vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
var_dump($request);

 ?>
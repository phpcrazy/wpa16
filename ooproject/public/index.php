<?php 

define("DD", __DIR__ . "/../");
require DD . "vendor/autoload.php";

$students = DB::table('students')->select(array('name', 'address', 'email'))->get();
dump($students);
$another_students = DB::table('students')->where('name', '=','Aung Aung')->get();
dump($another_students, true);
// $products = DB::table('products')->get();

$requestURI = explode('/', strtolower($_SERVER['REQUEST_URI']));
$scriptName = explode('/', strtolower($_SERVER['SCRIPT_NAME']));
$request_uri = array_diff($requestURI, $scriptName);
$request_uri = array_values($request_uri);

if(empty($request_uri)) {
$request_uri[0] = 'home';
}

$routes = include DD . 'app/routes.php';
$found_key = false;

foreach($routes as $key => $value) {
	if($request_uri[0] == $key) {
		$found_key = $key;
	}
}

if($found_key == false) {
	echo "404";
} else {
	$command = explode('@', $routes[$found_key]);
	call_user_func(array(new $command[0], $command[1]), array());
}


// switch($request_uri[0]) {
// 	case "blog":
// 		$blog = new BlogController();
// 		$blog->index();
// 		break;
// 	case "home":
// 		$home = new HomeController();
// 		$home->index();
// 	default:
// 		echo "Home";
// 		break;
// }

?>
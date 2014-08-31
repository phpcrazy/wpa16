<?php 

// file loading
define('DD', __DIR__ . '/../');
require DD . 'wpa16/functions.php';
require DD . 'app/controller/controllers.php';
require DD . 'app/model/models.php';

$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';

// routing
switch($page) {
	case "home":
		home_controller();
		break;
	case "blog":
		blog_controller();
		break;
	default:
		echo "404";
		break;
}
?>
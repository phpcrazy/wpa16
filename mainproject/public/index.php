<?php 
define('DD', __DIR__ . '/../');
require DD . 'wpa16/functions.php';
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';

switch($page) {
	case "home":
		$data = array(
			'title'		=> 'Myannar Links',
			'another'	=> 'Hello World!'
			);
		view_loader('main', $data);
		break;
	case "blog":
		view_loader('blog');
		break;
	default:
		echo "404";
		break;
}
?>
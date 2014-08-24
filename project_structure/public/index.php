<?php 

$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';

switch($page) {
	case "home":
		$data = array(
			'title'		=> 'Myanmar Links',
			'another'	=> 'Something',
			);
		view_maker('home', $data);
		break;
	case "blog":
		view_maker('blog');
}

function view_maker($view, $data = null) {
	ob_start();
	extract($data);
	require '../' . $view . '.php';
	ob_end_flush();
}
 ?>
<?php
// $page = isset($_GET['page']) ? $_GET['page'] : 'home';
if(isset($_GET['page'])) {
	// $page = strip_tags($_GET['page']);
	$page = htmlspecialchars($_GET['page']);
} else {
	$page = "home";
}
if($page == 'home') {
	require '../home.php';
} elseif($page == 'blog') {
	require '../blog.php';
} else {
	echo "404 Not Found!";
}

?>
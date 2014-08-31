<?php 

function home_controller() {
	$data = array(
		'title' 	=> config_get('site.title'),
		'another'	=> config_get('site.another_title')
		);
	$dbname = config_get('databse.dbname');
	view_loader('main', $data);
}

function blog_controller() {
	view_loader('blog');
}

 ?>
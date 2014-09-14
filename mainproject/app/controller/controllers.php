<?php 

function home_controller() {
	$boo = config_get('garbage.how.goo');
	$data = array(
		'title' 	=> config_get('site.test.foo'),
		'another'	=> config_get('site.another_title')
		);
	$dbname = config_get('database.dbname');
	view_loader('main', $data);
}

function blog_controller() {
	view_loader('blog');
}

function student_controller() {
	$students = get_data('students', 1);
	var_dump($students);
}

 ?>
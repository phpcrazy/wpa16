<?php 

/**
* 	to load view from app view folder
*	@param string, array
*/

function view_loader($view, $data = null) {
	ob_start();
	if($data != null) {
		extract($data);
	}
	require DD . 'app/view/' . $view . '.php';
	ob_end_flush();
}

function config_get($query) {
	$e_query = explode('.', $query);
	$config_data = require DD . '/app/config/' 
		. $e_query[0] . '.php';
	array_shift($e_query);
	$result = arrayResolver($e_query, $config_data);
	return $result;
}

function dump($value, $die = false) {
	var_dump($value);
	if($die == true) {
		die();
	}
}

function arrayResolver($key, $default_array) {
	foreach ($key as $k => $value) {
		$default_array = $default_array[$value];
	}
	return $default_array;
}

?>
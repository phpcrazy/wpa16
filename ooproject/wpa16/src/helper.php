<?php 

function dump($value, $die = false) {
	var_dump($value);
	if($die == true) {
		die();
	}
}

function _arrayResolver($key, $default_array) {
	foreach ($key as $k => $value) {
		$default_array = $default_array[$value];
	}
	return $default_array;
}

 ?>
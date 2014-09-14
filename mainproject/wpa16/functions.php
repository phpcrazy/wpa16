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

/**
* to get config value from app/config folder
* @param dot separated value eg. site.test.foo
* @return array value
*/

function config_get($query) {
	$e_query = explode('.', $query);
	$config_data = require DD . '/app/config/' 
	. $e_query[0] . '.php';
	array_shift($e_query);
	$result = _arrayResolver($e_query, $config_data);
	return $result;
}

/* Helpers */

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

function get_data($table, $id = null) {
	$pdo = _connect_database();
	if($id == null) {
		$stmt = $pdo->prepare('SELECT * FROM ' . $table);
		$stmt->execute();	
	} else {
		$stmt = $pdo->prepare("SELECT * FROM " . $table 
			.  " WHERE id = :id");
		$stmt->execute(array("id" => $id));
	}
	$pdo = null;
	return $stmt->fetchAll(PDO::FETCH_ASSOC);	
}

function _connect_database() {
	$host = config_get('database.hostname');
	$dbname = config_get('database.dbname');
	$username = config_get('database.username');
	$password = config_get('database.password');
	try {
		$pdo = new PDO('mysql:host=' . $host 
			. ';dbname=' . $dbname, $username, $password);
		
		return $pdo;
	} catch(PDOException $e) {
		echo "Something wrong. Databaes connection failed!";
	} 
}



?>
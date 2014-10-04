<?php 

class Config {
	public static function get($query) {
		$e_query = explode('.', $query);
		$config_data = require DD . '/app/config/' 
		. $e_query[0] . '.php';
		array_shift($e_query);
		$result = _arrayResolver($e_query, 
			$config_data);
		return $result;
	}
}

?>
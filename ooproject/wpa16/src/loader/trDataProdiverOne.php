<?php 
class DBOne  {
	use Singleton;

	public function __construct() {
		$dsn = "mysql:dbname=" 
		. Config::get('database.dbname')
		. ";host=" . Config::get('database.hostname');
		$username = Config::get('database.username');
		$password = Config::get('database.password');
		parent::__construct($dsn, $username, $password);	
	}

	public function table() {
		
	}	
}
?>
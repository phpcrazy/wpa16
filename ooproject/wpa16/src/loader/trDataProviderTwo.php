<?php 
class DBTwo extends PDO {
	use Singleton;
	public function __construct() {
		$dsn = "mysql:dbname=wpa15_contact;host=" . Config::get('database.hostname');
		$username = Config::get('database.username');
		$password = Config::get('database.password');
		parent::__construct($dsn, $username, $password);	
	}
}
?>
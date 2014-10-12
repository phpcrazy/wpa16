<?php 

class DB {

	private static $_instance = null;
	
	private $pdo = null;
	
	private $table_data;

	public static function table($table_name) {
		if(!(self::$_instance instanceof DB)) {
			self::$_instance = new DB();
		}
		$stmt = self::$_instance->pdo->prepare("SELECT * FROM " . $table_name);
		$stmt->execute();
		self::$_instance->table_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return self::$_instance;
	}

	public function get() {
		return $this->table_data;
	}

	public function __construct() {
		echo "Constructor!";
		$host = Config::get('database.hostname');
		$dbname = Config::get('database.dbname');
		$username = Config::get('database.username');
		$password = Config::get('database.password');
		try {
			$this->pdo = new PDO('mysql:host=' . $host 
				. ';dbname=' . $dbname, $username, $password);
		} catch(PDOException $e) {
			echo "Something wrong. Databaes connection failed!";
		}
	}

	public function __destruct() {
		echo "Destructor!";
		$this->pdo = null;
	}

}

?>
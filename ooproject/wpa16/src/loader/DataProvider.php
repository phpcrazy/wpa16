<?php 

class DB {

	private static $_instance = null;
	
	private $pdo = null;
	
	private $sql_statement;

	private $select_trigger = false;

	public static function table($table_name) {
		if(!(self::$_instance instanceof DB)) {
			self::$_instance = new DB();
		}
		self::$_instance->sql_statement = " FROM " . $table_name;
		
		return self::$_instance;
	}

	public function select(array $columns) {
		$this->select_trigger = true;
		$extracted_columns = '';
		foreach($columns as $c) {
			$extracted_columns .= ", " . $c;
		}
		$extracted_columns = trim($extracted_columns, ',');
		$this->sql_statement = "SELECT" . $extracted_columns .  $this->sql_statement;
		return $this;
	}

	public function get() {
		if($this->select_trigger == true) {
			$stmt = $this->pdo->prepare($this->sql_statement);
			$this->select_trigger = false;
		} else {
			$this->sql_statement = "SELECT *" . $this->sql_statement;
			$stmt = $this->pdo->prepare($this->sql_statement);
		}
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
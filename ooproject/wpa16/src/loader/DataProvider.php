<?php 

class DB {

	private static $_instance = null;
	
	private $pdo = null;
	
	private $sql_statement;

	private $select='*';

	private $from;


	private $where;

	public static function table($table_name) {
		if(!(self::$_instance instanceof DB)) {
			self::$_instance = new DB();
		}
		self::$_instance->from = " FROM " . $table_name;
		
		return self::$_instance;
	}

	public function select(array $columns) {
		$extracted_columns = '';
		foreach($columns as $c) {
			$extracted_columns .= ", " . $c;
		}
		$extracted_columns = trim($extracted_columns, ',');
		$this->select = $extracted_columns;
		return $this;
	}

public function where($name,$opreator,$value){
$this->where=" WHERE ".$name.$opreator."'$value'";
return $this;
	}

	public function get() {
        $this->sql_statement="SELECT ".$this->select.$this->from.$this->where;
		$stmt = $this->pdo->prepare($this->sql_statement);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $this->table_data;
	}

	public function __construct() {
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
		$this->pdo = null;
	}

}

?>
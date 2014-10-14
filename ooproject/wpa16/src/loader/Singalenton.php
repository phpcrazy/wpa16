<?php 

trait Singleton {
	// A static variable to hold our single instance
	private static $_instance = null;
	private $table_data = null;

	public static function table($table_name) {
		return isset(static::$_instance)
            ? static::$_instance
            : static::$_instance = new static;
	}

	public function get() {
		return $this->table_data;
	}
}
?>
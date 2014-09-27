<?php 

class Dog {
	public $name;
	private $legs;
	public $data = array();

	public function __construct($name, $legs = 4, $tail = 1) {
		$this->name = $name;
		$this->legs = $legs;
	}
	public function __destruct() {
		// echo "Destructor Run!";
	}
	public function bark() {
		echo "Bark!";
	}
	public function dance() {
		echo "Dancing!";
	}
	public function getLegs() {
		return $this->legs;
	}

	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}
	public function __get($name) 
	{
		 if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        } 
        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
	}

	public function __call($name, $arguments) {
		var_dump($name);
		var_dump($arguments);
	}
}
$dog = new Dog("Aung Net", 4, 2);
echo $dog->getLegs();
$dog->hat = 2;
$dog->nothing = "How are you?";
echo $dog->nothing;
$value = $dog->mad('Extremely', 'Need to kill');


?>
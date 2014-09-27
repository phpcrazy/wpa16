<?php 
class Cat {
	public static $name = "Me Me";

	public static function bite() {
		echo "Bite!";
	}
	public function meow() {
		echo "Meow!";
	}
}
echo Cat::$name;
Cat::bite();
$cat->meow();
$cat = new Cat();
$cat->meow();
 ?>
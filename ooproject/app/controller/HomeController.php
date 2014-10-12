<?php 

class HomeController {
	public function __construct() {
		echo "Constructor!";
	}
	public function index() {
		View::load('home');
	}
}

 ?>
<?php 

define("DD", __DIR__ . "/../");

require DD . "vendor/autoload.php";

dump(Config::get('site.title'));

View::load('home');

 ?>
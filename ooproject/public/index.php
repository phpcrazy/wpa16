<?php 

define("DD", __DIR__ . "/../");

require DD . "vendor/autoload.php";

var_dump($_SERVER['REQUEST_URI']);
var_dump($_SERVER['SCRIPT_NAME']);


?>
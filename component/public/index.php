<?php 

define("DD" , __DIR__ . "/..");
require DD . "/vendor/autoload.php";

use Wpa16\Core\Application;

$app = new Application();
$app->run();
 ?>
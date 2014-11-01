<?php 

class HelloController {

	public function actionIndex($name, $school) {
		return "Hello Controller" . $name . $school;
	}
 }
 ?>

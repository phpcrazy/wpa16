<?php
	$test = new DOMDocument();
	$test->loadHTMLFile('home.html');
	echo $test->saveHTML();
?>
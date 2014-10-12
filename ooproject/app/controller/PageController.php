<?php 


class PageController {
	public function index() {
		echo "Hello from PageController";
	}

	public function about() {
		$data = array(
			'test'		=> 'How are you?',
			'another'	=> 'Howdy Partner'
			);
		View::load('about', $data);
	}
}

 ?>
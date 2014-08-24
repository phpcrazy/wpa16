<?php 

/**
* 	to load view from app view folder
*	@param string, array
*/

function view_loader($view, $data = null) {
	ob_start();
	if($data != null) {
		extract($data);
	}
	require DD . 'app/view/' . $view . '.php';
	ob_end_flush();
}

?>
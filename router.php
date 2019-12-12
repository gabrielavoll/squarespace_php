<?php
	$request = $_SERVER['REQUEST_URI'];

	if($request == '/' || $request == ''){
		require __DIR__ . '/app.php';
	} else if ( preg_match('%^\/jokes(\?.*)?$%', $request) ){
		require __DIR__ . '/jokes.php';
	} else {
		http_response_code(404);
	  require __DIR__ . '/404.php';
	}
?>
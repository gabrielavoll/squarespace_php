<?php
	$request = $_SERVER['REQUEST_URI'];

	if($request == '/' || $request == ''){
		require __DIR__ . '/html/index.html';
	} else if ( preg_match('%^\/jokes(\?.*)?$%', $request) ){
		require __DIR__ . '/jokes.php';
	} else {
		http_response_code(404);
	  require __DIR__ . '/html/404.html';
	}
?>
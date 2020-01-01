<?php
	require_once dirname(__DIR__) . '/vendor/autoload.php';
	$request = $_SERVER['REQUEST_URI'];

	if($request == '/' || $request == ''){
		require dirname(__DIR__)  . '/html/index.php';
	} else if ( preg_match('%^\/jokes(\?.*)?$%', $request) ){
		require dirname(__DIR__) . '/src/jokes.php';
	} else {
		http_response_code(404);
	  	require dirname(__DIR__)  . '/html/404.html';
	}
?>
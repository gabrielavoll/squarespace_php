<?php
	include 'getJokes.php';
	header("Content-Type:application/json");
	$count = is_null( $_GET["count"]) ? 1 : intval($_GET["count"]);
	if($count > 30){
		http_response_code(400);
		echo 'Supply a count of 30 or less, thats the most we can support';
		return true;
	}
	echo json_encode( getJokes($count) );
	return true;
?>
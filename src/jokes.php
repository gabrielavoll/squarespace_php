<?php
	header("Content-Type:application/json");

	$count = is_null( $_GET["count"]) ? 1 : intval($_GET["count"]);
	if($count > 30){
		http_response_code(400);
		echo 'Supply a count of 30 or less, thats the most we can support';
		return true;
	}

	function minimize($x){
		return $x["joke"];
	}

	$pages = ceil(576 / $count);
	$page_index = strval(rand(1, $pages));
	$count = strval($count);

	$url = "https://icanhazdadjoke.com/search?page=" . $page_index . "&limit=" . $count;
	$headers = [
	'User-Agent: Mi Biblioteca (https://github.com/gato333/squarespace_php)',
	'Accept: application/json'
	];

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);

	$json = json_decode($curl_response, true);
	$jokes = array_map('minimize', $json["results"]);

	echo json_encode( $jokes );
	return true;
?>
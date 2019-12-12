<?php
	function minimize($x){
		return $x["joke"];
	}

	function getJokes( $count = 1 ){
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
		return array_map( 'minimize', $json["results"]);
	}
?>
<?php 
	$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ."jokes";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 4);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT_MS, 4000);
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	$joke = json_decode($curl_response)[0];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="text-align: center;">
	<div style="position: absolute; width: 100%;">
		Your random joke:
		<div id="joke"><?php echo $joke; ?></div>
	</div>
</body>
</html>


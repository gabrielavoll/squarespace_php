<?php 

	$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ."jokes";
	/*
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);

	echo $curl_response;
	*/
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script>
	    var xmlHttp = new XMLHttpRequest();
	    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
        	document.getElementById('joke').innerHTML = JSON.parse(xmlHttp.responseText)[0];
	    }
	    xmlHttp.open("GET", "/jokes", true);
	    xmlHttp.send(null);
    </script>
</head>
<body style="text-align: center;">
	<div style="position: absolute; width: 100%;">
		Your random joke:
		<div id="joke">...loading</div>
	</div>
</body>
</html>


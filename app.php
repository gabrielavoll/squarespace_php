<?php
	include 'getJokes.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="text-align: center;">
	<div style="position: absolute; top: 45%; width: 100%;">
		Your random joke:
		<div><?php echo getJokes()[0] ?></div>
	</div>
</body>
</html>


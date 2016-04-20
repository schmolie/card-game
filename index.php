<?php

spl_autoload_register(function($classname) {
	include $classname . '.class.php';
});

	$deck1 = new Deck();
	echo $deck1->shuffleToJason();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>

	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

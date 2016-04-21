<?php

// If a sesssion is started don't start session. 
if (session_id() === "" ) {
 	session_start();
}

spl_autoload_register(function($classname) {
	include $classname . '.class.php';
});

$game = new Game;
$str = serialize($game);
file_put_contents("gamedata.dat", $str);

// $deck1 = new Deck();
// echo $deck1->shuffleToJason();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!-- 	<form method="post" action="register-player.php">
		<label>Namn</label>
		<input type="text" name="name" value="" placeholder="Skriv ditt namn">
	</form>
 -->
	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

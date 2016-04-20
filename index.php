<?php

// Start the session
session_start();

spl_autoload_register(function($classname) {
	include $classname . '.class.php';
});

<<<<<<< HEAD
$game = new Game;
$str = serialize($game);
file_put_contents("gamedata.dat", $str);

// $deck1 = new Deck();
// echo $deck1->shuffleToJason();

=======
	$deck1 = new Deck();
	echo $deck1->shuffleToJason();
>>>>>>> e80d1e7ea127654581ee097b958ecfeff4eefa5f
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
<<<<<<< HEAD
	<link rel="stylesheet" type="text/css" href="style.css">
=======
>>>>>>> e80d1e7ea127654581ee097b958ecfeff4eefa5f
</head>
<body>

	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

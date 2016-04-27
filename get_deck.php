<?php

	spl_autoload_register(function($classname) {
		include $classname . '.class.php';
	});



	//echo $deck->cardToJson();

	// Create an empty array
	$playedCards = [];
	// Push top card to topDeckCard array
	$playedCards[]= $deck->showTopCard()->getPublic();
	echo json_encode($playedCards);

	$str = serialize($game);
	file_put_contents("gamedata.dat", $str);

	//echo json_encode($deck->cardToJason());
?>



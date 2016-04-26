<?php

	spl_autoload_register(function($classname) {
		include $classname . '.class.php';
	});

	// replace with unserialize
	$game = new Game();
	$deck = $game->getDeck();

	//echo $deck->cardToJson();

	// Create an empty array
	$topDeckCard = [];
	// Push top card to topDeckCard array
	$topDeckCard[]= $deck->topCard()->getPublic();
	echo json_encode($topDeckCard);

	$str = serialize($game);
	file_put_contents("gamedata.dat", $str);

	//echo json_encode($deck->cardToJason());
?>



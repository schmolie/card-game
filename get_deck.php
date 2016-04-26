<?php
	spl_autoload_register(function($classname) {
		include $classname . '.class.php';
	});

  $str = file_get_contents('gamedata.dat');
  $game = unserialize($str);

	$deck = $game->getDeck();

	// Create an empty array
	$topDeckCard = [];

	// Push top card to topDeckCard array
	$topDeckCard[]= $deck->topCard()->getPublic();
	echo json_encode($topDeckCard);

	$str = serialize($game);
	file_put_contents("gamedata.dat", $str);
?>



<?php

	spl_autoload_register(function($classname) {
		include $classname . '.class.php';
	});
	
	$str = file_get_contents('gamedata.dat');
	$game = unserialize($str);

	// Create an empty array
	$playedCards = [];
	// Push top card to topDeckCard array
	$playedCards[]= $game -> getDeck()->showTopCard()->getPublic();
	echo json_encode($playedCards);

	$str = serialize($game);
	file_put_contents("gamedata.dat", $str);
?>



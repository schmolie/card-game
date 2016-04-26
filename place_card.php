<?php
	if (session_id() === "" ) {
	 	session_start();
	}

	spl_autoload_register(function($classname) {
		include $classname . '.class.php';
	});

	$str = file_get_contents('gamedata.dat');
  $game = unserialize($str);

	$suit = $_GET['suit'];
	$rank = $_GET['rank'];
	$value = $_GET['value'];

	$newCard = new Card($suit, $rank, $value);	

  $placeCard = $game->inPlayCard($newCard);

 	echo json_encode($newCard);

	$str = serialize($game);
	file_put_contents("gamedata.dat", $str);

?>

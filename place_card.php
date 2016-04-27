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

  //variabel som sparar resultatet av att ha försökt placera ett kort

  /*
	if isCrazy8($newcard) ersätt det senaste kortet. else
	showTopCard()->isPlayable($newcard)
  */

  //$res = ["result" => variabelen]

 	echo json_encode($newCard);

	$str = serialize($game);
	file_put_contents("gamedata.dat", $str);

?>

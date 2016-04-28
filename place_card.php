<?php
	// $placeCard = $game->inPlayCard($newCard);
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

  $isCrazyEights = $game->isCrazyEights($newCard);
  $res = ["result" => $isCrazyEights];
 // $isPlayable = $game->isPlayable($newCard); // inPlayCard()

	if ($res['result'] == true) {
 		echo json_encode($res); // returns true
	} else {
 		echo json_encode($res); // returns false
	}

	// echo "<script>console.log(". json_encode($res) .")</script>"; 

	$str = serialize($game);
	file_put_contents("gamedata.dat", $str);


// variabel som sparar resultatet av att ha försökt placera ett kort

  /*
	if isCrazy8($newcard) ersätt det senaste kortet. else
	showTopCard()->isPlayable($newcard)
  */


?>


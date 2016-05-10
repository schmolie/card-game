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

  $isCrazyEights = $game->isCrazyEights($newCard);
  $isPlayable = $game->showPlayedCard()->isPlayable($newCard);
  //$hand = $game->getPlayer($_SESSION["id"])->getHand();
  $hand = $game->getPlayer(0)->getHand();
  $res = ["eight" => $isCrazyEights, "playable" => $isPlayable, "hand" => $hand];
  $eight = $res['eight'];
  $playable = $res['playable'];

	if ($eight == true || $playable == true) {
		$game->addToPlayedCards($newCard);
		$game->getPlayer(0)->removeFromHand($newCard);
 		echo json_encode($res); // returns true

	} else {
		echo json_encode($res);
	}

	$str = serialize($game);
	file_put_contents("gamedata.dat", $str);



?>




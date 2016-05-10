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


if  ($_SESSION['id'] !== $game->getWinner()) {

  if  ($_SESSION['id'] === $game->getPlayerTurn()) {

    $isCrazyEights = $game->isCrazyEights($newCard);
    $isPlayable = $game->showPlayedCard()->isPlayable($newCard);
    $res = ["eight" => $isCrazyEights, "playable" => $isPlayable];
    $eight = $res['eight'];
    $playable = $res['playable'];

  	if ($eight == true) {
  		$game->addToPlayedCards($newCard);
   		echo json_encode($res); // returns true

  	} elseif ($playable == true) {

  		$game->addToPlayedCards($newCard);
   		echo json_encode($res); // returns false

  	} else {
  		echo json_encode($res);
  	}

   } else {
    $res = ["eight" => false, "playable" => false];
    echo json_encode($res);
  }



} else {
  $res = ["eight" => false, "playable" => false];
  echo json_encode($res);
}

	$str = serialize($game);
	file_put_contents("gamedata.dat", $str);

?>


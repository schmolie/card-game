<?php

  if (session_id() === "" ) {
    session_start();
  }

spl_autoload_register(function($classname) {
		include $classname . '.class.php';
});

$str = file_get_contents('gamedata.dat');
$game = unserialize($str);

if ($game == false) {
	echo '';
	die();
}

// vem som har vunnit
// vems tur?

$card = $game->showPlayedCard();
$hand = $game->getHandFor($_SESSION["id"]);
$turn = $game->getPlayerTurn() == $_SESSION["id"];
$winner = $game->getWinner() === null ? null : $game->getWinner() === $_SESSION["id"];
$newSuit = $game->getNewSuit();
$finalPoints = $game->getFinalPoints();
$res = ["playedCard" => $card, "hand" => $hand, "turn" => $turn, "winner" => $winner, 'id' => $_SESSION["id"], 'newSuit' => $newSuit, 'finalPoints' => $finalPoints];


echo json_encode($res);


//echo $game->showPlayedCard();

// $str = serialize($game);
// file_put_contents("gamedata.dat", $str);


?>

<?php

if (session_id() === "" ) {
 	session_start();
}

spl_autoload_register(function($classname) {
   include $classname . '.class.php';
});

$str = file_get_contents('gamedata.dat');
$game = unserialize($str);

$playerId = $_SESSION["id"];

	$suit = $_GET['suit'];
	$rank =$_GET['rank'];
	$value = $_GET['value'];

$card1 = new Card( $suit, $rank, $value);

$game -> getPlayer($playerId) -> addToHand($card1);

echo json_encode($game->getHandFor($playerId));

$str = serialize($game);
file_put_contents("gamedata.dat", $str);



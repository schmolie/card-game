<?php

if (session_id() === "" ) {
 	session_start();
}

spl_autoload_register(function($classname) {
   include $classname . '.class.php';
});

$str = file_get_contents('gamedata.dat');
$game = unserialize($str);

$playerId = 0; // $_SESSION

	$suit = $_GET['suit'];
	$rank =$_GET['rank'];
	$value = $_GET['value'];


$card1 = new Card( $suit, $rank, $value);
// echo json_encode($card1->getPublic());

$game -> getPlayer(0) -> dealCard($card1);
// echo json_encode($game -> getPlayer(0));
echo json_encode($game->getHandFor(0));

$str = serialize($game);
file_put_contents("gamedata.dat", $str);

// överföra data från javascript tll php:
//get jason parametrar ? variable namn
// Vi ska skapa en metod som ska sätta kortet från deck
// till handen när spelaren kan inte använda det.

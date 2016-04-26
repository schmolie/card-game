<?php

session_start();

spl_autoload_register(function($classname) {
   include $classname . '.class.php';
});

$str = file_get_contents('gamedata.dat');
$game = unserialize($str);

$playerId = 0; // $_SESSION

$card1 = new Card( , , )
$player = $game -> getPlayer(0) -> dealCard($topcard);

echo json_encode($game->getHandFor(0));

$str = serialize($game);
file_put_contents("gamedata.dat", $str);

// överföra data från javascript tll php:
//get jason parametrar ? variable namn 
// Vi ska skapa en metod som ska sätta kortet från deck 
// till handen när spelaren kan inte använda det.

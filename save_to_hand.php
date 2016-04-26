<?php

session_start();

spl_autoload_register(function($classname) {
   include $classname . '.class.php';
});

$str = file_get_contents('gamedata.dat');
$game = unserialize($str);

$savetohand = $deck->topCard()->addtoHand();

echo json_encode($savetohand);

$str = serialize($game);
file_put_contents("gamedata.dat", $str);

// överföra data från javascript tll php:
//get jason parametrar ? variable namn 
// Vi ska skapa en metod som ska sätta kortet från deck 
// till handen när spelaren kan inte använda det.

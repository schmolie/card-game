<?php

spl_autoload_register(function($classname) {
		include $classname . '.class.php';
});

$str = file_get_contents('gamedata.dat');
$game = unserialize($str);



// vem som har vunnit
// vems tur?


echo json_encode( $game->showPlayedCard() );

$str = serialize($game);
file_put_contents("gamedata.dat", $str);








?>

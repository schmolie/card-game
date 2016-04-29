<?php
//plockar ut och skickar till JSON.

spl_autoload_register(function($classname) {
		include $classname . '.class.php';
});

$str = file_get_contents('gamedata.dat');
$game = unserialize($str);


$topcard = $game -> getDeck() -> topCard();
// $player = $game->getPlayer(0)->dealCard($topcard);

echo json_encode([$topcard->getPublic()]);

$showlast = $game->getDeck()->showTopCard();
echo json_encode($showlast);

$str = serialize($game);
file_put_contents("gamedata.dat", $str);





?>



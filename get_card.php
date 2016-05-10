<?php
//plockar ut och skickar till JSON.


  if (session_id() === "" ) {
    session_start();
  }

spl_autoload_register(function($classname) {
		include $classname . '.class.php';
});

$str = file_get_contents('gamedata.dat');
$game = unserialize($str);


$topcard = $game -> getDeck() -> topCard();
// $player = $game->getPlayer(0)->dealCard($topcard);
echo json_encode($topcard);

// $showlast = $game->getDeck()->showTopCard();
// echo json_encode($showlast);

$str = serialize($game);
file_put_contents("gamedata.dat", $str);


// Om handet är slut hos en person då är spelet slut.
// Är det inte ens tur får man inte ta kortet från deck.
// Man får välja 8:ans suit .
// Felmeddelandet.
// Vems tur är det.
// Räkna upp poängen.


?>



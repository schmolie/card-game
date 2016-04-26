<?php

	spl_autoload_register(function($classname) {
		include $classname . '.class.php';
	});

  $str = file_get_contents('gamedata.dat');
  $game = unserialize($str);

//skapa

// $game->dealCards(1);
  $topcard = $game -> getDeck() -> topCard();
  //$player = $game -> getPlayer(0) -> dealCard($topcard);

  echo json_encode([$topcard->getPublic()]);


 $str = serialize($game);
file_put_contents("gamedata.dat", $str);

 // echo json_encode($hand);

?>
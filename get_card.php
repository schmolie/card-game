<?php

	spl_autoload_register(function($classname) {
		include $classname . '.class.php';
	});

  $str = file_get_contents('gamedata.dat');
  $game = unserialize($str);


  $topcard = $game -> getDeck() -> topCard();
 

  echo json_encode([$topcard->getPublic()]);


 $str = serialize($game);
file_put_contents("gamedata.dat", $str);


?>
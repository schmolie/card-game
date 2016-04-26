<?php

	spl_autoload_register(function($classname) {
		include $classname . '.class.php';
	});

	$suit = $_GET['suit'];
	$rank =$_GET['rank'];
	$value = $_GET['value'];

	$str = file_get_contents('gamedata.dat');
  $game = unserialize($str);

  $game->getHandFor(0)->inPlayCard($valueFromJs);

	json_encode('')

?>

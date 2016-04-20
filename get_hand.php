<?php
	session_start();

	spl_autoload_register(function($classname) {
		include $classname . '.class.php';
	});

	$id = $_SESSION['id'];

	$str = file_get_content('gamedata.dat');
	$game = unserialize($str);

	$hand = $game -> getHandFor($id);

	echo json_encode($hand);






?>

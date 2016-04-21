<?php

// If a sesssion is started don't start session. 
if (session_id() === "" ) {
 	session_start();
}

spl_autoload_register(function($classname) {
	include $classname . '.class.php';
});

$name = $_GET['name'];
$_SESSION['name'] = $name;
$str = file_get_content('gamedata.dat');
$game = unserialize($str);
$id = $game->addPlayer($name);
saveState($game);

$_SESSION['id'] = $id;

function saveState($obj) {
	$str = serialize($obj);
	file_put_contents('gamedata.dat', $str);
}

?>

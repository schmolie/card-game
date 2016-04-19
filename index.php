<?php 

spl_autoload_register(function($classname) {
	include $classname . '.class.php';
});


/*
	$deck1 = new Deck();
	echo '<pre>';
	var_dump($deck1); 
	echo '</pre>';
*/
?>

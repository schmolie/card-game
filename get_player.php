<?php

  session_start();

  spl_autoload_register(function($classname) {
    include $classname . '.class.php';
  });

  //$game = $_SESSION['game'];

  $str = file_get_contents('gamedata.dat');
  $game = unserialize($str);

  $player = $game -> addPlayer(0);

  $player -> drawfromdeck($game->getDeck()); // få in en objeckt från deck
  //get_game_started.php

  $player -> getHand();


  echo json_encode($player);

// saveState() ??? --- frysa och tyna

$deck = $_SESSION['deck'];


?>

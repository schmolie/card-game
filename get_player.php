<?php

  session_start();

  spl_autoload_register(function($classname) {
    include $classname . '.class.php';
  });

  //$game = $_SESSION['game'];

  $str = file_get_contents('gamedata.dat');
  $game = unserialize($str);

  $game->startGame();

  //$sessionId = $_SESSION['id'] ;
  $cards = $game -> getHandFor(0);
  $hand = [];
  foreach ($cards as $card) {
    $hand[] = $card->getPublic();
  }

  // $player -> drawFromDeck($game->getDeck()); // få in en objeckt från deck
  //get_game_started.php

  //$player -> getHand();

  //echo $player;
  echo json_encode($hand);

  // saveState() ??? --- frysa och tyna
  // inte frysa i game i index vid refresh startas ett nytt game
  // get_player är en hand av kort. 
  // För att plocka ett kort 

  // spara id och namn i sessionerna 
  // $deck = $_SESSION['deck'];

?>

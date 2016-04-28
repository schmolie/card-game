<?php

  if (session_id() === "" ) {
    session_start();
  }

  spl_autoload_register(function($classname) {
    include $classname . '.class.php';
  });

  //$game = $_SESSION['game'];

  $str = file_get_contents('gamedata.dat');
  $game = unserialize($str);

  $game->dealCards();

  // $sessionId = $_SESSION['id'] ;
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

  $str = serialize($game);
  file_put_contents("gamedata.dat", $str);

  // saveState() ??? --- frysa och tyna
  // inte frysa i game i index vid refresh startas ett nytt game
  // get_player är en hand av kort. 
  // För att plocka ett kort 

  // spara id och namn i sessionerna 
  // $deck = $_SESSION['deck'];


  // i get_game_started.php
  // deck, hand, spela ett kort, vems tur, game state (varje gång en spelar gör något) / separat eller i alla filer för att kolla om någon vunnit.
  // En funktion som anropas varje sekund för att kolla om spelet är:
  // ostartat = 'unstarted', 
  // pågående = 'ongoing', --> När där finns 4 spelare
  // om någon vunnit = winner, 
  // vems tur det är = 'turn'.

  // js set interval för att fråga php om game state. 
  
  // api fil för get_card.php -> ta kort från deck. 
  // api fil för place_card.php -> placera kort från hand, ovanpå topcard. 
  // 


  // get game state använder sig av Game klassen. 
  // 

?>

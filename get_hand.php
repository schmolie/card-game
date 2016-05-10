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


  echo json_encode($hand);

  $str = serialize($game);
  file_put_contents("gamedata.dat", $str);



?>

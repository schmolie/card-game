<?php
	if (session_id() === "" ) {
	 	session_start();
	}

	spl_autoload_register(function($classname) {
		include $classname . '.class.php';
	});

	$str = file_get_contents('gamedata.dat');
  $game = unserialize($str);


	$suit = $_GET['suit'];
	$rank = $_GET['rank'];
	$value = $_GET['value'];
  $changeSuit = $_GET['changeSuit'];

	$newCard = new Card($suit, $rank, $value);



if  ($_SESSION['id'] !== $game->getWinner()) {

  if  ($_SESSION['id'] === $game->getPlayerTurn()) {

    $isCrazyEights = $game->isCrazyEights($newCard);
    $isPlayable = $game->showPlayedCard()->isPlayable($newCard);



    if ($game->getNewSuit() !== null) {
      if ($newCard->getSuit() == $game->getNewSuit()) {
        $isPlayable = true;
      } else {
        $isPlayable = false;
      }
    }

    $res = ["eight" => $isCrazyEights, "playable" => $isPlayable];
    $eight = $res['eight'];
    $playable = $res['playable'];

  	if ($eight == true ) {
      $game->changeSuit($changeSuit);
      $game->getPlayer($_SESSION['id'])->removeFromHand($newCard);
      $game->addToPlayedCards($newCard);//******
     
      echo json_encode($res);

    } else if ( $playable == true) {
      $game->changeSuit(null);
      $game->getPlayer($_SESSION['id'])->removeFromHand($newCard);
  		$game->addToPlayedCards($newCard);
    
     
   		echo json_encode($res); // returns true

  	} else {
  		echo json_encode($res);
  	}

    } else {
      $res = ["eight" => false, "playable" => false, "turn" => "darn"];
      echo json_encode($res);
  }

} else {
  $res = ["eight" => false, "playable" => false, "winner" => $game->getWinner(), "session_id" => $_SESSION['id']];
  echo json_encode($res);
}

	$str = serialize($game);
	file_put_contents("gamedata.dat", $str);



?>




<?php
// If a sesssion is started don't start a session.
if (session_id() === "" ) {
 	session_start();
}

	class Game {
		private $players = [];
		public $playedCards = [];
		public $deck;
		private $gameState;
		// state = unstartade
		// winner = none
		// turn =

		/*

			{
				"playedCard: {
					"rank": 4,
					"suit": 4,
					"value": 4,
				},
				"winner": "none" | id
				"turn": 2
			}

			// playCard
			*/

    // (startGame?) gameState = not started
    // not enough players and then change to started when there is 4 players
    // detta hämtas i game_get_started.php

		function __construct(){
			$this->gameState = new stdClass;
			$this->gameState->state = 'unstarted';
			$this->gameState->winner = 'none';
			$this->gameState->turn = false;

			$this->deck = new Deck;
			$this->playedCards[] = $this->deck->topCard();
			$this->players[] = new Player;
			$this->players[] = new Player;
			$this->players[] = new Player;
			$this->players[] = new Player;
			// $this->players[0];
		}

		function addToPlayedCards($card) {
			$this->playedCards[] = $card;
		}

		function isCrazyEights($card) {
      if($card->getRank() == 8) {
      	//$this->playedCards[] = $card;
      	return true;
      } else {
      	return false;
      }
			// gick det och vinna? kolla alla spelares händer
			// antingen i game eller api mtod playCard
		}

		function addPlayer($name) {
			if (count($players) < 4) {
				return array_push($this->players, new Player) -1;
			} else {
				return NULL;
			}
			// if 4 players change -> $this-gameSate()
		}

		function dealCards($handSize = 7){
	      if(count($this->players) == 4) {
	        for($i=0; $i < $handSize; $i++) {
	          foreach($this->players as $player) {
	            $player->dealCard($this->deck->topCard());
	          }
        	}
        //javascript säga till att pecka i fil som peckar i methoden.
        // addPlayer() i api class add_player.php
        // getHandFor()
        // deal7cards()
        //getCard ska ta array_push så korten ska hamna i tom ahand array.??
        //topCard ->remaining cards, när arrayen är tom
       	return TRUE;
      }
      return FALSE;
		}

		function getHandFor($id) {
			return $this->players[$id]->getHand();
		}

		function getDeck(){
			return $this->deck;
		}

		function getGameState(){
			return $this->gameState;
		}

		function addToHand(){
			return $this->dealCard($this->deck->topCard());
		}

		function getPlayer($id) {
			return $this->players[$id];
		}

		function inPlayCard($card) {
			$this->playedCards[] = $card;
			// return card object
		}
    // hämtar korten som står överst på kortleken.
		function showPlayedCard(){
			$length = count($this->playedCards);
			return $this->playedCards[$length - 1];
		}
	}
?>

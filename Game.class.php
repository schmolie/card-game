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


		function __construct(){
			$this->gameState = new stdClass;
			$this->gameState->state = 'unstarted'; // ????
			$this->gameState->winner = null;
			$this->gameState->turn = 0;

			$this->deck = new Deck;
			$this->playedCards[] = $this->deck->topCard();

		}

    public function endGame(){
      $index=0;
       foreach ($this->players as $player){
          if (count($player->getHand()) == 0){
            return $index;
          }
       }
       return null;
    }

    function getWinner(){
      return $this->gameState->winner;
    }

    private function nextPlayer() {
      if ($this->gameState->turn === 1) {
        $this->gameState->turn = 0;
      } else {
        $this->gameState->turn++;
      }

    }

    function getPlayerTurn(){
      return $this->gameState->turn;
    }

		function addToPlayedCards($card) {
      $this->gameState->winner = $this->endGame();
      $this->nextPlayer();
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
			if (count($this->players) < 4) {
        array_push($this->players, new Player);
        $numPlayers = count($this->players);
				return $numPlayers -1;
			} else {
				return NULL;
			}
			// if 4 players change -> $this-gameSate()
		}

		function dealCards($handSize = 7){
	      if(count($this->players) == 2) { // fyra splear??
	        for($i=0; $i < $handSize; $i++) {
	          foreach($this->players as $player) {
	            $player->addToHand($this->deck->topCard());
	          }
        	}
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

		function addToHand($card){
			return $this->addToHand($card);
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


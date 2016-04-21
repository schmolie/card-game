<?php
// If a sesssion is started don't start a session. 
if (session_id() === "" ) {
 	session_start();
}

	class Game {
		private $players = [];
		private $deck;
    private $handsize = 7;
    // (startGame?) gameState = not started 
    // not enough players and then change to started when there is 4 players
    // detta hämtas i game_get_started.php 

		function __construct(){
			$this->deck = new Deck;
			$this->players[] = new Player;
			$this->players[] = new Player;
			$this->players[] = new Player;
			$this->players[] = new Player;
			// $this->players[0];
		}

		function checkSuit() {

		}

		function checkRank() {

		}

		function crazyEights() {

		}

		function addPlayer($name) {
			if (count($players) < 4) {
				return array_push($this->players, new Player) -1;
			} else {
				return NULL;
			}
		}

		function startGame(){
      if(count($this->players) == 4) {
        for($i=0; $i < $this->handsize; $i++){
          foreach($this->players as $player){
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

	}
?>

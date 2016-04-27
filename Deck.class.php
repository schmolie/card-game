<?php

if (session_id() === "" ) {
	 	session_start();
}

	class Deck {
		private $suits = ["Spades", "Hearts", "Clubs", "Diamonds"];
		private $ranks = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 50, 9 => 9, 10 => 10, 11 => 10, 12 => 10, 13 => 10];
		private $playedCard;

		function __construct() {
		  foreach ($this->suits as $suit) {
		    // Create new cards
	    	foreach($this->ranks as $rank => $value) {
	    		$this->deck[] = new Card($suit, $rank, $value);
				}
		  }
		  shuffle($this->deck);
		}

		function cardToJason() {
			$results = [];

			foreach($this->deck as $card){
				array_push($results, $card->getPublic());
			}
			return $results;
		}

		function topCard() {
			return array_pop($this->deck);
		}

		function setPlayedCard($card) {
			$this -> $playedCard;
		} // när spelet startas och när någon lyckats spela kortet
		// this->deck->setplayedcard()
// när ngån anrrupas placeCard()
		function showPlayedCard(){
			return $this->$playedCard;
		}

		function showTopCard() {
			$length = count($this->deck);
			return $this->deck[$length - 1];
		}
	}
?>

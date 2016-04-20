<?php

session_start();

	class Deck {
		private $suits = ["Spades", "Hearts", "Clubs", "Diamonds"];
		private $ranks = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 50, 9 => 9, 10 => 10, 11 => 10, 12 => 10, 13 => 10];

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
    	shuffle($this->deck);

			foreach($this->deck as $card){
				array_push($results, $card->getPublic());
			}


			return json_encode($results, JSON_PRETTY_PRINT);
		}

		function topCard() {
			return array_pop($this->deck);
		}

	}
?>

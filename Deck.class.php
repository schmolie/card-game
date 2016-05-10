<?php
	if (session_id() === "" ) {
	 	session_start();
	}

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

		function topCard() {
			return array_pop($this->deck);
		}

		function showTopCard() {
			$length = count($this->deck);
			return $this->deck[$length - 1];
		}

		public function getSuits() {
			return $this->suit;
		}
	}
?>

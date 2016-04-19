<?php
	class Deck {
		private $deck = [];
		private $suits = ["Spades", "Hearts", "Clubs", "Diamonds"];
		private $ranks = ["Ace" => 1, "Two" => 2, "Three" => 3, "Four" => 4, "Five" => 5, "Six" => 6, "Seven" => 7,
		"Eight" => 50, "Nine" => 9, "Ten" => 10, "Jack" => 10, "Queen" => 10, "King" => 10];

		function __construct() {
		  foreach ($this->suits as $suit) {
		    // Create new cards
	    	foreach($this->ranks as $rank => $value) {
	    		$this->deck = new Card($suit, $rank, $value);
   				// echo "Key=" . $rank . ", Value=" . $value;
   				// echo "<br>";
				}
		  }
		}

		function shuffle() {

		}

		function topCard() {

		}

	}
?>

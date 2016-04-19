<?php
	class Deck {
		private $deck = [];
		private $suits = ["Spades", "Hearts", "Clubs", "Diamonds"];
		private $ranks = ["Ace", "Two", "Three", "Four", "Five", "Six", "Seven",
		"Eight", "Nine", "Ten", "Jack", "Queen", "King"];

		function __construct() {
		  foreach ($this->suits as $suit) {
		    foreach ($this->ranks as $rank) {
		    	// Create new cards
		    	$this->deck = new Card($suit, $rank);
		    }
		  }
		}

		function shuffle() {

		}

		function topCard() {

		}

	}
?>

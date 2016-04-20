<?php 

class Card {
	private $suit;
	private $rank;
	private $value;
	private $filePath;

	function __construct($suit, $rank) { 
		$this->suit = $suit;
		$this->rank = $rank;

		// Add images to cards
    switch($suit){
    	case 'Ace':
      	$this->filePath = '' . $suit . 'png';
      	$this->value = 1;
      	break;
    	}
  }

  public function getSuit() {
	 	return $this -> suit;
	}

	public function getRank() {
	  return $this -> rank;
	}

	public function getValue() {
	  return $this -> value;
	}

	public function getFilePath() {
	  return $this -> filepath;
	}
}

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

/*$deck1 = new Deck();
echo '<pre>';
var_dump($deck1); 
echo '</pre>';
*/
class Player extends Deck {

	function dealCard() {

	}

	function drawFromDeck() {

	}

	function inPlayCard() {

	}
}

class Game {

	function checkSuit() {

	}

	function checkRank() {

	}

	function crazyEights() {

	}

}

?>

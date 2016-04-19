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
?>

<?php
	class Card {
		private $suit;
		private $rank;
		private $value;
		private $filePath;

		function __construct($suit, $rank, $value) {
			$this->suit = $suit;
			$this->rank = $rank;
			$this->value = $value;

			// Add images to cards
	    switch($suit){
	    	case 'Ace':
	      	$this->filePath = '/cards/ace_of_' . $suit . 'png';
	      	$this->value = 1;
	      	break;

	      case 'Two':
	        $this->filePath = '/cards/2_of_' . $suit . 'png';
	        $this->value = 2;
	        break;

	         case 'Three':
	        $this->filePath = '/cards/3_of_' . $suit . 'png';
	        $this->value = 3;
	        break;


	         case 'Four':
	        $this->filePath = '/cards/4_of_' . $suit . 'png';
	        $this->value = 4;
	        break;


	         case 'Five':
	        $this->filePath = '/cards/5_of_' . $suit . 'png';
	        $this->value = 5;
	        break;


	         case 'Six':
	        $this->filePath = '/cards/6_of_' . $suit . 'png';
	        $this->value = 6;
	        break;


	         case 'Seven':
	        $this->filePath = '/cards/7_of_' . $suit . 'png';
	        $this->value = 7;
	        break;


	         case 'Eight':
	        $this->filePath = '/cards/8_of_' . $suit . 'png';
	        $this->value = 50;
	        break;


	         case 'Nine':
	        $this->filePath = '/cards/9_of_' . $suit . 'png';
	        $this->value = 9;
	        break;


	         case 'Ten':
	        $this->filePath = '/cards/10_of_' . $suit . 'png';
	        $this->value = 10;
	        break;


	         case 'Jack':
	        $this->filePath = '/cards/jack_of_' . $suit . 'png';
	        $this->value = 10;
	        break;


	         case 'Queen':
	        $this->filePath = '/cards/queen_of_' . $suit . 'png';
	        $this->value = 10;
	        break;


	         case 'King':
	        $this->filePath = '/cards/king_of_' . $suit . 'png';
	        $this->value = 10;
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

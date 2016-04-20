<?php
	class Card {
		public $suit;
		public $rank;
		public $value;
		public $filePath;

		function __construct($suit, $rank, $value) {
			$this->suit = $suit;
			$this->rank = $rank;
			$this->value = $value;

			// Add images to cards
			switch($rank){
				case 'Ace':
					echo 'HALLLLLLLLLÅ';
					break;

				case 'Two':
					$this->filePath = '<img src="/cards/2_of_' . $suit . '".png';
					break;

				case 'Three':
					$this->filePath = '/cards/3_of_' . $suit . 'png';
					break;

				case 'Four':
					$this->filePath = '/cards/4_of_' . $suit . 'png';
					break;

				case 'Five':
					$this->filePath = '/cards/5_of_' . $suit . 'png';
					break;

				case 'Six':
					$this->filePath = '/cards/6_of_' . $suit . 'png';
					break;

				case 'Seven':
					$this->filePath = '/cards/7_of_' . $suit . 'png';
					break;

				case 'Eight':
					$this->filePath = '/cards/8_of_' . $suit . 'png';
					break;

				case 'Nine':
					$this->filePath = '/cards/9_of_' . $suit . 'png';
					break;

				case 'Ten':
					$this->filePath = '/cards/10_of_' . $suit . 'png';
					break;

				case 'Jack':
					$this->filePath = '/cards/jack_of_' . $suit . 'png';
					break;

				case 'Queen':
					$this->filePath = '/cards/queen_of_' . $suit . 'png';
					break;

				case 'King':
					$this->filePath = '/cards/king_of_' . $suit . 'png';
					break;
				}
		}

		public function getSuit() {
			return $this->suit;
		}

		public function getRank() {
			return $this->rank;
		}

		public function getValue() {
			return $this->value;
		}

		public function getFilePath() {
		  return $this->filePath;
		}

		function printMe() {
			return $this->suit . "<br />" . $this->rank;
		}
	}
?>

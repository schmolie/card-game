<?php
<<<<<<< HEAD

session_start();

=======
>>>>>>> e80d1e7ea127654581ee097b958ecfeff4eefa5f
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
<<<<<<< HEAD
			if ($rank){
				$this->filePath = "cards/" . $rank . '_of_' . $suit . '.png';
			}
=======
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
>>>>>>> e80d1e7ea127654581ee097b958ecfeff4eefa5f
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
<<<<<<< HEAD
		}

		public function getPublic() {
			$res = new stdClass;
			$res->suit = $this->suit;
			$res->value = $this->value;
			$res->rank = $this->rank;
			$res->filePath = $this->filePath;
			return $res;
		}

=======
		}
>>>>>>> e80d1e7ea127654581ee097b958ecfeff4eefa5f
	}
?>

<?php

// If a sesssion is started don't start session. 
if (session_id() === "" ) {
 	session_start();
}

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
		if ($rank){
				$this->filePath = "cards/" . $rank . '_of_' . $suit . '.png';
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

		public function getPublic() {
			$res = new stdClass;
			$res->suit = $this->suit;
			$res->value = $this->value;
			$res->rank = $this->rank;
			$res->filePath = $this->filePath;
			return $res;
		}

	}
?>

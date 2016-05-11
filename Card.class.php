<?php

// If a sesssion is started don't start session.
if (session_id() === "" ) {
 	session_start();
}

	class Card /* implements JsonSerializable */{
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

		function isPlayable($card) {

			// this kommer vara topcard i detta fallet.-->playedcard i game.classe.php
			if ($card->getSuit() == $this->suit){
				return true;
			} elseif ($card->getRank() == $this->rank) {
				return true;
			}
			return false;
			// gick det och vinna? kolla alla spelares händer
		}

		function isSame($c) {

			return ($c->getSuit() === $this->suit && $c->getRank() == $this->rank);

		}
/*
		function jsonserialize() {
			return array(
				'suit' => $this->suit,
				'rank' => $this->rank,
				'value' => $this->value,
				'filepath' => $this->filePath
			);
		}*/

	}
?>

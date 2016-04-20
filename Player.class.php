<?php

	class Player {

		private $hand = [];



		function dealCard($card) {
			$this->hand[] = $card;
		}

		function drawFromDeck() {

		}

		function inPlayCard() {

		}

		function getHand(){
			return $this->hand;
		}
	}

?>

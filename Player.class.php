<?php

	class Player {

		private $hand = [];



		function dealCard($card) {
			$this->hand[] = $card;
		}

		function drawFromDeck($deck) {

		}

		function inPlayCard() {

		}

		function getHand(){
			return $this->hand;
		}
	}

?>

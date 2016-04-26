<?php

	class Player {

		private $hand = [];



		function dealCard($card) {
			$this->hand[] = $card;
		}

		function inPlayCard() {

		}

		function getHand(){
			return $this->hand;
		}


	}

?>

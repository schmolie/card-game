<?php

	class Player {

		private $hand = [];

		function dealCard($card) {
			$this->hand[] = $card;
		}

		function inPlayCard($valueFromJs) {
	
		}

		function getHand(){
			return $this->hand;
		}

	}

?>

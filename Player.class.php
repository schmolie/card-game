<?php

	class Player {

		private $hand = [];



		function dealCard($card) {
			$this->hand[] = $card;
		}


		function getHand(){
			return $this->hand;
		}

	}

?>

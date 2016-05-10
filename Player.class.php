<?php

	class Player {

		private $hand = [];

		function addToHand($card) {
			$this->hand[] = $card;
		}

		function getHand(){
			return $this->hand;
		}

		function removeFromHand($card) {
			$index = 0;
			foreach ($this->hand as $c) {

					error_log("isSameCard " . $c->isSame($card));

					if ($c->isSame($card)) {
						return array_splice($this->hand, $index, 1);
					}
					$index++;

			}
		}

	}

?>


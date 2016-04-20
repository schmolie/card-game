<?php

session_start();

	class Game {

		private $players = [];
		private $deck;

		function __construct(){
			$this->deck = new Deck;
		}


		function checkSuit() {

		}

		function checkRank() {

		}

		function crazyEights() {

		}

		function addPlayer($name) {
			if (count($players) < 4) {
				return array_push($this->players, new Player) -1;
			} else {
				return NULL;
			}
		}

		function startGame{

		}

		function getHandFor($id) {
				return $this->players[$id]->getHand();
		}

		function getDeck(){
			return $this->deck;
		}

	}
?>

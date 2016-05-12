(function() {

	var yourTurn = "<div class='statusmsgs'>It's your turn</div>";
	var notYourTurn = "<div class='statusmsgs'>It's not your turn</div>";
	var notPlayable = "<div class='statusmsgs'>It's not playable</div>";
  var hearts = "<div class='suitsMsg'>You have to play with Hearts</div>";
  var spades = "<div class='suitsMsg'>You have to play with Spades</div>";
  var clubs = "<div class='suitsMsg'>You have to play with Clubs</div>";
  var diamonds = "<div class='suitsMsg'>You have to play with Diamonds</div>";


	function replaceTopCard(filePath) {
		$( '#topcard' ).replaceWith('<img id="topcard" class="card" src="'+ filePath +'">');
	}

	$('.suits').on('click', function(){

	});

	function chooseSuit(){
		$('.suits').show();

	}

	function addToHand(data) {
		var imgElem = $('<img class="card" src="'+ data.filePath +'">').appendTo('.hand');
		imgElem.click(function(ev) {
			$.getJSON("place_card.php?suit=" + data.suit + "&rank=" + data.rank + "&value=" + data.value, function(isPlayable){
				if (isPlayable.eight === true || isPlayable.playable === true) {
					replaceTopCard(data.filePath);
					chooseSuit();
				}
			});
		});
	}

	function suitsMsg(suit){
		switch(suit){
			case "Hearts":
				$('.suitsMsg').replaceWith(hearts);
	  		$('.suitsMsg').show().delay(2000).fadeOut();

			break;
			case "Spades":
				$('.suitsMsg').replaceWith(spades);
	  		$('.suitsMsg').show().delay(2000).fadeOut();
			break;
			case "Clubs":
				$('.suitsMsg').replaceWith(clubs);
	  		$('.suitsMsg').show().delay(2000).fadeOut();
			break;
			case "Diamonds":
				$('.suitsMsg').replaceWith(diamonds);
	  		$('.suitsMsg').show().delay(2000).fadeOut();
			break;

		}
	}

	$('#join').on('click', function() {
		$.getJSON('register-player.php?name=fake', function() {
		});
	});

	$('#killswitch').on('click', function() {
		$.getJSON('reset_game.php', function() {
		});
	});

	// Card from deck:
	$('body').on('click', '.backside', function(){
		$.getJSON("get_card.php", function(cardData) {
			var newSuit;
			if (cardData.rank == 8) {
				newSuit = prompt('choose suit', '');
				//suitsMsg();
			} // ********
			$.getJSON("place_card.php?suit=" + cardData.suit + "&rank=" + cardData.rank + "&value=" + cardData.value + "&changeSuit=" + newSuit, function(playableData){
				// Place card to deck:
				if (playableData.eight === true || playableData.playable === true) {
					replaceTopCard(cardData.filePath);
				} else {
					// Place card to hand:
					$.getJSON("save_to_hand.php?suit=" + cardData.suit + "&rank=" + cardData.rank + "&value=" + cardData.value, function(handData){
						addToHand(cardData);
						console.log('no match');
					});
				}
			});
		});
	});

	$('#deal').on('click', function() {
		$.getJSON('deal_cards.php', function() {
			// Get players' hand:
			$.getJSON("get_hand.php", function(data) {
				data.forEach(function(v) {
					addToHand(v);
				});
			});
		});
	});


	function checkGameState() {
		$.getJSON("game_state.php", function(data) {

			var completeHand = $('<div class="hand"></div>');
			data.hand.forEach(function(v){
				var imgEl = $('<img class="card" src="'+ v.filePath +'">');
				imgEl.click(function(ev) {
					var newSuit;
					console.log(v, data);
					if (v.rank === 8 && data.turn === true) {
						newSuit = prompt('choose suit', '');
           }

			    $.getJSON("place_card.php?suit=" + v.suit + "&rank=" + v.rank + "&value=" + v.value + "&changeSuit=" + newSuit, function(isPlayable){
						if (data.turn === true) {
							if (isPlayable.eight === true || isPlayable.playable === true) {
								replaceTopCard(v.filePath);
							} else if(data.newSuit !== null) {
                suitsMsg(data.newSuit);
							} else {
								$('.statusmsgs').replaceWith(notPlayable);
			    			$('.statusmsgs').show().delay(2000).fadeOut();
							}
						}
					});
				});
      	completeHand.append(imgEl);
			});

			$('.hand').replaceWith(completeHand);
			replaceTopCard(data.playedCard.filePath);

			if (data.hand.length > 0) {
				if (data.turn === true) {
					$('.statusmsgs').replaceWith(yourTurn);
			    $('.statusmsgs').show();
				} else {
					$('.statusmsgs').replaceWith(notYourTurn);
				  $('.statusmsgs').show().delay(2000).fadeOut();
        }
			}

		});
	}

	setInterval(checkGameState, 1000);

})();

(function() {

	function replaceTopCard(filePath) {
		$( '#topcard' ).replaceWith('<img id="topcard" class="card" src="'+ filePath +'">');
	}

	function addToHand(data) {
		var imgElem = $('<img class="card" src="'+ data.filePath +'">').appendTo('.hand');
		imgElem.click(function(ev) {
			$.getJSON("place_card.php?suit=" + data.suit + "&rank=" + data.rank + "&value=" + data.value, function(isPlayable){
				if (isPlayable.eight === true || isPlayable.playable === true) {
					replaceTopCard(data.filePath);
				}
			});
		});
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
			$.getJSON("place_card.php?suit=" + cardData.suit + "&rank=" + cardData.rank + "&value=" + cardData.value, function(playableData){
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

	var yourTurn = "<div class='statusmsgs'>It's your turn</div>";
	var notYourTurn = "<div class='statusmsgs'>It's not your turn</div>";
	var notPlayable = "<div class='statusmsgs'>It's not playable</div>";

	function checkGameState() {
		$.getJSON("game_state.php", function(data) {

			/*if (data.turn === true ) {
				$('body').on('click', '.backside', function(){
					$.getJSON("get_card.php", function(cardData) {
						$.getJSON("place_card.php?suit=" + cardData.suit + "&rank=" + cardData.rank + "&value=" + cardData.value, function(playableData){
							// Place card to deck:
							if (playableData.eight === true || playableData.playable === true) {
								replaceTopCard(cardData.filePath);
							} else {
								// Place card to hand:
								$.getJSON("save_to_hand.php?suit=" + cardData.suit + "&rank=" + cardData.rank + "&value=" + cardData.value, function(handData){
									addToHand(cardData);
								});
							}
						});
					});
				});
			}*/

			var completeHand = $('<div class="hand"></div>');
			data.hand.forEach(function(v){
				var imgEl = $('<img class="card" src="'+ v.filePath +'">');
				imgEl.click(function(ev) {
					$.getJSON("place_card.php?suit=" + v.suit + "&rank=" + v.rank + "&value=" + v.value, function(isPlayable){
						if (data.turn === true) {
							if (isPlayable.eight === true || isPlayable.playable === true) {
								replaceTopCard(v.filePath);
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

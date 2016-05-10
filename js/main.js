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

					} else {
						$('.statusmsgs').show().delay(2000).fadeOut();
					}

				});
			});
	}

	$('#join').on('click', function() {

		$.getJSON('register-player.php?name=fake', function() {
			console.log('join the game');

		});
	});

	$('#killswitch').on('click', function() {
		$.getJSON('reset_game.php', function() {
			console.log('killed it');
		});
	});



	// Card from deck:
	$('body').on('click', '.backside', function(){

		$.getJSON("get_card.php", function(cardData) {

				$.getJSON("place_card.php?suit=" + cardData.suit + "&rank=" + cardData.rank + "&value=" + cardData.value, function(playableData){
					console.log('CrazyEight: ', playableData.eight, 'Rank || suit: ', playableData.playable);
						// Place card to deck:
						if (playableData.eight == true || playableData.playable == true) {

							replaceTopCard(cardData.filePath);

						} else {
							// Place card to hand:
							$.getJSON("save_to_hand.php?suit=" + cardData.suit + "&rank=" + cardData.rank + "&value=" + cardData.value, function(handData){

								addToHand(cardData);
								console.log('no match');
							});
						}
				});
			// });
		});
	});


	$('#deal').on('click', function() {
		$.getJSON('deal_cards.php', function() {

	// 		// Get players' hand:
	// 		$.getJSON("get_hand.php", function(data) {
	// 			data.forEach(function(v) {
	// 				addToHand(v);
	// 			});
	// 		});



//Get players' hand:
	$.getJSON("get_hand.php", function(data) {
		data.forEach(function(v) {
			var imgElem = $('<img class="card" src="'+ v.filePath +'">').appendTo('.hand');

			imgElem.click(function() {
				$.getJSON("place_card.php?suit=" + v.suit + "&rank=" + v.rank + "&value=" + v.value, function(isPlayable){

					// Place card from hand to deck:
					if (isPlayable.eight == true || isPlayable.playable == true) {

						replaceTopCard(v.filePath);

					} else {
						// Not playable card:
						$('.statusmsgs').show().delay(2000).fadeOut();
					}

				});
			});
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
						$.getJSON("place_card.php?suit=" + v.suit + "&rank=" + v.rank + "&value=" + v.value, function(isPlayable){

							if (isPlayable.eight === true || isPlayable.playable === true) {
								replaceTopCard(v.filePath);
							} else {
								return false;
							}

						});
					});
        completeHand.append(imgEl);
        console.log(v.hand);
			});


			$('.hand').replaceWith(completeHand);

			console.log(data.hand);
      console.log(data.turn, data.id);

      if (data.id === true) {
      	$('.turn').show();
      }

			replaceTopCard(data.playedCard.filePath);

			// replaceTopCard(data.filePath);
		});
	}

	setInterval(checkGameState, 1000);

})();

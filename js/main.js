(function() {

	function replaceTopCard(filePath) {
		$('.container #topcard' ).replaceWith('<img id="topcard" class="card" src="'+ filePath +'">');
	}

	$.getJSON("get_hand.php", function(data) {
		data.forEach(function(v) {
			var imgElem = $('<img class="card" src="'+ v.filePath +'">').appendTo('.hand');

			imgElem.click(function(ev) {
				$.getJSON("place_card.php?suit=" + v.suit + "&rank=" + v.rank + "&value=" + v.value, function(data){
					console.log('CrazyEight:', data.eight, 'Rank or suit:', data.playable);

					if (data.eight === true) {
						//$('<img class="card" src="'+ v.filePath +'">').appendTo('.container');
						// $('.container #topcard' ).replaceWith('<img class="card" src="'+ data.filePath +'">');
						replaceTopCard(v.filePath);
					} else if (data.playable === true) {
						//$('<img class="card" src="'+ v.filePath +'">').appendTo('.container');
						// $('.container #topcard' ).replaceWith('<img class="card" src="'+ data.filePath +'">');
						replaceTopCard(v.filePath);
					} else {
						return false;
					}

				});
			});
		});
	});

	$('body').on('click', '.backside', function(){
		$.getJSON("get_card.php", function(data) {

			data.forEach(function(v) {
				$('<img class="card" src="'+ v.filePath +'">').appendTo('.container');

				// Place Card from deck
				$.getJSON("place_card.php?suit=" + v.suit + "&rank=" + v.rank + "&value=" + v.value, function(data){
					console.log('CrazyEight: ', data.eight, 'Rank || suit: ', data.playable);

						if (data.eight === true) {
							// $('.container #topcard' ).replaceWith('<img class="card" src="'+ data.filePath +'">');
							replaceTopCard(v.filePath);
						} else if (data.playable === true) {
							// $('.container #topcard' ).replaceWith('<img class="card" src="'+ data.filePath +'">');
							replaceTopCard(v.filePath);
						} else {
							$.getJSON("save_to_hand.php?suit=" + v.suit + "&rank=" + v.rank + "&value=" + v.value, function(data){
								// $('<img class="card" src="'+ v.filePath +'">').appendTo('.hand');
								replaceTopCard(v.filePath);
							});
						}
				});
			});
		});
	});

	function checkGameState() {
		$.getJSON("game_state.php", function(data) {
			//$('<img class="card" src="'+ data.filePath +'">').appendTo('.container');
			// $('.container #topcard').replaceWith($('<img class="card" src="'+ data.filePath +'">'));
			replaceTopCard(data.filePath);
		});
	}

	setInterval(checkGameState, 1000);

})();

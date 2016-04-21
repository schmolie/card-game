(function() {
	html = $('<div class="container"/>');

	$.getJSON("get_deck.php", function(data) {
		console.log('works');
		console.log(data);

		data.forEach(function(v) {
			console.log(v.rank + ' | ' + v.suit);
			html.append('<img class="card" src="'+ v.filePath +'">');
		});

	});

  $('body').append(html);


	$.getJSON("get_player.php", function(data) {
		console.log('works');
		console.log(data);

		data.forEach(function(v) {
			console.log(v.rank + ' | ' + v.suit);
			//html.append('<img class="card" src="'+ v.filePath +'">');
		});

	});

// getCard använder sig av top card för att plocka från deck.
// getcard sparar även detta kortet i spelarens hand.
})();

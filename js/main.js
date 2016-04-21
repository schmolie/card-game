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


// get card använder sig av top card för att plocka från deck.
// get card sparar även detta kortet i spelarens hand.
// getHandFor() hämtar en hand och id får in ett id för att peka ut rätt spelara. för att sätta get hand 


})();

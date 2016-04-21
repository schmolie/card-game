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


})();

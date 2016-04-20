(function() {

	$.getJSON("get_deck.php", function(data) {
		console.log('works');
		console.log(data);

		data.forEach(function(v) {
			console.log(v.suit);

		});

	});

})();

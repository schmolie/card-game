(function() {
	html = $('<div class="container"/>');

	$.getJSON("get_deck.php", function(data) {
		data.forEach(function(v) {
			html.append('<img class="card" src="'+ v.filePath +'">');
		});
	});

  $('body').append(html);
	
	$.getJSON("get_hand.php", function(data) {
		var html = $('<section class="hand"/>');
			var id = 0;
			data.forEach(function(v) {
				var imgElem = $('<img class="card" src="'+ v.filePath +'" id="hand' + id + '">');
				imgElem.click(function(ev) {
					$.getJSON("place_card.php?suit=" + v.suit + "&rank=" + v.rank + "&value=" + v.value, function(data){	
					
					});
				});
				html.append(imgElem);
				id++;
			});				
	  	$('body').append(html);
	});
// getCard använder sig av top card för att plocka från deck.
// getcard sparar även detta kortet i spelarens hand.
})();

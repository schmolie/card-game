(function() {

	$.getJSON("get_deck.php", function(data) {
		html = $('<div class="container"/>');
		data.forEach(function(v) {
			html.append('<img class="card" src="'+ v.filePath +'">');
		});
		html.append('<img class="card backside" src="cards/backsidecard.png">');
		$('body').append(html);
	});

	$.getJSON("get_hand.php", function(data) {
		var html = $('<section class="hand"/>');

			data.forEach(function(v) {
				var imgElem = $('<img class="card" src="'+ v.filePath +'">');
				imgElem.click(function(ev) {
					$.getJSON("place_card.php?suit=" + v.suit + "&rank=" + v.rank + "&value=" + v.value, function(data){
						if (NotPLayable) {
							$.getJSON("save_to_hand?suit=" + v.suit + "&rank=" + v.rank + "&value=" + v.value, function(data){
								//console.log('work');
								$('<img class="card" src="'+ v.filePath +'">').appendTo('.hand');

							});
						}
					});
				});
				html.append(imgElem);
			});
	  	$('body').append(html);
	});

	$('body').on('click', '.backside', function(){
		$.getJSON("get_card.php", function(data) {
			data.forEach(function(v) {
				console.log(v.rank + ' | ' + v.suit);
				html.append('<img class="card" src="'+ v.filePath +'">');
			});
		});
	});



// getCard använder sig av top card för att plocka från deck.
// getcard sparar även detta kortet i spelarens hand.

// set interval -> check deck, status. 
})();

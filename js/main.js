<<<<<<< HEAD
(function() {

	$.getJSON("get_deck.php", function(data) {
		console.log('works');
		console.log(data);

		data.forEach(function(v) {
			console.log(v.suit);

		});

	});

})();
=======
(function($){ $(function(){


}); })(jQuery);
>>>>>>> e80d1e7ea127654581ee097b958ecfeff4eefa5f

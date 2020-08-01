(function() {
	var exports = {
		initialize: function() {
			$('.teaser-box__image-circle').each(function(index, circle) {
				$(circle).css({
					top: Math.floor((Math.random() * 100) + 1) + '%',
					left: Math.floor((Math.random() * 100) + 1) + '%',
					opacity: 1
				});
			});
		}
	};
	exports.initialize();
})();

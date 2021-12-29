(function() {
	var exports = {
		initialize: function() {
			$('.stage-item__circle-2, .stage-item__circle-3').each(function(index, circle) {
				var x = (Math.random() < 0.5 ? -1 : 1) * Math.floor(Math.random() * 33) + 'px';
				var y = (Math.random() < 0.5 ? -1 : 1) * Math.floor(Math.random() * 33) + 'px';
				$(circle).css({
					transform: 'translate(' + x + ', ' + y + ')',
					opacity: 1
				});
			});
		}
	};
	exports.initialize();
})();

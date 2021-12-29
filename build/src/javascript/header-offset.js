(function() {

	var $wrapper = $('.wrapper');
	var $header = $('.container--header');

	var exports = {

		setTopPadding: function() {
			$wrapper.css({
				'padding-top': $header.height()
			});
		},

		initialize: function() {
			exports.setTopPadding();
			$(window).on('resize', function() {
				exports.setTopPadding();
			});
		}

	};

	exports.initialize();

})();

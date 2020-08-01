(function() {
	var exports = {
		initialize: function() {
			$('.stage__inner').slick({
				dots: true,
				arrows: false,
				infinite: true
			});
		}
	};


	exports.initialize();

	// respond.addFunc({
	// 	breakpoint: "handheld",
	// 	enter: function() {
	// 		exports.initialize();
	// 	},
	// 	exit: function() {
    //
	// 	}
	// });
	// respond.addFunc({
	// 	breakpoint: "tablet-small",
	// 	enter: function() {
	// 		exports.initialize();
	// 	},
	// 	exit: function() {
    //
	// 	}
	// });
	// respond.addFunc({
	// 	breakpoint: "tablet-large",
	// 	enter: function() {
	// 		exports.initialize();
	// 	},
	// 	exit: function() {
    //
	// 	}
	// });
	// respond.addFunc({
	// 	breakpoint: "desktop",
	// 	enter: function() {
	// 	},
	// 	exit: function() {
    //
	// 	}
	// });

})();

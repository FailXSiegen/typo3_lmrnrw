(function () {
	// @see https://github.com/iconic/SVGInjector

	// Elements to inject
	var files = document.querySelectorAll('img[src*=".svg"]');

	// 	Options
	var injectorOptions = {
		evalScripts: 'never',
		// pngFallback: 'assets/png',
		each: function (svg) {
			// Callback after each SVG is injected
		}
	};

	// Trigger the injection
	SVGInjector(files, injectorOptions, function (totalSVGsInjected) {
		// Callback after all SVGs are injected
	});

})();

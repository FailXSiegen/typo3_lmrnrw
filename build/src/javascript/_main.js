var respond = jRespond([
	{
		label: 'handheld',
		enter: 0,
		exit: 480
	}, {
		label: 'tablet-small',
		enter: 481,
		exit: 767
	}, {
		label: 'tablet-large',
		enter: 768,
		exit: 999
	}, {
		label: 'desktop',
		enter: 1000,
		exit: 10000
	}
]);

$(function() {
	"use strict";

	var supportsMixBlendMode = window.getComputedStyle(document.body).mixBlendMode;
	if (supportsMixBlendMode) {
		$('html').addClass('supports-mix-blend-mode');
	}

});

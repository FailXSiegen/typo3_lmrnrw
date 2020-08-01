$(function() {
	var exports = {
		handlePositioningOf3rdLevel: function() {
			"use strict";
			var $level3Wrapper = $(".level-3");
			if ($level3Wrapper.length > 0) {
				$level3Wrapper.each(function(index, item) {
					var $item = $(item);
					$(item).closest('.level-2__list-item').on('mouseenter', function(event){
						var windowWidth = $(window).width();
						var $listItem = $(this);
						var aggregatedOuterRightPosition = $listItem.offset().left + $listItem.outerWidth() + $item.outerWidth();
						if (aggregatedOuterRightPosition > windowWidth) {
							$item.addClass('level-3--reversed');
						} else {
							$item.removeClass('level-3--reversed');
						}
					});
				});
			}
			var $level2Wrapper = $(".level-2");
			if ($level2Wrapper.length > 0) {
				$level2Wrapper.each(function(index, item) {
					var $item = $(item);
					$(item).closest('.level-1__list-item').on('mouseenter', function(event){
						var windowWidth = $(window).width();
						var $listItem = $(this);
						var aggregatedOuterRightPosition = $listItem.offset().left + $listItem.outerWidth() + $item.outerWidth();
						if (aggregatedOuterRightPosition > windowWidth) {
							$item.addClass('level-2--reversed');
						} else {
							$item.removeClass('level-2--reversed');
						}
					});
				});
			}
		}
	};
	respond.addFunc({
		breakpoint: ["tablet-large", "desktop"],
		enter: function() {
			exports.handlePositioningOf3rdLevel();
		},
		exit: function() {

		}
	});
});

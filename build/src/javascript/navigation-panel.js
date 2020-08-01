(function() {

	document.addEventListener("touchstart", function(){}, true);

	var $body = $('body');
	var $navigationPanel = $('<div class="navigation-panel">' +
		'<div class="navigation-panel__inner"></div></div>').appendTo($body);
	var $navigation = $('.navigation-main__list--level-1').clone().appendTo($('.navigation-panel__inner'));
	var $collapseItems = $('.navigation-main__anchor');

	var exports = {

		attachToggle: function() {
			$('.navigation-panel-toggle').on('click', function(event) {
				event.preventDefault();
				if ($body.hasClass('body--navigation-panel-visible')) {
					$body.removeClass('body--navigation-panel-visible');
				} else {
					$body.addClass('body--navigation-panel-visible');
				}
			});
		},

		attachItemCollapse: function() {
			var $collapseButton = $('<a class="navigation-main__toggle" href="#"></a>');
			$collapseButton.on('click', function(event) {
				event.preventDefault();
				var $parentListItem = $(this).closest('li');
				var $targetElement = $(this).nextAll('ul');
				if ($parentListItem.hasClass('navigation-main__list-item--expanded')) {
					$parentListItem.removeClass('navigation-main__list-item--expanded');
					setTimeout(function() {
						$targetElement.removeAttr('style');
					}, 667);
					// }, parseInt($targetElement.css('transition-duration')));
				} else {
					var targetHeight = $targetElement.outerHeight();
					console.log(targetHeight, $targetElement);
					if (targetHeight > 0) {
						$targetElement.css({
							'max-height': targetHeight + 'px'
						});
					}
					$parentListItem.addClass('navigation-main__list-item--expanded');
				}
			});

			$collapseItems.each(function(index, item) {
				var $item = $(item);
				if ($item.next('ul').length === 1) {
					$collapseButton.clone(true, true).insertBefore($item);
				}
			});
		},

		initialize: function() {

			exports.attachToggle();
			exports.attachItemCollapse();

			// temporary preventions of menu item anchors
			$('.navigation-panel__anchor').on('click', function(event) {
				event.preventDefault();
			});

		}

	};

	exports.initialize();


})();

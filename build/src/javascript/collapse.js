$(function() {
	"use strict";

	var $collapseTrigger = $('[data-collapse-trigger]');

	var exports = {

		eventNamespace: 'lmr',

		/**
		 * @returns {void}
		 */
		initialize: function() {
			$collapseTrigger.on('click.' + exports.eventNamespace, function(event) {
				event.preventDefault();
				var $trigger = $(this);
				var $item = $trigger.closest('.collapse-item');
				var $target = $item.find('[data-collapse-target]');
				if ($item.hasClass('collapse-item--expanded')) {
					$trigger.attr('aria-expanded', 'false');
					$item.removeClass('collapse-item--expanded');
					setTimeout(function() {
						$target.removeAttr('style');
					}, parseInt($target.css('transition-duration')));
				} else {
					var targetHeight = $item.find('[data-collapse-target]').find('> div').outerHeight();
					$trigger.attr('aria-expanded', 'true');
					if (targetHeight > 0) {
						$target.css({
							'max-height': $item.find('[data-collapse-target]').find('> div').outerHeight()
						});
					}
					$item.addClass('collapse-item--expanded');
				}
			});
		}
	};

	exports.initialize();

});

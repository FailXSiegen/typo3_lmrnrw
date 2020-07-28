	/*global console */
/*global siteLanguageId */

$(function() {
	"use strict";

	var $collapseTrigger = $('[data-collapse-trigger]');
	var $collapseTargets = $('[data-collapse-target]');

	var exports = {

		eventNamespace: 'lmr',

		/**
		 * @returns {void}
		 */
		initialize: function() {
			$collapseTrigger.on('click.' + exports.eventNamespace, function(event) {

				event.preventDefault();
				var $trigger = $(this);
				var $target = $trigger.nextAll('[data-collapse-target]');
				if ($trigger.hasClass('collapse--active')) {
					$trigger.removeClass('collapse--active');
                    $trigger.attr('aria-expanded', false);
					setTimeout(function() {
						$target.removeAttr('style');
					}, parseInt($target.css('transition-duration')));
				} else {
					var targetHeight = $trigger.next('[data-collapse-target]').find('> div').outerHeight();
                    $trigger.attr('aria-expanded', true);
					if (targetHeight > 0) {
						$target.css({
							'max-height': $trigger.next('[data-collapse-target]').find('> div').outerHeight()
						});
					}
					$trigger.addClass('collapse--active');
				}
			});
		}
	};

	exports.initialize();

});

(function() {

    var Tabs = {

        initialize: function() {
            $('[data-tabs]').each(function(index, tabs) {
                var $tabs = $(tabs);
                var $tabElements = $tabs.find('.tab-element');
                var $tabAnchors = $tabs.find('.tab-navigation__anchor');
                $tabs.addClass('tab-container--initialized');
                $tabAnchors.on('click', function(event) {
                    event.preventDefault();
                    var $trigger = $(this);
                    var $targetElement = $('#' + $trigger.attr('aria-controls'));

                    $tabAnchors.attr('aria-expanded', false);
                    $tabAnchors.removeClass('tab-navigation__anchor--active');
                    $tabElements.removeClass('tab-element--expanded');

                    $trigger.attr('aria-expanded', true);
                    $trigger.addClass('tab-navigation__anchor--active');
                    $targetElement.addClass('tab-element--expanded');
                });

                $tabAnchors.filter(':first').trigger('click');
            });
        },

        destroy: function() {
        }

    };

    Tabs.initialize();

})();

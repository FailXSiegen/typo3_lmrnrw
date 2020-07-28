(function() {
	var CookieNotice = {
		initialize: function () {
			if ($.cookie('cookie_accept') === undefined) {
				var $cookieNotice = $('.cookie-notice');
				var $cookieNoticeButton = $('.cookie-notice__btn');
				var $body = $('body');
                $body.addClass('body--cookie-note-visible');
                $cookieNoticeButton.on('click', function (event) {
                	event.preventDefault();
					$.cookie('cookie_accept', 'cookies_accepted', {expires: 365, path: '/'});
					$('body').addClass('body--cookie-note-acknowledged').removeClass('body--cookie-note-visible');
				});
			}
		}
	};
	CookieNotice.initialize();
})();

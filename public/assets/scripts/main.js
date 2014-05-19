(function($) {
	/* Login Function */
	function login() {
		if(err.is(':visible')) err.hide();

			var username = $('input[name=username]'),
			password = $('input[name=password]'),
			remember = ($('input[name=remember]').is(':checked')) ? true : false,
			data = {
				'_token': token.val(),
				'username': username.val(),
				'password': password.val(),
				'remember': remember
			};

		$.post(baseURL, data).success(function(data) {
			if(data.status) {
				scs.slideDown(500);
				setInterval(function() {
					window.location.reload();
				}, 2000);
			} else {
				err.slideDown(500);
			}
		});
	}

	if( ! auth ) {
		var err = $('#login-err'),
			scs = $('#login-scs'),
			token = $('input[name=_token]');

		err.hide();
		scs.hide();

		var btn = $('#login-btn'),
			form = $('#login-form');

		btn.on('click', function(e) {
			e.preventDefault();
			login();
		});

		form.on('submit', function(e) {
			e.preventDefault();
			login();
		});
	}

	/* Tooltips */
	var loginSrv = $('#login-srv'),
		charSrv  = $('#char-srv'),
		worldSrv = $('#world-srv'),
		usrOn 	 = $('#usr-on');

	loginSrv.tooltip();
	charSrv.tooltip();
	worldSrv.tooltip();
	usrOn.tooltip();

	/* Navigation */
	var navbar 	= $('.navbar-inverse'),
		navY 	= navbar.offset().top,
		navW 	= navbar.width();

	console.log(navY);

	$(window).scroll(function() {
		var winY = $(this).scrollTop();

		if( winY > navY ) {
			console.log('Yay');
			navbar.css({
				'position': 'fixed',
				'top': 0,
				'background-color': 'rgba(0, 0, 0, 0.5)',
				'width': navW
			});

			console.log(navbar.width());
		} else if( winY < navY ) {
			navbar.css({
				'position': 'initial',
				'top': 'initial',
				'background-color': 'initial',
				'width': navW
			});

			console.log(navbar.width());
		}
	});
})(jQuery);
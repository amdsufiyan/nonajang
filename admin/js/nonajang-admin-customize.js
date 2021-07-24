(function( $ ) {
	'use strict';
	wp.customize("accent_hue", (value) => {
			value.bind( (to) => {
				$("#header nav .nav-link").css({"color": to});
				$("#header nav .nav-link:hover").css({"border": "1px solid " + to});
			} );
		});
	wp.customize( 'accent_hue', function( value ) {
			value.bind( function( to ) {
				// Update the value for our accessible colors for all areas.
				console.log('algi');
			} );
		} );
	

})( jQuery );

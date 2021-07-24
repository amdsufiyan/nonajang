(function( $ ) {
	'use strict';
	console.log('jamupilex')
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
	wp.customize( 'nonajang_site_footer_background', function( value ) {
			value.bind( function( to ) {
				$("#site-footer").css({"background-color": to});
			} );
		} );
	wp.customize( 'nonajang_site_footer_color', function( value ) {
			value.bind( function( to ) {
				$("#site-footer p, #site-footer a").css({"color": to});
			} );
		} );

})( jQuery );

/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
    } );

    //Text color
    wp.customize( 'text_color', function( value ) {
		value.bind( function( to ) {
				$( 'body, input, select, optgroup, textarea' ).css( {
					color: to,
				} );
			}
		);
    } );

    //Accent Color
    wp.customize( 'accent_color', function( value ) {
		value.bind( function( to ) {
				$( 'button, input[type="button"], input[type="reset"], input[type="submit"]' ).css( {
					background: to,
                } );
                $('a, a:visited, a:hover, a:focus, a:active, #primary-menu ul li.current-menu-item a').css({
                    color: to,
                });
			}
		);
    } );

    //Top Bar & Footer Color
    wp.customize( 'top_bar_footer_color', function( value ) {
		value.bind( function( to ) {
				$( '.topbar, footer.site-footer' ).css( {
					background: to,
				} );
			}
		);
    } );

    //Header Background Color
    wp.customize( 'header_color', function( value ) {
		value.bind( function( to ) {
				$( 'header.site-header' ).css( {
					background: to,
				} );
			}
		);
    } );

    //Menu Background Color
    wp.customize( 'menu_bck_color', function( value ) {
		value.bind( function( to ) {
				$( '.main-navigation' ).css( {
					background: to,
				} );
			}
		);
    } );

    //Menu Background Color
    wp.customize( 'menu_text_color', function( value ) {
		value.bind( function( to ) {
				$( '.main-navigation ul li a' ).css( {
					color: to,
				} );
			}
		);
    } );

    //Show Copyright Message
    wp.customize( 'show_copyright', function( value ) {
		value.bind( function( to ) {
			$( 'footer .copyright' ).text( to );
		} );
    } );

}( jQuery ) );

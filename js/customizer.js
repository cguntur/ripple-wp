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
				$( 'h1.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
    } );

    //Text color
    wp.customize( 'text_color', function( value ) {
		value.bind( function( to ) {
				$( 'body, input, select, optgroup, textarea, .has-text-color-color' ).css( {
					color: to,
                } );
                
                $('.has-text-color-background-color').css({
                    background:to,
                })
			}
		);
    } );

    //Accent Color
    wp.customize( 'accent_color', function( value ) {
		value.bind( function( to ) {
				$( 'input[type="button"], input[type="reset"], input[type="submit"], .has-accent-color-background-color' ).css( {
					background: to,
                } );
                $('.has-accent-color-color, a:hover, a:focus, a:active, a:visited, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, span a, p a').css({
                    color:to,
                });
                $('.site-header .left_header .topbar ul#top-menu li a').css({
                    color:to,
                });
                $('footer li a, footer .widget-column ul li a, .site-info a').css({
                    color:to,
                });
                
            }
		);
    } );

    //Top Bar & Footer Color
    wp.customize( 'top_bar_footer_color', function( value ) {
		value.bind( function( to ) {
				$( '.topbar, footer.site-footer, .has-theme-color-one-background-color' ).css( {
					background: to,
                } );
                
                $('.has-theme-color-one-color').css({
                    color: to,
                })
			}
		);
    } );

    //Header Background Color
    wp.customize( 'header_color', function( value ) {
		value.bind( function( to ) {
				$( 'header.site-header, .has-theme-color-two-background-color, .site-header .left_header .main-navigation ul ul' ).css( {
					background: to,
                } );
                
                $('.has-theme-color-two-color').css({
                    color:to,
                })
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

    //Menu Text Color
    wp.customize( 'menu_text_color', function( value ) {
		value.bind( function( to ) {
				$( '.main-navigation ul li a, .main-navigation ul li.menu-item-has-children:after' ).css( {
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

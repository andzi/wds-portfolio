<?php

/**
 * Register Google font.
 */
function wds_portfolio_font_url() {

	$fonts_url = '';

	/*
	* Translators: If there are characters in your language that are not
	* supported by the following, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$roboto = _x( 'on', 'Roboto font: on or off', 'wds_portfolio' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'wds_portfolio' );

	if ( 'off' !== $roboto || 'off' !== $open_sans ) {
		$font_families = array();

		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:400,700';
		}

		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:300,400,800';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function wds_portfolio_scripts() {
	$version = '1.0.0';
	
	/**
	 * Should we load minified scripts? Also enqueue live reload to allow for extensionless reloading.
	 */
	$minnified = '.min';
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG == true ) {
		$minnified = '';
		wp_enqueue_script( 'live-reload', '//localhost:35729/livereload.js', array(), $version, true );
	}
	wp_enqueue_style( 'wds_portfolio-google-font', wds_portfolio_font_url(), array(), null );
	wp_enqueue_style( 'wds_portfolio-style', get_stylesheet_directory_uri() . '/style' . $minnified . '.css' );
	wp_enqueue_script( 'wds_portfolio-project', get_template_directory_uri() . '/js/project' . $minnified . '.js', array( 'jquery' ), $version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script( 'wds-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ), $version, true );
	wp_register_script( 'wds-portfolio', get_template_directory_uri() . '/js/wds-portfolio.js', array( 'jquery' ), $version, true );

	if ( is_page_template( 'homepage-template.php' ) ) {
		wp_enqueue_script( 'wds-isotope' );
		wp_enqueue_script( 'wds-portfolio' );
	}
}
add_action( 'wp_enqueue_scripts', 'wds_portfolio_scripts' );
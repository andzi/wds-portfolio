<?php
/**
 * wds_portfolio functions and definitions
 *
 * @package wds_portfolio
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1100; /* pixels */
}

if ( ! function_exists( 'wds_portfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the afterwds_portfolioetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wds_portfolio_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wds_portfolio, use a find and replace
	 * to change 'wds_portfolio' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wds_portfolio', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'wds-portfolio-img', 480, 360, true );
	add_image_size( 'wds-portfolio-single-img', 950, 550, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wds_portfolio' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wds_portfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add styles to the post editor
	add_editor_style( array( 'editor-style.css', wds_portfolio_font_url() ) );
	add_editor_style( array( 'editor-style.css', wds_portfolio_font_url() ) );

	/*
	 * Adding theme support for Jetpack Portfolio CPT.
	 * Not essential to add this but this does few nice things.
	 * 1. Turns the CPT on when the theme is activated.
	 * 2. Displays an admin notice if the option is turned off, but the theme is activated.
	 * 3. When the theme is switched away, if no CPTs are populated, it turns it back off.
	 */
	add_theme_support( 'jetpack-portfolio' );
}
endif; // wds_portfolio_setup
add_action( 'after_setup_theme', 'wds_portfolio_setup' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load styles and scripts
 */
require get_template_directory() . '/inc/scripts.php';
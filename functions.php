<?php
/**
 * Pine PRO child functions and definitions
 *
 * @package Pine PRO Child
 * @see http://codex.wordpress.org/Child_Themes
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pine_pro_child_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Pine PRO, use a find and replace
	 * to change 'pine-pro-child' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pine-pro-child', get_template_directory() . '/languages' );

	/**
	 * Editor style.
	 */
	add_editor_style( get_stylesheet_directory_uri() . '/css/editor.css' );
}
add_action( 'after_setup_theme', 'pine_pro_child_setup' );

/**
 * Enqueue scripts and styles.
 */
function pine_pro_child_scripts() {
	// Define style dependencies.
	$style_dependencies = array( 'pine-pro-fonts', 'pine-pro-style' );

	$dynamic_style = pine_get_dynamic_style();
	if ( ! empty( $dynamic_style ) ) {
		$style_dependencies[] = 'pine-pro-theme';
	}

	// Child style.
	wp_enqueue_style( 'pine-pro-child-style', get_stylesheet_directory_uri() . '/css/style.css', $style_dependencies, '20170127' );

	// Child scripts.
	wp_enqueue_script( 'pine-pro-child-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'pine-pro-scripts' ), '20170127', true );
}
add_action( 'wp_enqueue_scripts', 'pine_pro_child_scripts' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pine_pro_child_customize_preview_js() {
	wp_enqueue_script( 'pine-pro-child-customizer', get_stylesheet_directory_uri() . '/js/customizer.js', array( 'customize-preview', 'pine-pro-customizer' ), '20170127', true );
}
add_action( 'customize_preview_init', 'pine_pro_child_customize_preview_js' );

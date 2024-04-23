<?php

/**
 * UFL Child functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UFL Main
 */

add_action( 'after_setup_theme', 'ufl_uni_child_theme_setup' );
function ufl_uni_child_theme_setup() {
	load_child_theme_textdomain( 'ufl_stamatschild', get_stylesheet_directory() . '/languages' );

	// Switch default core markup for search form to output valid HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}

add_action( 'wp_enqueue_scripts', 'ufl_uni_child_enqueue_styles' );
function ufl_uni_child_enqueue_styles() {
	// parent styles
	$parenthandle = 'bootscore-style'; 
	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // If the parent theme code has a dependency, copy it to here.
		$theme->parent()->get( 'Version' )
	);
	// child styles
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'main' ),
		$theme->get( 'Version' ) // This only works if you have Version defined in the style header.
	);
}
add_action( 'wp_enqueue_scripts', 'ufl_uni_child_enqueue_scripts' );
function ufl_uni_child_enqueue_scripts() {
	$theme        = wp_get_theme();
	// parent scripts 
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', false, '', true);
	wp_enqueue_script('lightbox-js', get_template_directory_uri() . '/js/lightbox.js', false, '', true);
	wp_enqueue_script('directional-hover-js', get_template_directory_uri() . '/js/jquery.directional-hover.min.js', false, '', true);
	wp_register_script( 'misha_scripts', get_template_directory_uri() . '/js/ajax-script.js', array('jquery') );
	
	// child scripts
	  // custom.js
	  wp_enqueue_script('child-custom', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
}

function ufl_uni_child_enqueue_lightbox() {
	wp_dequeue_script( 'lightbox-js' );
}
// add_action( 'wp_print_scripts', 'ufl_uni_child_enqueue_lightbox', 100 );


add_action( 'enqueue_block_editor_assets', 'ufl_uni_child_gutenberg_scripts' );
function ufl_uni_child_gutenberg_scripts() {
	wp_enqueue_script( 'be-editor', get_template_directory_uri() . '/assets/js/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_template_directory_uri() . '/assets/js/editor.js' ), true );
}
if ( !function_exists( 'hwcoe_child_icon_url' ) ) {

	function hwcoe_child_icon_url() {
		if ( empty($url) ){
			$url = get_stylesheet_directory_uri() . '/img/favicon.png';
		}
		return $url;
	}
	add_filter( 'get_site_icon_url', 'hwcoe_child_icon_url' );
}

/*
 * Theme variable definitions
 */
define( "HWCOE_CHILD_INC_DIR", get_stylesheet_directory() . "/inc" );

/**
 * Load custom theme files 
 */
require HWCOE_CHILD_INC_DIR . '/customizer.php';
require HWCOE_CHILD_INC_DIR . '/template-tags.php';

// Load plugin custom functions
require HWCOE_CHILD_INC_DIR . '/acf-pro.php';
require HWCOE_CHILD_INC_DIR . '/events-manager.php';
require HWCOE_CHILD_INC_DIR . '/shibboleth.php';

// delete footer nav menu location since the menu is not displayed by the theme
if (!function_exists( 'hwcoe_unregister_footer_menu' )) {
	function hwcoe_unregister_footer_menu() {
		unregister_nav_menu( 'footer-menu' );
	}
}
add_action('init', 'hwcoe_unregister_footer_menu');

// unregister Mercury widget areas that aren't displayed in theme
function hwcoe_unregister_sidebar() {
    unregister_sidebar( 'top-nav-search' );
}
add_action( 'widgets_init', 'hwcoe_unregister_sidebar', 11 );
 
// utility function to remove unwanted <p> tags within shortcodes
// see https://stackoverflow.com/questions/13510131/remove-empty-p-tags-from-wordpress-shortcodes-via-a-php-functon#answer-49019912
if (!function_exists( 'custom_filter_shortcode_text' )) {
	function custom_filter_shortcode_text($text = "") {
		// Replace all the poorly formatted P tags that WP adds by default.
		$tags = array("<p>", "</p>");
		$text = str_replace($tags, "\n", $text);

		// Remove any BR tags
		$tags = array("<br>", "<br/>", "<br />");
		$text = str_replace($tags, "", $text);

		// Add back in the P and BR tags again, remove empty ones
		return apply_filters("the_content", $text);
	}
}

/**
* Disable loading of unwanted scripts
*/

// Disable emojis
add_action( 'init', 'hwcoe_disable_emojis' );

function hwcoe_disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

// Deregister wp-polyfill
function deregister_polyfill(){

  wp_deregister_script( 'wp-polyfill' );
  wp_deregister_script( 'regenerator-runtime' );

}
add_action( 'wp_enqueue_scripts', 'deregister_polyfill');

function hwcoe_add_theme_colors()
{
    $existing = get_theme_support('editor-color-palette');
    $new = array_merge($existing[0], array(
        array(
            'name'  => __('Dark Gray', 'ufl_stamatschild'),
            'slug'  => 'dark-gray',
            'color' => '#343741',
        ),
    ));
    add_theme_support('editor-color-palette',  $new);
}
add_action('after_setup_theme', 'hwcoe_add_theme_colors', 20);

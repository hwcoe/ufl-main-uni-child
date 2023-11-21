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
	// wp_enqueue_script('lightbox-js', get_template_directory_uri() . '/js/lightbox.js', false, '', true);
	wp_enqueue_script('directional-hover-js', get_template_directory_uri() . '/js/jquery.directional-hover.min.js', false, '', true);
	wp_register_script( 'misha_scripts', get_template_directory_uri() . '/js/ajax-script.js', array('jquery') );
	
	// child scripts
	  // custom.js
	  wp_enqueue_script('child-custom', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
}

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
require HWCOE_CHILD_INC_DIR . '/shibboleth.php';
require HWCOE_CHILD_INC_DIR . '/template-tags.php';

// delete footer nav menu location since the menu is not displayed by the theme
if (!function_exists( 'hwcoe_unregister_footer_menu' )) {
	function hwcoe_unregister_footer_menu() {
		unregister_nav_menu( 'footer-menu' );
	}
}
add_action('init', 'hwcoe_unregister_footer_menu');

/*
* Integrating Advanced Custom Fields
*/
if (!function_exists('hwcoe_acf_json_save_point')) { 
	add_filter('acf/settings/save_json', 'hwcoe_acf_json_save_point');

	function hwcoe_acf_json_save_point( $path ) {
		$path = HWCOE_CHILD_INC_DIR . '/acf-json';
		// return
		return $path; 
	}
}

if (!function_exists('hwcoe_acf_json_load_point')) {
	add_filter('acf/settings/load_json', 'hwcoe_acf_json_load_point');
	function hwcoe_acf_json_load_point( $paths ) {	
		unset($paths[0]);
   
		array_push(
			$paths,
			// load child theme custom fields
			HWCOE_CHILD_INC_DIR . '/acf-json',
			// load parent theme custom fields		
			get_template_directory() . '/inc/advanced-custom-fields/acf-json'
		);

		return $paths;
	}
}

// Limit the ACF Custom Fields dashboard menu to users who are site administrators (single site) or network admins (multisite)
function hwcoe_acf_init() {
	acf_update_setting('capability', 'update_plugins'); 
}
add_action('acf/init', 'hwcoe_acf_init');

// remove parent theme's meta box to disable breadcrumbs since the value doesn't retain on save

add_action('add_meta_boxes', 'remove_ufl_menu_metaBox', 9);
function remove_ufl_menu_metaBox() {
	remove_action( 'add_meta_boxes', 'ufl_menu_metaBox');
}

add_action('save_post', 'remove_ufl_save_menu_metaBox', 9);
function remove_ufl_save_menu_metaBox() {
	remove_action('save_post', 'ufl_save_menu_metaBox');
}
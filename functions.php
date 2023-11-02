<?php

/**
 * UFL Child functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UFL Main
 */

add_action( 'wp_enqueue_scripts', 'ufl_uni_child_enqueue_styles' );
function ufl_uni_child_enqueue_styles() {

	// parent styles
	$parenthandle = 'bootscore-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle,
		get_parent_theme_file_uri() . '/style.css',
		array(),  // If the parent theme code has a dependency, copy it to here.
		$theme->parent()->get( 'Version' )
	);

	// child styles
	wp_enqueue_style( 'child-style',
		get_theme_file_uri() . '/style.css',
		array( 'main' ),
		$theme->get( 'Version' ) // This only works if you have Version defined in the style header.
	);

}
add_action( 'wp_enqueue_scripts', 'ufl_uni_child_enqueue_scripts' );
function ufl_uni_child_enqueue_scripts() {
	$theme        = wp_get_theme();

	// parent scripts 

	wp_enqueue_script('custom-js', get_parent_theme_file_uri() . '/js/custom.js', false, '', true);
	// wp_enqueue_script('lightbox-js', get_parent_theme_file_uri() . '/js/lightbox.js', false, '', true);
    wp_enqueue_script('directional-hover-js', get_parent_theme_file_uri() . '/js/jquery.directional-hover.min.js', false, '', true);
    wp_register_script( 'misha_scripts', get_parent_theme_file_uri() . '/js/ajax-script.js', array('jquery') );
	

	// child scripts
	  // custom.js
	  // wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);

}

add_action( 'enqueue_block_editor_assets', 'ufl_uni_child_gutenberg_scripts' );
function ufl_uni_child_gutenberg_scripts() {
	wp_enqueue_script( 'be-editor', get_parent_theme_file_uri() . '/assets/js/editor.js', array( 'wp-blocks', 'wp-dom' ), filemtime( get_parent_theme_file_uri() . '/assets/js/editor.js' ), true );
}

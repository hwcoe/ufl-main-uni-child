<?php

/**
 * UFL Child functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UFL Main
 */


// add_action( 'wp_enqueue_scripts', 'ufl_uni_child_enqueue_styles' );
// function ufl_uni_child_enqueue_styles() {
// 	wp_enqueue_style( $parent_style, 
// 		get_template_directory_uri() . '/style.css', 
// 		['bootstrap', 'prettyPhoto'],
// 		wp_get_theme('hwcoe-ufl')->get('Version')
// 	);

// 	wp_enqueue_style( 'child-style',
// 		get_stylesheet_uri(),
// 		array( 'main' ),
// 		wp_get_theme()->get( 'Version' ) // This only works if you have Version defined in the style header.
// 	);
// // wp_enqueue_script('hwcoe-ufl-child-scripts', get_stylesheet_directory_uri() . '/scripts.js', array(), get_theme_version(), true);
// }


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
		get_theme_file_uri(),
		array( 'main' ),
		$theme->get( 'Version' ) // This only works if you have Version defined in the style header.
	);

}
add_action( 'wp_enqueue_scripts', 'ufl_uni_child_enqueue_scripts' );
function ufl_uni_child_enqueue_scripts() {
	$theme        = wp_get_theme();

	// parent scripts 

	wp_enqueue_script( 'custom-js', 
		get_template_directory_uri() . '/js/custom.js', 
		array(), 
		$theme->parent()->get( 'Version' )
	);
	
	wp_enqueue_script( 'lightbox-js', 
		get_parent_theme_file_uri() . '/js/lightbox.js', 
		array('jquery'), 
		$theme->parent()->get( 'Version' )
	);

	wp_enqueue_script( 'directional-hover-js', 
		get_template_directory_uri() . '/js/jquery.directional-hover.min.js', 
		array(), 
		$theme->parent()->get( 'Version' )
	);	

	wp_enqueue_script( 'misha_scripts', 
		get_parent_theme_file_uri() . '/js/ajax-script.js', 
		array(), 
		$theme->parent()->get( 'Version' )
	);

	// child scripts
	  // custom.js
	  // wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);

}
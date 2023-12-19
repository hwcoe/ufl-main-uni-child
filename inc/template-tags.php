<?php

/**
 * Custom template tags for this theme
 *
 * @package Bootscore
 */

/**
 * Display list of social network links only if they are set in the Customizer theme options
 */
if (!function_exists('hwcoe_socialnetworks')) :
	function hwcoe_socialnetworks() {

		$social_networks = array(
			'facebook' => 'Facebook',
			'twitter' => 'X (formerly Twitter)',
			'youtube' => 'YouTube',
			'linkedin' => 'LinkedIn',
			'instagram' => 'Instagram',
			'flickr' => 'Flickr',
			'feed' => 'News Feed',
		);
		
		foreach( $social_networks as $name => $title ){
			$link = get_theme_mod("{$name}_url");
			$icon = get_stylesheet_directory_uri();
			$icon .= "/img/spritemap.svg#{$name}";
			if( !empty($link) ){
				$social_html = '<a href="' . esc_url($link) . '" target="_blank" class="' . esc_attr($name) . '-icon">';
				$social_html .= '<svg class="ufl-brands ufl-' . esc_attr($name) . '"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="' . esc_url($icon) . '"></use></svg>';
				$social_html .= '<span class="visually-hidden">' . esc_html($title) . '</span></a>';
				$social_html .= '</a>';
				echo $social_html;
			}
		}
	}
endif;
// Social networks End
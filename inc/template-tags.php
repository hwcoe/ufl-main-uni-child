<?php

/**
 * Custom template tags for this theme
 *
 * @package Bootscore
 */

/**
 * Display list of social network links only if they are set in the Customizer theme options
 */

function social_url_default( $setting ) {
    $defaults = array(
        'facebook_url' => __( 'https://www.facebook.com/UFWertheim/' ),
        'twitter_url' => __( 'https://twitter.com/ufwertheim/' ),
        'youtube_url' => __( 'https://www.youtube.com/user/gatorengineering' ),
        'linkedin_url' => __( '' ),
        'instagram_url' => __( 'https://www.instagram.com/ufwertheim/' ),
        'flickr_url' => __( '' ),
        'feed_url' => __( '' ),
    );
    return $defaults[$setting];
}

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
			$link = get_theme_mod( "{$name}_url", social_url_default( "{$name}_url" ) );
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
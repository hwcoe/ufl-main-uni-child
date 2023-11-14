<?php
// Customizer controls

function hwcoe_customizer_controls ( $wp_customize ) {
	// Site identity
	$wp_customize->remove_control('header_text');
	$wp_customize->remove_setting('header_text');

	// Social 
	$wp_customize->add_section( 'social_urls', array(
		'title' => __('Social Media', 'ufl_stamatschild'),
		'description' => __("Enter your organization's social media URLs (e.g. https://www.instagram.com/ufwertheim/). Social media icons are displayed in the site footer", 'ufl_stamatschild'),
		'priority' => 40,
	));
	
	$wp_customize->add_setting( 'facebook_url', array( 'default' => 'https://www.facebook.com/UFWertheim/', 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_setting( 'twitter_url', array( 'default' => 'https://twitter.com/ufwertheim/', 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_setting( 'youtube_url', array( 'default' => 'https://www.youtube.com/user/gatorengineering', 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_setting( 'linkedin_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_setting( 'instagram_url', array( 'default' => 'https://www.instagram.com/ufwertheim/', 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_setting( 'flickr_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ));
	$wp_customize->add_setting( 'feed_url', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ));
	
	$wp_customize->add_control( 'facebook_url', array(
		'label' => __('Facebook URL', 'ufl_stamatschild'),
		'description' => __("", 'ufl_stamatschild'),
		'section' => 'social_urls',
		'type' => 'text',
	));
	$wp_customize->add_control( 'twitter_url', array(
		'label' => __('X (formerly Twitter) URL', 'ufl_stamatschild'),
		'description' => __("", 'ufl_stamatschild'),
		'section' => 'social_urls',
		'type' => 'text',
	));
	$wp_customize->add_control( 'youtube_url', array(
		'label' => __('YouTube URL', 'ufl_stamatschild'),
		'description' => __("", 'ufl_stamatschild'),
		'section' => 'social_urls',
		'type' => 'text',
	));
	$wp_customize->add_control( 'linkedin_url', array(
		'label' => __('LinkedIn URL', 'ufl_stamatschild'),
		'description' => __("", 'ufl_stamatschild'),
		'section' => 'social_urls',
		'type' => 'text',
	));
	$wp_customize->add_control( 'instagram_url', array(
		'label' => __('Instagram URL', 'ufl_stamatschild'),
		'description' => __("", 'ufl_stamatschild'),
		'section' => 'social_urls',
		'type' => 'text',
	));
	$wp_customize->add_control( 'flickr_url', array(
		'label' => __('Flickr URL', 'ufl_stamatschild'),
		'description' => __("", 'ufl_stamatschild'),
		'section' => 'social_urls',
		'type' => 'text',
	));
	$wp_customize->add_control( 'feed_url', array(
		'label' => __('News Feed URL', 'ufl_stamatschild'),
		'description' => __("", 'ufl_stamatschild'),
		'section' => 'social_urls',
		'type' => 'text',
	));
}
add_action( 'customize_register', 'hwcoe_customizer_controls' );

<?php
// Customizer controls

function hwcoe_customizer_controls ( $wp_customize ) {
	// Site identity
	$wp_customize->remove_control('header_text');
	$wp_customize->remove_setting('header_text');
}
add_action( 'customize_register', 'hwcoe_customizer_controls' );

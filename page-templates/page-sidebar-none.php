<?php

/**
 * Template Name: Page Title and No Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

if ( ufl_check_page_visitor_level( $post->ID ) > 0 ) { 
	if ( ! defined( 'DONOTCACHEPAGE' ) ) {
		define( 'DONOTCACHEPAGE', 1 ); 
	}
}
get_header();

$disable_breadcrumbs = get_field('disable_breadcrumbs');
$members_only = get_field('members_only');

if (!$disable_breadcrumbs) {
	the_breadcrumb($post, true);
}

parse_blocks( $post->post_content );
?>
<div id="content" class="site-content container py-5">
	<div id="primary" class="content-area">
		<?php if (!$members_only || ufl_check_authorized_user( get_the_ID() ) ) :
			get_template_part( 'template-parts/content', 'classic' );
		else:
			get_template_part('template-parts/content','restricted');
		endif;
		?>

	</div>
</div>

<?php
get_footer();
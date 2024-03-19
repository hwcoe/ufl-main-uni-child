<?php

/**
 * Template Name: Page Title and Section Nav
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

$section_nav = do_blocks( '<!-- wp:create-block/section-nav /-->' );
$disable_breadcrumbs = get_field('disable_breadcrumbs');
$members_only = get_field('members_only');

parse_blocks( $post->post_content );

if (!$disable_breadcrumbs) {
	the_breadcrumb($post, true);
}

?>
<div id="content" class="site-content mt-5">
	 <?php echo $section_nav; ?>

	<div id="primary" class="content-area container">
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
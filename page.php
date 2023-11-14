<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

if ( ufl_check_page_visitor_level( $post->ID ) > 0 ) { 
  define( 'DONOTCACHEPAGE', 1 ); 
}
get_header();

$disable_breadcrumbs = get_field('disable_breadcrumbs');
$members_only = get_field('members_only');

if (!$disable_breadcrumbs) {
  the_breadcrumb($post, true);
}

?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">

  	<?php if (!$members_only || ufl_check_authorized_user( get_the_ID() ) ) :
  			while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'page' ); 
         endwhile; // End of the loop.        
      else: ?>
      	<div class="container">
	  			<?php get_template_part('template-parts/content','restricted'); ?>
	  		</div>
		<?php endif; ?>


    <!-- Hook to add something nice -->
    <!-- <?php bs_after_primary(); ?>
    <?php parse_blocks( $post->post_content ); ?>
        <main id="main" class="site-main">
            <?php the_content(); ?>
        </main> -->
    </div>
</div>
<?php
get_footer();
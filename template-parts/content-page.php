<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *  @package Bootscore
 */

    //Hook to add something nice
	bs_after_primary();
	parse_blocks( $post->post_content ); ?>
	<main id="main" class="site-main">
		<?php the_content(); ?>
	</main>
    


<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bootscore
 */

get_header();
?>
<div id="content" class="site-content container py-5 mt-5">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="mb-5">
				<h1><?php esc_html_e( 'Page not found', 'ufl_stamatschild' ); ?></h1>
				<p><?php esc_html_e( "Sorry, the page you are looking for doesn't appear to exist (or may have moved).", 'ufl_stamatschild' ); ?></p>
				<!-- 404 Widget -->
				<?php if (is_active_sidebar('404-page')) : ?>
				<div><?php dynamic_sidebar('404-page'); ?></div>
				<?php endif; ?>
				<p><a class="button animated-border-button button-border-blue button-text-dark" href="<?php echo esc_url(home_url()); ?>" role="button"><?php esc_html_e('Back Home &raquo;', 'ufl_stamatschild'); ?></a></p>
			</section>
			<section class="mb-5">
				<hr />
				
				<!-- <?php get_search_form(); ?> -->
			</section>

		</main><!-- #main -->

	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();

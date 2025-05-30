<?php
/**
 * Template Name: Sidebar left
 * Template Post Type: post
 */

get_header();  
?>

<div class="site-content container py-5 mt-4">
	<div id="primary" class="content-area">

		<!-- Hook to add something nice -->
		<?php bs_after_primary(); ?>

		<div class="row">
			<?php get_sidebar(); ?>
			<div class="col-md-8 col-xxl-9 order-first order-md-last">

				<main id="main" class="site-main">

					<header class="entry-header">
						<?php the_post(); ?>
						<?php bootscore_category_badge(); ?>
						<h1><?php the_title(); ?></h1>
						<p class="entry-meta">
							<small class="text-muted">
								<?php esc_html( the_time('F j, Y') ); ?>
							</small>
						</p>
						<?php 
							if (!get_field('hide_featured_image')) {
								bootscore_post_thumbnail();	
							} 
						?>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

					<footer class="entry-footer clear-both">
						<div class="mb-4">
							<?php bootscore_tags(); ?>
						</div>
						<nav aria-label="bS page navigation">
							<ul class="pagination justify-content-center">
								<li class="page-item">
									<?php previous_post_link('%link'); ?>
								</li>
								<li class="page-item">
									<?php next_post_link('%link'); ?>
								</li>
							</ul>
						</nav>
						<?php comments_template(); ?>
					</footer>

				</main>

			</div>
		</div>

	</div>
</div>

<?php
get_footer();
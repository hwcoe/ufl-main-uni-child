<?php
/**
 * Template Name: No Sidebar
 * Template Post Type: post
 */

get_header();  
?>

<main id="main" class="site-main container py-5 mt-4">
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

	<div id="content" class="single-news container py-5 mt-4">
		<!-- Hook to add something nice -->
		<?php bs_after_primary(); ?>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</div>
	<footer class="entry-footer clear-both mt-5 mb-5 container">
		<div class="mb-5 mt-3">
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
<?php
get_footer();
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
		<div class="date-share-wrapper">		
			<?php bootscore_category_badge(); ?>
			<div class="single-social-share">
				<div class="col-12 social-column social-column-grey">
					<div class="sharethis-inline-share-buttons"></div>
				</div>
			</div>
		</div>
		<h1><?php the_title(); ?></h1>
		<?php hwcoe_post_meta(); ?>
		<?php 
			if (!get_field('hide_featured_image')) {
				hwcoe_post_thumbnail();
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
		<?php bootscore_tags(); ?>
		
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
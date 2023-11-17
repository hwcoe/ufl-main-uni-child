<?php
/**
 * Template Name: Full width image
 * Template Post Type: post
 */

get_header();  

?>

<main id="main" class="site-main site-content">
	<?php the_post(); ?>
	<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
	<header class="entry-header featured-full-width-img height-75 bg-dark text-light mb-3" style="background-image: url('<?php echo $thumb['0']; ?>')">
		<div class="container entry-header h-100 d-flex align-items-end pb-3">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</div>
	</header>

	<div id="content" class="single-news container pb-5">
		<!-- Hook to add something nice -->
		<?php bs_after_primary(); ?>

		<div class="entry-content">
			<?php bootscore_category_badge(); ?>
			<p class="entry-meta">
				<small class="text-muted">
					<?php
						the_time('F j, Y');
					?>
				</small>
			</p>
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
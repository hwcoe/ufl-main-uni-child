<?php
/**
 * Template Name: Event
 * Template Post Type: event
 */

get_header();  

event_breadcrumb($post, true);
?>

<main id="main" class="site-main container py-5 mt-4">
	<header class="entry-header">
		<?php the_post(); ?>
		<h1><?php the_title(); ?></h1>	
	</header>

	<div id="content" class="single-news container py-5 mt-4">
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</div>
	<footer class="entry-footer clear-both mt-5 mb-5 container">
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
	</footer>
      
</main>
<?php
get_footer();
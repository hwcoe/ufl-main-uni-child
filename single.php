<?php
/**
 * Template Post Type: post
 */

get_header();  
?>

<div id="content" class="single-news site-content">
	<!-- Hook to add something nice -->
	<?php bs_after_primary(); ?>
	<?php the_content(); ?>
	
	<?php bootscore_tags(); ?>
	<div class="mobile-related single-news-related-content"></div>
</div>
<footer class="entry-footer mt-5 mb-5 container clear-both site-content">
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
<?php
get_footer();
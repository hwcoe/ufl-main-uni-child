<?php

/**
 * Template Name: Mercury Form Layout
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>

    <article id="main-content" class="form-ufl" role="main">
		<section class="fullwidth-text-block  position-relative">
  			<div class="container">
			  <?php the_post(); ?>
        	  <?php the_content(); ?>
			</div>
		</section>
	</article>

  </div>
</div>

<?php
get_footer();
?>
<script src="<?php echo bloginfo('template_directory'); ?>/library/js/iframeResizer.contentWindow.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="<?php echo bloginfo('template_directory'); ?>/library/js/custom-scripts.js" ></script>
<script type="text/javascript">
	jQuery( document ).ready(function() {
		jQuery('select').selectpicker();
	});
</script>
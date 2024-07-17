<?php

/**
 * Template Name: Mercury Form Layout
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

if ( ufl_check_page_visitor_level( $post->ID ) > 0 ) { 
	if ( ! defined( 'DONOTCACHEPAGE' ) ) {
		define( 'DONOTCACHEPAGE', 1 ); 
	}
}
?>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<?php
get_header();

$disable_breadcrumbs = get_field('disable_breadcrumbs');
$members_only = get_field('members_only');

if (!$disable_breadcrumbs) {
	the_breadcrumb($post, true);
}

parse_blocks( $post->post_content );
?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">

    <article id="main-content" class="form-ufl" role="main">
		<section class="fullwidth-text-block  position-relative">
  			<div class="container py-5">
  			<?php 

  				if (!$members_only || ufl_check_authorized_user( get_the_ID() ) ) :
						get_template_part( 'template-parts/content', 'classic' );
					else:
						get_template_part('template-parts/content','restricted');
					endif;

        ?>
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
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<script src="<?php echo bloginfo('template_directory'); ?>/library/js/custom-scripts.js" ></script>
<script type="text/javascript">
	jQuery( document ).ready(function() {
		jQuery('select').selectpicker();
	});
</script>
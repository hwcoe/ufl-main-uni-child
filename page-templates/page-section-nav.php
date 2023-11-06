<?php

/**
 * Template Name: Page Title and Section Nav
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();

$section_nav = do_blocks( '<!-- wp:create-block/section-nav /-->' );
$disable_breadcrumbs = get_field('disable_breadcrumbs');

if (!$disable_breadcrumbs) {
  the_breadcrumb($post, true);
}

?>
<div id="content" class="site-content mt-5">
   <?php echo $section_nav; ?>

  <div id="primary" class="content-area container">
     
    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>
   
      <main id="main" class="site-main">

        <header class="entry-header">
          <?php the_post(); ?>
          <h1><?php the_title(); ?></h1>
        </header>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

      </main>

  </div>
</div>

<?php
get_footer();
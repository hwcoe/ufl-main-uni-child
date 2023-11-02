<?php

/**
 * Template Name: Page Title and Section Nav
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();

$ufl_nav_menu_show = get_post_meta($post->ID, 'ufl_nav_menu_show', true);

if ($ufl_nav_menu_show === "0" || $ufl_nav_menu_show === "") {
  the_breadcrumb($post, true);
}

$section_nav = do_blocks( '<!-- wp:create-block/section-nav /-->' );

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
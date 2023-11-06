<?php

/**
 * Template Name: Page Title and No Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();

$disable_breadcrumbs = get_field('disable_breadcrumbs');

if (!$disable_breadcrumbs) {
  the_breadcrumb($post, true);
}

?>
<div id="content" class="site-content container py-5">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>
    <?php parse_blocks( $post->post_content ); ?>

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
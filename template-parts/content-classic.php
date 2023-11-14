<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *  @package Bootscore
 */
?>

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
    


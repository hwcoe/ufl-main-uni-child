<?php
/* Template Name: News Template */
get_header();
$years = get_posts_years_array();
$postid = get_option('page_for_posts');
?>

<div id="content" class="site-content news test-home">
  <div id="primary" class="news-landing-body content-area">
  		<h1 class="visually-hidden">Posts from <?php bloginfo('name'); ?></h1>
	 <?php
	 // prevents top post's content from showing above latest posts layout when no posts page is selected in Customizer
	 if( $postid != 0 ) {
		$content_post = get_post($postid);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		echo $content;
	 }
	 ?>

	<div class="container">
		<div class="row">
			<div class="title-wrapper">
				<h2 class="font-heading">NEWS & STORIES</h2>
			 <hr/>
		  </div>

		  <form id="misha_filters" action="#">
			 <div class="filter-wrapper">
				<div class="select-wrapper">
				  <div class="dropdown">
					 <button type="button" class="filter-button btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-name="categoryfilter" data-value="">Categories</button>
					 <ul class="dropdown-menu button-group">
						<li><button type="button" class="filter-button" data-name="categoryfilter" data-value="">All Categories</button></li>

						<?php
						$args = array(
							'hide_empty' => true,
							'meta_query' => [
							  'relation' => 'OR',
							  [
									'key'     => 'in_latest_posts',
									'value'   => '1',
									'compare' => '=',
							  ],
							  [
									'key'     => 'in_latest_posts',
									'compare' => 'NOT EXISTS',
							  ],
							],
						);

						$categories = get_categories( $args );

						foreach ($categories as $category) {
						  echo '<li><button type="button" class="filter-button" data-name="categoryfilter" data-value="' .
							 $category->term_id .
							 '">' .
							 $category->name .
							 "</button></li>";
						}
						?>
					 </ul>
					 <input type="hidden" name="categoryfilter" id="categoryfilter" value="">
				  </div>
				</div>

				<div class="select-wrapper">
				  <div class="dropdown">
					 <button type="button" class="filter-button btn dropdown-toggle" data-bs-toggle="dropdown" data-name="datefilter" data-value="">News Dates</button>
					 <ul class="dropdown-menu button-group">
						<li><button type="button" class="filter-button" data-name="datefilter" data-value="">All Years</button></li>
						<?php
						foreach ($years as $year) {
						  echo '<li><button type="button" class="filter-button" data-name="datefilter" data-value="' .
							 $year .
							 '">' .
							 $year .
							 "</button></li>";
						}
						?>
					 </ul>
					 <input type="hidden" name="datefilter" id="datefilter" value="">
				  </div>
				</div>

			 </div> <!-- End Filter Wrapper -->

			 <!-- required hidden field for admin-ajax.php -->
			 <input type="hidden" name="action" value="mishafilter">
			 <button id="submitFilter" style="display:none;" type="submit">Apply Filters</button>
		  </form>
		</div>
	 </div>
  </div>

  <div class="container">
	
	<div id="misha_posts_wrap" class="row position-relative news-row" data-masonry="{&quot;percentPosition&quot;: true }">
		<?php
		$category_slugs = wp_list_pluck($categories, 'slug');
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 15,
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $category_slugs,
					'operator' => 'IN',
				),
			),
		);

		$posts_query = new WP_Query( $args );

		if ( $posts_query->have_posts() ) :
			while ( $posts_query->have_posts() ) : 
				$posts_query->the_post();
				
				get_template_part("template-parts/content-post");
			endwhile;
		else :
			$posts_html = "<p>Nothing found for your criteria.</p>";
		endif;
		wp_reset_postdata();
		?>

	 </div>
  </div>

  <!-- Pagination -->
  <div class="d-flex flex-wrap justify-content-center button-wrapper my-4">
	 <?php
	 if ($posts_query->max_num_pages > 1) {
		echo '<div class="button animated-border-button button-border-orange button-text-dark" id="misha_loadmore">More posts</div>'; // you can use <a> as well
	 }
	 ?>
  </div>

  <script>
	 // Attach click event handlers to the filter buttons
	 document.querySelectorAll('.filter-button').forEach(function(button) {
		button.addEventListener('click', selectFilter);
	 });

	 // Function to select a filter option
	 function selectFilter() {
		var name = this.getAttribute('data-name');
		var value = this.getAttribute('data-value');
		var input = document.getElementById(name);
		input.value = value;
		document.querySelectorAll('[data-name="' + name + '"]').forEach(function(button) {
		  button.classList.remove('selected');
		});
		if (value) {
		  this.classList.add('selected');
		  //this.parentNode.parentNode.querySelector('button[data-name="' + name + '"][data-value=""]').innerHTML = this.innerHTML;
		} else {
		  //this.parentNode.parentNode.querySelector('button[data-name="' + name + '"][data-value=""]').innerHTML = 'Select ' + name.substring(0, name.length - 6) + '...';
		}
	 }
  </script>

  <?php get_footer();
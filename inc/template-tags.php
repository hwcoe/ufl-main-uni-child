<?php

/**
 * Custom template tags for this theme
 *
 * @package Bootscore
 */

/**
 * Display list of social network links only if they are set in the Customizer theme options
 */

function social_url_default( $setting ) {
    $defaults = array(
        'facebook_url' => __( 'https://www.facebook.com/UFWertheim/' ),
        'twitter_url' => __( 'https://twitter.com/ufwertheim/' ),
        'youtube_url' => __( 'https://www.youtube.com/user/gatorengineering' ),
        'linkedin_url' => __( '' ),
        'instagram_url' => __( 'https://www.instagram.com/ufwertheim/' ),
        'flickr_url' => __( '' ),
        'feed_url' => __( '' ),
    );
    return $defaults[$setting];
}

if (!function_exists('hwcoe_socialnetworks')) :
	function hwcoe_socialnetworks() {

		$social_networks = array(
			'facebook' => 'Facebook',
			'twitter' => 'X (formerly Twitter)',
			'youtube' => 'YouTube',
			'linkedin' => 'LinkedIn',
			'instagram' => 'Instagram',
			'flickr' => 'Flickr',
			'feed' => 'News Feed',
		);
		
		foreach( $social_networks as $name => $title ){
			$link = get_theme_mod( "{$name}_url", social_url_default( "{$name}_url" ) );
			$icon = get_stylesheet_directory_uri();
			$icon .= "/img/spritemap.svg#{$name}";
			if( !empty($link) ){
				$social_html = '<a href="' . esc_url($link) . '" target="_blank" class="' . esc_attr($name) . '-icon">';
				$social_html .= '<svg class="ufl-brands ufl-' . esc_attr($name) . '"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="' . esc_url($icon) . '"></use></svg>';
				$social_html .= '<span class="visually-hidden">' . esc_html($title) . '</span></a>';
				$social_html .= '</a>';
				echo $social_html;
			}
		}
	}
endif;
// Social networks End

// Featured Image
if (!function_exists('hwcoe_post_thumbnail')) :
  /**
   * Displays an optional post thumbnail with caption.
   *
   * Wraps the post thumbnail in an anchor element on index views, or a div
   * element when on single views.
   */
  function hwcoe_post_thumbnail() {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
      return;
    }

    if (is_singular()) :
?>

      <div class="post-thumbnail">
        <?php the_post_thumbnail('full', array('class' => 'rounded mb-3')); ?>
        <?php
	        $caption = get_the_post_thumbnail_caption();
	        if ($caption) {
	        	echo '<p class="figure-caption">' . esc_html($caption) . "</p>";
	        } 
        ?>
      </div><!-- .post-thumbnail -->

    <?php else : ?>

      <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
        <?php
        the_post_thumbnail('post-thumbnail', array(
          'alt' => the_title_attribute(array(
            'echo' => false,
          )),
        ));
        ?>
      </a>

<?php
    endif; // End is_singular().
  }
endif;
// Featured Image End

// Post meta
if (!function_exists('hwcoe_post_meta')) :
  /**
   * Displays post datatime, plus optional byline and source.
   */ 

	function hwcoe_post_meta() {

		//Date
		$date = sprintf( '<span><time class="entry-date" datetime="%1$s">%2$s</time></span>',
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		// Byline
		$byline = get_field( 'story_byline' );
		if ($byline) {
			$author = sprintf( '<span>%1$s %2$s</span>', 'By ', esc_html($byline) );
		} else {
				$author = '';
		};

		// Story Source

		$source_title = get_field( 'story_source_title' );
		$source_url = get_field( 'story_source_url' );

		if ($source_title) {
			$source = '<span>Story originally published on <a href="' . esc_url($source_url) . '" target="_blank">' . esc_html($source_title) . '</a></span>';
		} else {
			$source = '';
		}

		//Output 
		echo '<p class="entry-meta text-muted">' .  $date . $author . $source . '</p>';

	}

endif;
// Post meta
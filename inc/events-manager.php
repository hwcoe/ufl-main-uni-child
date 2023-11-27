<?php
/*
	These functions relate to the Events Manager plugin.

*/

// Events Manager plugin event breadcrumbs
if (!function_exists('event_breadcrumb')) :
function event_breadcrumb($post, $displayCurrent) {
	echo '<nav aria-label="breadcrumb" class="breadcrumb-wrapper"><ol class="breadcrumb">';
	echo '<li class="breadcrumb-item"><a href="' . home_url() . '">' . 'Home' . '</a></li>';
	// Add Events page or permalink slug to breadcrumbs if Events Manager is activated and the event post type is displayed
	if( 'event' == get_post_type() && class_exists('EM_Events') ) {
		$events_page_id = get_option ( 'dbem_events_page' );
 		$events_page_url = (!empty($events_page_id)) ? get_permalink($events_page_id) : '';

 		$events_permalink_slug = trailingslashit( home_url() ) . get_option( 'dbem_cp_events_slug' );
 		$events_permalink_slug = ( !empty($events_permalink_slug) ) ? trailingslashit($events_permalink_slug) : $events_permalink_slug;

 		if( !empty($events_page_url) ) {
 			$events_page_title = get_the_title($events_page_id);
			$events_page_ancestors = get_post_ancestors($events_page_id);
			if ( $events_page_ancestors) {
				$events_page_ancestors = array_reverse($events_page_ancestors);
				foreach ( $events_page_ancestors as $crumb_id ){
					echo '<li class="breadcrumb-item"><a href="' . get_permalink( $crumb_id ) . '">' . get_the_title( $crumb_id ) . '</a></li>';
				}
			}
			echo '<li class="breadcrumb-item"><a href="' . $events_page_url . '">'. $events_page_title . '</a></li>';
 		} else {
			echo '<li class="breadcrumb-item"><a href="'. $events_permalink_slug .'">Events</a></li>';
 		}
 	}

	if($displayCurrent){ //If TRUE - output the current page title
		echo "<li class='breadcrumb-item active' aria-current='page'>". get_the_title($post) ."</li>";
	}

  echo '</ol></nav>';

}
add_filter('breadcrumbs', 'breadcrumbs');
endif;
// Events Manager breadcrumb END
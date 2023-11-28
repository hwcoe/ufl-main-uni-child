<?php
/*
	These functions relate to the ACF PRO plugin.

*/

/*
* Integrating Advanced Custom Fields
*/
if (!function_exists('hwcoe_acf_json_save_point')) { 
	add_filter('acf/settings/save_json', 'hwcoe_acf_json_save_point');

	function hwcoe_acf_json_save_point( $path ) {
		$path = HWCOE_CHILD_INC_DIR . '/acf-json';
		// return
		return $path; 
	}
}

if (!function_exists('hwcoe_acf_json_load_point')) {
	add_filter('acf/settings/load_json', 'hwcoe_acf_json_load_point');
	function hwcoe_acf_json_load_point( $paths ) {	
		unset($paths[0]);
   
		array_push(
			$paths,
			// load child theme custom fields
			HWCOE_CHILD_INC_DIR . '/acf-json',
			// load parent theme custom fields		
			// get_template_directory() . '/inc/advanced-custom-fields/acf-json'
		);

		return $paths;
	}
}

// Limit the ACF Custom Fields dashboard menu to users who are site administrators (single site) or network admins (multisite)
function hwcoe_acf_init() {
	acf_update_setting('capability', 'update_plugins'); 
}
add_action('acf/init', 'hwcoe_acf_init');

// remove parent theme's meta box to disable breadcrumbs since the value doesn't retain on save
add_action('add_meta_boxes', 'remove_ufl_menu_metaBox', 9);
function remove_ufl_menu_metaBox() {
	remove_action( 'add_meta_boxes', 'ufl_menu_metaBox');
}

add_action('save_post', 'remove_ufl_save_menu_metaBox', 9);
function remove_ufl_save_menu_metaBox() {
	remove_action('save_post', 'ufl_save_menu_metaBox');
}

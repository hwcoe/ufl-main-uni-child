# HWCOE Mercury Child

Child theme for UFL Mercury.

License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Changelog

1.3.0
- Add index.php to prevent directory listing of acf-json files

1.2.0
- Bugfix: fix z-index setting where masthead hides WP admin bar dropdown
- Bugfix: remove duplicated content display in default page template
- Bugfix: add CSS variables so .hero-caption has background color in editor
- Bugfix: check if DONOTCACHEPAGE constant is already set when members only option is enabled
- Tweak order and modernize Sass
- Change .tab-block-wrapper alignment to baseline rather than center (keeps tab block nav from dropping too far with longer content)
- Change main menu dropdown item display property for Safari
- Make link color white in dark bg content areas
- Add support for dark gray background color elements in editor color palette
- Adjust paragraph styling in footer copyright section
- Adjust post template styles to improve featured image display
- Add post option to hide featured image in single post display for no-sidebar and sidebar-left templates
- Unregister top nav search widget area that isn't displayed in the theme 
- Add social media link defaults to front end display 
- Replace WordPress ob_end_flush functionality (see https://stackoverflow.com/questions/38693992/notice-ob-end-flush-failed-to-send-buffer-of-zlib-output-compression-1-in)
- Reconcile Mercury parent theme updates
	- Unregister parent theme's new social media footer widget (conflicts with child theme option)
	- Fix JS error causing links not to work in mobile information and resources menus
	- Change desktop search display if there are no auxiliary menus
	- Override non-child-theme-friendly Mercury Form page template 

1.1.2-beta
- bugfix: Add Members Only page option fields to theme files

1.1.1-beta
- bugfix: typo in hwcoe_socialnetworks() function 
- bugfix: Add wrapper divs to classic editor video embeds to make them responsive
- disable loading of unnecessary/unwanted scripts

1.1.0-beta
- Add page templates: Page title with no sidebar and Page title with section nav
- Update parent script enqueueing
- Integrate ACF PRO Local JSON; replace parent theme breadcrumb disable with ACF field
- Add UF Monogram as default alternate logo image
- Only display info and resources menus if locations have menus assigned
- Change hard coded labels for info and resources menu to display the menu name
- Remove Customizer and Menu controls that don't actually cause anything to display
- Add ability to set unit specific social and other media URLs for FB, X, YT, LI, IG, Flickr, RSS feed in Customizer
- Add Members Only option to page templates
- Add child theme textdomain (TODO: generate language localization files)
- Add comments template to default post template
- Update full width image post template
- Add smooth scrolling for in-page anchors
- Edit search form to use site-limited search.ufl.edu rather than programmable Google Search (eases implementing site-limited search for end users)
- Add Events Manager event template and custom functions and templates (TODO: styles for booking form, login form, and EM widget)
- Update 404 template
- Update CSS
- Add custom classes to footer columns to enable CSS targeting

1.0.0-beta
- Enqueue dependencies, parent theme and child theme styles
- Enqueue example child scripts
- Include example custom function (favicon)
- Add theme screenshot
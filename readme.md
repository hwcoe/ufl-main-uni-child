# HWCOE Mercury Child

Child theme for UFL Mercury.

License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Changelog

1.4.2
- Switch display property of .dropdown-item to inline-block (because we didn't do that fr in 1.4.1)

1.4.1
- Allow display of posts page content above latest posts
- Bugfix: keep most recently published post content from displaying above latest posts
- Bugfix: update SQL syntax for displaying latest posts date filter
- Adjust footer-widget styles for h2 and ul
- Adjust padding-top for fullwidth-text-block container
- Switch display property of mega menu dropdown items to inline-block for Safari on desktop
- Fix background and text color of active links in mobile primary nav
- Update dependencies

1.4.0
- Change site search from search.ufl.edu to site-specific Google Custom Search Engine with 'data-as_sitesearch' attribute
- Remove author from front end post templates and archive
- Display footer image when one is uploaded to Customizer, even if Alternate Logo Text is enabled in the header

1.3.0
- Add index.php to prevent directory listing of acf-json files
- Remove list bullets and edit styles for Latest Posts and Query Loop blocks 
- Fix general form styling and body font default
- Edit Mercury Form Layout page template
	- Remove overly opinionated theme-overriding bootstrap styles
	- Add Disable Breadcrumbs and Members Only functionality
	- Display page title, since content container has padding and doesn't really mesh with UFL blocks including the title block
- Edit enqueueing of be-editor scripts with correct syntax to fix PHP error
- Override z-indexes for ufl-blocks elements that obscure nav menus
- Override home.php template so post content does not appear at the top of the latest posts display
- Enable "hide featured image in single post display" post option for no-sidebar and sidebar-left post templates only

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
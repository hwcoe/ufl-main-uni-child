/*jshint esversion: 6 */
// Smooth scrolling
jQuery(function($) {
	// Performs a smooth page scroll to an anchor on the same page.
	// https://css-tricks.com/snippets/jquery/smooth-scrolling/
	// updated: https://css-tricks.com/smooth-scrolling-accessibility/

	// Select all links with hashes and exclude the carousel control links
	$('a[href*="#"]:not(.carousel-control)')
	// Remove links that don't actually link to anything
	.not('[href="#"]')
	.not('[href="#0"]')
	.click(function(event) {
		// On-page links
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			// Does a scroll target exist?
			if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();

				// Animate scrolling
				$("html, body").animate({ scrollTop: target.offset().top - 60}, 500, "linear");
				
				// set focus in new location
				target.focus();
				if (target.is(":focus")){
					return false;
				} else {
					target.attr("tabindex","-1");
					target.focus();
				}
				return false;
			}
		}
	});

	// Responsive embeds
	// Styled wrapper div around all iframes with src containing youtube or vimeo that is embedded via the classic editor (i.e. has <p> as its parent tag)
	$('iframe[src*="youtube"],[src*="vimeo"]').parent("p").each(function() {
		$(this).wrap("<div class=\"wp-block-embed wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\"></div></div>");
	});
});

// different-page anchor links
jQuery ( document ).ready ( function($) {
	var hash= window.location.hash;
	if ( hash == '' || hash == '#' || hash == undefined ) return false;
	var target = $(hash);
	target = target.length ? target : $('[name=' + hash.slice(1) +']');
	if (target.length) {
		// Animate scrolling
		$('html,body').stop().animate({ scrollTop: target.offset().top - 60}, 500, 'linear');
	}
});

jQuery(document).ready(function ($) {
	jQuery('.mobile-secondary-dropdown').find('.nav-link').removeAttr('data-bs-toggle');
	jQuery('.mobile-secondary-dropdown').find('.dropdown-toggle-top').attr('data-bs-toggle', 'dropdown');
});

// Search Modal
function displaySearchModalChild(){
    const searchModal = document.getElementById('search-modal');
    searchModal.style.display = 'block';
    // const searchInput = document.getElementById('gsc-i-id1');
    const searchInput = document.getElementById('query_content');
    searchInput.placeholder = 'How can we help you?';
    // searchInput.placeholder = 'test placeholder';
    searchInput.style.background = 'none';
    // document.getElementsByClassName('gsc-search-button-v2')[0].innerHTML = 'search-modal-icon.png';
    // document.getElementsByClassName('search-submit')[0].innerHTML = 'search-modal-icon.png';
    document.getElementById('query_content').focus();
    document.body.classList.add('search-open');
  }

// END Search Modal


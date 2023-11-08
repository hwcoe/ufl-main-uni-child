<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootscore
 *
 * @version 5.2.0.0
 */

 $post_id = get_queried_object_id();
 $second_featured_image = get_post_meta($post_id, 'second_featured_image', true);
 $custom_text = get_post_meta($post_id, 'custom_text', true);
?>




<!-- START FOOTER WRAPPER -->
<div class="footer-wrapper position-relative">
  <div id="footerTopBorder" style="width: 1%;"></div>
    <!-- Footer -->
    <footer class="footer m-0 footer-title pb-4 text-lg-start text-white">
      <!-- Grid container -->
      <div class="container-fluid p-4 pb-0">
        <!-- Section: Links -->
        <section class="footer-section">

          <!--Grid row-->
          <div class="row">

            <div class="col-12 col-md-6 footer-col-logo pb-5">
        
            <?php if ( get_theme_mod( 'display_header_content', false ) && !$second_featured_image )  {
                $alternate_logo = get_theme_mod( 'alternate_logo' );
                $alternate_logo_text = get_theme_mod( 'alternate_logo_text' );
                $alternate_logo_url = wp_get_attachment_image_url( $alternate_logo ) ? wp_get_attachment_image_url( $alternate_logo, 'full' ) : get_stylesheet_directory_uri() . '/img/UF_Monogram_Orange.png';
                ?>
              <!-- Display content when the checkbox is checked -->
              <a class="navbar-brand navbar-brand-alternate" href="<?= home_url(); ?>" tabindex="0" alt="Home">
                <span class="alt-logo">
                  <img src="<?= $alternate_logo_url; ?>" alt="Logo" title="school-logo" />
                  <span class="visually-hidden">School Logo Link</span>
                </span>
                <span class="alt-logo-txt">
                  <?php echo $alternate_logo_text; ?>
                </span>
              </a>
            <?php }  
        elseif ($second_featured_image || get_theme_mod( 'display_header_content', false ) ) { ?>
        <a class="navbar-brand navbar-brand-alternate" href="<?= home_url(); ?>" tabindex="0" alt="Home">
          <span class="alt-logo">
                <img src="<?= $second_featured_image ?>" alt="Logo" title="logo" />
                </span>
              <span class="alt-logo-txt">
                <?= $custom_text; ?>
            </span>
        </a>
    <?php } else { ?>
              <a class="navbar-brand" href="<?= home_url(); ?>" alt="Home">
              <span><?php     
                $footer_image_id = get_theme_mod( 'footer_image' );
                  if ( $footer_image_id ) {
                      // Display the footer image
                      echo wp_get_attachment_image( $footer_image_id, 'full' );
                  } else {
                  the_custom_logo();
                  echo '<span class="visually-hidden">School Logo Link</span>';
                }?></span>
              </a>
    <?php } ?>
  </div>

            <div class="col-12 col-md-5 footer-col-social">
              <a href="http://www.facebook.com/uflorida/" target="_blank" class="facebook-icon" rel="noopener" alt="School Facebook">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="ufl-brands ufl-facebook"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                <span class="visually-hidden">Facebook Icon</span>
              </a>
              <a href="https://twitter.com/UF/" target="_blank" class="twitter-icon" rel="noopener" alt="School Twitter">
                <svg viewBox="0 0 1200 1227" fill="none" xmlns="http://www.w3.org/2000/svg" class="ufl-brands ufl-twitter"><path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" fill="currentColor"/></svg>
                <span class="visually-hidden">Twitter Icon</span>
              </a>
              <a href="https://instagram.com/uflorida/" target="_blank" class="instagram-icon" rel="noopener" alt="School Instagram">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="ufl-brands ufl-instagram"><path fill="currentColor"  d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                <span class="visually-hidden">Instagram Icon</span>
              </a>
              <a href="http://www.youtube.com/user/universityofflorida/" target="_blank" class="youtube-icon" rel="noopener" alt="School Youtube">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="ufl-brands ufl-youtube"><path fill="currentColor"  d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>
                <span class="visually-hidden">Youtube Icon</span>
              </a>
            </div>
          </div><!--END TOP Grid row-->
          <!--Start Link Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 mx-auto my-4 footer-address-col">
              <div class="footer_widget mb-4">
                <?php if (is_active_sidebar('top-footer')) : 
                  dynamic_sidebar('top footer'); 
                endif; ?>
              </div>
            </div>
            <!-- END Grid column -->
  
            
  
            <!-- Grid column -->
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 mx-auto my-4 footer-col">
            <div class="footer_widget mb-4">
              <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
              <?php endif; ?>
              </div>
            </div>
            <!-- END Grid column -->
  
            
  
            <!-- Grid column -->
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 mx-auto my-4 footer-col">
            <div class="footer_widget mb-4">
            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
              <?php endif; ?>
            </div>
            </div>
            <!-- END Grid column -->
            
  
            <!-- Grid column -->
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 mx-auto my-4 footer-col">
            <div class="footer_widget mb-4">
            <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
              <?php endif; ?>
            </div>
              </div>
              <!-- END Grid column -->

              <!-- Grid column -->
              <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 mx-auto my-4 footer-col">
              <div class="footer_widget mb-4">
              <?php if (is_active_sidebar('footer-4')) : ?>
                <?php dynamic_sidebar('footer-4'); ?>
              <?php endif; ?>
              </div>
              </div>
            <!-- END Grid column -->
          </div>
          <!--END Grid row-->
        </section>
        <!-- Section: Links -->
  

        <!-- Section: Copyright NEED TO TWEAK -->
        <section class="copyright-section">
          <div class="row">
            <!-- Grid column -->

            <div class="col-12 copyright-col">
              <span id="footer-copyright">
              <!-- Copyright -->
              <?php if (is_active_sidebar('footer-copyright')) : ?>
                <?php dynamic_sidebar('footer-copyright'); ?>
              <?php endif; ?>
              <!-- Copyright -->
              </span>
              </div>
          </div>
        </section>
        <!-- Section: Copyright -->
      
      </div>
      <!-- Grid container -->
    <!-- Footer -->
  </div>
<!-- END FOOTER WRAPPER -->
<?php wp_footer(); ?>

<?php get_template_part('template-parts/content', 'offcanvas-search'); ?>

</body>
</html>
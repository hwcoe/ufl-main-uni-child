<form action="https://search.ufl.edu/search" method="get" class="search-form" role="search" aria-label="Search Form">
  <label for="query_content" class="visuallyhidden sr-only"><?php esc_html_e('Search', 'ufl_stamatschild'); ?></label>
  <input type="text" id="query_content" name="query" placeholder="<?php esc_attr_e('Search', 'ufl_stamatschild'); ?>" />

  <label for="submit_content" class="visuallyhidden">Submit</label>
     
  <button type="submit" id="submit_content" class="btn-search">
    <span class="sr-only"><?php esc_html_e('Search', 'ufl_stamatschild'); ?></span>
    <span class="icon-svg">
      <svg>
        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/spritemap.svg#search"></use>
      </svg>
    </span>
  </button>
  
  <input type="hidden" name="source" id="source_content" value="web">
  <input type="hidden" name="site" id="site_content" value="<?php $parsed_url = parse_url( home_url() ); echo $parsed_url['host']; if ( isset($parsed_url['path']) ) { echo $parsed_url['path']; } ?>">      
</form>
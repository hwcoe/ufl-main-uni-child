<form action="https://search.ufl.edu/search" method="get" class="search-form" role="search" aria-label="Search Form">

   <input class="form-control search-input" type="search" name="query" id="query_content" placeholder="How can we help you?" tabindex="1" autofocus="true" aria-label="Search" value="">
  <a class="btn search-submit" type="submit" tabindex="2"><span class="visually-hidden-focusable">Search Submit</span></a>
  
  <input type="hidden" name="source" id="source_content" value="web">
  <input type="hidden" name="site" id="site_content" value="<?php $parsed_url = parse_url( home_url() ); echo $parsed_url['host']; if ( isset($parsed_url['path']) ) { echo $parsed_url['path']; } ?>">      
</form>
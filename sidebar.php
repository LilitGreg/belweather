<?php wp_head(); ?>
   <div class="sidebar">
     
       <form class="search-form" method="get"  class="search-form" action="<?php echo home_url(); ?>" role="search">
            <input class="search-input" type="search" name="s" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Search...', 'bellwethercare' ); ?>">
            <button class="search-submit" type="submit"  role="button">  <i class="fa fa-search" aria-hidden="true"></i>  </button>
        </form>
    <?php
      if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
          <ul class="sidebar_posts">
              <?php dynamic_sidebar( 'sidebar-right' ); ?>
          </ul>
    <?php endif; ?>
</div>

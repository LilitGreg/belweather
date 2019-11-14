<?php
get_header(); ?>
	<div class="clearfix container cont_search">
        <div class="row">
    		<div  class="col-md-8">
    		<?php
    		 if ( have_posts() ) : ?>
    				<h1 class="page-title"><?php
    					printf( esc_html__( 'Search Results for: %s', 'bellwethercare' ), '<span>' . get_search_query() . '</span>' );
    				?></h1>
    			<?php
    			/* Start the Loop */
    			while ( have_posts() ) : the_post();
                      ?>
                     <div class="">
                     		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                     	<div class="entry-summary">
                     		 <span class="date"><?php the_time('F j, Y'); ?>   </span> <br>
                     	    <?php  the_excerpt(); ?>
                     	</div>
                    </div>

                <?php
    			endwhile;
    		else :
    			get_template_part( 'template-parts/content', 'none' );
    		endif; ?>
        </div>
        <div class="col-md-4">
            <?php  get_sidebar();  ?>
        </div>
      </div>
	</div>

<?php

get_footer();

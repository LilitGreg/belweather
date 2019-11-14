<?php get_header(); ?>
<div class="clearfix container archive_cont">
    <div class="row">
        <div class="col-md-8">
        <?php
         if (have_posts()) :
            while (have_posts()) : the_post();
               if ( has_post_thumbnail()) :  ?>
                <div class="arch clearfix">
                    <div class="col-md-6">
                        <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail('medium');  ?>
                        </a>
                       <?php endif;
                        ?>
                    </div>

                    <div class="col-md-6 ">
                         <h3>
                             <a  href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                              <?php the_title(); ?>
                             </a>
                         </h3>
                          <?php the_excerpt(); ?>
                    </div>

              </div>

           <?php
            endwhile;
        endif;
        ?>
    </div>
    <div class="col-md-4">
        <?php get_sidebar(); ?>
    </div>
    </div>
</div>
<?php get_footer(); ?>

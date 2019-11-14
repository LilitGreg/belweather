<?php get_header();?>
<div class="container single_container">
    <div class="row">
         <div class="col-md-8">
             <?php  //$curr=get_permalink( $post->ID ); ?>
             <?php //echo $curr; ?>

             <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
                  <div class="clearfix">
                     <div class="post">
                          <?php
                            //$count_posts->current_post + 1;

                            //var_dump($count_posts);
                            ?>
                             <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                 				<!-- <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> -->
                 					<?php the_post_thumbnail('full');?>

                 				<!-- </a> -->
                 			<?php endif; ?>
                              <?php
                            echo  "<pre class='caption'> Photography by ";
                            echo get_post(get_post_thumbnail_id())->post_excerpt;
                            echo  "</pre>";  ?>
                            <span class="date"><?php the_time('F j, Y'); ?>   </span>

                                 <h3>
                     				<?php the_title(); ?>
                     			</h3>
                                 <?php  the_content(); ?>


                <!-- <?php $postid = get_the_ID();
                echo $postid;  ?> -->

                <div class="postnav navigation">
                    <p class="navicon"><?php  previous_post_link('%link','< Prev'); ?></p>
                    <p class="navicon"><?php  next_post_link('%link','Next >'); ?></p>
                </div>

              </div>
                  <?php endwhile; ?>

                 </div>
             <?php endif; ?>
         </div>
         <div class="col-md-4">
            <?php get_sidebar(); ?>
         </div>
    </div>

</div>
<?php get_footer(); ?>

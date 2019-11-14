<?php
/* Template Name:Blog_page*/
?>
<?php get_header(); ?>
<div class="wrapper   clearfix">
    <div class="row row_page">
        <div class="col-md-8">

            <?php echo '<div class="row row_blog">';
             ?>
            <?php

           $argscus = array( 'post_type' => 'post',  'posts_per_page' => -1, 'order'=>DESC );
          // $argscus = array( 'category_name' => 'more-top-stories', 'post_type' => 'post',  'posts_per_page' => -1, 'order'=>DESC );
    		$loop = new WP_Query( $argscus );
    		while ( $loop->have_posts()  ) :
    		  $loop->the_post();
              $count_posts = $loop->current_post + 1;
              if ($count_posts%2 == 1  && $count_posts!= 1) {
                  //var_dump($count_posts);
                  // echo '</div>';
                   echo '</div>';
                   echo '<div class="row row_blog">';
                    //echo '<div class="news_content clearfix">';
               }
               echo '<div class="col-md-6 col-sm-6 col-xs-12">';
               echo '<div class="innernews">';
                   ?>
                   <?php if ( has_post_thumbnail()) :  ?>
                       <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                           <?php the_post_thumbnail('medium');  ?>
                       </a>
                   <?php endif; ?>
                   <div class="blog_content">
                       <a href="<?php echo get_permalink(); ?>">
                        <h3>
                            <?php the_title(); ?>

                        </h3>
                       </a>
                        <?php  the_excerpt(); ?>
                         <span class="date"><?php the_time('F j, Y'); ?>   </span>
                   </div>

                   <?php
               echo '</div>';
               echo '</div>';
               if($count_posts==20) {
                    break;
               }
           endwhile;

        echo "</div>"; ?>

        </div>
        <div class="col-md-4">
             <?php get_sidebar(); ?>
        </div>

     </div>
</div>
<?php get_footer(); ?>

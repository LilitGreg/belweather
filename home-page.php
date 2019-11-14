<?php
/* Template Name: Home_page*/
?>
<?php get_header(); ?>


<div class="clearfix wrapper" id="pageshow">
    <!-- <div class="row"> -->
    <?php
       $argspg = array( 'post_type' => 'page', 'posts_per_page' => 1 );
       $looppg = new WP_Query( $argspg );
       $post_37 = get_post(37);
       $title37 = $post_37->post_title;
       $excerpt37 = $post_37->post_excerpt;
       $post_thumbnail_id = get_post_thumbnail_id( $post_37);
    ?>

        <div class="pagetext clearfix">
            <!-- <a href="http://bellwethercare.followprogress.com/finding-a-way-together/"> <h3>   <?php echo $title37; ?> </h3> </a> -->

            <a href="http://bellwethercare.followprogress.com/finding-a-way-together/">
              <img  class="pageimg" src="<?php echo wp_get_attachment_image_url($post_thumbnail_id,'full'); ?>" alt="Smiley face">
            </a>
            <p> <?php //echo $excerpt45;
                echo nl2br($excerpt37);
             ?> <br>  <a  id="read-more" href="http://bellwethercare.followprogress.com/finding-a-way-together/"> Consult with Me  </a>
            </p>
        </div>
  <!-- </div> -->
</div>

 <div class="clearfix wrapper" id="cust_post">
         <a href="../blog">  <h3>   Latest Posts   </h3> </a>
        <div class="row latest_post">
        <?php
          $argscus = array( 'post_type' => 'post', 'posts_per_page' => -1, 'order'=>DESC );
    		$loop = new WP_Query( $argscus );
    		while ( $loop->have_posts()  ) :
    		  $loop->the_post();
              $count_posts = $loop->current_post + 1;
              if ($count_posts%3 == 1  && $count_posts!= 1) {
                  var_dump($count_posts);
                  // echo '</div>';
                   echo '</div>';
                   echo '<div class="row row_news">';
                    //echo '<div class="news_content clearfix">';
               }
               echo '<div class="col-md-4 col-sm-4 col-xs-12">';
               echo '<div class="innernews">';
                if ($count_posts==4) {
                    break;
                }
               ?>
                  <?php if ( has_post_thumbnail()) :  ?>
                       <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                           <?php the_post_thumbnail('large');  ?>
                       </a>
                   <?php endif; ?>
                   <a href="<?php echo get_permalink(); ?>">
                    <h4>
                        <?php the_title(); ?>

                    </h4>
                   </a>
                    <span class="date"><?php the_time('F j, Y'); ?>   </span>
                      <!-- <a href="<?php echo get_permalink(); ?>" class="read_more"> View Full Article </a> -->
                   <?php
               echo '</div>';
               echo '</div>';

           endwhile;
           ?>
    </div>
    <div class="read_posts">
         <a href="../blog/" class="more"> Read More </a>
    </div>
 </div>

 <!-- <?php the_content(); ?> -->
<?php get_footer(); ?>

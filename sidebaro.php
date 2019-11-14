<?php wp_head(); ?>
   <div class="sidebar">
   <?php
       global $wp_query;
       $current=$wp_query->post->ID;
       //echo $current;
    ?>
        <?php

           if( get_field('side_img', $current) ):
                 $image2 = get_field('side_img');
                 $url2 = $image2['url'];
             ?>
             <a href="#">    <img src="<?php echo $url2; ?>"  />  </a>
             <!-- <div  class="poligon_back" style="background-image:url(
              <?php echo  $url1;  ?>);>
             </div> -->
         <?php endif; ?>

        <?php  echo  $desc_img = get_field("desc_img", $current);  ?>

       <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
            <div class="clearfix">
               <div class="post">


                       <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                           <a class="picthumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                               <?php the_post_thumbnail('full');  ?>
                           </a>
                       <?php endif; ?>
               </div>
            <?php endwhile; ?>
           </div>
       <?php endif; ?>

   </div>

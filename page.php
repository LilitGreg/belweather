<?php get_header(); ?>
<div class="wrapper   clearfix">
    <div class="row row_page">
             <?php
              if (have_posts()) :
                 while (have_posts()) : the_post();
                     the_content();
                 endwhile;
             endif;
             ?>
     </div>
</div>
<?php get_footer(); ?>

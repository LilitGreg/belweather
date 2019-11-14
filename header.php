<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<media:thumbnail url="http://anyurl.com/thumbnailname.jpg" width="150" height="150"/>
		<?php wp_head(); ?>
	</head>
    <body <?php body_class(); ?>>
        <header class="header">


			     <?php  if (is_front_page()) { ?>
			         <div class="backimg"   style="background-image:url(
                      <?php  echo get_theme_mod( 'img-upload', 'No copyright information has been saved yet.' );?>
                  );"> <?php
				       $value= get_theme_mod( 'img-upload', 'No copyright information has been saved yet.' );
                      //echo  $value;
					  $id_attach=pippin_get_image_id($value);
					  // 2nd
					  // $image = get_post($id_attach);
					  // $image_caption = $image->post_excerpt;
					  // echo  $image_caption;
					   echo  "<pre class='caption'> Photography by "; echo   wp_get_attachment_caption($id_attach); echo "</pre>";
					  //echo    get_attachment_id($value);
			     }
				 ?>

                  <div class="wrapper clearfix">
                      <div class="row">
                          <div class="col-md-4 col-sm-3">
                              <a href="<?php echo home_url(); ?>" id="logo">
                               <h3> Bellwether Care, Inc. </h3>
                               <p> Finding a Way Together </p>
                               </a>
                          </div>
                          <div class="col-md-8 col-sm-9">
                              <nav id="navbar" class="navbar">
                                  <?php  bellwethercare_nav(array('header-menu' => 'menu', 'container' => '', 'menu_class'  => '')); ?>
                              </nav>

							  <div class="dropdown collap_menu">
							  <a class="dropdown-toggle" id="menutog"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span>
										   <i  class="fa fa-bars"></i>
									</span>
							  </a>
							  <div class="dropdown-menu dd_menu" aria-labelledby="dropdownMenuButton">
							    <?php  bellwethercare_nav(array('header-menu' => 'menu', 'container' => '', 'menu_class'  => '')); ?>
							  </div>
							</div>

                          </div>
                      </div>
                 </div>
               <?php if (is_page() )  { ?>
                   <div class="backimg">
					  <?php
						  global $wp_query;
						  $current=$wp_query->post->ID;
						  //echo $current;
					   ?>
						   <?php

							  if( get_field('back_img', $current) ):
									$image2 = get_field('back_img');
									$url2 = $image2['url'];
									$caption = $image2['caption'];

								    echo  "<pre class='caption'> Photography by "; echo   $caption; echo "</pre>";
									//echo $url2;
									///echo wp_get_attachment_caption($current);
									//
									// $image = get_post(134);
									// $image_title = $image->post_title;
									// $image_caption = $image->post_excerpt;
									// echo  $image_caption;
									   ?>
                                 <img src="<?php  echo  $url2;  ?>"  class="back_pag" alt="back_img_page">
							<?php endif;  ?>
					  <?php
				  }   ?>
				  <?php if (is_single() )  { ?>
					  <div class="backimg">
						<?php
							global $wp_query;
							$current=$wp_query->post->ID;
							//echo $current;
						 ?>
							 <?php

								if( get_field('back_img_post', $current) ):
									  $image2 = get_field('back_img_post');
									  $url2 = $image2['url'];
									  $caption = $image2['caption'];
									 // echo  "<pre class='caption'> Photography by "; echo   $caption; echo "</pre>";
								  ?>

									<!-- <img src="<?php  echo  $url2;  ?>" alt="back_img_poge"> -->
							  <?php endif;  ?>
						<?php
					}   ?>
                 <div class="captions clearfix">
     			     <p>   <?php  echo get_theme_mod( 'textbox', 'No copyright information has been saved yet.' );  ?> </p>
                 </div>

            </div>

        </header>

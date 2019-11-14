<?php


function style_script_lode(){

 wp_enqueue_script('jquery_library', get_template_directory_uri() . '/js/jquery-2.1.4.min.js');
 wp_enqueue_script('bootstrapjs', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

  //wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js');
  wp_enqueue_style('awesome-icons', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
  wp_enqueue_style('bootstrap', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
  wp_enqueue_style('bellwethercare-css', get_template_directory_uri(). '/css/style.css');

  if ((is_page() || is_single()|| is_archive()|| is_search()) && !(is_front_page())) {
       wp_enqueue_style('bellwethercare-page-css', get_template_directory_uri(). '/css/page.css');
  }

 }
add_action('wp_enqueue_scripts', 'style_script_lode');



function bellwethercare_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-header-container clearfix',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="clearfix">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function register_bellwethercare_menu()
{
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'bellwethercare'), // Main Navigation
        //'footer-menu' => __('Footer Menu', 'enewslogic'), // Footer Navigation
    ));
}
add_action('init', 'register_bellwethercare_menu');




/*----------customization--------------*/
function bell_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'section_one',
        array(
            'title' => 'Section_one',
            'description' => 'This is a background photo.',
            'priority' => 15,
        )
    );

    $wp_customize->add_setting(
       'textbox',
       array(
           'default' => 'Empowering Patients & Families',
       )
   );


   $wp_customize->add_control(
       'textbox',
       array(
           'label' => 'Caption-text-first',
           'section' => 'section_one',
           'type' => 'text',
       )
   );

    $wp_customize->add_setting( 'img-upload' );

	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'img-upload',
	        array(
	            'label' => 'Image Upload',
	            'section' => 'section_one',
	            'settings' => 'img-upload'
	        )
	    )
	);

}

add_action( 'customize_register', 'bell_customizer' );

add_theme_support( 'post-thumbnails' );
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'post', 'excerpt' );
//add_post_type_support( 'news', 'excerpt' );


function custom_excerpt_length( $length ) {
	return 18;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



/*--thumbnail*/
    //add_theme_support( 'my-custom-size' );
    add_theme_support( 'post-thumbnails' );
	the_post_thumbnail(); // Without parameter ->; Thumbnail
	the_post_thumbnail( 'thumbnail' ); // Thumbnail (default 150px x 150px max)
	the_post_thumbnail( 'medium' ); // Medium resolution (default 300px x 300px max)
	the_post_thumbnail( 'medium_large' ); // Medium-large resolution (default 768px x no height limit max)
	the_post_thumbnail( 'large' ); // Large resolution (default 640px x 640px max)
	the_post_thumbnail( 'full' ); // Original image resolution (unmodified)
	the_post_thumbnail( array( 340, 300 ) ); // Other resolutions (height, width)

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // default Featured Image dimensions (cropped)
    //add_image_size( 'category-thumb', 300, 9999 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'my-custom-size', 1300, 233 );
 }

//add_image_size( 'my-custom-size', 1200, 322, array( 'left', 'top' ) );
add_image_size( 'my-custom-size', 1300, 233 );

the_post_thumbnail( 'my-custom-size' );
set_post_thumbnail_size( 340, 233 ); // 50 pixels wide by 50 pixels tall, resize mode
set_post_thumbnail_size( 340,233, true ); // 50 pixels wide by 50 pixels tall, crop mode

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
return array_merge( $sizes, array(
'your-custom-size' => __( 'Your Custom Size Name' ),
) );
}



/*-------------custom post type ----------*/


function  bellwethercare_register_post_type(){

  $singular='Article';
  $plural='Articles';

  $labels=array(
  	'name'         =>$plural,
  	'singular_name'=>$singular,
  	'add_name'     =>'Add New',
  	'add_new_item' =>'Add New ' . $singular,
  	'edit'         =>'Edit',
  	'edit_item'    =>'Edit'.$singular,
  	'view'         =>'View'.$singular,
  	'view_item'    =>'View'.$singular,
  	'search_term'  =>'Search'.$plural,
  	'parent'       =>'Parent'.$singular,
  	'not_found'    =>'No'.$plural.'found',
  	'not_found_in_trash'=>'No'.$plural.'in Trash'
  	);


  $args=array(
      'labels'=>$labels,
     'public'              => true,
	 'publicly_queryable'  => true,
	 'exclude_from_search' => true,
	 'show_in_nav_menu'    => true,
	 'show_ui'             => true,
	 'show_in_menu'        => true,
	 'show_in_admin_bar'   => true,
	 'menu_position'       => 6,
	 'menu_icon'           => 'dashicons-info',
     'can_export'          => true,
     'delete_with_user'    => false,
     'query_var'           => true,
     'capability_type'     => 'page',
     'map_meta_cap'        => true,
	 'has_archive'         => false,
     'hierarchical'        => true,
     'taxonomies'  => array( 'category' ),
     // 'taxonomies'          => array('New York Post', 'category' ),

	 'rewrite'             => array(
	  'slug' => 'articles',
	   'with_front'=> true,
	   'pages' => true,
	   'feeds' => false,
	   ),
	    'supports'          => array(
		'title',
		 'editor',
         'thumbnail',
         //'excerpt'
		// 'author',
		// 'custom-fields',

		 )
  	);
  register_post_type('articles',$args);
}
add_action('init','bellwethercare_register_post_type');



/*---------------------Widget footer-----------------*/
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Footer-Sidebar', 'theme-slug' ),
        'id' => 'sidebar-footer',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<p class="widgettitle">',
		'after_title'   => '</p>',
    ) );
    register_sidebar( array(
        'name' => __( 'Sidebar-Right', 'theme-slug' ),
        'id' => 'sidebar-right',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<p class="widgettitle">',
		'after_title'   => '</p>',
    ) );
}

add_action( 'widgets_init', 'theme_slug_widgets_init' );





/** Genesis Previous/Next Post Post Navigation */
add_action( 'genesis_after_comments', 'eo_prev_next_post_nav' );
function eo_prev_next_post_nav() {
	if ( is_single() ) {
 		echo '<div class="prev-next-navigation">';
		previous_post_link( '<div class="previous">%link</div>', '&#60; Previous' );
		next_post_link( '<div class="next">%link</div>', 'Next &#62;' );
		echo '</div><!-- .prev-next-navigation -->';
	}
}


// retrieves the attachment ID from the file URL
function pippin_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
        return $attachment[0];
}

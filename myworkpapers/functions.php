<?php
/**
 * Theme Functions
 */

function theme_name_scripts() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css') );
	//wp_enqueue_style( 'style-name', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


/*Add Logo*/
function themename_custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}
 
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );



/* Menus */
function wpb_custom_new_menu() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu' ),
			'top-menu' => __( 'Top Menu' ),
			'footer-menu' => __( 'Footer Menu' ),
		)
	);
}
add_action( 'init', 'wpb_custom_new_menu' );


// Current Year Shortcode = [year]
function currentYear( $atts ){
    return date('Y');
}
add_shortcode( 'year', 'currentYear' );


/**
 * Remove archive labels.
 * 
 * @param  string $title Current archive title to be displayed.
 * @return string        Modified archive title to be displayed.
 */
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );
function my_theme_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
};



// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );



add_action('init', function() {
	register_post_type('testimonial', [
		'label' => __('Testimonial', 'txtdomain'),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-format-quote',
		'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'testimonial'],
		'labels' => [
			'singular_name' => __('Testimonial', 'txtdomain'),
			'add_new_item' => __('Add new Testimonial', 'txtdomain'),
			'new_item' => __('New Testimonial', 'txtdomain'),
			'view_item' => __('View Testimonial', 'txtdomain'),
			'not_found' => __('No Testimonials found', 'txtdomain'),
			'not_found_in_trash' => __('No Testimonials found in trash', 'txtdomain'),
			'all_items' => __('All Testimonials', 'txtdomain'),
			'insert_into_item' => __('Insert into Testimonial', 'txtdomain')
		],		
	]);
	
	
	register_post_type('integration', [
		'label' => __('Integration', 'txtdomain'),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-screenoptions',
		'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'integration'],
		'labels' => [
			'singular_name' => __('Integration', 'txtdomain'),
			'add_new_item' => __('Add new Integration', 'txtdomain'),
			'new_item' => __('New Integration', 'txtdomain'),
			'view_item' => __('View Integration', 'txtdomain'),
			'not_found' => __('No Integrations found', 'txtdomain'),
			'not_found_in_trash' => __('No Integrations found in trash', 'txtdomain'),
			'all_items' => __('All Integrations', 'txtdomain'),
			'insert_into_item' => __('Insert into Integration', 'txtdomain')
		],		
	]);
	
	register_post_type('marketplace', [
		'label' => __('Marketplace', 'txtdomain'),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-plus',
		'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'marketplace'],
		'taxonomies' => ['marketplace_cat'],
		'labels' => [
			'singular_name' => __('Marketplace', 'txtdomain'),
			'add_new_item' => __('Add new marketplace', 'txtdomain'),
			'new_item' => __('New marketplace', 'txtdomain'),
			'view_item' => __('View marketplace', 'txtdomain'),
			'not_found' => __('No marketplaces found', 'txtdomain'),
			'not_found_in_trash' => __('No marketplaces found in trash', 'txtdomain'),
			'all_items' => __('All marketplaces', 'txtdomain'),
			'insert_into_item' => __('Insert into marketplace', 'txtdomain')
		],		
	]);
 
	register_taxonomy('marketplace_cat', ['marketplace'], [
		'label' => __('Marketplace Category', 'txtdomain'),
		'hierarchical' => true,
		'rewrite' => ['slug' => 'marketplace-category'],
		'show_admin_column' => true,
		'show_in_rest' => true,
		'labels' => [
			'singular_name' => __('Marketplace Category', 'txtdomain'),
			'all_items' => __('All Marketplace Categories', 'txtdomain'),
			'edit_item' => __('Edit Marketplace Category', 'txtdomain'),
			'view_item' => __('View Marketplace Category', 'txtdomain'),
			'update_item' => __('Update Marketplace Category', 'txtdomain'),
			'add_new_item' => __('Add New Marketplace Category', 'txtdomain'),
			'new_item_name' => __('New Marketplace Category Name', 'txtdomain'),
			'search_items' => __('Search Marketplace Categories', 'txtdomain'),
			'parent_item' => __('Parent Marketplace Category', 'txtdomain'),
			'parent_item_colon' => __('Parent Marketplace Category:', 'txtdomain'),
			'not_found' => __('No Marketplace Categories found', 'txtdomain'),
		]
	]);
	register_taxonomy_for_object_type('marketplace_cat', 'marketplace');
	
	
	register_post_type('downloads', [
		'label' => __('Downloads', 'txtdomain'),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-download',
		'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'downloads'],
		'taxonomies' => ['downloads_cat'],
		'labels' => [
			'singular_name' => __('Download', 'txtdomain'),
			'add_new_item' => __('Add new download', 'txtdomain'),
			'new_item' => __('New download', 'txtdomain'),
			'view_item' => __('View download', 'txtdomain'),
			'not_found' => __('No downloads found', 'txtdomain'),
			'not_found_in_trash' => __('No downloads found in trash', 'txtdomain'),
			'all_items' => __('All downloads', 'txtdomain'),
			'insert_into_item' => __('Insert into download', 'txtdomain')
		],		
	]);
 
	register_taxonomy('downloads_cat', ['downloads'], [
		'label' => __('Downloads Category', 'txtdomain'),
		'hierarchical' => true,
		'rewrite' => ['slug' => 'downloads-category'],
		'show_admin_column' => true,
		'show_in_rest' => true,
		'labels' => [
			'singular_name' => __('Download Category', 'txtdomain'),
			'all_items' => __('All Download Categories', 'txtdomain'),
			'edit_item' => __('Edit Download Category', 'txtdomain'),
			'view_item' => __('View Download Category', 'txtdomain'),
			'update_item' => __('Update Download Category', 'txtdomain'),
			'add_new_item' => __('Add New Download Category', 'txtdomain'),
			'new_item_name' => __('New Download Category Name', 'txtdomain'),
			'search_items' => __('Search Download Categories', 'txtdomain'),
			'parent_item' => __('Parent Download Category', 'txtdomain'),
			'parent_item_colon' => __('Parent Download Category:', 'txtdomain'),
			'not_found' => __('No Download Categories found', 'txtdomain'),
		]
	]);
	register_taxonomy_for_object_type('downloads_cat', 'downloads');
	
	
	register_post_type('events', [
		'label' => __('Events & Webinars', 'txtdomain'),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-calendar-alt',
		'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'events'],
		'taxonomies' => ['events_cat'],
		'labels' => [
			'singular_name' => __('Events', 'txtdomain'),
			'add_new_item' => __('Add new event', 'txtdomain'),
			'new_item' => __('New event', 'txtdomain'),
			'view_item' => __('View event', 'txtdomain'),
			'not_found' => __('No events found', 'txtdomain'),
			'not_found_in_trash' => __('No events found in trash', 'txtdomain'),
			'all_items' => __('All events', 'txtdomain'),
			'insert_into_item' => __('Insert into event', 'txtdomain')
		],		
	]);
 
	register_taxonomy('events_cat', ['events'], [
		'label' => __('Events Category', 'txtdomain'),
		'hierarchical' => true,
		'rewrite' => ['slug' => 'event'],
		'show_admin_column' => true,
		'show_in_rest' => true,
		'labels' => [
			'singular_name' => __('Event Category', 'txtdomain'),
			'all_items' => __('All Event Categories', 'txtdomain'),
			'edit_item' => __('Edit Event Category', 'txtdomain'),
			'view_item' => __('View Event Category', 'txtdomain'),
			'update_item' => __('Update Event Category', 'txtdomain'),
			'add_new_item' => __('Add New Event Category', 'txtdomain'),
			'new_item_name' => __('New Event Category Name', 'txtdomain'),
			'search_items' => __('Search Event Categories', 'txtdomain'),
			'parent_item' => __('Parent Event Category', 'txtdomain'),
			'parent_item_colon' => __('Parent Event Category:', 'txtdomain'),
			'not_found' => __('No Event Categories found', 'txtdomain'),
		]
	]);
	register_taxonomy_for_object_type('events_cat', 'events');
	
	
	
});



// Activates Menu Description
function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<p class="menu-item-description">' . $item->description . '</p>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );

// Adds Shortcodes
include('custom-shortcodes.php');

// Limit Excerpt Length by number of Words - Usage: echo excerpt(30);
function excerpt( $limit ) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'...';
} else {
$excerpt = implode(" ",$excerpt);
}
$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
return $excerpt;
}
function content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}
$content = preg_replace('/[.+]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}

// Activate Wordpress jQuery
wp_enqueue_script("jquery");



// Sets the events to be moved to draft if the event date has passed.
add_action( 'wp', 'expire_events_daily' );
function expire_events_daily() {
    if ( ! wp_next_scheduled( 'delete_expired_events' ) ) {
        wp_schedule_event( strtotime('12:01:00'), 'daily', 'delete_expired_events'); //runs at or after 12:01am local time, server time is in UTC
    }
}
add_action( 'delete_expired_events', 'expire_coupon_function' );

function expire_coupon_function() {
    $today = date('Ymd');
    $args = array(
        'post_type' => array('events'), 
        'post_status' => 'publish',
        'posts_per_page' => -1 
    );
    $posts = get_posts($args);
    
    foreach($posts as $p){
            
        $expiredate = get_field('events_date', $p->ID, false, false); // get the raw date from the db. false, false will convert to Ymd while allowing you to use any date format output choice on the field itself

            if (($expiredate < $today) && ($expiredate != "")) { // if date is less than today, but also not empty to accomodate the coupons that don't expire
                $postdata = array(
                    'ID' => $p->ID,
                    'post_status' => 'draft'
                );
                wp_update_post($postdata);
             }      
    }
}



/*
 * Add columns to Events post list
 */
 function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array ( 
     'events_date' => __ ( 'Event Date' ),
     'events_start_time' => __ ( 'Start Time' ),
     'events_end_time' => __ ( 'End Time' ),
   ) );
 }
 add_filter ( 'manage_events_posts_columns', 'add_acf_columns' );

/*
 * Add columns to Events post list
 */
 function events_custom_column ( $column, $post_id ) {
   switch ( $column ) {
     case 'events_date':
       echo get_post_meta ( $post_id, 'events_date', true );
       break;
	case 'events_start_time':
       echo get_post_meta ( $post_id, 'events_start_time', true );
       break;
	case 'events_end_time':
       echo get_post_meta ( $post_id, 'events_end_time', true );
       break;
   }
 }
 add_action ( 'manage_events_posts_custom_column', 'events_custom_column', 10, 2 );

add_filter( 'gform_confirmation_anchor', '__return_true' );
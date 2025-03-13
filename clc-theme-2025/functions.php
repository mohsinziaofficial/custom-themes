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

// Activate Wordpress jQuery
wp_enqueue_script("jquery");

// Register Widgets
if (function_exists("register_sidebar")) {
  register_sidebar();
}

// Add Featured Image
add_theme_support('post-thumbnails', array(
	'post',
	'page',
	'custom-post-type-name',
));

// Custome Widget
//function wpb_init_widgets_custom($id) {
//    register_sidebar(array(
//        'name' => 'Customsidebar-1',
//        'id'   => 'customsidebar-id',
//        'before_widget' => '<div class="sidebar-module">',
//        'after_widget' => '</div>',
//        'before_title' => '</h4>',
//        'after_title' => '</h4>'
//    ));
//}
//add_action('widgets_init','wpb_init_widgets_custom');

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
});


// Remove CSS styles from Gravity forms
// add_filter( 'gform_disable_css', '__return_true' );



// Team Showcase Custom Short Code for Slick Slider
// Code is in inc/teamshowcase-slider-view.php file
function teamshowcase_att($atts) {
    $archivepath = include('inc/teamshowcase-slider-view.php');
	return $archivepath;
}
add_shortcode('je-teamshowcase', 'teamshowcase_att');



// Team Showcase Custom Short Code for Grid View on People Page
// Code is in inc/teamshowcase-grid-view.php file
function teamshowcase_grid_att($atts) {
    $archivepath = include('inc/teamshowcase-grid-view.php');
	return $archivepath;
}
add_shortcode('je-teamshowcase-grid', 'teamshowcase_grid_att');


// Custome Post Type - Events
add_action('init', function() {
	register_post_type('events', [
		'label' => __('Events', 'txtdomain'),
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-calendar-alt',
		'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'events'],
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
});
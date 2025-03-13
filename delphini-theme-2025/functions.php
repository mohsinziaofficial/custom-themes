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

// Custom Excerpt Word Limit
function custom_excerpt($limit) {
    $excerpt = get_the_excerpt();
    if (!$excerpt) {
        $excerpt = get_the_content();
    }
    return wp_trim_words($excerpt, $limit);
}


/* Menus */
function wpb_custom_new_menu() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu' ),
            'footer-menu' => __ ( 'Footer Menu' ),
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



function enqueue_gradient_script() {

    // Enqueue the gradient.js file located in the child theme's folder

    wp_enqueue_script(

        'gradient-script', // Handle of the script

        get_stylesheet_directory_uri() . '/js/gradient.js', // Path to the script

        array(), // No dependencies

        null, // Version of the script, set null to avoid versioning

        true // Load in the footer

    );

}

add_action('wp_enqueue_scripts', 'enqueue_gradient_script');


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
            'ppc-menu' => __( 'ppc Menu' ),
            'payroll-menu' => __( 'payroll Menu' ),
            
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

// Limit Excerpt Length by number of Words - Usage: echo excerpt(30);
function excerpt( $limit ) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  }
  else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//force ajax on all gravity forms
add_filter( 'gform_form_args', 'setup_form_args' );
function setup_form_args( $form_args ) {
    $form_args['ajax'] = true;
 
    return $form_args;
}




// Custome Widgets
// Call it in WPBakery using Widgetised Sidebar from WPBakery Elements Menu.

// Make Query Widget
function FFT_Make_Query_Widget($id) {
    register_sidebar(array(
        'name' => 'FFT Make Query Widget', //widget name to display in widgets menu
        'id'   => 'fft_custom_widget-1', //widget id
        'before_widget' => '<div class="sidebar-module">',
        'after_widget' => '</div>',
        'before_title' => '</h4>',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init','FFT_Make_Query_Widget');


//Custom short code for ACF Fields to call it directly in WPBakery instead of PHP code
function related_links($atts) { //function name
  
  ob_start(); 
  include('inc/related_links.php'); 
  $links = ob_get_clean(); 
 
  return $links;
  
}
add_shortcode('RelatedLinks', 'related_links'); // ('shortcode name', 'function name')


//Custom short code for Top Three News WPBakery
function top_news($atts) { //function name
  
  ob_start();
  include('inc/top_news.php');
  $news = ob_get_clean();
  
  return $news;
  
}
add_shortcode('TopThreeNews', 'top_news'); // ('shortcode name', 'function name')

// Team Showcase Custom Short Code for Grid View on People Page
// Code is in inc/teamshowcase-grid-view.php file
function teamshowcase_grid_att($atts) {
    $archivepath = include('inc/teamshowcase-grid-view.php');
	return $archivepath;
}
add_shortcode('je-teamshowcase-grid', 'teamshowcase_grid_att');


add_shortcode('acf', function ($atts) {
    $atts = shortcode_atts(['field' => '', 'post_id' => false], $atts, 'acf');
    return get_field($atts['field'], $atts['post_id']);
});
//gravity form selected from submission delay to display the comfirmation message
add_filter( 'gform_confirmation', function ( $confirmation, $form, $entry, $ajax ) {
    GFCommon::log_debug( __METHOD__ . '(): running.' );
 
    $forms = array( 5, 6 ); // the form id to add the delay to
 
    if ( ! in_array( $form['id'], $forms ) ) {
        return $confirmation;
    }
 
    if ( isset( $confirmation['redirect'] ) ) {
       $url          = esc_url_raw( $confirmation['redirect'] );
        GFCommon::log_debug( __METHOD__ . '(): Redirect to URL: ' . $url );
        $confirmation = '<div class="gform_confirmation_message">Thank you for submitting the form, you will be redirected to the guide shortly</div>';
        $confirmation .= "<script type=\"text/javascript\">
	setTimeout(function() { window.open('$url')}, 2000); </script>";
    }
 
    return $confirmation;
}, 10, 4 );

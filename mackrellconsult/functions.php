<?php
/**
 * Theme Functions
 */

function theme_name_scripts() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );

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
			'footer-menu' => __( 'Footer Menu' )
		)
	);
}
add_action( 'init', 'wpb_custom_new_menu' );


/*Search Box Placeholder*/

function html5_search_form( $form ) { 
     $form = '<section class="search"><form role="search" method="get" id="search-form" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('',  'domain') . '</label>
     <input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="Search site" />
     <input type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'domain') .'" />
     </form></section>';
     return $form;
}

 add_filter( 'get_search_form', 'html5_search_form' );



function wpb_widgets_init() {
 
    register_sidebar( array(
        'name' => __( 'Sidebar', 'wpb' ),
        'id' => 'sidebar',
        'description' => __( '', 'wpb' ),
        'before_widget' => '<div class="SidebarInner">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ) );

    }
 
add_action( 'widgets_init', 'wpb_widgets_init' );








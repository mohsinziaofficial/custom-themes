<?php
	/**
	 * Theme Functions
	 */

	function custom_theme_setup() {
	    // Enable menus
	    register_nav_menus([
	        'primary' => __('Primary Menu', 'customtheme')
	    ]);
	    // Enable post thumbnails
	    add_theme_support('post-thumbnails');
	}
	add_action('after_setup_theme', 'custom_theme_setup');

	// Enqueue styles and scripts
	function custom_theme_scripts() {
	    wp_enqueue_style('general-css', get_template_directory_uri() . '/css/general.css', [], '1.0', 'all'); //this will get the general.css from CSS folder in theme
	    wp_enqueue_style('theme-style', get_stylesheet_uri(), [], '1.0', 'all'); //this will get the defualt style.css in theme
	    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css'); // adding fontawesome files
	    wp_enqueue_script('theme-script', get_template_directory_uri() . '/js/script.js', ['jquery'], '1.0', true); //this will get the script.js from JS folder in theme
	}
	add_action('wp_enqueue_scripts', 'custom_theme_scripts');

	// Custom excerpt function
	function custom_excerpt_length($length) {
	    return 20;
	}
	add_filter('excerpt_length', 'custom_excerpt_length');
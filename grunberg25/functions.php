<?php

/**
 * Theme Functions
 */

function theme_name_scripts()
{
	wp_enqueue_style('style-name', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'));
	//wp_enqueue_style( 'style-name', get_stylesheet_uri() );

}
add_action('wp_enqueue_scripts', 'theme_name_scripts');


/*Add Logo*/
function themename_custom_logo_setup()
{
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array('site-title', 'site-description'),
		'unlink-homepage-logo' => true,
	);

	add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'themename_custom_logo_setup');



/* Menus */
function wpb_custom_new_menu()
{
	register_nav_menus(
		array(
			'main-menu' => __('Main Menu'),
		)
	);
}
add_action('init', 'wpb_custom_new_menu');


// Current Year Shortcode = [year]
function currentYear($atts)
{
	return date('Y');
}
add_shortcode('year', 'currentYear');


/**
 * Remove archive labels.
 * 
 * @param  string $title Current archive title to be displayed.
 * @return string        Modified archive title to be displayed.
 */
add_filter('get_the_archive_title', 'my_theme_archive_title');
function my_theme_archive_title($title)
{
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	} elseif (is_home()) {
		$title = single_post_title('', false);
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

//force ajax on all gravity forms
add_filter('gform_form_args', 'setup_form_args');
function setup_form_args($form_args)
{
	$form_args['ajax'] = true;

	return $form_args;
}

function my_own_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'my_own_mime_types');

add_action('init', function () {
	// Award Logos post type
	register_post_type('images', [
		'label' => __('Award Logos', 'txtdomain'),
		'public' => true,
		'menu_position' => 10,
		'menu_icon' => 'dashicons-cover-image',
		'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'award-logos'],
		'has_archive' => false,
		'labels' => [
			'singular_name' => __('Award Logos', 'txtdomain'),
			'add_new_item' => __('Add new image', 'txtdomain'),
			'new_item' => __('New image', 'txtdomain'),
			'view_item' => __('View image', 'txtdomain'),
			'not_found' => __('No images found', 'txtdomain'),
			'not_found_in_trash' => __('No images found in trash', 'txtdomain'),
			'all_items' => __('All images', 'txtdomain'),
			'insert_into_item' => __('Insert into image', 'txtdomain')
		],
	]);

	// Team Members post type
	register_post_type('team_member', [
		'label' => __('Team Members', 'txtdomain'),
		'public' => true,
		'menu_position' => 11,
		'menu_icon' => 'dashicons-groups',
		'supports' => ['title', 'editor', 'thumbnail'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'meet-the-team'],
		'has_archive' => 'meet-the-team',
		'labels' => [
			'singular_name' => __('Team Member', 'txtdomain'),
			'add_new_item' => __('Add new team member', 'txtdomain'),
			'new_item' => __('New team member', 'txtdomain'),
			'view_item' => __('View team member', 'txtdomain'),
			'not_found' => __('No team members found', 'txtdomain'),
			'not_found_in_trash' => __('No team members found in trash', 'txtdomain'),
			'all_items' => __('All team members', 'txtdomain'),
			'insert_into_item' => __('Insert into team member', 'txtdomain')
		],
	]);

	// Flags post type
	register_post_type('flags', [
		'label' => __('Flags', 'txtdomain'),
		'public' => true,
		'menu_position' => 10,
		'menu_icon' => 'dashicons-flag',
		'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'flags'],
		'has_archive' => false,
		'labels' => [
			'singular_name' => __('Flags', 'txtdomain'),
			'add_new_item' => __('Add new image', 'txtdomain'),
			'new_item' => __('New image', 'txtdomain'),
			'view_item' => __('View image', 'txtdomain'),
			'not_found' => __('No images found', 'txtdomain'),
			'not_found_in_trash' => __('No images found in trash', 'txtdomain'),
			'all_items' => __('All images', 'txtdomain'),
			'insert_into_item' => __('Insert into image', 'txtdomain')
		],
	]);


	// Team Categories taxonomy
	register_taxonomy('team_category', 'team_member', [
		'label' => __('Team Categories', 'txtdomain'),
		'hierarchical' => true,
		'public' => true,
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'team-category'],
		'labels' => [
			'singular_name' => __('Team Category', 'txtdomain'),
			'search_items' => __('Search team categories', 'txtdomain'),
			'all_items' => __('All team categories', 'txtdomain'),
			'parent_item' => __('Parent team category', 'txtdomain'),
			'parent_item_colon' => __('Parent team category:', 'txtdomain'),
			'edit_item' => __('Edit team category', 'txtdomain'),
			'update_item' => __('Update team category', 'txtdomain'),
			'add_new_item' => __('Add new team category', 'txtdomain'),
			'new_item_name' => __('New team category name', 'txtdomain'),
			'menu_name' => __('Team Categories', 'txtdomain'),
		],
	]);

	// Events post type
	register_post_type('event', [
		'label' => __('Events', 'txtdomain'),
		'public' => true,
		'menu_position' => 12,
		'menu_icon' => 'dashicons-calendar',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'events'],
		'has_archive' => true, // this enables the archive page at /events/
		'labels' => [
			'singular_name' => __('Event', 'txtdomain'),
			'add_new_item' => __('Add new event', 'txtdomain'),
			'new_item' => __('New event', 'txtdomain'),
			'view_item' => __('View event', 'txtdomain'),
			'not_found' => __('No events found', 'txtdomain'),
			'not_found_in_trash' => __('No events found in trash', 'txtdomain'),
			'all_items' => __('All events', 'txtdomain'),
			'insert_into_item' => __('Insert into event', 'txtdomain')
		],
	]);

	// Testimonials post type
	register_post_type('testimonials', [
		'label' => __('Testimonials', 'txtdomain'),
		'public' => true,
		'menu_position' => 13,
		'menu_icon' => 'dashicons-format-quote',
		'supports' => ['title'],
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'testimonials'],
		'has_archive' => false,
		'labels' => [
			'singular_name' => __('Testimonial', 'txtdomain'),
			'add_new_item' => __('Add new testimonial', 'txtdomain'),
			'new_item' => __('New testimonial', 'txtdomain'),
			'view_item' => __('View testimonial', 'txtdomain'),
			'not_found' => __('No testimonials found', 'txtdomain'),
			'not_found_in_trash' => __('No testimonials found in trash', 'txtdomain'),
			'all_items' => __('All testimonials', 'txtdomain'),
			'insert_into_item' => __('Insert into testimonial', 'txtdomain')
		],
	]);

	// Event Categories taxonomy
	register_taxonomy('event_category', 'event', [
		'label' => __('Event Categories', 'txtdomain'),
		'hierarchical' => true,
		'public' => true,
		'show_in_rest' => true,
		'rewrite' => ['slug' => 'event-category'],
		'labels' => [
			'singular_name' => __('Event Category', 'txtdomain'),
			'search_items' => __('Search event categories', 'txtdomain'),
			'all_items' => __('All event categories', 'txtdomain'),
			'parent_item' => __('Parent event category', 'txtdomain'),
			'parent_item_colon' => __('Parent event category:', 'txtdomain'),
			'edit_item' => __('Edit event category', 'txtdomain'),
			'update_item' => __('Update event category', 'txtdomain'),
			'add_new_item' => __('Add new event category', 'txtdomain'),
			'new_item_name' => __('New event category name', 'txtdomain'),
			'menu_name' => __('Event Categories', 'txtdomain'),
		],
	]);
});
// Automatically move past events to draft — SEPARATE action
add_action( 'init', function() {
	$args = array(
		'post_type'      => 'event',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'meta_key'       => 'start_date_and_time',
		'meta_compare'   => '<',
		'meta_value'     => current_time( 'd/m/Y g:i a' ),
	);

	$past_events = get_posts( $args );

	foreach ( $past_events as $event ) {
		wp_update_post( array(
			'ID'          => $event->ID,
			'post_status' => 'draft'
		) );
	}
});

function enqueue_slick_slider_assets()
{
	wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
	wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
	wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_slider_assets');


// Shortcodes
require_once get_template_directory() . '/inc/expert-sectors.php';
add_shortcode('expert_sectors', 'expert_sectors');

require_once get_template_directory() . '/inc/team-feature.php';
add_shortcode('team_feature', 'team_feature');

require_once get_template_directory() . '/inc/testimonial-slider.php';
add_shortcode('testimonial_slider', 'testimonial_slider');

require_once get_template_directory() . '/inc/partner-logos.php';
add_shortcode('partner_logos', 'partner_logos');

require_once get_template_directory() . '/inc/latest-news.php';
add_shortcode('latest_news', 'latest_news');

require_once get_template_directory() . '/inc/benefits.php';
add_shortcode('benefits', 'benefits');

require_once get_template_directory() . '/inc/wellbeing.php';
add_shortcode('wellbeing', 'wellbeing');

require_once get_template_directory() . '/inc/csr.php';
add_shortcode('csr', 'csr');

require_once get_template_directory() . '/inc/facts-and-figures.php';
add_shortcode('facts_and_figures', 'facts_and_figures');

require_once get_template_directory() . '/inc/vacancies-accordion.php';
add_shortcode('vacancies_accordion', 'vacancies_accordion');

require_once get_template_directory() . '/inc/faq-accordion.php';
add_shortcode('faq_accordion', 'faq_accordion');

require_once get_template_directory() . '/inc/progression-timelines.php';
add_shortcode('progression_timeline', 'progression_timeline');

require_once get_template_directory() . '/inc/flags.php';
add_shortcode('country_flags', 'country_flags');

require_once get_template_directory() . '/inc/testimonial-carousel.php';
add_shortcode('testimonial_carousel', 'testimonial_carousel');

require_once get_template_directory() . '/inc/support-wheel.php';
add_shortcode('support_wheel', 'support_wheel');

require_once get_template_directory() . '/inc/testimonial-modals.php';
add_shortcode('testimonial_modals', 'testimonial_modals');

// Drag and Drop for Team Order
// 1. Add Order submenu under Team Members
function team_member_menu_order_page() {
    add_submenu_page(
        'edit.php?post_type=team_member',
        'Order Team Members',
        'Order',
        'edit_pages',
        'order_team_members',
        'render_team_member_order_page'
    );
}
add_action( 'admin_menu', 'team_member_menu_order_page' );

// 2. Render the Order page
function render_team_member_order_page() {
    ?>
    <div class="wrap">
        <h2>Order Team Members</h2>
        <p>Drag and drop the team members to change the display order.</p>

        <ul id="team-member-sortable">
            <?php
            $team_members = new WP_Query( array(
                'post_type'      => 'team_member',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ) );

            if ( $team_members->have_posts() ) :
                while ( $team_members->have_posts() ) : $team_members->the_post();
                    ?>
                    <li id="post-<?php the_ID(); ?>">
                        <strong><?php the_title(); ?></strong> (<?php the_ID(); ?>)
                    </li>
                    <?php
                endwhile;
            endif;

            wp_reset_postdata();
            ?>
        </ul>

        <button id="save-team-member-order" class="button button-primary">Save Order</button>

        <style>
            #team-member-sortable {
                list-style: none;
                margin: 0;
                padding: 0;
                max-width: 600px;
            }

            #team-member-sortable li {
                margin: 5px 0;
                padding: 10px;
                background: #fff;
                border: 1px solid #ddd;
                cursor: move;
            }
        </style>

        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
        <script>
        jQuery(document).ready(function($) {
            $('#team-member-sortable').sortable();

            $('#save-team-member-order').on('click', function() {
                var order = [];
                $('#team-member-sortable li').each(function() {
                    var id = $(this).attr('id').replace('post-', '');
                    order.push(id);
                });

                $.post(ajaxurl, {
                    action: 'save_team_member_order',
                    order: order
                }, function(response) {
                    alert('Team member order saved!');
                });
            });
        });
        </script>
    </div>
    <?php
}

// 3. Handle AJAX saving of order
function save_team_member_order() {
    if ( isset( $_POST['order'] ) && is_array( $_POST['order'] ) ) {
        foreach ( $_POST['order'] as $menu_order => $post_id ) {
            wp_update_post( array(
                'ID'         => intval( $post_id ),
                'menu_order' => intval( $menu_order ),
            ));
        }
    }

    wp_die(); // required for AJAX
}
add_action( 'wp_ajax_save_team_member_order', 'save_team_member_order' );
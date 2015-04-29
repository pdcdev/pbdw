<?php

// load the theme css
function theme_styles() {
    wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );
    wp_enqueue_style( 'animation', get_template_directory_uri() . '/css/fontello/css/animation.css' );
    wp_enqueue_style( 'fontello-codes', get_template_directory_uri() . '/css/fontello/css/fontello-codes.css' );
    wp_enqueue_style( 'animation-embedded', get_template_directory_uri() . '/css/fontello/css/fontello-embedded.css' );
    wp_enqueue_style( 'animation-ie7-codes', get_template_directory_uri() . '/css/fontello/css/fontello-ie7-codes.css' );
    wp_enqueue_style( 'animation-ie7', get_template_directory_uri() . '/css/fontello/css/fontello-ie7.css' );
    wp_enqueue_style( 'fontello', get_template_directory_uri() . '/css/fontello/css/fontello.css' );
    wp_register_style( 'fullPage', get_template_directory_uri() . '/css/fullPage.css' );
    if( is_page('expertise') ) {
        wp_enqueue_style("fullPage");
    }
}
// load the theme js
function theme_js() {
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/flexslider.js', '', '', true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', '', '', true );
    wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.js', array('jquery'), '', true );
    wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/theme.js', array('jquery'), '', true );
    wp_enqueue_script( 'waitforimages', get_template_directory_uri() . '/js/jquery.waitforimages.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'headroom', get_template_directory_uri() . '/js/headroom.js', array('jquery'), '', true );
    wp_enqueue_script( 'nav', get_template_directory_uri() . '/js/nav.js', array('jquery','headroom'), '', true );
    wp_enqueue_script( 'orientation', get_template_directory_uri() . '/js/detect_orientation.js', array('jquery','headroom'), '', true );

    wp_register_script( 'home_js', get_template_directory_uri() . '/js/home.js', array('jquery','theme','modernizr'), '', true );
    wp_register_script( 'projects', get_template_directory_uri() . '/js/projects.js', array('jquery','theme'), '', true );
    wp_register_script( 'expertise', get_template_directory_uri() . '/js/expertise.js', array('jquery','theme','snapscroll','scroll_to'), '', true );
    wp_register_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.js', array('jquery','office'), '', true );
    wp_register_script( 'snapscroll', get_template_directory_uri() . '/js/snapscroll.js', array('jquery','scroll_to'), '', true );
    wp_register_script( 'scroll_to', get_template_directory_uri() . '/js/scroll_to.js', array('jquery'), '', true );

    wp_register_script( 'single-projects', get_template_directory_uri() . '/js/single-projects.js', array('jquery','theme','modernizr'), '', true );
    wp_register_script( 'office', get_template_directory_uri() . '/js/office.js', array('jquery','theme','modernizr'), '', true );
    wp_register_script( 'map', get_template_directory_uri() . '/js/map.js', array('jquery'), '', true );
    wp_register_script( 'fullpage', get_template_directory_uri() . '/js/fullpage.js', array('jquery'), '', true );

    if(is_page('contact')) {
        wp_enqueue_script( 'map' );
    }
    if(is_page('projects') || is_page('all') || is_page('cultural') || is_page('commercial') || is_page('education') || is_page('preservation') || is_page('residential')) {
        wp_enqueue_script( 'projects' );
    }
    if(!is_page('projects') && !is_page('all')  && !is_page('cultural')  && !is_page('commercial')  && !is_page('education')  && !is_page('preservation')  && !is_page('residential')) {
        wp_enqueue_script( 'transitions' );
    }
    if( is_page('office') ) {
        wp_enqueue_script( 'office' );
        wp_enqueue_script( 'waypoints' );
    }
    if( is_page('expertise') ) {
        wp_enqueue_script( 'expertise' );
        wp_enqueue_script( 'snapscroll' );
        wp_enqueue_script( 'scroll_to' );
        wp_enqueue_script( 'waypoints' );
        wp_enqueue_script( 'fullpage' );
    }
    if( is_front_page() ) {
        wp_enqueue_script( 'home_js' );
    }
    if ( is_single() ) {
        wp_enqueue_script( 'single-projects' );
    }

}

// ajax begin

function localize_ajax() {
    wp_enqueue_script( 'localize_ajax', get_template_directory_uri() . '/js/ajax_calls.js', array('jquery'), '', true );
    wp_localize_script( 'localize_ajax', 'my_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

$dirName = dirname(__FILE__);
$baseName = basename(realpath($dirName));
require_once ("$dirName/ajax_functions.php");

add_action('template_redirect', 'localize_ajax');
add_action("wp_ajax_nopriv_query_projects", "query_projects");
add_action("wp_ajax_query_projects", "query_projects");

// ajax end

function pbdw_remove_menus(){
    remove_menu_page( 'edit.php' );            // Posts
    remove_menu_page( 'edit-comments.php' );   // Comments
}

function get_image($field, $the_size) {
    $the_image = wp_get_attachment_image_src( $field, $the_size );
    return $the_image[0];
}

add_action( 'admin_menu', 'pbdw_remove_menus' );
add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_js' );

// Enable custom menus
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

add_image_size( "grid", 0, 800, false );
add_image_size( "cube" , 0, 400 );

?>
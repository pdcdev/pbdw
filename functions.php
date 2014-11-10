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
    wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css');
}
// load the theme js
function theme_js() {
    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/flexslider.js', '', '', true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', '', '', true );
    wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.js', array('jquery'), '', true );
    wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array('jquery'), '', true );
    wp_enqueue_script( 'waitforimages', get_template_directory_uri() . '/js/jquery.waitforimages.min.js', array('jquery'), '', true );
    wp_register_script( 'projects', get_template_directory_uri() . '/js/projects.js', array('jquery','theme_js'), '', true );
    wp_register_script( 'single-projects', get_template_directory_uri() . '/js/single-projects.js', array('jquery','theme_js','modernizr'), '', true );

    wp_register_script( 'team', get_template_directory_uri() . '/js/team.js', array('jquery','theme_js','modernizr'), '', true );

    if(is_page('team')) {
        wp_enqueue_script( 'team' );
    }
    if(is_page('projects') || is_page('all') || is_page('cultural') || is_page('commercial') || is_page('education') || is_page('preservation') || is_page('residential')) {
        wp_enqueue_script( 'projects' );
    }
    if(!is_page('projects') && !is_page('all')  && !is_page('cultural')  && !is_page('commercial')  && !is_page('education')  && !is_page('preservation')  && !is_page('residential')) {
        wp_enqueue_script( 'transitions' );
    }
    if( is_front_page() ) {
        wp_enqueue_script( 'home_js' );
    }
    if ( is_single() ) {
        wp_enqueue_script( 'single-projects' );
    }
}

function pbdw_remove_menus(){
    remove_menu_page( 'edit.php' );            // Posts
    remove_menu_page( 'edit-comments.php' );   // Comments
}

function get_image($field, $the_size) {
    $the_image = wp_get_attachment_image_src( $field, $the_size );
    echo $the_image[0];
}

add_action( 'admin_menu', 'pbdw_remove_menus' );
add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_js' );

// Enable custom menus
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

add_image_size( "grid", 0, 800 );
add_image_size( "cube" , 0, 400 );

?>
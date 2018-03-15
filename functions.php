<?php
 
function custom_theme_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
 
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );


function anthonyaguasin_theme_setup() {
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');
}
add_action('init', 'anthonyaguasin_theme_setup');

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
// add_theme_support( 'custom-header', array(
//     'video' => true,
//    ) );

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

    add_theme_support('custom-header', apply_filters('custom_header_args', array(
       'default-image' => '',
       'default-text-color' => '000000',
       'width' => 1280,
       'height' => 720,
       'minWidth' => 480,
       'flex-height' => true,
        'flex-width' => true,

       'video' => true
    )));


// add_action('custom_header_setup');
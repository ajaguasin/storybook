<?php

function anthonyaguasin_styles_and_scripts() {
    // Link style.css
    if(is_front_page()):
        wp_enqueue_style( 'main-stylesheet', get_template_directory_uri().'/style.css', array(), mt_rand() );
    endif;

    // Link blog.css
    if(is_home() || is_single()):
        wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css',array(), mt_rand());
    endif;

    // Link Documentation/References css
    if (is_page_template()) {
        wp_enqueue_style( 'docs-ref', get_template_directory_uri() . '/css/docs-ref.css',array(), mt_rand());
    }

    // Loads jQuery
    wp_enqueue_script('jquery');

    // Loads a script called script.js
    wp_enqueue_script('our-scripts', get_template_directory_uri().'/script.js');
}

add_action( 'wp_enqueue_scripts', 'anthonyaguasin_styles_and_scripts' );


function anthonyaguasin_theme_setup() {
    add_theme_support('menus');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header', apply_filters('custom_header_args', array(
        'default-image' => '',
        'default-text-color' => '000000',
        'width' => 1280,
        'height' => 720,
        'flex-height' => true,
        'flex-width' => true,
        'video' => true
    )));

    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');
}
add_action('init', 'anthonyaguasin_theme_setup');


// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

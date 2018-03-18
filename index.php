<?php 
/**
 * 
 * Main template file
 * 
 */
?>
<?php 
    get_header(); 
    wp_nav_menu(array('theme_location'=>'primary')); 
    the_custom_header_markup(); 
    get_template_part( 'template-parts/content', 'part' );
    get_footer();
?>

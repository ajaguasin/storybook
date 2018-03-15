<?php
/**
 * 
 * header
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>

<?php 
    if( is_front_page() ):
        $front_classes = array('front-class', 'my-class');
    else:
        $front_classes = array('no-front-class');
    endif;
?>

<body <?php body_class($front_classes); ?>>


<?php 
    // This points to the registered nav menu I created in functions.php
    wp_nav_menu(array('theme_location'=>'primary')); 
?>




<!-- <img src="<?php// header_img();?>" height="<?php// echo get_custom_header()->height; ?>" width="<?php// echo get_custom_header()->width; ?>" alt=""> -->

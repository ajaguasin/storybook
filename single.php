<?php get_header(); ?>
<div class="post-contents">
    <?php get_template_part( 'template-parts/content', 'part' );?>
    <i class="material-icons" id="add-button">expand_more</i>

</div>

<div id="background-div"
    <?php             
        $image =  wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
        echo "style='background-image: url(".$image[0].")'";
    ?> >
</div>

<?php wp_nav_menu(array('theme_location'=>'primary')); ?>
<div class="read-more opacityToggle">
    <?php echo "<p>". $contents."</p>"; ?>
</div>

<?php get_footer(); ?>

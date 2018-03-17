    <?php 
        if(!is_front_page()): 
            global $query_string;
            query_posts( $query_string . '&order=ASC' );
        endif;
        if(have_posts()):
            while ( have_posts()): the_post(); ?>
                <?php 
                    if(!is_front_page()): 
                        the_title('<h3 class="home-content">','</h3>');
                        if (is_home() && has_post_thumbnail( $post->ID ) ):
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                            echo "<div id='custom-bg' style='background-image: url(".$image[0]." )'></div>";
                            echo "<p id='excerpt'>".get_the_excerpt(). "</p>";
                        endif;
                    endif; ?>
                <?php echo "<div id='entry'>".get_the_content()."</div>"; ?>

            <?php endwhile;
        endif;

        // wp_reset_query();
        if(is_home()): 
            echo "<p>i am a page</p>";
        endif;
    ?>
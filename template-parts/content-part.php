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
                        if (is_home()  ):
                            echo "<p id='excerpt'>".get_the_excerpt(). "</p>";
                        endif;
                    endif; ?>
                <?php 
                    global $contents;
                    if(is_home()): $contents = get_the_content();
                    else: echo "<div id='entry'>".get_the_content()."</div>"; 
                    endif;
                ?>

            <?php endwhile;
        endif;

    ?>
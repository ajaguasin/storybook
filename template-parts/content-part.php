    <?php 

        if(have_posts()):
            while ( have_posts()): the_post(); ?>
                <h3 class="home-content"><?php the_title(); ?></h3>
                <p class="home-content"><?php the_content(); ?></p> 

            <?php endwhile;
        endif;
    ?>
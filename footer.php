<?php
/**
 * 
 * footer
 * 
 */
?>
<?php 
    // This points to the registered nav menu I created in functions.php
    // wp_nav_menu(array('theme_location'=>'secondary')); 
?>
<footer> <?php if(is_front_page()): echo "&copy; 2018 Anthony Aguasin"; endif; ?> </footer>
<?php wp_footer(); ?>
</body>
</html>
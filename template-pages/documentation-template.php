<?php
/**
 *
 * Template Name: Documentation Template
 *
 */
?>
  <?php
      get_header();
      echo "<div class='wrapper'>";
      wp_nav_menu(array('theme_location'=>'primary'));
      get_template_part( 'template-parts/content', 'part' );
      echo "</div>";

      get_footer();
  ?>

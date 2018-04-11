<?php
/**
 *
 * Template Name: Comments Template
 *
 */
?>
<?php get_header();
global $err;?>
<div class="enter-comment" id="left">
  <?php wp_nav_menu(array('theme_location'=>'primary')); ?>
  <h1>Leave me a comment!</h1>
<form action="<?php echo admin_url('admin-post.php') ?>" method="post">
    <!-- This hidden input is necessary. The value will be used in functions.php -->
    <input type="hidden" name="action" value="create_comment">
    <input type="hidden" name="permalink" value="<?php echo get_permalink();?>">

    <label>First name:
      <input type="text" name="firstname"><br>
      <span class="error"> <?php echo $err;?></span>
    </label>


    <label>Last name:
        <input type="text" name="lastname"><br>
        <span class="error"> <?php echo $err;?></span>
    </label>


    <label>Comment:
      <textarea name="message" rows="10" cols="30" placeholder="Leave a comment!"></textarea>
      <span class="error"> <?php echo $err;?></span>
    </label><br>

    <button type="submit" name="button">
      Submit
    </button>
  </form>
</div>

<div class="comment-section" id="right">

  <?php show_the_comments(); ?>
</div>
<?php get_footer();?>

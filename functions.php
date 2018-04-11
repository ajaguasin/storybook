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
    if (is_page_template(array('template-pages/documentation-template.php','template-pages/references-template.php'))) {
      wp_enqueue_style( 'docs-ref', get_template_directory_uri() . '/css/docs-ref.css',array(), mt_rand());
    }

    // Link Comments css

    if (is_page_template('template-pages/comments-template.php')) {
      wp_enqueue_style( 'comments', get_template_directory_uri() . '/css/comments.css',array(), mt_rand());

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

// SET UP DATABASE
function comments_setup()
{

  // WordPress is picky about the format of the query, so keep this query and modify it to suit your needs.
  $sql = "CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    comment TEXT,
    PRIMARY KEY  (id)
  );";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
  // This function executes the query
  dbDelta($sql);

}
add_action('after_setup_theme', 'comments_setup');

// HANDLE FORM SUBMISSIONS
function scratch_submit_comment()
{

  // This variable refers to the database
  global $wpdb;

  // Post data is automatically sanitized by the insert function
  if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['message'])) {
    if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['message'])) {
      $err = "This field is required";
    } else {
      $wpdb->insert('comments',array('firstname'=>$_POST['firstname'], 'lastname'=>$_POST['lastname'], 'comment'=>$_POST['message']));
    }
  }

  // OPTIONAL - replace 'create-song' with the name of the page you want to redirect to.
  wp_redirect($_POST['permalink']);
  exit;
}
// the name of the action must be 'admin_post_[whatever value you set for the hidden input in your form]'
add_action('admin_post_create_comment', 'scratch_submit_comment');
add_action('admin_post_nopriv_create_comment', 'scratch_submit_comment');

// THIS FUNCTION DISPLAYS A COMMENT IN THE POST
function show_the_comments()
{
  // This variable contains info about the current post.
  global $post;
  global $wpdb;

  // Query
  $sql = 'SELECT * FROM comments';

  // Get results of a query
  $results = $wpdb->get_results($sql);

  // Display results
  foreach($results as $row)
  {

  // Echo the results here
  echo "<div class='a_comment'><p> Name: " . $row->firstname . ' ' . $row->lastname . '</p>';
  echo "<p> Comment: " . $row->comment . "</p></div>";

  }

}

// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

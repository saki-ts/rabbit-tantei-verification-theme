<?php
/*
 * Template Name: default template
 */
get_header();
?>
  <?php if(have_posts()): while(have_posts()):the_post();
  // Start the Loop.
    the_content();
    endwhile; // End the loop.
  endif;
  ?>
<?php get_footer(); ?>

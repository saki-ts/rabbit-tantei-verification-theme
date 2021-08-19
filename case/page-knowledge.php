<?php
/*
 * Template Name: ・テストテンプレート1
 */
?>

<?php get_header(); ?>
<style>
.archive {
  padding-top: 180px;
}
.archive_thumbnail {
  min-height: 60px;
  max-height: 60px;
  position: relative;
  overflow: hidden;
  width: 120px;
}
.archive_card {
  align-items:baseline;
  display: flex;
}
.archive_card + .archive_card  {
  margin: 40px 0;
}
.archive_date {
  margin-right: 20px;
}
img {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  width: auto;
  height: auto;
}
</style>
<section class="archive archive_header bg_white">
  <header class="container wrapper">
      <h1 class="branch_main_title">Test<span class="branch_main_title--sub">テンプレ出力テスト</span></h1>
  </header>
</section>

<archive class="archive_<?php echo esc_attr(get_post_type()); ?>">
  <div class="container wrapper">
    <?php if(have_posts()): while(have_posts()):the_post();
    // Start the Loop.
      the_content();
      endwhile; // End the loop.
    endif;
    ?>
  </div>
</archive>

<?php get_footer(); ?>

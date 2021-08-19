<?php get_header(); ?>
<style>
.single_header {
  padding-top: 180px;
}
.single {
  margin-bottom: 40px;
}
.single_title {
  box-shadow: 0 1px 0 rgba(99,99,99,0.5);
  font-size: 24px;
}
.single_thumbnail {
  margin:40px auto;
  width: 100%;
}
.single img {
  height: auto;
  margin:0 auto;
}
</style>
<section class="single_header bg_white">
  <header class="container wrapper">
    <?php if (get_post_type() === 'topic'): ?>
      <h1 class="branch_main_title">News<span class="branch_main_title--sub">ニュース詳細</span></h1>
    <?php endif; ?>
  </header>
</section>
<article class="single single_<?php echo esc_attr(get_post_type()); ?> bg_white">
<?php if(have_posts()) : ?>
  <?php while(have_posts()) : the_post(); ?>
  <div class="container wrapper">
  <div class="single_head_info">
    <h1 class="single_title"><?php the_title(); ?></h1><!-- タイトルを表示 -->
    <p class="archive_date"><?php echo get_the_time('Y.m.d'); ?></p>
  </div>
  <?php if(get_the_post_thumbnail()) : ?>
  <figure class="single_thumbnail">
    <?php the_post_thumbnail( array(710, 533) ); ?>
  </figure>
  <?php endif; ?>
      <?php the_content(); ?><!-- 本文を表示 -->
    <?php endwhile; ?>
  <?php endif; ?>
  </div>
</article>
<?php get_footer(); ?>
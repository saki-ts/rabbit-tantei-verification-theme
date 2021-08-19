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

<?php get_header(); ?>
<section class="archive archive_header bg_white">
  <header class="container wrapper">
    <?php if (get_post_type() === 'topic'): ?>
      <h1 class="branch_main_title">News<span class="branch_main_title--sub">ニュース一覧</span></h1>
    <?php endif; ?>
  </header>
</section>
<div class="archive_<?php echo esc_attr(get_post_type()); ?>">
  <div class="container wrapper">
    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
        <?php if(get_the_post_thumbnail()) : ?><!-- サムネイルが登録されている時 -->
          <article class="archive_card archive_card--thumb">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
              <p class="archive_date"><?php echo get_the_time('Y.m.d'); ?></p>
              <figure class="archive_thumbnail">
                <?php the_post_thumbnail(); ?>
              </figure>
              <h3 class="archive_title"><?php the_title(); ?></h3><!-- タイトルを表示 -->
              <p><?php the_excerpt(); ?></p>
            </a>
          </article>
        <?php else : ?><!-- サムネイルが登録されていない時 -->
          <article class="archive_card">
          <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
            <p class="archive_date"><?php echo get_the_time('Y.m.d'); ?></p>
            <h3 class="archive_title"><?php the_title(); ?></h3><!-- タイトルを表示 -->
            <p><?php the_excerpt(); ?></p>
          </a>
          </article>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php else : ?>
        <p>まだ投稿された記事がないようです。</p>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
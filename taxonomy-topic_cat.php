<!-- taxonomy-topic.php -->
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
  <?php $term_info = get_term_by('slug', $term, $taxonomy); ?>
    <?php if (get_post_type() === 'topic'): ?>
      <h1 class="branch_main_title">Custom Taxonomy<span class="branch_main_title--sub">カスタムタクソノミー(カテゴリー)：ニュース</span></h1>
    <?php endif; ?>
  </header>
</section>
<section class="archive archive_topic">
  <?php echo get_queried_object_id(); ?>
  <!-- カスタム分類のターム名を表示 -->
  <section class="container wrapper archive">
    <h2>カテゴリー：<?php echo $term_info->name; ?></h2>
    <?php if(have_posts()) : ?>
    <?php while(have_posts()) : the_post(); ?>
    <div <?php post_class(); ?>>
      <h3 class="clear">
        <?php the_title(); ?>
      </h3>
      <!-- 投稿に付けられたカスタム分類のリンクを表示 -->
      <?php echo get_the_term_list($post->ID, 'topic_cat', 'cat: '); ?>
      <?php the_excerpt(); ?>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
  </section>
</div> <!-- end of #main -->
<?php get_footer(); ?>
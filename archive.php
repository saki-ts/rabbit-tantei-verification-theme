<!-- archive.php -->
<?php get_header(); ?>
<section class="archive archive_topic">
  <h2 class="h2">新着情報一覧<span>NEWS&amp;TOPICS</span></h2>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php
  $loop
  ?>
   <?php the_posts_pagination(); ?>
<?php endwhile;　?>
<?php else : ?>
<p>まだ投稿された記事がないようです。</p>
</section>
<?php endif; ?>
<?php get_footer(); ?>
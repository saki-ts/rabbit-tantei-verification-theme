<!-- archive.php -->
<?php
// テンプレートがあるかをチェック
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];

$path = get_template_directory() . substr($url, 0, strlen($url) - 1) . '.php';
if (file_exists($path)) {
    include($path);
    exit();
}

// index.phpを付加して検索
$path = get_template_directory() . $url . '/index.php';
if (file_exists($path)) {
    include($path);
    exit();
}
?>
<?php get_header(); ?>
<section class="archive archive_topic">
  <h2 class="h2">News<span>ニュース一覧</span></h2>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php
  $loop
  ?>
   <?php the_posts_pagination(); ?>
<?php endwhile; ?>
<?php else : ?>
<p>まだ投稿された記事がないようです。</p>
</section>
<?php endif; ?>
<?php get_footer(); ?>
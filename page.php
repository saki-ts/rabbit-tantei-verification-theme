<?php
/*
 * Template Name: 固定ページ基本テンプレート
 */

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

<?php if(have_posts()): while(have_posts()):the_post();
// Start the Loop.
  the_content();
  endwhile; // End the loop.
endif;
?>

<?php get_footer(); ?>

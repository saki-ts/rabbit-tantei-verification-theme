<?php
  $themePath = get_template_directory_uri().'/dist/';
  $postId = get_the_ID();
  $pageClass = get_post_meta($postId, 'page-class', true);
?>
<!DOCTYPE html>
<html lang="ja">
<?php get_template_part( 'parts/head' ); ?>
<?php if(is_front_page()):?>
<body class='top'>
<?php else : ?>
<body class='<?php echo $pageClass; ?>'>
<?php endif; ?>
  <div class="allwrapper">
    <header class="h js-sticky">
      <div class="h_container">
        <p class="h_logo">
          <a class="h_logo__link" href="<?php bloginfo('url');?>">
          <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if ( has_custom_logo() ) {
              echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" class="h_logo__img">';
            } else {
              echo get_bloginfo( 'name' );
            }
          ?>
          </a>
        </p>
        <button class="h_nav__hamburger sp_show"><span class="h_nav__hamburger_icon"></span></button>
        <nav class="h_nav">
          <?php 
            $headerNav =
            array(
              //カスタムメニュー名
              'theme_location' => 'header_nav',
              //ulを梱包する親divを非表示
              'container' => false,
              //カスタムメニューを設定しない際に固定ページでメニューを作成しない
              'fallback_cb' => false,
              // 出力される要素の中のulにメニュークラスを付ける
              'menu_class' => 'h_nav__list',
            );
            wp_nav_menu( $headerNav );
          ?>
        </nav>
      </div>
    </header>

    <main class="m">
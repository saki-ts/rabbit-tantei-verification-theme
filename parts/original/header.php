<?php
  $themePath = get_template_directory_uri().'/common/';
  $postId = get_the_ID();
  $pageClass = get_post_meta($postId, 'page-class', true);
?>
<!DOCTYPE html>
<html lang="ja">
<?php get_template_part( 'parts/head' ); ?>
<body class='<?php echo $pageClass; ?>'>
  <?php if(is_home()):?>
  <div class="loading-box">
    <div class="loading-logo">
      <img src="<?php echo $themePath; ?>img/loading_logo.svg" alt="">
    </div>
  </div>
<?php endif; ?>
  <div class="allwrap">
    <header class="header js-sticky">
      <div class="header__frame">
        <div class="header__frame_inner">
          <h1 class="header__logo">
            <a href="<?php bloginfo('url');?>">
              <img src="<?php echo $themePath; ?>img/logo_white.svg" class="header__logo_img" alt="株式会社サラ">
              <img src="<?php echo $themePath; ?>img/logo_navy.svg" class="header__logo_img--navy" alt="株式会社サラ" >
            </a>
          </h1>

          <button type="button" class="header__nav_hamburger sp">
            <span class="header__nav_hamburger_icon"></span>
          </button>
        </div>

        <nav class="header__nav">
          <p class="header__nav_logo">
            <a href="<?php bloginfo('url');?>">
              <img src="<?php echo $themePath; ?>img/logo_white.svg" class="header__logo_img" alt="株式会社サラ" >
            </a>
          </p>
          <ul class="header__nav_list">
            <li class="header__nav_item">
              <a href="<?php bloginfo('url');?>#news" class="header__nav_link js-header__nav_link">
                <span class="header__nav_text--main">NEWS</span>
                <span class="header__nav_text--sub">
                  お知らせ
                </span>
              </a>
            </li>
            <li class="header__nav_item">
              <a href="<?php bloginfo('url');?>#message" class="header__nav_link js-header__nav_link">
                <span class="header__nav_text--main">MESSAGE</span>
                <span class="header__nav_text--sub">
                  代表挨拶
                </span>
              </a>
            </li>

            <li class="header__nav_item">
              <a href="<?php bloginfo('url');?>#philosophy" class="header__nav_link js-header__nav_link">
                <span class="header__nav_text--main">PHILOSOPHY</span>
                <span class="header__nav_text--sub">
                  理念
                </span>
              </a>
            </li>

            <li class="header__nav_item">
              <a href="<?php bloginfo('url');?>#service" class="header__nav_link js-header__nav_link">
                <span class="header__nav_text--main">SERVICE</span>
                <span class="header__nav_text--sub">
                  事業内容
                </span>
              </a>
            </li>

            <li class="header__nav_item">
              <a href="<?php bloginfo('url');?>#works" class="header__nav_link js-header__nav_link">
                <span class="header__nav_text--main">WORKS</span>
                <span class="header__nav_text--sub">
                  実績
                </span>
              </a>
            </li>

            <li class="header__nav_item">
              <a href="<?php bloginfo('url');?>#company" class="header__nav_link js-header__nav_link">
                <span class="header__nav_text--main">COMPANY</span>
                <span class="header__nav_text--sub">
                  会社概要
                </span>
              </a>
            </li>

            <li class="header__nav_item">
              <a href="<?php bloginfo('url');?>/contact" class="header__nav_link">
                <span class="header__nav_text--main">CONTACT</span>
                <span class="header__nav_text--sub">
                  お問い合わせ
                </span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <main class="m">
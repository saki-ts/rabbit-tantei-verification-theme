<?php
  $themePath = get_template_directory_uri().'/dist/';
?>
</div>
</main>

<!-- footer -->
<footer class="f">
  <div class="container wrapper f_container">
    <div class="f_head">
      <div class="f_head__info">
        <p class="f_head__logo">
          <?php 
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if ( has_custom_logo() ) {
                    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" class="f_head__logo_img">';
            } else {
                    echo get_bloginfo( 'name' );
            }
          ?>
        </p>
        <div class="f_address">
          <p class="f_address__text"><span class="f_address__text--postal_code">〒123-4567</span>東京都渋谷区渋谷1-1-1オーダービル1F</p><a class="f_address__link" href="#">Google map</a>
        </div>
      </div>
      <nav class="f_nav">
        <?php 
          $footerNav =
          array (
            //カスタムメニュー名
            'theme_location' => 'footer_nav',
            //ulを梱包する親divを非表示い
            'container' => false,
            //カスタムメニューを設定しない際に固定ページでメニューを作成しない
            'fallback_cb' => false,
            'menu_class' => 'f_nav__list'
          );
          wp_nav_menu( $footerNav );
        ?>
      </nav>
    </div>
    <div class="f_bottom"><small class="f_copy">© <?php echo date('Y');?> <?php bloginfo('name');?> All Rights Reserved.</small>
      <p class="f_privacy"><a class="f_privacy__link" href="<?php bloginfo('url');?>/privacy">プライバシーポリシー</a></p>
    </div>
  </div>
</footer>
<!-- / footer -->
<?php
  get_template_part( 'parts/scripts' );
  wp_footer();
?>
</body>

</html>
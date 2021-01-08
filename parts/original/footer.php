<?php
  $themePath = get_template_directory_uri().'/common/';
?>
</main>
<footer class="footer">
  <div class="footer__wrap">
    <div class="ctr cont_ctr">
      <div class="footer__2col">
        <p class="footer__logo">
          <a href="<?php bloginfo('url');?>" class="footer__logo_link">
            <img src="<?php echo $themePath; ?>img/logo_white.svg" alt="株式会社サラ">
          </a>
        </p>
        <nav class="footer__nav">
          <ul class="footer__nav_list">
            <li class="footer__nav_item">
              <a href="<?php bloginfo('url');?>#news" class="footer__nav_link">
                <span class="footer__nav_text--main">NEWS</span>
                <span class="footer__nav_text--sub">お知らせ</span>
              </a>
            </li>
            <li class="footer__nav_item">
              <a href="<?php bloginfo('url');?>#message" class="footer__nav_link">
                <span class="footer__nav_text--main">MESSAGE</span>
                <span class="footer__nav_text--sub">代表挨拶</span>
              </a>
            </li>
            <li class="footer__nav_item">
              <a href="<?php bloginfo('url');?>#philosophy" class="footer__nav_link">
                <span class="footer__nav_text--main">PHILOSOPHY</span>
                <span class="footer__nav_text--sub">理念</span>
              </a>
            </li>
            <li class="footer__nav_item">
              <a href="<?php bloginfo('url');?>#service" class="footer__nav_link">
                <span class="footer__nav_text--main">SERVICE</span>
                <span class="footer__nav_text--sub">事業内容</span>
              </a>
            </li>
          </ul>
          <ul class="footer__nav_list">
            <li class="footer__nav_item">
              <a href="<?php bloginfo('url');?>#works" class="footer__nav_link">
                <span class="footer__nav_text--main">WORKS</span>
                <span class="footer__nav_text--sub">実績</span>
              </a>
            </li>
            <li class="footer__nav_item">
              <a href="<?php bloginfo('url');?>#company" class="footer__nav_link">
                <span class="footer__nav_text--main">COMPANY</span>
                <span class="footer__nav_text--sub">会社概要</span>
              </a>
            </li>
            <li class="footer__nav_item">
              <a href="<?php bloginfo('url');?>/contact" class="footer__nav_link">
                <span class="footer__nav_text--main">CONTACT</span>
                <span class="footer__nav_text--sub">お問い合わせ</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <p class="footer__privacy"><a href="<?php bloginfo('url');?>/privacy" class="footer__privacy_link">PRIVACY POLICY</a></p>
      <small class="footer__copy">©2020 THOROUGH All Rights Reserved.</small>
    </div>
  </div>
</footer>
</div>
<?php
  get_template_part( 'parts/scripts' );
  wp_footer();
?>

</body>

</html>
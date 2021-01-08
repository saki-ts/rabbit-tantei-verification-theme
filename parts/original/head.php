<?php
  $themePath = get_template_directory_uri().'/common/';
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="士業,集客,コンサルティング,株式会社サラ">
  <meta name="description" content="<?php bloginfo('description');?>">
  <meta name="format-detection" content="telephone=no">
  <meta property="og:title" content="<?php bloginfo('name');?>" />
  <meta property="og:description" content="<?php bloginfo('description');?>" />
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="ja_JP" />
  <meta property="og:url" content="<?php bloginfo('url');?>" />
  <meta property="og:image" content="<?php echo $themePath; ?>img/ogp.png" />
  <meta property="og:image:width" content="1200px" />
  <meta property="og:image:height" content="630px" />
  <meta name="twitter:card" content="summary_large_image">
  <title><?php bloginfo('name');?></title>
  <link rel="canonical" href="<?php bloginfo('url');?>">
  <link rel="stylesheet" href="<?php echo $themePath; ?>css/style.css">
  <link rel="stylesheet" href="<?php echo $themePath; ?>css/swiper.min.css">
  <link rel="shortcut icon" href="<?php echo $themePath; ?>favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $themePath; ?>apple-touch-icon.png">
  <?php if(is_page('contact')): ?>
    <script>
    // お問い合わせ iosで拡大防止
    var ua = navigator.userAgent.toLowerCase();
    var isiOS = (ua.indexOf('iphone') > -1) || (ua.indexOf('ipad') > -1);
    if(isiOS) {
      var viewport = document.querySelector('meta[name="viewport"]');
      if(viewport) {
        var viewportContent = viewport.getAttribute('content');
        viewport.setAttribute('content', viewportContent + ', user-scalable=no');
      }
    }
    </script>
  <?php endif;?>
  <?php wp_head(); ?>
</head>
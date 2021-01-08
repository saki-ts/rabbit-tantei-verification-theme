<?php
  $themePath = get_template_directory_uri().'/dist/';
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="キーワード1,キーワード2,キーワード3">
  <meta name="description" content="<?php bloginfo('description');?>">
  <meta name="format-detection" content="telephone=no">
  <title><?php bloginfo('name');?></title>
  <link rel="canonical" href="<?php bloginfo('url');?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap">
  <link rel="stylesheet" href="<?php echo $themePath; ?>css/reset.css">
  <link rel="stylesheet" href="<?php echo $themePath; ?>css/style.css">
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
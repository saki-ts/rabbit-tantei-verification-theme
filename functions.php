<?php
// ************************************************
//  カスタムロゴ
// ************************************************

// カスタムロゴ有効化設定
add_theme_support('custom-logo');


// ************************************************
//  ナビゲーション
// ************************************************
add_action( 'after_setup_theme', 'register_custom_menus' );

//ナビゲーションを登録する
function register_custom_menus() {
  register_nav_menus( array(
    //この中にカスタムメニューを定義 '場所' => '説明'
    'header_nav' => 'ヘッダーナビゲーション',
    'footer_nav' => 'フッターナビゲーション'
  ));
}

// ナビゲーションに説明が入力されていたら、サブタイトルとして表示
add_filter('walker_nav_menu_start_el', 'description_in_custom_nav_menu', 10, 4);
function description_in_custom_nav_menu($item_output, $item){
  return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<span class='h_nav__sub_text'>{$item->description}</span><", $item_output);
}

// ************************************************
//  固定/投稿ページ内の画像URL等の絶対パスを相対パスに変更
// ************************************************
add_filter('the_content','img_short_path');
function img_short_path($cont){
  $cont = str_replace('"image/', '"' . get_bloginfo('template_directory') . '/dist/image/', $cont);
  return $cont;
}

// ************************************************
//  投稿画面で本文編集エリアを非表示
// ************************************************
add_action( 'init' , 'my_remove_post_editor_support' );
function my_remove_post_editor_support() {
  remove_post_type_support( 'post', 'editor' );
}

// ************************************************
//  アイキャッチ画像の有効化
// ************************************************
add_theme_support('post-thumbnails');
set_post_thumbnail_size(300, 300, true);

// ************************************************
//  head内不要なタグを削除
// ************************************************
add_action( 'init' , 'head_Cleaneup' );

function head_Cleaneup() {
  // category feeds
  remove_action( 'wp_head', 'rsd_link' );
  // windows live writer(WP外部サービス利用時に情報取得に使うリンク)
  remove_action( 'wp_head', 'wlwmanifest_link' );
  // previous link(Microsoftが提供するブログエディター「Windows Live Writer」を使用する際のマニフェストファイルへのリンク生成を削除)
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
  remove_action('wp_head','rest_output_link_wp_head');
  remove_action('wp_head','wp_oembed_add_host_js');
  // Embed(ver4.4からのoembedに対応するWP記事URLの引用機能)
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
  // start link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  // links for adjacent posts
  remove_action('wp_head', 'wp_print_styles', 8);
  // default cssの削除
  remove_action('wp_head', 'index_rel_link');
  // ページネーション rel="index" 削除
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
  // WP version
  remove_action( 'wp_head', 'wp_generator' );
  // remove WP version from css
  remove_action('wp_head', 'feed_links', 2);
  // EditURI link
  remove_action('wp_head', 'feed_links_extra', 3);
  // post and comment feeds
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  // 前へ、次へボタンのリンク
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  // remove emoji
  remove_action('wp_print_styles', 'print_emoji_styles');
  // remove emoji style css
  wp_deregister_script('comment-reply');
}

// ************************************************
//  ADMIN - LEFT SIDE MENU
// ************************************************
add_action( 'admin_menu', 'remove_menus', 999 );

function remove_menus(){
  global $current_user;

  // if(!($current_user->user_login=="tech_admin")) {
  //   remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' ); // カテゴリー
  //   remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' ); // タグ
  //   remove_menu_page( 'edit-comments.php' ); //コメント
  //   remove_menu_page('edit.php?post_type=page' ); // 固定ページ
  //   remove_menu_page('edit.php?post_type=acf-field-group' ); // Advanced custom field
  //   remove_submenu_page('users.php', 'users.php'); // ユーザー一覧
  //   remove_menu_page( 'plugins.php' ); //プラグインメニュー
  //   remove_menu_page( 'tools.php' ); //ツールメニュー
  //   remove_submenu_page( 'themes.php', 'themes.php' ); // テーマ
  //   remove_submenu_page( 'themes.php', 'theme-editor.php' ); // テーマ直編集エディタ
  //   remove_submenu_page( 'themes.php', 'nav-menus.php' ); // メニュー
  //   remove_menu_page('wpcf7'); // お問い合わせ
  //   remove_menu_page('wp-structuring-markup/wp-structuring-markup.php'); // Schema.org
  //   remove_submenu_page('options-general.php', 'options-reading.php'); // 表示設定
  //   remove_submenu_page('options-general.php', 'options-writing.php'); // 投稿設定
  //   remove_submenu_page('options-general.php', 'options-media.php' ); // メディア設定
  //   remove_submenu_page('options-general.php', 'options-discussion.php'); // ディスカッション設定
  //   remove_submenu_page('options-general.php', 'options-permalink.php'); // パーマリンク設定
  //   remove_submenu_page('options-general.php', 'akismet-key-config'); // Akismet（アンチスパム）
  //   remove_submenu_page('options-general.php', 'rlrsssl_really_simple_ssl'); // SSL設定
  //   remove_submenu_page('options-general.php', 'options-privacy.php'); // プライバシーポリシー設定
  // }
}
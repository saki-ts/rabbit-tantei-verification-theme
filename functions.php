<?php
/*************************************************
カスタムロゴ有効化設定
*************************************************/
add_theme_support('custom-logo');

/*************************************************
ナビゲーション
*************************************************/
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
/*************************************************
固定/投稿ページ内 URLの絶対パスを相対パスに変更
*************************************************/
add_filter('the_content','img_short_path');
function img_short_path($cont){
  $cont = str_replace('"image/', '"' . get_bloginfo('template_directory') . '/dist/image/', $cont);
  return $cont;
}

/*************************************************
 投稿画面で本文編集エリアを非表示
*************************************************/
add_action( 'init' , 'my_remove_post_editor_support' );
function my_remove_post_editor_support() {
  remove_post_type_support( 'post', 'editor' );
}

/*************************************************
アイキャッチ画像の有効化
*************************************************/
add_theme_support('post-thumbnails');
set_post_thumbnail_size(300, 300, true);

function get_page_slug($page_id) {
	$page = get_page($page_id);
	return $page->post_name;
}

/*************************************************
head内不要なタグを削除
*************************************************/
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

/*************************************************
サイトタイトル自動出力
*************************************************/
add_theme_support( 'title-tag' );

// サイト名とページタイトルの区切り文字変更
function change_title_separator( $separator ) {
  $separator = '|'; return $separator;
}
add_filter( 'document_title_separator', 'change_title_separator' );

/*************************************************
管理画面 エディター用スタイル適用
*************************************************/
add_editor_style('dist/css/admin/editor-style.css');

/*************************************************
カスタム投稿タイプ
ニュース(slug:topic)
*************************************************/
add_action( 'init', 'custom_post_type_topic');

function custom_post_type_topic() { 
	register_post_type( 'topic',
		array( 'labels' => array(
			'name' => __( 'ニュース' ),
			'singular_name' => __( 'ニュース' ),
			'all_items' => __( 'ニュース一覧' ),
			'add_new' => __( '新規追加' ),
			'add_new_item' => __( 'ニュースを新規投稿' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'ニュースを編集' ),
			'new_item' => __( 'ニュースを新規投稿' ),
			'view_item' => __( 'ニュースを表示' ),
			'search_items' => __( 'ニュースを検索' ),
			'not_found' =>  __( 'ニュースが投稿されていません。' ),
			'not_found_in_trash' => __( 'ゴミ箱にニュースはありませんでした。' ),
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'ニュース（お知らせ）投稿機能です。' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5,
			'rewrite'	=> array( 'slug' => 'topic', 'with_front' => true ),
			'has_archive' => 'topic',
			'capability_type' => 'post',
			'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','revisions','sticky'),
      'map_meta_cap'=> true
		) /* end of options */
  ); /* end of register post type */
}

/*************************************************
カスタム投稿タイプ
まとめ(slug:matome)
*************************************************/
add_action( 'init', 'custom_post_type_matome');

function custom_post_type_matome() { 
	register_post_type( 'matome',
		array( 'labels' => array(
			'name' => __( 'まとめ' ),
			'singular_name' => __( 'まとめ' ),
			'all_items' => __( 'まとめ' ),
			'add_new' => __( '新規追加' ),
			'add_new_item' => __( 'まとめを新規投稿' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'まとめを編集' ),
			'new_item' => __( 'まとめを新規投稿' ),
			'view_item' => __( 'まとめを表示' ),
			'search_items' => __( 'まとめを検索' ),
			'not_found' =>  __( 'まとめが投稿されていません。' ),
			'not_found_in_trash' => __( 'ゴミ箱にまとめはありませんでした。' ),
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'まとめ 投稿機能です。' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5,
			'rewrite'	=> array( 'slug' => 'matome', 'with_front' => true ),
			'has_archive' => 'matome',
			'capability_type' => 'post',
			'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','revisions','sticky'),
      'map_meta_cap'=> true,
			'taxonomies' => array('matome_cat')//使用するタクソノミー
		) /* end of options */
  ); /* end of register post type */

  register_taxonomy(
    'matome_cat', // 「カスタムタクソノミー」を使用するオブジェクトタイプを指定します。
    'matome', // register_post_typeで登録したカスタム投稿タイプ名
    array(
      'label' => 'まとめカテゴリー',
      'labels' => array(
        'edit_item' =>'まとめカテゴリーを編集',
        'add_new_item' => '新規カテゴリーを追加',
        'search_items' => 'まとめカテゴリーを検索'
      ),
      'rewrite' => array('matome_cat' => 'matome'),
      'hierarchical' => true,
      'public' => true,
      'query_var' => true,
      'singular_label' => 'まとめカテゴリー',
      'show_in_rest' => true
    )
  );
}

/*************************************************
カスタム投稿タイプ
過去の実績(slug:case)
*************************************************/
add_action( 'init', 'custom_post_type_case');

function custom_post_type_case() { 
	register_post_type( 'case',
		array( 'labels' => array(
			'name' => __( '過去の実績' ),
			'singular_name' => __( '過去の実績' ),
			'all_items' => __( '過去の実績一覧' ),
			'add_new' => __( '新規追加' ),
			'add_new_item' => __( '過去の実績を新規投稿' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( '過去の実績を編集' ),
			'new_item' => __( '過去の実績を新規投稿' ),
			'view_item' => __( '過去の実績を表示' ),
			'search_items' => __( '過去の実績を検索' ),
			'not_found' =>  __( '過去の実績が投稿されていません。' ),
			'not_found_in_trash' => __( 'ゴミ箱に過去の実績はありませんでした。' ),
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( '過去の実績 投稿機能です。' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5,
			'rewrite'	=> array( 'slug' => 'case', 'with_front' => true ),
			'has_archive' => 'case',
			'capability_type' => 'post',
			'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','revisions','sticky'),
      'map_meta_cap'=> true,
			'taxonomies' => array('case_cat')//使用するタクソノミー
		) /* end of options */
  ); /* end of register post type */

  register_taxonomy(
    'case_cat', // 「カスタムタクソノミー」を使用するオブジェクトタイプを指定します。
    'case', // register_post_typeで登録したカスタム投稿タイプ名
    array(
      'label' => '過去の実績カテゴリー',
      'labels' => array(
        'edit_item' =>'過去の実績カテゴリーを編集',
        'add_new_item' => '新規カテゴリーを追加',
        'search_items' => '過去の実績カテゴリーを検索'
      ),
      'rewrite' => array('case_cat' => 'case'),
      'hierarchical' => true,
      'public' => true,
      'query_var' => true,
      'singular_label' => '過去の実績カテゴリー',
      'show_in_rest' => true
    )
  );
}

/*************************************************
カスタム投稿タイプ
よくある質問(slug:faq)
*************************************************/
add_action( 'init', 'custom_post_type_faq');

function custom_post_type_faq() {
	register_post_type( 'faq',
		array( 'labels' => array(
			'name' => __( 'よくある質問' ),
			'singular_name' => __( 'よくある質問' ),
			'all_items' => __( 'よくある質問' ),
			'add_new' => __( '新規追加' ),
			'add_new_item' => __( 'よくある質問を新規投稿' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'よくある質問を編集' ),
			'new_item' => __( 'よくある質問を新規投稿' ),
			'view_item' => __( 'よくある質問を表示' ),
			'search_items' => __( 'よくある質問を検索' ),
			'not_found' =>  __( 'よくある質問が投稿されていません。' ),
			'not_found_in_trash' => __( 'ゴミ箱によくある質問はありませんでした。' ),
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'よくある質問 投稿機能です。' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5,
			'rewrite'	=> array( 'slug' => 'faq', 'with_front' => true ),
			'has_archive' => 'faq',
			'capability_type' => 'post',
			'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','revisions','sticky'),
      'map_meta_cap'=> true,
			'taxonomies' => array('faq_cat')//使用するタクソノミー
		) /* end of options */
  ); /* end of register post type */

  register_taxonomy(
    'faq_cat', // 「カスタムタクソノミー」を使用するオブジェクトタイプを指定します。
    'faq', // register_post_typeで登録したカスタム投稿タイプ名
    array(
      'label' => 'よくある質問カテゴリー',
      'labels' => array(
        'edit_item' =>'よくある質問カテゴリーを編集',
        'add_new_item' => '新規カテゴリーを追加',
        'search_items' => 'よくある質問カテゴリーを検索'
      ),
      'rewrite' => array('faq_cat' => 'faq'),
      'hierarchical' => true,
      'public' => true,
      'query_var' => true,
      'singular_label' => 'よくある質問カテゴリー',
      'show_in_rest' => true
    )
  );
}

/*************************************************
カスタム投稿タイプ
事例別料金(slug:price)
*************************************************/
add_action( 'init', 'custom_post_type_price');

function custom_post_type_price() { 
	register_post_type( 'price',
		array( 'labels' => array(
			'name' => __( '事例別料金' ),
			'singular_name' => __( '事例別料金' ),
			'all_items' => __( '事例別料金' ),
			'add_new' => __( '新規追加' ),
			'add_new_item' => __( '事例別料金を新規投稿' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( '事例別料金を編集' ),
			'new_item' => __( '事例別料金を新規投稿' ),
			'view_item' => __( '事例別料金を表示' ),
			'search_items' => __( '事例別料金を検索' ),
			'not_found' =>  __( '事例別料金が投稿されていません。' ),
			'not_found_in_trash' => __( 'ゴミ箱に事例別料金はありませんでした。' ),
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( '事例別料金 投稿機能です。' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5,
			'rewrite'	=> array( 'slug' => 'price', 'with_front' => true ),
			'has_archive' => 'price',
			'capability_type' => 'post',
			'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','revisions','sticky'),
      'map_meta_cap'=> true
		) /* end of options */
  ); /* end of register post type */
}

/*************************************************
カスタム投稿タイプ
支店一覧(slug:branch)
*************************************************/
add_action( 'init', 'custom_post_type_branch');

function custom_post_type_branch() { 
	register_post_type( 'branch',
		array( 'labels' => array(
			'name' => __( '支店一覧' ),
			'singular_name' => __( '支店一覧' ),
			'all_items' => __( '支店一覧' ),
			'add_new' => __( '新規追加' ),
			'add_new_item' => __( '支店一覧を新規投稿' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( '支店一覧を編集' ),
			'new_item' => __( '支店一覧を新規投稿' ),
			'view_item' => __( '支店一覧を表示' ),
			'search_items' => __( '支店一覧を検索' ),
			'not_found' =>  __( '支店一覧が投稿されていません。' ),
			'not_found_in_trash' => __( 'ゴミ箱に支店一覧はありませんでした。' ),
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( '支店一覧 投稿機能です。' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5,
			'rewrite'	=> array( 'slug' => 'branch', 'with_front' => true ),
			'has_archive' => 'branch',
			'capability_type' => 'post',
			'hierarchical' => true,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','revisions','sticky'),
      'map_meta_cap'=> true,
		) /* end of options */
  ); /* end of register post type */
}

/*************************************************
カスタムタクソノミー
特定のターム自動選択
*************************************************/
add_action('admin_print_footer_scripts', 'default_term_select', 21);

function default_term_select() {
  ?>
    <script type="text/javascript">
      jQuery(function($) {
        $('input#in-topic_cat-3').prop('checked', true);
      });
    </script>
  <?php
}

/*************************************************
ADMIN - LEFT SIDE MENU
*************************************************/
add_action( 'admin_menu', 'remove_menus', 999 );

function remove_menus(){
  global $current_user;

  // if(!($current_user->user_login=="tech_admin")) {
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'all-in-one-seo-pack/aioseop_class.php' ); // All in one SEO Pack
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
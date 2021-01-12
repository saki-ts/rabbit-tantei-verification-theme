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
//  投稿アーカイプの有効/スラッグ指定
// ************************************************
// 昨日のNotionで書いた部分
// add_action( 'register_post_type_args', 'post_has_archive', 10, 2 );

// function post_has_archive($args, $post_type) {
//   if( 'post' == $post_type ) {
//     $args['rewrite'] = true;
//     $args['has_archive'] = 'topic'; // スラッグ名
//   }
//   return $args;
// }
// 昨日のNotionで書いた部分/end

function custom_post_example() { 
	// creating (registering) the custom type 
	register_post_type( 'custom_type', /* ここにarchive-〇〇.phpになる〇〇を入れる。 (http://codex.wordpress.org/Function_Reference/register_post_type) */

		// 以下の「custom_type」はarchive-〇〇.phpの「〇〇」に置き換える。
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Custom Types', 'bonestheme' ), /* 【最低限必須】このnameは管理画面のメニュー名が変更する。日本語可能。This is the Title of the Group */
			'singular_name' => __( 'Custom Post', 'bonestheme' ), /* 【最低限必須】これは個別のタイプです。日本語可能。 This is the individual type */
			'all_items' => __( 'All Custom Posts', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Custom Type', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Post Types', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Post Type', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Post Type', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Post Type', 'bonestheme' ), /* Search Custom Type Title */ 
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example custom post type', 'bonestheme' ), /* Custom Type Description */
			'public' => true,/* 【最低限必須】? */
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* 【最低限必須】 this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'custom_type', 'with_front' => false ), /* 【最低限必須】 you can specify its url slug */
			'has_archive' => 'custom_type', /* 【最低限必須】 you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* 【最低限必須】 the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'custom_type' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_example');

/*------------------------------------
PHP Program Information
Summary カスタム投稿を追加
 ------------------------------------*/
/* カスタム投稿タイプ - ニュース as topic */
add_action( 'init', 'create_post_type_topic' );
function create_post_type_topic() {
	register_post_type( 'topic',
		array(
			'labels' => array(
				'name' => __( 'ニュース' ),
				'singular_name' => __( 'news' ),
				'hierarchical' => true
			),
			'rewrite' => array('slug' => 'topic', 'with_front' => false),
			'public' => true,
			'menu_position' => 100,
			'has_archive' => true,
			'supports' => array('title','editor','thumbnail','excerpt'),
			'map_meta_cap'=> true // 不要?
		)
	);
	//  register_taxonomy(
	// 	'topics',
	// 	'topic',
	// 	array(
	// 		'hierarchical' => true,
	// 		'update_count_callback' => '_update_post_term_count',
	// 		'label' => 'ニュースカテゴリー',
	// 		'singular_label' => 'ニュースカテゴリー',
	// 		'public' => true,
	// 		'show_ui' => true
	// 	)
	// );
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
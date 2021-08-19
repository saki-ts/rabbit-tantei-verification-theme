<?php get_header(); ?>
<?php
$themePath = get_template_directory_uri().'/dist/';

// カスタムフィールドを取得
$name = get_field('name');
$pref = get_field('pref');
$age = get_field('age');
$category = get_field('category');
$status = get_field('status');
$commission = get_field('commission');
$price = get_field('price');
$tag = get_field('tag');
$comment = get_field('comment');
$star = get_field('star');

// 画像取得
$questionnaire = get_field('questionnaire');
$questionnaire = wp_get_attachment_image_src($questionnaire['id'], 'アンケート');
$questionnaire = $questionnaire[0];
if($questionnaire){
	$questionnaire_flag = true;
}else{
	$questionnaire_flag = false;
}

// 投稿内容に改行付与
$content = nl2br(get_the_content());
?>

<style>
.single_header {
  padding-top: 180px;
}
.single {
  margin-bottom: 40px;
}
.single_title {
  box-shadow: 0 1px 0 rgba(99,99,99,0.5);
  font-size: 24px;
}
.single_thumbnail {
  margin:40px auto;
  width: 100%;
}
.single img {
  height: auto;
  margin:0 auto;
}
.star ul {
  display:flex;
}
.recomend_card {
  display:flex;
}
</style>

<section class="single_header bg_white">
  <header class="container wrapper">
    <?php if (get_post_type() === 'case'): ?>
      <h1 class="branch_main_title">Case<span class="branch_main_title--sub">過去の実績詳細</span></h1>
    <?php endif; ?>
  </header>
</section>

<article class="single single_<?php echo esc_attr(get_post_type()); ?> bg_white">
<?php if(have_posts()) : ?>
  <?php while(have_posts()) : the_post(); ?>
    <div class="container wrapper">
      <div class="single_head_info">
        <h1 class="single_title">タイトル：<?php the_title(); ?></h1>
        <h3>
          <span class="commission">カテゴリー：<?php echo $category; ?></span>
          <br>依頼内容：<?php echo $commission; ?>
        </h3>
        <div class="star">
          <span class="rate">満足度：</span>
          <ul>
            <?php
            for ($i=0; $i < $star; $i++) {
              echo '<li><img class="" src="'.$themePath.'/image/case/star.png" alt=""></li>';
            }
            ?>
          </ul>
          <div class="button small">
            <a href="<?php echo the_permalink(); ?>">お客様の声をみる</a>
          </div>
        </div>
        <h4>簡単な状況：<?php echo $status; ?></h4>
      </div>
      <?php if(get_the_post_thumbnail()) : ?>
        <figure class="single_thumbnail">
          <?php the_post_thumbnail( array(200, 200) ); ?>
        </figure>
      <?php endif; ?>
      <h4>調査内容・報告</h4>
      <p><?php echo $content ?></p>
    </div>
  <?php endwhile; ?>
<?php endif; ?>
</article>


<article class="recomend">
  <h2 class="branch_main_title">Recomend<span class="branch_main_title--sub">その他おすすめ過去の実績（関連した記事）</span></h2>

  <?php
  $loop = new WP_Query(
    array(
      'post_type' => array('case'),
      'posts_per_page' => 6,
      'paged' => $paged
      )
    );
  while ( $loop->have_posts() ) : $loop->the_post();
  $category_name = esc_html(get_post_type_object(get_post_type())->labels->singular_name);
  $category_slug = esc_html(get_post_type_object(get_post_type())->name);
  $termstemp = $category_slug.'_cat';
  $terms = get_the_terms($post->ID, $termstemp);

  /*タイトル整形*/
  if(mb_strlen(get_the_title()) <= 20){
    $title = get_the_title();
  }else{
    $title = mb_substr(get_the_title(), 0, 19);
    $title .= '…';
  }
  ?>
  <div class="recomend_card">
    <?php if(get_the_post_thumbnail()) : ?>
      <figure class="single_thumbnail">
        <?php the_post_thumbnail( array(120, 120) ); ?>
      </figure>
      <?php else: ?>
      <figure class="single_thumbnail">
        <img class="attachment" src="https://placehold.jp/120x120.png" alt="">
      </figure>
    <?php endif; ?>

    <div class="single_head_info">
      <h1 class="single_title">タイトル：<?php the_title(); ?></h1>
      <h3><span class="commission">カテゴリー：<?php echo $category; ?></span></h3>
      <div class="star">
        <span class="rate">満足度</span>
        <ul>
          <?php
          for ($i=0; $i < $star; $i++) {
            echo '<li><img class="" src="'.$themePath.'/image/case/star.png" alt=""></li>';
          }
          ?>
        </ul>
        <div class="button small">
          <a href="<?php echo the_permalink(); ?>">お客様の声をみる</a>
        </div>
      </div>
    </div>
  </div>
  <?php endwhile; ?>
</article>

<?php get_footer(); ?>
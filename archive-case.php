<?php
/*
 * 過去の実績一覧
 */
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

// タイトル整形
if(mb_strlen(get_the_title()) <= 40){
  $title = get_the_title();
}else{
  $title = mb_substr(get_the_title(), 0, 40);
  $title .= '…';
}
?>

<style>
.archive {
  padding-top: 180px;
}
.archive_thumbnail {
  height: 200px;
  position: relative;
  overflow: hidden;
  width: 200px;
}
.archive_card {
  align-items:baseline;
  display: flex;
}
.archive_card + .archive_card  {
  margin: 40px 0;
}
.archive_date {
  margin-right: 20px;
}
.archive_thumbnail img {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  width: auto;
  height: auto;
}
.star ul {
  display:flex;
}
</style>

<?php get_header(); ?>
<section class="archive archive_header bg_white">
  <header class="container wrapper">
    <?php if (get_post_type() === 'case'): ?>
      <h1 class="branch_main_title">Case<span class="branch_main_title--sub">過去の実績一覧</span></h1>
    <?php endif; ?>
  </header>
</section>
<div class="archive_<?php echo esc_attr(get_post_type()); ?>">
  <div class="container wrapper">
    <?php if(have_posts()) : ?>
      <?php while(have_posts()) : the_post(); ?>
          <h3><span class="commission" style="background-color:<?php echo $categorycolor; ?>"><?php echo $category; ?></span><br><?php echo $commission; ?></h3>
          <h4>かんたんな状況：<?php echo $status; ?></h4>
          <article class="archive_card archive_card--thumb">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
              <p class="meta">
                <span class="name"><?php echo $name; ?>さん</span>（<span class="pref"><?php echo $pref; ?></span><span class="age"><?php echo $age; ?>歳</span>）
              </p>
              <?php if(has_post_thumbnail()) : ?><!-- アンケートが登録されている時 -->
                <figure class="archive_thumbnail">
                  <?php the_post_thumbnail('200x200'); ?>
                </figure>
              <?php endif; ?>
              <div class="star">
                <span class="rate">満足度</span>
                <ul>
                  <?php
                  for ($i=0; $i < $star; $i++) {
                    echo '<li><img class="" src="'.$themePath.'/image/case/star.png" alt=""></li>';
                  }
                  ?>
                </ul>
              </div>

              <div class="button">
                <a href="<?php the_permalink(); ?>"><i class="pcon pcon-196"></i>詳しくよむ</a>
              </div>
            </a>
          </article>
      <?php endwhile; ?>
    <?php else : ?>
        <p>まだ投稿された記事がないようです。</p>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
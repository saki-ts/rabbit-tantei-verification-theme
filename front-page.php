<?php
	$themePath = get_template_directory_uri().'/dist/';
?>

<?php get_header(); ?>
<section class="first_view js-firstview">
	<div class="first_view__list">
		<div class="first_view__item">
			<figure class="first_view__image_box"><img class="first_view__image pc_show" src="<?php echo $themePath; ?>image/fv_image@2x.jpg" alt="ファーストビューイメージ"><img class="first_view__image sp_show" src="<?php echo $themePath; ?>image/fv_image_sp@2x.jpg" alt="ファーストビューイメージ"></figure>
			<div class="container wrapper first_view__container">
				<h1 class="first_view__catch">Site production<br>tailored to customers</h1>
				<p class="first_view__subcatch">Design / web template</p>
			</div>
		</div>
	</div>
	<p class="first_view__scroller"><span class="first_view__scroller_text">Scroll</span></p>
</section>
<section class="philosophy bg_white">
	<div class="container wrapper">
		<h2 class="philosophy__title">
			<p class="philosophy__title_text--sub">Philosophy</p>
			<p class="philosophy__title_text">選び続けられる価値のある<br>テーマを提供する</p>
		</h2>
		<div class="philosophy__detail">
			<p class="philosophy__detail_text">ここには1行推奨30〜35文字のテキストが入ります。ここには1行推奨30〜35文字のテキストが入ります。<br><br>ここには1行推奨30〜35文字のテキストが入ります。ここには1行推奨30〜35文字のテキストが入ります。<br><br>ここには1行推奨30〜35文字のテキストが入ります。ここには1行推奨30〜35文字のテキストが入ります。</p>
			<a class="main_button" href="<?php bloginfo('url');?>/about">View More</a>
		</div>
	</div>
</section>

<!-- カルーセルスライダー -->
<section class="bg_white">
<?php echo do_shortcode('[sp_wpcarousel id="132"]'); ?>
</section>

<section class="service bg_gray" id="service">
	<div class="container wrapper">
		<h2 class="main_title">Service<span class="main_title--sub">事業内容</span></h2>
		<ul class="service__card">
			<li class="service_card__item">
				<figure class="service_card__image_wrapper"><im
					<h3 class="service_card__title">見出しテキスト</h3>
					<figure class="service_card__image_wrapper"><img class="service_card__image" src="<?php echo $themePath; ?>image/card_image.jpg" alt="ここに画像が入ります。"></figure>
				<div class="service_card__body">1行推奨30〜35文字のテキストが入ります。ここには1行推奨30〜35文字のテキストが入ります。</p>
				</div>
			</li>
			<li class="service_card__item">
				<figure class="service_card__image_wrapper"><img class="service_card__image" src="<?php echo $themePath; ?>image/card_image.jpg" alt="ここに画像が入ります。"></figure>
				<div class="service_card__body">
					<h3 class="service_card__title">見出しテキスト</h3>
					<p class="service_card__text">ここには1行推奨30〜35文字のテキストが入ります。ここには1行推奨30〜35文字のテキストが入ります。</p>
				</div>
			</li>
			<li class="service_card__item">
				<figure class="service_card__image_wrapper"><img class="service_card__image" src="<?php echo $themePath; ?>image/card_image.jpg" alt="ここに画像が入ります。"></figure>
				<div class="service_card__body">
					<h3 class="service_card__title">見出しテキスト</h3>
					<p class="service_card__text">ここには1行推奨30〜35文字のテキストが入ります。ここには1行推奨30〜35文字のテキストが入ります。</p>
				</div>
			</li>
			<li class="service_card__item">
				<figure class="service_card__image_wrapper"><img class="service_card__image" src="<?php echo $themePath; ?>image/card_image.jpg" alt="ここに画像が入ります。"></figure>
				<div class="service_card__body">
					<h3 class="service_card__title">見出しテキスト</h3>
					<p class="service_card__text">ここには1行推奨30〜35文字のテキストが入ります。ここには1行推奨30〜35文字のテキストが入ります。</p>
				</div>
			</li>
		</ul>
	</div>
</section>
<section class="news bg_white" id="news">
	<div class="container wrapper">
		<h2 class="main_title">News<span class="main_title--sub">ニュース</span></h2>
		<ul class="news__list">

			<?php
				$args = array(
					'posts_per_page' => 3
				);
				$posts = get_posts( $args );
				foreach ( $posts as $post ):
				$postId = get_the_ID();
				$linkUrl = get_post_meta($postId, 'link_url', true);
				setup_postdata( $post );
			?>
			<?php if(empty($linkUrl)) : ?>
			<li class="news_list__item">
				<span class="news_list__inner">
					<time class="news_list__date"><?php the_time( 'Y.m.d' ); ?></time>
					<p class="news_list__text"><?php the_title();?></p>
				</span>
			</li>
			<?php else : ?>
			<li class="news_list__item">
				<a class="news_list__link" href="<?php echo $linkUrl; ?>">
					<time class="news_list__date"><?php the_time( 'Y.m.d' ); ?></time>
					<p class="news_list__text"><?php the_title();?></p>
				</a>
			</li>
			<?php endif; ?>

			<?php
				endforeach;
				wp_reset_postdata();
			?>
		</ul>

		<a class="main_button" href="<?php bloginfo('url');?>/topic">View More</a>
	</div>
</section>
<section class="contact theme_color">
	<div class="container wrapper">
		<h2 class="main_title main_title--white contact__title">Contact<span class="main_title--sub">お問い合わせ</span></h2>
		<p class="contact__text">お気軽にご相談ください</p><a class="contact__button" href="<?php bloginfo('url');?>/contact">お問い合わせはコチラ</a>
	</div>
</section>
<?php get_footer(); ?>
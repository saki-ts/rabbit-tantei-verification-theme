<?php

error_reporting(0);

require_once('common.php');


$pm = post2params($_POST);

if( !empty($pm["do_submit_x"]) )
{
$err = array();

if( empty($pm["name"]))
{
	$err[] = "お名前を入力ください。";
}
if( empty($pm["gender_id"]))
{
	$err[] = "性別をお選びください。";
}

if( empty($pm["age"]))
{
	$err[] = "年齢を入力ください。";
}
if( empty($pm["pref_id"]))
{
	$err[] = "都道府県を入力ください。";
}
if( empty($pm["address"]))
{
	$err[] = "住所を入力ください。";
}
if( empty($pm["tel"]))
{
	$err[] = "電話番号を入力ください。";
}
if( empty($pm["email"]) )
{
	$err[] = "メールアドレスをご記入ください。";
}elseif(!preg_match('/^[a-zA-Z0-9_\.\-]+?@[A-Za-z0-9_\.\-]+$/',$pm["email"])) {
	$err[] = "正しいメールアドレスをご記入ください。";
}
if( empty($pm["jobtype_id"]))
{
	$err[] = "希望職種を入力ください。";
}

if( empty($pm["motive"]))
{
	$err[] = "志望動機を入力ください。";
}

if( count($err) < 1 && !empty($pm["do_entry_x"]) )
{
	session_start();
	$_SESSION["pm"] = $pm;
	header('location:recruit2.php');
}
}

?><!-- page-recruit.php -->
<!-- header.php -->
<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>求人情報 | 浮気・不倫調査なら業界最安値のラビット探偵社へ</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="shortlink" href="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com" />
	<link rel="shortcut icon" href="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/favicon/favicon.png">
	<link rel="apple-touch-icon" href="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/favicon/apple-iphone-icon.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/favicon/apple-iphone-retina-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/favicon/apple-ipad-icon.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/favicon/apple-ipad-retina-icon.png">
	<link rel="pingback" href="<?= $domain ?>/xmlrpc.php">
		<link href="css/style_wp.css" rel="stylesheet" type="text/css" />
	<link href="css/hacks.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/style.css">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-5520939-32', 'auto');
		ga('send', 'pageview');
	</script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-867164307"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'AW-867164307');
	</script>
	<!-- facebook Remarketing -->
	<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','//connect.facebook.net/en_US/fbevents.js');
		fbq('init', '1532526337069098');
		fbq('track', "PageView");
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1532526337069098&ev=PageView&noscript=1" /></noscript>

	<!-- All in One SEO Pack 2.2.7.2 by Michael Torbert of Semper Fi Web Design[116,153] -->
	<link rel="canonical" href="<?= $domain ?>/recruit" />
	<!-- /all in one seo pack -->
	<link rel="alternate" type="application/rss+xml" title="浮気・不倫調査なら業界最安値のラビット探偵社へ &raquo; 求人情報 のコメントのフィード" href="<?= $domain ?>/recruit/feed" />
	<script type="text/javascript">
		window._wpemojiSettings = {"baseUrl":"http:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"https:\/\/rabbit-tantei.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.2.2"}};
		!function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),c.toDataURL().length>3e3):(d.fillText(String.fromCharCode(55357,56835),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
	</script>
	<style type="text/css">
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
	</style>
	<link rel='stylesheet' id='contact-form-7-css'  href='css/style_form.css' type='text/css' media='all' />
	<link rel='stylesheet' id='mmenu-custom-css'  href='css/mmenu.css' type='text/css' media='all' />
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?ver=1'></script>
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js?ver=1'></script>
	<script type='text/javascript' src='<?= $domain ?>/wp-content/plugins/mmenu/js/mmenu.js?ver=19'></script>
	<link rel='shortlink' href='<?= $domain ?>/?p=23' />
</head>
<body class="page page-id-23 page-parent page-template-default" >
		<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.6&appId=719529128063791";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<a name="top" id="top"></a>
	<header>
		<div class="inner tx_l cf">
			<div class="header-l">
				<p class="lead">首都圏、関西、中部、全国11支店、浮気調査ならラビット探偵社へお任せください</p>
				<h1 class="logo"><a href="<?= $domain ?>"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/header/logo.png" alt="男性の為の探偵事務所ならラビット探偵社"></a></h1>
				<ul class="social cf">
					<li><a href="https://twitter.com/tantei_rabbit" target="_blank"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/icon/ico_twitter.png" alt="Twitter"></a></li>
					<!-- <li><a href="https://www.facebook.com/%E3%83%A9%E3%83%93%E3%83%83%E3%83%88%E6%8E%A2%E5%81%B5%E7%A4%BE-199824037046924/" target="_blank"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/icon/ico_facebook.png" alt="Facebook"></a></li> -->
				</ul>
				<p class="head-txt"></p>
							</div>
							<div class="header-r">
					<p class="mb0 tel-txt">不明点などお気軽にお問い合せください</p>
					<p class="tel mb5">0120-509-027</p>
					<p class="mb0 mt5"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/header/hours.png" alt="メール・お電話は24時間対応しています"></p>
				</div>
					</div>
	</header>

	<nav class="gnavi">
		<ul>
			<li class="home"><a href="<?= $domain ?>" class="home">HOME</a></li>
			<li><a href="<?= $domain ?>/about">ラビット探偵社とは<br><span>ABOUT US</span></a></li>
			<li><a href="<?= $domain ?>/divorce">浮気･離婚について<br><span>DIVORCE</span></a></li>
			<li><a href="<?= $domain ?>/service">調査項目<br><span>SURVEY ITEM</span></a></li>
			<li><a href="<?= $domain ?>/prices">料金表<br><span>PRICE LIST</span></a></li>
			<li><a href="<?= $domain ?>/case">過去の実績<br><span>ACHIEVEMENTS</span></a></li>
			<li><a href="<?= $domain ?>/faq">よくある質問<br><span>FAQ</span></a></li>
			<li><a href="<?= $domain ?>/estimate">オンライン見積<br><span>ONLINE ESTIMATE</span></a></li>
		</ul>
	</nav>


	<article>
		<div class="wrap cf">
			<!-- left -->
			<div class="l-content">
			<script src="//rabbit-tantei.com/recruit/script.js"></script>
<?php
	/* start input area */



?>
	<section class="recruit">
	<h2 class="h2">急成長中のラビット探偵社の事業拡大に伴う社員募集</h2>

		<p class="banner sp"><img src="images/bunner.jpg" alt=""/><img src="images/banner_iwaikin.png" alt="" width="215" height="128" class="banner_iwaikin"></p>
		<p class="banner pc"><img src="images/banner_pc.jpg" alt=""/><img src="images/banner_iwaikin.png" alt="採用祝い金3万円" width="215" height="128" class="banner_iwaikin"></p>



<?php

/*
foreach ($pm as $key => $v) {
	echo $key . ' => ' . $v.'<br />';
}

if(isset($pm["do_submit_x"]))
{
	echo '$pm["do_submit_x"] = ' . $pm["do_submit_x"];

	if(empty($pm["do_submit_x"]))
	{
		echo 'あああああああああああ';
	}
	else
	{
		echo 'いいいいいいいいいいい';
	}

	echo ' count($err) = ' .  count($err);
	echo ' $pm["do_back_x"] = ' . $pm["do_back_x"];

}
else
{
	echo 'ううううううううううううううう';
}

*/

if( empty($pm["do_submit_x"])  || count($err) > 0 || !empty($pm["do_back_x"]) )
{
	if( empty($pm["do_submit_x"]) )
	{
		// 初回
		echo '
		<!----探偵社の仕事内容って？--------------------------------------------------------------------------------------------------------------------->
		<section id="jobcontent" class="content">
			<h3>探偵社の仕事内容って？</h3>
			<div class="sankaku"></div>
			<!----調査員----->
			<div class="investigator">
				<p class="jobimg sp"><img src="images/job1.png" alt=""/></p>
				<div class="midashi">
					<h4>調査員の仕事内容</h4>
					<p class="answer">張り込み、尾行、証拠撮影</p>
				</div>
				<div class="imgtext">
					<p class="jobimg2 pc"><img src="images/job1_pc.png" alt=""/></p>
					<p class="text sp">浮気、不倫、行動調査における張り込み、尾行、証拠撮影を主とする仕事です。ニッチな仕事でありますが、非常に需要のある仕事であります。調査現場業務は依頼者によって調査地域も様々ですので、フットワークが軽いことは必須です。探偵スタッフとして最低限の座学も必要ですが、先輩探偵と数々の浮気調査などの現場に同行していただき、実際の現場で学んでいくことで、より早く力をつけていっていただきます。</p>
					<div class="text pc">
						<p>浮気、不倫、行動調査における張り込み、尾行、証拠撮影を主とする仕事です。ニッチな仕事でありますが、非常に需要のある仕事であります。調査現場業務は依頼者によって調査地域も様々ですので、フットワークが軽いことは必須です。</p>
						<p>探偵スタッフとして最低限の座学も必要ですが、先輩探偵と数々の浮気調査などの現場に同行していただき、実際の現場で学んでいくことで、より早く力をつけていっていただきます。</p>
					</div>
					<div class="back">
						<p>電車、バス利用による徒歩尾行を中心とした調査、車両利用による車両尾行を中心とした調査。そして調査の時間帯は日中もあれば夜、深夜など依頼内容によってまちまちです。また探偵が現場での仕事としてどんなことをしているかと言えば、その多くの時間を費やすのが張り込みです。3時間の張り込みもあれば8時間の張り込みもあります。</p>
						<p>つまり探偵≒尾行ではなく、真夏でも真冬でも張り込みに費やす時間が多い仕事です。<br>我慢強さと忍耐力、それと注意力は必要です。</p>
						<p>なお仕事は探偵調査業務のみです。ポスティングとか営業などの探偵調査以外の仕事は一切ありません。また有償で購入していただくものもありません。</p>
						<p>一人前の生え抜きの探偵を育てるため、未経験者の調査員も募集しています。</p>
					</div>
				</div>
			</div>
			<!---現場管理----->
			<div class="mendanin">
				<div class="investigator">
					<p class="jobimg sp"><img src="images/job3.png" alt=""/></p>
					<div class="midashi">
						<h4 class="back">現場管理の<br>仕事内容</h4>
						<p class="answer">調査員への指示、依頼主への現状報告、調査現場の管理</p>
					</div>
					<div class="imgtext">
						<p class="jobimg2 pc"><img src="images/job3_pc.png" alt=""/></p>
						<div class="text">
							<p>現場調査員が動いている際の司令塔。<br>
								依頼者様に対しての現状報告や対象者の動きをGPSで追ったりと重要な役割です。
								当然現場調査員の経験を得て、出来る仕事になります。
							</p>
							<p>調査員経験者や調査管理部経験者は優遇いたします。</p>
						</div>
					</div>
				</div>
				<!---面談員----->
				<div class="mendanin">
					<div class="investigator">
						<p class="jobimg sp"><img src="images/job2.png" alt=""/></p>
						<div class="midashi">
							<h4 class="back">面談員(相談員)の仕事内容</h4>
							<p class="answer">電話・問い合わせ対応、面談<br>アポイント、カウンセリング</p>
						</div>
						<div class="imgtext">
							<p class="jobimg2 pc"><img src="images/job2_pc.png" alt=""/></p>
							<div class="text">
								<p>面談員は探偵事務所でも調査員と同様に重要な職種になります。面談員は、相談者からの問い合わせに対応したり、面談のアポイントを取ったり、実際に相談者と面談を行なって相談者が抱える問題をヒアリングしていきます。
									<br>そして、私達の探偵事務所で相談者の悩みを解決できそうな場合は提案をして契約をします。電話、来社面談、出張面談とお客様と接する重要なお仕事で、相談者や依頼者の信頼を得れるやりがいのある仕事です。
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<p class="button2 sp"><a href="#contact_input"><img src="images/button1.gif" alt="応募フォームへ"/></a></p>
		<p class="button2 pc"><a href="#contact_input"><img src="images/button1_pc.gif" alt="応募フォームへ"/></a></p>

		<section class="content merit">
			<h3>業界No.1を目指す探偵社で働くメリット</h3>
			<div class="sankaku"></div>
			<div class="merit merit1">
				<h4 class="sp"><img src="images/1.gif" alt="急成長、業界No1を目指す探偵社"/></h4>
				<h4 class="pc"><img src="images/1_pc.gif" alt="急成長、業界No1を目指す探偵社"/></h4>
				<div class="test">
					<p class="img"><img src="images/1_img.jpg" alt=""/></p>
					<p class="text">平成26年に探偵調査業の開始し、某探偵紹介サイトで第一位の実績。現在東京、北海道、中部、関西に合計12支社を展開！探偵業界で成功する事は簡単なことではありません。<br class="pc">ラビット探偵社の独自の戦略やシステムにより成功を成し遂げることが可能です。探偵にご興味がある方、独立希望の方も我々ラビット探偵社と一緒に日本一の探偵社を作りませんか？</p>
				</div>
			</div>

			<div class="merit merit2">
				<h4 class="sp"><img src="images/2.gif" alt="ベテラン社員と若手社員の活気"/></h4>
				<h4 class="pc"><img src="images/2_pc.gif" alt="ベテラン社員と若手社員の活気"/></h4>
				<div class="test">
					<p class="img"><img src="images/2_img_18.jpg" alt=""/></p>
					<p class="text">ラビット探偵社では学歴、経験を問わず仲間を募集しております。ラビット探偵社で初めて探偵業を経験した社員や業界15年以上の探偵経験者など様々です。学歴や職歴などは問いません！やる気のある方のみ大募集です！やる気があれば成功します。</p>
				</div>
			</div>

			<div class="merit merit3">
				<h4 class="sp"><img src="images/3.gif" alt="働きやすい環境、制度"/></h4>
				<h4 class="pc"><img src="images/3_pc.gif" alt=""/></h4>
				<div class="test">
					<p class="img"><img src="images/3_img_24.jpg" alt=""/></p>
					<p class="text">未経験の方や経験者でも研修期間を設けております。しっかりと一つ一つ丁寧に指導いたします。ラビット探偵社ならではの独自の調査計画や方法などを持っています。シフト制なので非常に働きやすい環境です。また、業務方法や勤怠に関しての改善提案は快く受け入れていく体制があります。</p>
				</div>
			</div>

			<div id="container" class="clearfix">
				<p><img src="images/map_branchs20200204.png" alt="" width="710" height="466" class="pc"><img src="images/map_branchs20200204_sp.png" alt="" width="640" height="831" class="sp"></p>
				<div id="contents"></div>
				<div id="sidebar"></div>
			</div>
		</section>

		<section class="content essential">
			<h3>募集要項</h3>
			<div class="sankaku"></div>
			<p class="bun">ラビット探偵社では事業拡大に伴って、下記の要領で調査員を募集しています。経験者は優遇致しますが、未経験者でも面談員、探偵調査員にご興味のある方は大歓迎です。</p>
			<div id="accordion" class="accordionbox sp">
				<dl class="accordionlist">
					<dt class="clearfix">
						<div class="title">
						<p>調査員</p>
						</div>
						<p class="accordion_icon"><span></span><span></span></p>
					</dt>
					<dd>
						<table>
							<tr>
							<th>雇用形態</th>
							<td>正社員（研修期間あり）</td>
							</tr>
							<tr>
							<th>年齢</th>
							<td>20歳～（経験者優遇）</td>
							</tr>
							<tr>
							<th>給与</th>
							<td>月給220,000円～（経験者優遇）</td>
							</tr>
							<tr>
							<th>待遇</th>
							<td>雇用・労災・社保完備・交通費支給・携帯電話貸与・車両元込手当・社員旅行</td>
							</tr>
							<tr>
							<th>休日</th>
							<td>シフト制</td>
							</tr>
							<tr>
							<th>就業場所</th>
							<td>全国11拠点いずれか</td>
							</tr>
							<tr>
							<th>仕事内容</th>
							<td>尾行・張り込み・聞き込み・潜入・調査業務全般</td>
							</tr>
							<tr>
							<th>面接地</th>
							<td>各支店地域・東京本社・名古屋支店・大阪支店</td>
							</tr>
							<tr>
							<th>担当</th>
							<td>斎藤・河田</td>
							</tr>
						</table>
					</dd>
					<dt class="clearfix">
						<div class="title">
						<p>現場管理</p>
						</div>
						<p class="accordion_icon"><span></span><span></span></p>
					</dt>
					<dd>
						<table>
							<tr>
							<th>雇用形態</th>
							<td>正社員（研修期間有）</td>
							</tr>
							<tr>
							<th>年齢</th>
							<td>20歳～（経験者優遇）</td>
							</tr>
							<tr>
							<th>給与</th>
							<td>月給250,000円～（研修期間有）</td>
							</tr>
							<tr>
							<th>待遇</th>
							<td>雇用・労災・社保完備・交通費支給・携帯電話貸与・社員旅行</td>
							</tr>
							<tr>
							<th>休日</th>
							<td>シフト制</td>
							</tr>
							<tr>
							<th>就業場所</th>
							<td>東京</td>
							</tr>
							<tr>
							<th>仕事内容</th>
							<td>調査現場の管理</td>
							</tr>
							<tr>
							<th>面接地</th>
							<td>東京本社・各支店地域</td>
							</tr>
							<tr>
							<th>担当</th>
							<td>斎藤・河田</td>
							</tr>
						</table>
					</dd>
					<dt class="clearfix">
						<div class="title">
						<p>面談員</p>
						</div>
						<p class="accordion_icon"><span></span><span></span></p>
					</dt>
					<dd>
						<table>
						<tr>
						<th>雇用形態</th>
						<td>正社員（研修期間有）</td>
							</tr>
							<tr>
							<th>年齢</th>
							<td>25歳～（経験者優遇）</td>
							</tr>
							<tr>
							<th>給与</th>
							<td>月給300,000円〜（研修期間有）</td>
							</tr>
							<tr>
							<th>待遇</th>
							<td>雇用・労災・社保完備・交通費支給・携帯電話貸与・車両元込手当・社員旅行</td>
							</tr>
							<tr>
							<th>休日</th>
							<td>シフト制</td>
							</tr>
							<tr>
							<th>就業場所</th>
							<td>主には主要支店。その他出張面談に応じて</td>
							</tr>
							<tr>
							<th>仕事内容</th>
							<td>契約業務・カウンセリング業務</td>
							</tr>
							<tr>
							<th>面接地</th>
							<td>東京本社・名屋支店・大阪支店</td>
							</tr>
							<tr>
							<th>担当</th>
							<td>松隈・河田</td>
							</tr>
						</table>
					</dd>
					<dt class="clearfix">
						<div class="title">
							<p>データ入力・事務業務</p>
						</div>
						<p class="accordion_icon"><span></span><span></span></p>
					</dt>
					<dd>
						<table>
							<tr>
							<th>雇用形態</th>
							<td>正社員（研修期間あり）・アルバイト</td>
							</tr>
							<tr>
							<th>年齢</th>
							<td>20歳以上の男女・普通自動車免許（取得者普通自動二輪免許者・経験者優遇）</td>
							</tr>
							<tr>
							<th>給与</th>
							<td>月給220,000円〜（経験者優遇）</td>
							</tr>
							<tr>
							<th>待遇</th>
							<td>雇用・労災・社保完備・交通費支給・携帯電話貸与・社員旅行</td>
							</tr>
							<tr>
							<th>休日</th>
							<td>年末年始・シフト制</td>
							</tr>
							<tr>
							<th>就業場所</th>
							<td>東京</td>
							</tr>
							<tr>
							<th>仕事内容</th>
							<td>データ入力・事務作業・電話対応</td>
							</tr>
							<tr>
							<th>面接地</th>
							<td>東京本社</td>
							</tr>
							<tr>
							<th>担当</th>
							<td>内田・河田</td>
							</tr>
						</table>
					</dd>
				</dl>
			</div>
		</section>

		<div class="menu pc">
			<ul>
				<li class="selected">調査員</li>
				<li>現場管理</li>
				<li>面談員</li>
				<li>データ入力・事務業務</li>
			</ul>
		</div>

		<section class="essential">
			<ul class="table pc">
				<li class="selected">
					<dl>
						<dt class="first">雇用形態</dt>
						<dd class="first">正社員（研修期間あり）</dd>
						<dt>年齢</dt>
						<dd>20歳～（経験者優遇）</dd>
						<dt>給与</dt>
						<dd>月給220,000円～（経験者優遇）</dd>
						<dt>待遇</dt>
						<dd>雇用・労災・社保完備・交通費支給・携帯電話貸与・車両元込手当・社員旅行</dd>
						<dt>休日</dt>
						<dd>シフト制</dd>
						<dt>就業場所</dt>
						<dd>全国11拠点いずれか</dd>
						<dt>仕事内容</dt>
						<dd>尾行・張り込み・聞き込み・潜入・調査業務全般</dd>
						<dt>面接地</dt>
						<dd>各支店地域・東京本社・名古屋支店・大阪支店</dd>
						<dt>担当</dt>
						<dd>斎藤・河田</dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt class="first">雇用形態</dt>
						<dd class="first">正社員（研修期間あり）</dd>
						<dt>年齢</dt>
						<dd>20歳～（経験者優遇）</dd>
						<dt>給与</dt>
						<dd>月給250,000円～（研修期間有）</dd>
						<dt>待遇</dt>
						<dd>雇用・労災・社保完備・交通費支給・携帯電話貸与・社員旅行</dd>
						<dt>休日</dt>
						<dd>シフト制</dd>
						<dt>就業場所</dt>
						<dd>東京</dd>
						<dt>仕事内容</dt>
						<dd>調査現場の管理</dd>
						<dt>面接地</dt>
						<dd>東京本社・各支店地域</dd>
						<dt>担当</dt>
						<dd>斎藤・河田</dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt class="first">雇用形態</dt>
						<dd class="first">正社員（研修期間有）</dd>
						<dt>年齢</dt>
						<dd>25歳～（経験者優遇）</dd>
						<dt>給与</dt>
						<dd>月給300,000円〜（研修期間有）</dd>
						<dt>待遇</dt>
						<dd>雇用・労災・社保完備・交通費支給・携帯電話貸与・車両元込手当・社員旅行</dd>
						<dt>休日</dt>
						<dd>シフト制</dd>
						<dt>就業場所</dt>
						<dd>主には主要支店。その他出張面談に応じて</dd>
						<dt>仕事内容</dt>
						<dd>契約業務・カウンセリング業務</dd>
						<dt>面接地</dt>
						<dd>東京本社・名古屋支店・大阪支店</dd>
						<dt>担当</dt>
						<dd>松隈・河田</dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt class="first">雇用形態</dt>
						<dd class="first">正社員（研修期間有）・アルバイト</dd>
						<dt>年齢</dt>
						<dd>20歳〜</dd>
						<dt>給与</dt>
						<dd>月給220,000円〜（経験者優遇）</dd>
						<dt>待遇</dt>
						<dd>雇用・労災・社保完備・交通費支給・携帯電話貸与・社員旅行</dd>
						<dt>休日</dt>
						<dd>年末年始・シフト制</dd>
						<dt>就業場所</dt>
						<dd>東京</dd>
						<dt>仕事内容</dt>
						<dd>データ入力・事務作業・電話対応</dd>
						<dt>面接地</dt>
						<dd>東京本社</dd>
						<dt>担当</dt>
						<dd>内田・河田</dd>
					</dl>
				</li>
			</ul>
			<div class="hosoku">
				<p class="bun">※我々ラビット探偵社と一緒に業界一の最高の探偵社を作りませんか？全国11支店！今後も支店展開していく会社です！やる気のある方大募集！優秀な探偵さんほど高収入を得られる環境になっております。</p>
				<p class="bun">未経験の方でも探偵調査員にご興味ある方の公募お待ちしております！ </p>
			</div>
		</section>

		<p class="button2 sp"><a href="#contact_input"><img src="images/button1.gif" alt="応募フォームへ"/></a></p>
		<p class="button2 pc"><a href="#contact_input"><img src="images/button1_pc.gif" alt="応募フォームへ"/></a></p>
		<!--先輩社員------------------------------------------------------------------------------------------------------------------------>
		<section class="content">
			<h3>先輩社員</h3>
			<div class="sankaku"></div>
			<div class="senior">
				<div class="voice">
					<p class="img"><img src="images/women1.gif" alt=""/></p>
					<div class="left">
						<p class="spec">ベテラン面談員　面談員暦18年　女性</p>
						<p class="text">私は18年以上面談員として様々な依頼者様のお悩みや相談と向き合い、今ではカウンセラーの資格を持つようにまでなりました。
						<br>ラビット探偵社に入社するまでは大手探偵社、中小の探偵社などで面談員としてやってきましたが、そのなかでもラビット探偵社が一番働きやすい環境だと思っております。
						<br>未経験者でも安心して学べる環境ですので、一緒に働きましょう。</p>
					</div>
				</div>
				<div class="voice">
					<p class="img"><img src="images/man1.gif" alt=""/></p>
					<div class="left">
						<p class="spec">ベテラン調査員　調査員暦7年　男性</p>
						<p class="text">ラビット探偵社に入社するまでに大手探偵社で5年間、現場調査員としてやってきました。
						　　　　 <br>以前勤めていた調査会社では大手探偵社で有名ではありましたが顔も見たことのない人などとのやり取りなどがあり、各地域ごとの派閥もありました。
						<br>ラビット探偵社に勤めてからはそういった雰囲気ではなく時期によって各地域の合同の食事会や社員旅行もあります。
						<br>また、優秀な調査員であればあるほど高収入を得られる環境です。
						</p>
					</div>
				</div>
			</div>
		</section>
		';
	}

	echo '
	<!--応募フォーム------------------------------------------------------------------------------------------------------------------------>
	<section class="content form" id="contact_input">
		<h3>応募フォーム</h3>
		<div class="sankaku"></div>
	
		<div class="form">
			<form method="post" action="">
				<dl>
					<dt class="first"><label for="name">お名前 <em>必須</em></label></dt>
					<dd>'.ff_line('text','name',$pm["name"],'例：山田太郎',30,0,1).'</dd>
	
					<dt class="gender">性別 <em>必須</em></dt>
					<dd class="gender">
					'.ff_radio('gender_id',$genders,$pm["gender_id"]) .'
					</dd>
	
					<dt><label for="age">年齢 <em>必須</em></label></dt>
					<dd class="age">
					<input name="age" id="age" type="number" min="18" max="80" size="30" maxlength="2"  placeholder="25" autocomplete="on" required value="'.$pm["age"].'"> 才</dd>
	
					<dt><label for="pref_id">都道府県 <em>必須</em></label></dt>
					<dd>
					'.ff_select('pref_id',$prefs,$pm["pref_id"],1).'
					</dd>
	
					<dt><label for="address">住所 <em>必須</em></label></dt>
					<dd>
					'.ff_line('text','address',$pm['address'],'東京都品川区東五反田5丁目22-37',20,30,1).'</dd>
	
					<dt><label for="tel">電話番号 <em>必須</em></label></dt>
					<dd>'.ff_line('tel','tel',$pm['tel'],'090-1234-5678',30,0,1).'</dd>
	
					<dt><label for="email">メールアドレス <em>必須</em></label></dt>
					<dd>'.ff_line('email','email',$pm['email'],'info@rabbit-tantei.com',30,0,1).'</dd>
	
					<dt class="area1"><label for="qualification">有資格・免許</label></dt>
					<dd>
					'.ff_textarea('qualification',$pm['qualification'],30,10,'例：普通自動車第一種運転免許').'
					</dd>
	
					<dt class="jobtype_id">希望職種 <em>必須</em></dt>
					<dd class="jobtype_id">
					'.ff_radio('jobtype_id',$jobtypes,$pm["jobtype_id"]) .'
					</dd>
	
					<dt class="area2"><label for="motive">志望動機 <em>必須</em></label></dt>
					<dd>
					'.ff_textarea('motive',$pm['motive'],30,10,'',1).'
					</dd>
	
					<dt class="area2"><label for="question">質問</label></dt>
					<dd>'.ff_textarea('question',$pm['question'],30,10,'').'</dd>
				</dl>
	
				<p class="kakunin sp"><input type="image" src="images/button2.gif" alt="確認画面へ" name="do_submit"></p>
				<p class="kakunin pc"><input type="image" src="images/button2_pc.gif" alt="確認画面へ" name="do_submit"></p>
	
		</form>
		</div>
	</section>
	';
}else{
	echo '
	<div class="kakuninpage">
		<section class="content form">


		<h3 class="kakuningamen">確認画面</h3>
	 <div class="sankaku sankaku2"></div>


	 <div class="form">
	 <form method="post" action="" id="contact_confirm">

	 <dl>
		 <dt class="first"><label for="name">お名前</label></dt>
		 <dd>'.$pm["name"].'</dd>

		 <dt class="gender">性別</dt>
		 <dd class="gender">
		 	'.$genders[$pm["gender_id"]].'
		 </dd>

		 <dt><label for="age">年齢</label></dt>
		 <dd class="age">'.$pm["age"].' 才</dd>

		 <dt><label for="pref_id">都道府県</label></dt>
		 <dd>'.$prefs[$pm["pref_id"]].'
		 </dd>

		 <dt><label for="address">住所</label></dt>
		 <dd>'.$pm["address"].'</dd>

		 <dt><label for="tel">電話番号</label></dt>
		 <dd>'.$pm["tel"].'</dd>

		 <dt><label for="email">メールアドレス</label></dt>
		 <dd>'.$pm["email"].'</dd>

		 <dt class="area1"><label for="qualification">有資格・免許</label></dt>
		 <dd>'.nl2br($pm["qualification"]).'
		 </dd>

			<dt class="jobtype_id">希望職種</dt>
			<dd class="jobtype_id">
			'.$jobtypes[$pm["jobtype_id"]] .'
			</dd>

		 <dt class="area2"><label for="motive">志望動機</label></dt>
		 <dd>'.nl2br($pm["motive"]).'
		 </dd>

		 <dt class="area2"><label for="question">質問</label></dt>
		 <dd>'.nl2br($pm["question"]).'</dd>

		 </dl>

					 <div class="formbutton sp">
		 <p><input type="image" src="images/modoru_sp.gif" alt="入力画面にもどる" name="do_back"></p>
					 <p><input type="image" src="images/entry_sp.gif" alt="ENTRY" name="do_entry"></p>
					 </div>


					 <div class="formbutton pc">
		 <p><input type="image" src="images/modoru_pc.gif" alt="入力画面にもどる" name="do_back"></p>
					 <p><input type="image" src="images/entry_pc.gif" alt="ENTRY" name="do_entry"></p>
					 </div>
';
foreach($pm as $k => $v)
{
	echo ff_hidden($k,$v);
}
echo '
	</form>
	</div>



	</section>
	';
}
?>

</section>




<!-- inc-footercontact.php -->

<?php /* end input space */ ?>
</div>
<!-- sidebar.php -->


<!-- right -->
<div class="subcol">

			<div class="snav">
			<h4 class="r-h"><span>調査項目一覧</span></h4>
			<ul>
				<li>
					<a href="<?= $domain ?>/service/uwaki">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/gnavi/snavi-1.png" alt="">
						<p class="title">浮気・素行調査</p>
						<p class="caption">確かな証拠を掴む事が解決への第一歩。まずは浮気調査のプロにご相談下さい。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/yukue">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/gnavi/snavi-2.png" alt="">
						<p class="title">人捜し・家出人調査</p>
						<p class="caption">独自のネットワークと調査で、確実な調査結果。ラビット探偵社が早急に解決します。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/touchouki">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/gnavi/snavi-3.png" alt="">
						<p class="title">盗聴器発見</p>
						<p class="caption">個人情報の流出は、思わぬトラブルを引き起こします。おかしいと思ったらすぐ相談を。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/stoker">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/gnavi/snavi-4.png" alt="">
						<p class="title">ストーカー対策</p>
						<p class="caption">人物特定をしておくことで警察からの厳重注意も可能。深刻な状況になる前にご相談を。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/kekkon">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/gnavi/snavi-5.png" alt="">
						<p class="title">結婚前信用調査</p>
						<p class="caption">婚約者へ抱いてる疑問は、結婚前に解消。ご両親、親族からの依頼も可能です。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/itazura">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/gnavi/snavi-6.png" alt="">
						<p class="title">いたずら・嫌がらせ調査</p>
						<p class="caption">公共機関などへご相談されると同時に、まずはご相談を。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/hibou">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/gnavi/snavi-9.png" alt="">
						<p class="title">誹謗中傷対策</p>
						<p class="caption">ネット誹謗中傷・風評被害の削除・対策をいたします。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/gps">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/gnavi/snavi-10.png" alt="">
						<p class="title">GPS調査</p>
						<p class="caption">高精度GPSで行動分析。業界最安値でご提案します。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/child">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/gnavi/snavi-7.png" alt="">
						<p class="title">お子様の見守り調査</p>
						<p class="caption">お子様の異変に気ずいたらすぐにご相談ください。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/others">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/gnavi/snavi-8.png" alt="">
						<p class="title">その他の調査</p>
						<p class="caption">その他にも様々な悩み事を解消いたします。まずはご相談を。</p>
					</a>
				</li>
			</ul>
		</div>

			<ul class="bnr_area">
			<li><img class="" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/bnr/zenkoku.png" alt="全国対応！関東にも事務所がたくさんあるのでお気軽にお問い合せください"></li>
			<li><img class="" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/bnr/global.png" alt="海外もラビット探偵社におまかせください"></li>
			<li><a href="<?= $domain ?>/recruit"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/bnr/recruit.png" alt=""></a></li>
		</ul>
		<div class="payment-box">
			<p class="h"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/side/payment_img01.png" alt="各種お支払い方法に対応"></p>
			<p class="txt">お支払いにはVISA・MasterCardなどの提携カード（クレジットカードにいずれかのロゴがあるもの）すべてがご利用いただけます。その他、分割支払いなども対応しております。お気軽にご相談ください。</p>
		</div>
		<p class="divorce"><a href="#"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/side/divorce_img01.png" alt="ラビット探偵社だからできる 男性が優位に別れれられる方法とは？"></a></p>
		<div class="contact-box">
			<p class="mb0 tel-txt">不明点などお気軽にお問い合せください</p>
			<p class="tel mb0">0120-509-027</p>
			<p class="mb05"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/header/hours.png" alt="メール・お電話は24時間対応しています"></p>
			<p class="btn"><a href="<?= $domain ?>/contact">お問い合わせフォーム</a></p>
			<p class="lead mb05"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/side/r_contact_txt01.png" alt="相談無料"></p>
			<p class="lead mb0"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/side/r_contact_txt02.png" alt="相談は無料です悩む前にまずはお電話ください"></p>
		</div>
		<ul class="bnr_area">
			<li><a href="http://www.nichibenren.or.jp/" target="_blank"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/bnr/bnr_jfba.gif" alt="日本弁護士連合会"></a></li>
			<li><a href="https://www.kouaniinkai.metro.tokyo.jp/" target="_blank"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/bnr/bnr_kouan.gif" alt="東京都公安委員会"></a></li>
			<li><a href="http://www.kokusen.go.jp/" target="_blank"><img src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/images/bnr/bnr_seikatsu.gif" alt="国民生活センター"></a></li>
		</ul>



	<div class="curation">
		<h4 class="r-h"><span>浮気・不倫問題まとめ</span></h4>
		<ul>
									<li>
				<a href="<?= $domain ?>/matome/%e8%88%88%e4%bf%a1%e6%89%80%e3%81%ae%e8%aa%bf%e6%9f%bb%e3%81%a7%e9%96%93%e7%94%b7%e3%81%a8%e4%b8%8d%e5%80%ab%e7%a2%ba%e5%ae%9a%e6%b5%ae%e6%b0%97%e5%a5%b3%e3%81%ae%e6%80%9d%e8%80%83%e3%81%a8%e3%81%af">
										<img width="50" height="50" src="<?= $domain ?>/wp-content/uploads/2015/06/Fotolia_82429091_Subscription_Monthly_M-50x50.jpg" class="attachment-50x50 wp-post-image" alt="Sherlock Holmes with magnifying glass isolated on white" />							<span class="date">2015.06.14</span><br>興信所の調査で間男と不倫確定!!浮気女の思考とは!!		</a>
	</li>
			<li>
				<a href="<?= $domain ?>/matome/%e3%83%89%e3%83%ad%e3%83%89%e3%83%ad%e3%81%ae%e9%9b%a2%e5%a9%9a%e8%a3%81%e5%88%a4%e3%80%81%e3%81%84%e3%81%84%e5%8a%a0%e6%b8%9b%e3%81%86%e3%82%93%e3%81%96%e3%82%8a%e3%81%a7%e3%81%99%ef%bc%81">
										<img width="50" height="50" src="<?= $domain ?>/wp-content/uploads/2015/06/Fotolia_80234464_Subscription_Monthly_M-50x50.jpg" class="attachment-50x50 wp-post-image" alt="Fotolia_80234464_Subscription_Monthly_M" />							<span class="date">2015.06.14</span><br>ドロドロの離婚裁判、いい加減うんざりです！		</a>
	</li>
			<li>
				<a href="<?= $domain ?>/matome/%e5%ab%81%e3%81%8c%e4%b8%8d%e5%80%ab%e3%81%97%e3%81%a6%e3%81%9f%e3%81%ae%e3%81%8c%e7%99%ba%e8%a6%9a%e5%8d%b3%e9%9b%a2%e5%a9%9a%e3%81%ae%e6%89%8b%e9%a0%86%e3%81%a8%e3%81%af">
										<img width="50" height="50" src="<?= $domain ?>/wp-content/uploads/2015/06/Fotolia_83863509_Subscription_Monthly_M-50x50.jpg" class="attachment-50x50 wp-post-image" alt="Fotolia_83863509_Subscription_Monthly_M" />							<span class="date">2015.06.14</span><br>嫁が不倫してたのが発覚!!即離婚の手順とは!!		</a>
	</li>
			<li>
				<a href="<?= $domain ?>/matome/%e3%81%84%e3%81%8d%e3%81%aa%e3%82%8a%e6%97%a6%e9%82%a3%e3%81%ab%e9%9b%a2%e5%a9%9a%e5%b1%8a%e3%81%91%e3%82%92%e5%87%ba%e3%81%95%e3%82%8c%e3%81%a6%e3%80%81%e4%bd%8f%e3%82%93%e3%81%a7%e3%81%84%e3%82%8b">
										<img width="50" height="50" src="<?= $domain ?>/wp-content/uploads/2015/06/Fotolia_60571686_Subscription_Monthly_M-50x50.jpg" class="attachment-50x50 wp-post-image" alt="Fotolia_60571686_Subscription_Monthly_M" />							<span class="date">2015.06.14</span><br>いきなり旦那に離婚届けを出されて、住んでいる家を売ら…		</a>
	</li>
			<li>
				<a href="<?= $domain ?>/matome/%e6%85%b0%e8%ac%9d%e6%96%99%e3%81%ae%e9%a1%8d%e3%81%a7%e3%81%99%e3%81%8c%e3%80%81300%e4%b8%87%e8%a6%81%e6%b1%82%e3%81%95%e3%82%8c%e3%81%a6%e3%81%be%e3%81%99%e3%80%82%e3%82%82%e3%81%ae%e3%81%99">
										<img width="50" height="50" src="<?= $domain ?>/wp-content/uploads/2015/06/Fotolia_79463409_Subscription_Monthly_M-50x50.jpg" class="attachment-50x50 wp-post-image" alt="Closeup stressed young woman and yelling screaming" />							<span class="date">2015.06.14</span><br>慰謝料の額ですが、300万要求されてます。ものすごい…		</a>
	</li>
</ul>
</div>

</div>
<!-- right -->
</div>

</article>
<!-- footer.php -->
<footer>
	<div class="footer">
<!-- 		<div class="inner cf">
			<div class="facebook">
				<h3>facebook</h3>
				<div class="wrap">
					<div class="fb-page" data-href="https://www.facebook.com/%E3%83%A9%E3%83%93%E3%83%83%E3%83%88%E6%8E%A2%E5%81%B5%E7%A4%BE-199824037046924/" data-tabs="timeline" data-width="600" data-height="250" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
				</div>
			</div>
			<div class="twitter">
				<h3>twitter</h3>
				<div class="wrap">
					<a class="twitter-timeline" href="https://twitter.com/wEKtvKPXAQcLOdy" data-widget-id="726637130940735488">@wEKtvKPXAQcLOdyさんのツイート</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
		</div> -->
		<div class="inner cf">
			<div class="sitemap">
				<h3>SITEMAP</h3>
				<ul class="toggle-nav">
					<li><a href="https://rabbit-tantei.com/">トップページ</a>
						<ul class="children">
							<li><a href="https://rabbit-tantei.com/topic">新着情報</a></li>
						</ul>
					</li>
					<li><a href="https://rabbit-tantei.com/divorce">浮気・離婚</a>
						<ul class="children">
							<li><a href="https://rabbit-tantei.com/divorce/seventhlist">ラビット7箇条</a></li>
							<!-- <li><a href="https://rabbit-tantei.com/divorce/comarison">男性離婚のメリットデメリット</a></li> -->
							<!-- <li><a href="https://rabbit-tantei.com/divorce/knowhow">男性を優位にすすめる離婚とノウハウ</a></li> -->
						</ul>
					</li>
					<li><a href="https://rabbit-tantei.com/service">調査項目</a>
						<ul class="children">
							<li><a href="https://rabbit-tantei.com/service/uwaki">浮気・素行調査</a></li>
							<li><a href="https://rabbit-tantei.com/service/yukue">人捜し・家出人調査</a></li>
							<li><a href="https://rabbit-tantei.com/service/touchouki">盗聴器発見</a></li>
							<li><a href="https://rabbit-tantei.com/service/stoker">ストーカー対策</a></li>
							<li><a href="https://rabbit-tantei.com/service/kekkon">結婚前信用調査</a></li>
							<li><a href="https://rabbit-tantei.com/service/child">お子様の見守り調査</a></li>
							<li><a href="https://rabbit-tantei.com/service/itazura">いたずら・嫌がらせ調査</a></li>
							<li><a href="https://rabbit-tantei.com/service/hibou">誹謗中傷削除</a></li>
							<li><a href="https://rabbit-tantei.com/service/gps">GPS調査</a></li>
							<li><a href="https://rabbit-tantei.com/service/others">その他の調査</a></li>
						</ul>
					</li>
					<li><a href="https://rabbit-tantei.com/about">ラビット探偵事務所とは</a>
						<ul class="children">
							<li><a href="https://rabbit-tantei.com/about/aboutus">ラビット探偵事務所の強み</a></li>
							<li><a href="https://rabbit-tantei.com/prices">料金表一覧</a></li>
							<li><a href="https://rabbit-tantei.com/case">過去の実績</a></li>
							<li><a href="https://rabbit-tantei.com/faq">よくある質問</a></li>
							<li><a href="https://rabbit-tantei.com/estimate">オンライン見積</a></li>
							<li><a href="https://rabbit-tantei.com/company">会社概要</a></li>
							<li><a href="https://rabbit-tantei.com/branch">各支店一覧</a></li>
							<li><a href="https://rabbit-tantei.com/privacypolicy">プライバシーポリシー</a></li>
							<li><a href="https://sosadetective.com/" target="_blank">探偵浮気調査SO-SA</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="footer-info">
				<h3><img src="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/images/header/logo.png" alt="浮気・不倫調査ならラビット探偵社"></h3>
				<p class="address">東京都港区芝1丁目15番14号<br>オフィスニューガイア浜松町No.16 3階</p>
									<p class="f-tel">0120-509-027</p>
								<ul class="notify">

																																					<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#tokyoAnc">東京本社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#yokohamaAnc">横浜支社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#chibaAnc">千葉支社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#saitamaAnc">埼玉支社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#ibarakiAnc">茨城支社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#naganoAnc">長野支社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#shizuokaAnc">静岡支社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#nagoyaAnc">名古屋支社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#osakaAnc">大阪支社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#kobeAnc">神戸支社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#fukuokaAnc">福岡支社</a></li>
																											<li><a href="https://rabbit-tantei.com/wp-content/themes/www.rabbit-tantei.com/branch/#sapporoAnc">札幌支社</a></li>
																
				</ul>
				<ul class="contact-btn">
					<!-- 					<li><a href="mailto:&#105;&#110;&#102;&#111;&#64;&#114;&#97;&#98;&#98;&#105;&#116;&#45;&#116;&#97;&#110;&#116;&#101;&#105;&#46;&#99;&#111;&#109;" class="bdr_btn">メールでのお問い合せはこちら</a></li> -->
					<li><a href="https://rabbit-tantei.com/estimate" class="bdr_btn">オンライン見積はこちら</a></li>
					<li><a href="https://rabbit-tantei.com/contact" class="bdr_btn">お問い合せフォームはこちら</a></li>
				</ul>
			</div>
		</div>
	</div>
	<p class="copy">Copyright © 2015 RABBIT TANTEISHA. All Rights Reserved.</p>
</footer>
<script type="text/javascript" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/js/jquery.owl.carousel.js"></script>
<script type="text/javascript" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/js/jquery.necessary.js"></script>
<script type="text/javascript" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/js/jquery.lightbox.min.js"></script>
<script type="text/javascript" src="<?= $domain ?>/wp-content/themes/www.rabbit-tantei.com/js/script.js"></script>

<script type='text/javascript' src='<?= $domain ?>/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"https:\/\/rabbit-tantei.com\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"\u9001\u4fe1\u4e2d ..."};
/* ]]> */
</script>
<script type='text/javascript' src='<?= $domain ?>/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.3'></script>

<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 939758499;
	var google_custom_params = window.google_tag_params;
	var google_remarketing_only = true;
	/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
	<div style="display:inline;">
		<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/939758499/?value=0&amp;guid=ON&amp;script=0"/>
	</div>
</noscript>

<script type="text/javascript" language="javascript">
	/* <![CDATA[ */
	var yahoo_retargeting_id = '3MWGEI2FYV';
	var yahoo_retargeting_label = '';
	/* ]]> */
</script>
<script type="text/javascript" language="javascript" src="//b92.yahoo.co.jp/js/s_retargeting.js"></script>
</body>
</html>

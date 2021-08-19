<?php require_once('common.php');
session_start();

$pm = $_SESSION["pm"];
$_SESSION["pm"] = array();

if( !empty($pm["do_submit_x"]) && !empty($pm["do_entry_x"]) )
{
	$err = array();

	if( empty($pm["namess"]))
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
}else{
	$err[] = "入力方法が正しくありません。";
}

if( count($err) < 1 )
{
    //make mail
  	$msg_common[] = "";
  	$msg_common[] = "■お客様情報---------------------------";
  	$msg_common[] = "●送信日時： ". date('Y年m月d日');
  	$msg_common[] = "●お名前：" . $pm["names"];
		$msg_common[] = "●性別:" . $genders[$pm["gender_id"]];
  	$msg_common[] = "●年齢" . $pm["age"] . " 才";
  	$msg_common[] = "●都道府県" . $prefs[$pm["pref_id"]];
  	$msg_common[] = "●住所" . $pm["address"];
  	$msg_common[] = "●電話番号：" . $pm["tel"];
  	$msg_common[] = "●メールアドレス：" . $pm["email"] ;
		$msg_common[] = "";
  	$msg_common[] = "■有資格・免許---------------------------";
		$msg_common[] = $pm["qualification"];
		$msg_common[] = "";
		$msg_common[] = "■希望職種---------------------------";
		$msg_common[] = $jobtypes[$pm["jobtype_id"]];
		$msg_common[] = "";
  	$msg_common[] = "■志望動機---------------------------";
		$msg_common[] = $pm["motive"];
  	$msg_common[] = "";
  	$msg_common[] = "■質問---------------------------";
		$msg_common[] = $pm["question"];
  	$msg_common[] = "";
  	$msg_common[] = "";

  	if( is_array($msg_common) )
  	{
  		$msg_common = implode("\n",$msg_common) . "\n";
  	}

  	$msg_manager[] = "【テスト送信】社員応募が届きました。";
  	$msg_manager[] = "・ブラウザ： ". $_SERVER['HTTP_USER_AGENT'];
  	$msg_manager[] = "・送信日時： ". date('Y年m月d日 H時i分s秒');
  	if( is_array($msg_manager) )
  	{
  		$msg_manager = implode("\n",$msg_manager) . "\n";
  	}

  	$msg_customer = Array();
  	$msg_customer[] = "本メールは社員募集に応募いただいた方に、";
  	$msg_customer[] = "自動的に送信しております。";
  	$msg_customer[] = "";
  	$msg_customer[] =  "";
  	$msg_customer[] = "●" . $pm["names"]." 様";
  	$msg_customer[] =  "";
  	$msg_customer[] =  "";
  	$msg_customer[] =  "ラビット探偵社です。";
  	$msg_customer[] =  "このたびは、社員募集に応募いただき、";
  	$msg_customer[] =  "ありがとうございました。";
  	$msg_customer[] =  "";
  	$msg_customer[] =  "";
  	$msg_customer[] =  "このメールは内容の控えになります。";
  	$msg_customer[] =  "";
  	$msg_customer[] =  "面接等のご連絡は、できる限り早急に担当より差し上げます。";
  	$msg_customer[] =  "今しばらくお待ちください。";
  	$msg_customer[] =  "";
  	if( is_array($msg_customer) )
  	{
  		$msg_customer = implode("\n",$msg_customer) . "\n";
  	}

    $msg_footer = Array();
  	$msg_footer[] = "";
  	$msg_footer[] = "";
  	$msg_footer[] = "------------------------------";
  	$msg_footer[] = "ラビット探偵社";
  	if( is_array($msg_footer) )
  	{
  		$msg_footer = implode("\n",$msg_footer) . "\n";
  	}

		// $email_send = 'info@rabbit-tantei.com';
		$email_send = 'tsukada@bokuravo.co.jp';

  	#送信処理
  	mb_language("Japanese");
  	mb_internal_encoding("utf-8");

  	#管理者側へ
  	$mailfrom = "From:" . mb_encode_mimeheader($pm["names"]) . "<" . $pm["email"] . ">";

  	// $mailfrom .= "\n";
    // $mailfrom .= 'Bcc:'.'matsuda.k@hiroken-grp.co.jp';

  	$_smcheck=mb_send_mail(
  		$email_send,
  		"採用お問い合わせ【受付】",
  		$msg_manager.$msg_common,
  		$mailfrom
  	);

  	#顧客側へ
  	$mailfrom = "From:" . mb_encode_mimeheader("ラビット探偵社") . "<" . $email_send . ">";
  	$_smcheck2=mb_send_mail(
  		$pm["email"],
  		"【テスト送信】採用お問い合わせ 受付完了メール",
  		$msg_customer.$msg_common.$msg_footer,
  		$mailfrom
  	);

    $url = 'recruit3.php';
    header('location:'.$url);

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
	<link rel="shortlink" href="<?= $domain ?>/wp-content/themes/rabbit-tantei" />
	<link rel="shortcut icon" href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/favicon/favicon.png">
	<link rel="apple-touch-icon" href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/favicon/apple-iphone-icon.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/favicon/apple-iphone-retina-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/favicon/apple-ipad-icon.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/favicon/apple-ipad-retina-icon.png">
	<link rel="pingback" href="<?= $domain ?>/xmlrpc.php">
		<link href="<?= $domain ?>/wp-content/themes/rabbit-tantei/css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?= $domain ?>/wp-content/themes/rabbit-tantei/css/hacks.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="style.css">
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
<link rel='stylesheet' id='contact-form-7-css'  href='<?= $domain ?>/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=4.3' type='text/css' media='all' />
<link rel='stylesheet' id='mmenu-custom-css'  href='<?= $domain ?>/wp-content/plugins/mmenu/css/mmenu.css' type='text/css' media='all' />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?ver=1'></script>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js?ver=1'></script>
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
				<h1 class="logo"><a href="<?= $domain ?>"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/header/logo.png" alt="男性の為の探偵事務所ならラビット探偵社"></a></h1>
				<ul class="social cf">
					<li><a href="https://twitter.com/wektvkpxaqclody" target="_blank"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/icon/ico_twitter.png" alt="Twitter"></a></li>
					<li><a href="https://www.facebook.com/%E3%83%A9%E3%83%93%E3%83%83%E3%83%88%E6%8E%A2%E5%81%B5%E7%A4%BE-199824037046924/" target="_blank"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/icon/ico_facebook.png" alt="Facebook"></a></li>
				</ul>
				<p class="head-txt"></p>
							</div>
							<div class="header-r">
					<p class="mb0 tel-txt">不明点などお気軽にお問い合せください</p>
					<p class="tel mb5">0120-509-027</p>
					<p class="mb0 mt5"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/header/hours.png" alt="メール・お電話は24時間対応しています"></p>
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
<?php
	/* start input area */



?>
	<section class="recruit">
	<h2 class="h2">急成長中のラビット探偵社の事業拡大に伴う社員募集</h2>

    <p class="bunner sp"><img src="images/bunner.jpg" alt=""/></p>
    <p class="banner pc"><img src="images/banner_pc.jpg" alt=""/></p>

		<div class="kakuninpage">
			<section class="content form">
			<h3 class="kakuningamen">エラー</h3>
<?php
if( count($err) > 0 )
{
	echo '<p class="bun">'.implode('<br>',$err) . '</p>';
}
?>
			</section>
		</div>

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
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/gnavi/snavi-1.png" alt="">
						<p class="title">浮気・素行調査</p>
						<p class="caption">確かな証拠を掴む事が解決への第一歩。まずは浮気調査のプロにご相談下さい。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/yukue">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/gnavi/snavi-2.png" alt="">
						<p class="title">人捜し・家出人調査</p>
						<p class="caption">独自のネットワークと調査で、確実な調査結果。ラビット探偵社が早急に解決します。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/touchouki">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/gnavi/snavi-3.png" alt="">
						<p class="title">盗聴器発見</p>
						<p class="caption">個人情報の流出は、思わぬトラブルを引き起こします。おかしいと思ったらすぐ相談を。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/stoker">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/gnavi/snavi-4.png" alt="">
						<p class="title">ストーカー対策</p>
						<p class="caption">人物特定をしておくことで警察からの厳重注意も可能。深刻な状況になる前にご相談を。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/kekkon">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/gnavi/snavi-5.png" alt="">
						<p class="title">結婚前信用調査</p>
						<p class="caption">婚約者へ抱いてる疑問は、結婚前に解消。ご両親、親族からの依頼も可能です。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/itazura">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/gnavi/snavi-6.png" alt="">
						<p class="title">いたずら・嫌がらせ調査</p>
						<p class="caption">公共機関などへご相談されると同時に、まずはご相談を。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/hibou">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/gnavi/snavi-9.png" alt="">
						<p class="title">誹謗中傷対策</p>
						<p class="caption">ネット誹謗中傷・風評被害の削除・対策をいたします。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/gps">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/gnavi/snavi-10.png" alt="">
						<p class="title">GPS調査</p>
						<p class="caption">高精度GPSで行動分析。業界最安値でご提案します。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/child">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/gnavi/snavi-7.png" alt="">
						<p class="title">お子様の見守り調査</p>
						<p class="caption">お子様の異変に気ずいたらすぐにご相談ください。</p>
					</a>
				</li>
				<li>
					<a href="<?= $domain ?>/service/others">
						<img class="attachment" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/gnavi/snavi-8.png" alt="">
						<p class="title">その他の調査</p>
						<p class="caption">その他にも様々な悩み事を解消いたします。まずはご相談を。</p>
					</a>
				</li>
			</ul>
		</div>

			<ul class="bnr_area">
			<li><img class="" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/bnr/zenkoku.png" alt="全国対応！関東にも事務所がたくさんあるのでお気軽にお問い合せください"></li>
			<li><img class="" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/bnr/global.png" alt="海外もラビット探偵社におまかせください"></li>
			<li><a href="<?= $domain ?>/recruit"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/bnr/recruit.png" alt=""></a></li>
		</ul>
		<div class="payment-box">
			<p class="h"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/side/payment_img01.png" alt="各種お支払い方法に対応"></p>
			<p class="txt">お支払いにはVISA・MasterCardなどの提携カード（クレジットカードにいずれかのロゴがあるもの）すべてがご利用いただけます。その他、分割支払いなども対応しております。お気軽にご相談ください。</p>
		</div>
		<p class="divorce"><a href="#"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/side/divorce_img01.png" alt="ラビット探偵社だからできる 男性が優位に別れれられる方法とは？"></a></p>
		<div class="contact-box">
			<p class="mb0 tel-txt">不明点などお気軽にお問い合せください</p>
			<p class="tel mb0">0120-509-027</p>
			<p class="mb05"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/header/hours.png" alt="メール・お電話は24時間対応しています"></p>
			<p class="btn"><a href="<?= $domain ?>/contact">お問い合わせフォーム</a></p>
			<p class="lead mb05"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/side/r_contact_txt01.png" alt="相談無料"></p>
			<p class="lead mb0"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/side/r_contact_txt02.png" alt="相談は無料です悩む前にまずはお電話ください"></p>
		</div>
		<ul class="bnr_area">
			<li><a href="http://www.nichibenren.or.jp/" target="_blank"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/bnr/bnr_jfba.gif" alt="日本弁護士連合会"></a></li>
			<li><a href="https://www.kouaniinkai.metro.tokyo.jp/" target="_blank"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/bnr/bnr_kouan.gif" alt="東京都公安委員会"></a></li>
			<li><a href="http://www.kokusen.go.jp/" target="_blank"><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/bnr/bnr_seikatsu.gif" alt="国民生活センター"></a></li>
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
		<div class="inner cf">
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
		</div>
		<div class="inner cf">
			<div class="sitemap">
				<h3>SITEMAP</h3>
				<ul class="toggle-nav">
					<li><a href="<?= $domain ?>/">トップページ</a>
						<ul class="children">
							<li><a href="<?= $domain ?>/topic">新着情報</a></li>
						</ul>
					</li>
					<li><a href="<?= $domain ?>/divorce">浮気・離婚</a>
						<ul class="children">
							<li><a href="<?= $domain ?>/divorce/seventhlist">ラビット7箇条</a></li>
							<!-- <li><a href="http://rabbit-tantei.com/divorce/comarison">男性離婚のメリットデメリット</a></li> -->
							<!-- <li><a href="http://rabbit-tantei.com/divorce/knowhow">男性を優位にすすめる離婚とノウハウ</a></li> -->
						</ul>
					</li>
					<li><a href="<?= $domain ?>/service">調査項目</a>
						<ul class="children">
							<li><a href="<?= $domain ?>/service/uwaki">浮気・素行調査</a></li>
							<li><a href="<?= $domain ?>/service/yukue">人捜し・家出人調査</a></li>
							<li><a href="<?= $domain ?>/service/touchouki">盗聴器発見</a></li>
							<li><a href="<?= $domain ?>/service/stoker">ストーカー対策</a></li>
							<li><a href="<?= $domain ?>/service/kekkon">結婚前信用調査</a></li>
							<li><a href="<?= $domain ?>/service/child">お子様の見守り調査</a></li>
							<li><a href="<?= $domain ?>/service/itazura">いたずら・嫌がらせ調査</a></li>
							<li><a href="<?= $domain ?>/service/hibou">誹謗中傷削除</a></li>
							<li><a href="<?= $domain ?>/service/gps">GPS調査</a></li>
							<li><a href="<?= $domain ?>/service/others">その他の調査</a></li>
						</ul>
					</li>
					<li><a href="<?= $domain ?>/about">ラビット探偵事務所とは</a>
						<ul class="children">
							<li><a href="<?= $domain ?>/about/aboutus">ラビット探偵事務所の強み</a></li>
							<li><a href="<?= $domain ?>/prices">料金表一覧</a></li>
							<li><a href="<?= $domain ?>/case">過去の実績</a></li>
							<li><a href="<?= $domain ?>/faq">よくある質問</a></li>
							<li><a href="<?= $domain ?>/estimate">オンライン見積</a></li>
							<li><a href="<?= $domain ?>/company">会社概要</a></li>
							<li><a href="<?= $domain ?>/privacypolicy">プライバシーポリシー</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="footer-info">
				<h3><img src="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/header/logo.png" alt="男性の為の探偵事務所ならラビット探偵社"></h3>
				<p class="address">東京都品川区東五反田5丁目22-37</p>
								<p class="f-tel">0120-509-027</p>
								<p class="notify">
					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/tokyo.jpg" data-lightbox="admission">探偵業届出証明書番号 東京都公安委員会 第30150236号</a><br>
					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/kanagawa.jpg" data-lightbox="admission">探偵業届出証明書番号 神奈川県公安委員会 第45160042号</a><br>
					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/shizuoka.jpg" data-lightbox="admission">探偵業届出証明書番号 静岡県公安委員会 第49162582号</a><br>
					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/fukushima.jpg" data-lightbox="admission">探偵業届出証明書番号 福島県公安委員会 第25160011号</a><br>
					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/gunma.jpg" data-lightbox="admission">探偵業届出証明書番号 群馬県公安委員会 第42150020号</a><br>
					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/ibaraki.jpg" data-lightbox="admission">探偵業届出証明書番号 茨城県公安委員会 第40150008号</a><br>
					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/chiba.jpg" data-lightbox="admission">探偵業届出証明書番号 千葉県公安委員会 第44160040号</a><br>

					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/osaka.jpg" data-lightbox="admission">探偵業届出証明書番号 大阪府公安委員会 第62161105号</a><br>
					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/kyoto.jpg" data-lightbox="admission">探偵業届出証明書番号 京都府公安委員会 第61160012号</a><br>
					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/hyogo.jpg" data-lightbox="admission">探偵業届出証明書番号 兵庫県公安委員会 第63160033号</a><br>
					<a href="<?= $domain ?>/wp-content/themes/rabbit-tantei/images/company/aichi.jpg" data-lightbox="admission">探偵業届出証明書番号 愛知県公安委員会 第54160036号</a><br>

				</p>
				<ul class="contact-btn">
					<!-- 					<li><a href="mailto:&#105;&#110;&#102;&#111;&#64;&#114;&#97;&#98;&#98;&#105;&#116;&#45;&#116;&#97;&#110;&#116;&#101;&#105;&#46;&#99;&#111;&#109;" class="bdr_btn">メールでのお問い合せはこちら</a></li> -->
					<li><a href="<?= $domain ?>/estimate" class="bdr_btn">オンライン見積はこちら</a></li>
					<li><a href="<?= $domain ?>/contact" class="bdr_btn">お問い合せフォームはこちら</a></li>
				</ul>
			</div>
		</div>
	</div>
	<p class="copy">Copyright &copy; 2015 RABBIT TANTEISHA. All Rights Reserved.</p>
</footer>
<script type="text/javascript" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/js/jquery.owl.carousel.js"></script>
<script type="text/javascript" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/js/jquery.necessary.js"></script>
<script type="text/javascript" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/js/jquery.lightbox.min.js"></script>
<script type="text/javascript" src="<?= $domain ?>/wp-content/themes/rabbit-tantei/js/script.js"></script>

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

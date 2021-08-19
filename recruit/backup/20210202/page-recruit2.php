<?php
/*
 * Template Name: リクルート確認ページ
 */
echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';

require_once('common.php');
session_start();

$pm = $_SESSION["pm"];
$_SESSION["pm"] = array();

var_dump($pm);

if( !empty($pm["do_submit_x"]) && !empty($pm["do_entry_x"]) )
{
	$err = array();

	if( empty($pm["names"]))
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
	echo 'メール作成';
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

    $url = 'recruit3';
    header('location:'.$url);

}


?>

<?php get_header(); ?>

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
</div>

</article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/*
 * Template Name: リクルート入力ページ
 */
$themePath = get_template_directory_uri().'/dist/';

error_reporting(1);

require_once('common.php');


$pm = post2params($_POST);

var_dump($pm);

if( !empty($pm["do_submit_x"]) )
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

if( count($err) < 1 && !empty($pm["do_entry_x"]) )
{
	session_start();
	$_SESSION["pm"] = $pm;
	header('location:recruit2');
}
}

?>

<?php get_header(); ?>

<article class="archive bg_white">
		<div class="wrap cf container wrapper">
			<!-- left -->
			<div class="l-content">
			<script src="//rabbit-tantei.com/recruit/script.js"></script>
	<section class="recruit">
	<h2 class="h2">page-recruits</h2>

		<p class="banner sp"><img src="<?php echo $themePath ?>image/recruit/bunner.jpg" alt=""/><img src="<?php echo $themePath ?>image/recruit/banner_iwaikin.png" alt="" width="215" height="128" class="banner_iwaikin"></p>
		<p class="banner pc"><img src="<?php echo $themePath ?>image/recruit/banner_pc.jpg" alt=""/><img src="<?php echo $themePath ?>image/recruit/banner_iwaikin.png" alt="採用祝い金3万円" width="215" height="128" class="banner_iwaikin"></p>



<?php

/*
foreach ($pm as $key => $v) {
	echo $key . ' => ' . $v.'<br />';
}
*/
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


// do_submit_xの値が空だったら or エラーがあったら or 戻るボタンが押されたとき(do_back_xが空じゃなかったら
?>
<?php if( empty($pm["do_submit_x"])  || count($err) > 0 || !empty($pm["do_back_x"]) ) : ?>
<?php if( empty($pm["do_submit_x"]) ) : ?>
		<!----探偵社の仕事内容って？--------------------------------------------------------------------------------------------------------------------->
		<section id="jobcontent" class="content">
			<h3>探偵社の仕事内容って？</h3>
			<div class="sankaku"></div>
			<!----調査員----->
			<div class="investigator">
				<p class="jobimg sp"><img src="<?php echo $themePath ?>image/recruit/job1.png" alt=""/></p>
				<div class="midashi">
					<h4>調査員の仕事内容</h4>
					<p class="answer">張り込み、尾行、証拠撮影</p>
				</div>
				<div class="imgtext">
					<p class="jobimg2 pc"><img src="<?php echo $themePath ?>image/recruit/job1_pc.png" alt=""/></p>
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
					<p class="jobimg sp"><img src="<?php echo $themePath ?>image/recruit/job3.png" alt=""/></p>
					<div class="midashi">
						<h4 class="back">現場管理の<br>仕事内容</h4>
						<p class="answer">調査員への指示、依頼主への現状報告、調査現場の管理</p>
					</div>
					<div class="imgtext">
						<p class="jobimg2 pc"><img src="<?php echo $themePath ?>image/recruit/job3_pc.png" alt=""/></p>
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
						<p class="jobimg sp"><img src="<?php echo $themePath ?>image/recruit/job2.png" alt=""/></p>
						<div class="midashi">
							<h4 class="back">面談員(相談員)の仕事内容</h4>
							<p class="answer">電話・問い合わせ対応、面談<br>アポイント、カウンセリング</p>
						</div>
						<div class="imgtext">
							<p class="jobimg2 pc"><img src="<?php echo $themePath ?>image/recruit/job2_pc.png" alt=""/></p>
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

		<p class="button2 sp"><a href="#contact_input"><img src="<?php echo $themePath ?>image/recruit/button1.gif" alt="応募フォームへ"/></a></p>
		<p class="button2 pc"><a href="#contact_input"><img src="<?php echo $themePath ?>image/recruit/button1_pc.gif" alt="応募フォームへ"/></a></p>

		<section class="content merit">
			<h3>業界No.1を目指す探偵社で働くメリット</h3>
			<div class="sankaku"></div>
			<div class="merit merit1">
				<h4 class="sp"><img src="<?php echo $themePath ?>image/recruit/1.gif" alt="急成長、業界No1を目指す探偵社"/></h4>
				<h4 class="pc"><img src="<?php echo $themePath ?>image/recruit/1_pc.gif" alt="急成長、業界No1を目指す探偵社"/></h4>
				<div class="test">
					<p class="img"><img src="<?php echo $themePath ?>image/recruit/1_img.jpg" alt=""/></p>
					<p class="text">平成26年に探偵調査業の開始し、某探偵紹介サイトで第一位の実績。現在東京、北海道、中部、関西に合計12支社を展開！探偵業界で成功する事は簡単なことではありません。<br class="pc">ラビット探偵社の独自の戦略やシステムにより成功を成し遂げることが可能です。探偵にご興味がある方、独立希望の方も我々ラビット探偵社と一緒に日本一の探偵社を作りませんか？</p>
				</div>
			</div>

			<div class="merit merit2">
				<h4 class="sp"><img src="<?php echo $themePath ?>image/recruit/2.gif" alt="ベテラン社員と若手社員の活気"/></h4>
				<h4 class="pc"><img src="<?php echo $themePath ?>image/recruit/2_pc.gif" alt="ベテラン社員と若手社員の活気"/></h4>
				<div class="test">
					<p class="img"><img src="<?php echo $themePath ?>image/recruit/2_img_18.jpg" alt=""/></p>
					<p class="text">ラビット探偵社では学歴、経験を問わず仲間を募集しております。ラビット探偵社で初めて探偵業を経験した社員や業界15年以上の探偵経験者など様々です。学歴や職歴などは問いません！やる気のある方のみ大募集です！やる気があれば成功します。</p>
				</div>
			</div>

			<div class="merit merit3">
				<h4 class="sp"><img src="<?php echo $themePath ?>image/recruit/3.gif" alt="働きやすい環境、制度"/></h4>
				<h4 class="pc"><img src="<?php echo $themePath ?>image/recruit/3_pc.gif" alt=""/></h4>
				<div class="test">
					<p class="img"><img src="<?php echo $themePath ?>image/recruit/3_img_24.jpg" alt=""/></p>
					<p class="text">未経験の方や経験者でも研修期間を設けております。しっかりと一つ一つ丁寧に指導いたします。ラビット探偵社ならではの独自の調査計画や方法などを持っています。シフト制なので非常に働きやすい環境です。また、業務方法や勤怠に関しての改善提案は快く受け入れていく体制があります。</p>
				</div>
			</div>

			<div id="container" class="clearfix">
				<p><img src="<?php echo $themePath ?>image/recruit/map_branchs20200204.png" alt="" width="710" height="466" class="pc"><img src="<?php echo $themePath ?>image/recruit/map_branchs20200204_sp.png" alt="" width="640" height="831" class="sp"></p>
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

		<p class="button2 sp"><a href="#contact_input"><img src="<?php echo $themePath ?>image/recruit/button1.gif" alt="応募フォームへ"/></a></p>
		<p class="button2 pc"><a href="#contact_input"><img src="<?php echo $themePath ?>image/recruit/button1_pc.gif" alt="応募フォームへ"/></a></p>
		<!--先輩社員------------------------------------------------------------------------------------------------------------------------>
		<section class="content">
			<h3>先輩社員</h3>
			<div class="sankaku"></div>
			<div class="senior">
				<div class="voice">
					<p class="img"><img src="<?php echo $themePath ?>image/recruit/women1.gif" alt=""/></p>
					<div class="left">
						<p class="spec">ベテラン面談員　面談員暦18年　女性</p>
						<p class="text">私は18年以上面談員として様々な依頼者様のお悩みや相談と向き合い、今ではカウンセラーの資格を持つようにまでなりました。
						<br>ラビット探偵社に入社するまでは大手探偵社、中小の探偵社などで面談員としてやってきましたが、そのなかでもラビット探偵社が一番働きやすい環境だと思っております。
						<br>未経験者でも安心して学べる環境ですので、一緒に働きましょう。</p>
					</div>
				</div>
				<div class="voice">
					<p class="img"><img src="<?php echo $themePath ?>image/recruit/man1.gif" alt=""/></p>
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

	<!--応募フォーム------------------------------------------------------------------------------------------------------------------------>
	<section class="content form" id="contact_input">
		<h3>応募フォーム</h3>
		<div class="sankaku"></div>
	
		<div class="form">
			<form method="post" action="">
				<dl>
					<dt class="first"><label for="names">お名前 <em>必須</em></label></dt>
					<dd><?php echo ff_line('text','names',$pm["names"],'例：山田太郎',30,0,1) ?></dd>
	
					<dt class="gender">性別 <em>必須</em></dt>
					<dd class="gender">
					<?php echo ff_radio('gender_id',$genders,$pm["gender_id"]) ?>
					</dd>
	
					<dt><label for="age">年齢 <em>必須</em></label></dt>
					<dd class="age">
					<input name="age" id="age" type="number" min="18" max="80" size="30" maxlength="2"  placeholder="25" autocomplete="on" required value="<?php echo $pm["age"] ?>"> 才</dd>
	
					<dt><label for="pref_id">都道府県 <em>必須</em></label></dt>
					<dd>
					<?php echo ff_select('pref_id',$prefs,$pm["pref_id"],1)?>
					</dd>
	
					<dt><label for="address">住所 <em>必須</em></label></dt>
					<dd>
					<?php echo ff_line('text','address',$pm['address'],'東京都品川区東五反田5丁目22-37',20,30,1)?></dd>
	
					<dt><label for="tel">電話番号 <em>必須</em></label></dt>
					<dd><?php echo ff_line('tel','tel',$pm['tel'],'090-1234-5678',30,0,1)?></dd>
	
					<dt><label for="email">メールアドレス <em>必須</em></label></dt>
					<dd><?php echo ff_line('email','email',$pm['email'],'info@rabbit-tantei.com',30,0,1)?></dd>
	
					<dt class="area1"><label for="qualification">有資格・免許</label></dt>
					<dd>
					<?php echo ff_textarea('qualification',$pm['qualification'],30,10,'例：普通自動車第一種運転免許')?>
					</dd>
	
					<dt class="jobtype_id">希望職種 <em>必須</em></dt>
					<dd class="jobtype_id">
					<?php echo ff_radio('jobtype_id',$jobtypes,$pm["jobtype_id"]) ?>
					</dd>
	
					<dt class="area2"><label for="motive">志望動機 <em>必須</em></label></dt>
					<dd>
					<?php echo ff_textarea('motive',$pm['motive'],30,10,'',1)?>
					</dd>
	
					<dt class="area2"><label for="question">質問</label></dt>
					<dd><?php echo ff_textarea('question',$pm['question'],30,10,'')?></dd>
				</dl>
	
				<p class="kakunin sp"><input type="image" src="<?php echo $themePath ?>image/recruit/button2.gif" alt="確認画面へ" name="do_submit"></p>
				<p class="kakunin pc"><input type="image" src="<?php echo $themePath ?>image/recruit/button2_pc.gif" alt="確認画面へ" name="do_submit"></p>
	
		</form>
		</div>
	</section>
<?php endif; ?>
<?php else : ?>
	<div class="kakuninpage">
		<section class="content form">


		<h3 class="kakuningamen">確認画面</h3>
	 <div class="sankaku sankaku2"></div>


	 <div class="form">
	 <form method="post" action="" id="contact_confirm">

	 <dl>
		 <dt class="first"><label for="name">お名前</label></dt>
		 <dd><?php echo $pm["names"] ?></dd>

		 <dt class="gender">性別</dt>
		 <dd class="gender">
		 <?php echo $genders[$pm["gender_id"]] ?>
		 </dd>

		 <dt><label for="age">年齢</label></dt>
		 <dd class="age"><?php echo $pm["age"] ?> 才</dd>

		 <dt><label for="pref_id">都道府県</label></dt>
		 <dd><?php echo $prefs[$pm["pref_id"]] ?>
		 </dd>

		 <dt><label for="address">住所</label></dt>
		 <dd><?php echo $pm["address"]?></dd>

		 <dt><label for="tel">電話番号</label></dt>
		 <dd><?php echo $pm["tel"] ?></dd>

		 <dt><label for="email">メールアドレス</label></dt>
		 <dd><?php echo $pm["email"] ?></dd>

		 <dt class="area1"><label for="qualification">有資格・免許</label></dt>
		 <dd><?php echo nl2br($pm["qualification"]) ?>
		 </dd>

			<dt class="jobtype_id">希望職種</dt>
			<dd class="jobtype_id">
			<?php echo $jobtypes[$pm["jobtype_id"]]  ?>
			</dd>

		 <dt class="area2"><label for="motive">志望動機</label></dt>
		 <dd><?php echo nl2br($pm["motive"]) ?>
		 </dd>

		 <dt class="area2"><label for="question">質問</label></dt>
		 <dd><?php echo nl2br($pm["question"]) ?></dd>

		 </dl>

					 <div class="formbutton sp">
		 <p><input type="image" src="<?php echo $themePath ?>image/recruit/modoru_sp.gif" alt="入力画面にもどる" name="do_back"></p>
					 <p><input type="image" src="<?php echo $themePath ?>image/recruit/entry_sp.gif" alt="ENTRY" name="do_entry"></p>
					 </div>


					 <div class="formbutton pc">
		 <p><input type="image" src="<?php echo $themePath ?>image/recruit/modoru_pc.gif" alt="入力画面にもどる" name="do_back"></p>
					 <p><input type="image" src="<?php echo $themePath ?>image/recruit/entry_pc.gif" alt="ENTRY" name="do_entry"></p>
					 </div>

	<?php foreach($pm as $k => $v) : ?>
		<?php echo ff_hidden($k,$v); ?>
	<?php endforeach; ?>
		<input type="hidden" name="hogehoge" value="hogehoge">
		</form>
		</div>
		</section>
<?php endif; ?>
<?php if( count($err) > 0 ) : ?>
<section class="recruit">
	<div class="kakuninpage">
		<section class="content form">
		<h3 class="kakuningamen">エラー</h3>
		<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
		<p class="bun"><?php echo implode('<br>',$err) ?></p>

		</section>
	</div>
</section>
<?php endif; ?>

</section>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
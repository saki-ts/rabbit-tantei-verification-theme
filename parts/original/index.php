<?php
  $themePath = get_template_directory_uri().'/common/';
?>
<?php get_header(); ?>

  <section class="m__fv">
    <div class="fv-swiper-container swiper-container">
      <div class="swiper-wrapper">
        <div class="m__fv_item swiper-slide">
          <div class="ctr m__fv_cont">
                <h1 class="m__fv_catch">「士」としての自己実現と<br>未来を共に創る</h1>
                <p class="m__fv_sub_catch">Creating self-realization <br>and future together</p>
              </div>
          <picture>
            <source type="image/webp" class="js-parallax m__fv_img pc" srcset="<?php echo $themePath; ?>img/fv1.webp">
            <img class="js-parallax m__fv_img pc" src="<?php echo $themePath; ?>img/fv1.jpg" alt="">
          </picture>

          <picture>
            <source type="image/webp" class="js-parallax m__fv_img sp" srcset="<?php echo $themePath; ?>img/fv-s1.webp">
            <img class="js-parallax m__fv_img sp" src="<?php echo $themePath; ?>img/fv-s1.jpg" alt="">
          </picture>
        </div>

        <div class="m__fv_item swiper-slide">
          <div class="ctr m__fv_cont">
            <h1 class="m__fv_catch">「士」としての自己実現と<br>未来を共に創る</h1>
            <p class="m__fv_sub_catch">Creating self-realization <br>and future together</p>
          </div>
          <picture>
            <source type="image/webp" class="js-parallax m__fv_img pc" srcset="<?php echo $themePath; ?>img/fv2.webp">
            <img class="js-parallax m__fv_img pc" src="<?php echo $themePath; ?>img/fv2.jpg" alt="">
          </picture>

          <picture>
            <source type="image/webp" class="js-parallax m__fv_img sp" srcset="<?php echo $themePath; ?>img/fv-s2.webp">
            <img class="js-parallax m__fv_img sp" src="<?php echo $themePath; ?>img/fv-s2.jpg" alt="">
          </picture>
        </div>

        <div class="m__fv_item swiper-slide">
          <div class="ctr m__fv_cont">
            <h1 class="m__fv_catch">「士」としての自己実現と<br>未来を共に創る</h1>
            <p class="m__fv_sub_catch">Creating self-realization <br>and future together</p>
          </div>
          <picture>
            <source type="image/webp" class="js-parallax m__fv_img pc" srcset="<?php echo $themePath; ?>img/fv3.webp">
            <img class="js-parallax m__fv_img pc" src="<?php echo $themePath; ?>img/fv3.jpg" alt="">
          </picture>

          <picture>
            <source type="image/webp" class="js-parallax m__fv_img sp" srcset="<?php echo $themePath; ?>img/fv-s3.webp">
            <img class="js-parallax m__fv_img sp" src="<?php echo $themePath; ?>img/fv-s3.jpg" alt="">
          </picture>
        </div>

        <div class="m__fv_item swiper-slide">
          <div class="ctr m__fv_cont">
            <h1 class="m__fv_catch">「士」としての自己実現と<br>未来を共に創る</h1>
            <p class="m__fv_sub_catch">Creating self-realization <br>and future together</p>
          </div>
          <picture>
            <source type="image/webp" class="js-parallax m__fv_img pc" srcset="<?php echo $themePath; ?>img/fv4.webp">
            <img class="js-parallax m__fv_img pc" src="<?php echo $themePath; ?>img/fv4.jpg" alt="">
          </picture>

          <picture>
            <source type="image/webp" class="js-parallax m__fv_img sp" srcset="<?php echo $themePath; ?>img/fv-s4.webp">
            <img class="js-parallax m__fv_img sp" src="<?php echo $themePath; ?>img/fv-s4.jpg" alt="">
          </picture>
        </div>
      </div>
  </div>
  </section>

  <section id="news" class="m__news">
    <div class="ctr cont_ctr m__news_wrap">
      <h2 class="m__title m__news_title">
        NEWS<span class="m__title_small m__news_title_small">お知らせ</span>
      </h2>
      <div class="m__news_list">

        <?php
          $args = array(
            'posts_per_page' => 5
          );
          $posts = get_posts( $args );
          foreach ( $posts as $post ):
          $postId = get_the_ID();
          $linkUrl = get_post_meta($postId, 'link_url', true);
          setup_postdata( $post );
        ?>
          <?php if(empty($linkUrl)) : ?>
            <div class="m__news_item">
              <time class="m__news_date"><?php the_date( 'Y.m.d' ); ?></time>
              <span class="m__news_item_title">
                <?php the_title();?>
              </span>
            </div>
          <?php else : ?>
            <a href="<?php echo $linkUrl; ?>" class="m__news_item" target="_blank">
              <time class="m__news_date"><?php the_date( 'Y.m.d' ); ?></time>
              <span class="m__news_item_title">
                <?php the_title();?>
              </span>
            </a>
          <?php endif; ?>
        <?php
          endforeach;
          wp_reset_postdata();
        ?>

      </div>
    </div>
  </section>

  <section id="message" class="m__msg">
    <div class="ctr">
      <div class="m__right_block m__msg_bg">
        <div class="cont_ctr m__msg_2col">
          <figure class="m__msg_pic">
            <picture>
              <source type="image/webp" srcset="<?php echo $themePath; ?>img/msg-pic_temporary.webp">
              <img src="<?php echo $themePath; ?>img/msg-pic_temporary.jpg" alt="">
            </picture>
          </figure>
          <div class="m__msg_dtl">
            <h2 class="m__title m__msg_title js-fadein">
              MESSAGE<span class="m__title_small">代表挨拶</span>
            </h2>
            <p class="m__msg_catch js-fadein">
              資格者の「士」としての自己実現を
            </p>
            <p class="m__msg_text js-fadein">株式会社サラは、代表を弁護士が務める『士業に特化したコンサルティング会社』です。
              <br>今日、法曹人口の増加によって資格者の価値や収入に対する不安の声が聞こえることが増えてきました。
              <br>しかし、弁護士・司法書士の将来性はまだまだ高い。
              <br>株式会社サラはそんな士業界に対し、独自のノウハウを武器に弁護士事務所や司法書士事務所の未来、そして資格者の自己実現にコミットするために立ち上げた会社です。</p>
          </div>
        </div>
      </div>
    </div>

    <div class="m__career js-fadein">
      <div class="m__career_wrap">
        <div class="ctr cont_ctr">
          <p class="m__career_name">
            <span class="m__career_name--position">代表取締役</span>
            吉田&nbsp;正樹
          </p>
          <div class="m__career_2col">
            <div class="m__career_dtl">
              <p class="m__career_history">
                一橋大学社会学部卒業、立命館大学法科大学院修了後、2008年司法試験合格。2009年に弁護士登録(大阪弁護士会)、勤務弁護士を経て2013年に堺筋総合法律事務所開設、2019年法律事務所サラを開設。2020年に株式会社サラを設立。また、現在は主に顧問会社の業務を中心とした企業法務の他、某メーカー、某保険会社の社外取締役等も務める。
              </p>
            </div>

            <p class="m__career_case">
              <span class="m__career_case_title">主な顧客先</span>
              ・投資（ベンチャーキャピタル、個人投資家 等）
              <br>・金融（証券会社、保険会社 等）
              <br>・サービス（士業事務所 等）
              <br>・不動産（デベロッパー、ゼネコン 等）
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="m__phil">
    <div class="m__phil_pic_bg">
      <picture>
        <source type="image/webp" class="m__left_block js-parallax" srcset="<?php echo $themePath; ?>img/phil-pic.webp">
        <img class="m__left_block js-parallax" src="<?php echo $themePath; ?>img/phil-pic.jpg" alt="">
      </picture>
    </div>
    <div id="philosophy">
      <div class="ctr">
        <div class="m__right_block m__phil_bg">
          <div class="cont_ctr">
            <h2 class="m__title m__phil_title js-fadein">
              PHILOSOPHY<span class="m__title_small">理念</span>
            </h2>

            <dl class="m__phil_list js-fadein">
              <dt class="m__phil_name">MISSION</dt>
              <dd class="m__phil_item">
                <p class="m__phil_item_title">クライアントの「士」としての<br class="sp_br">自己実現に貢献する</p>
                <p class="m__phil_item_text">士としての一番の幸せは、各々が持つ信念や志の実現にあると考えています。一方で、信念や志の実現のためには、安定した収益・資金が必要です。弊社は"クライアントの自己実現の達成"をミッションとして、クライアントへ貢献します。</p>
              </dd>
            </dl>

            <dl class="m__phil_list js-fadein">
              <dt class="m__phil_name">VISION</dt>
              <dd class="m__phil_item">
                <p class="m__phil_item_title">クライアントの収益を<br class="sp_br">最適化するとともに、<br>志を持ったクライアントへ<br class="sp_br">フレームだけでなく<br>実利とノウハウを提供し続ける</p>
              </dd>
            </dl>

            <dl class="m__phil_list js-fadein">
              <dt class="m__phil_name">VALUE</dt>
              <dd class="m__phil_item">
                <p class="m__phil_item_title">クライアントファースト</p>
                <p class="m__phil_item_title">クライアントの志を共に志向する</p>
                <p class="m__phil_item_title">クライアントの事業安定性と仕事の多様性にコミットする</p>
              </dd>
            </dl>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="service" class="m__service">
    <div class="m__service_wrap">
      <div class="m__service_title_block js-fadein">
        <div class="cont_ctr">
          <h2 class="m__title m__service_title">
            SERVICE<span class="m__title_small">事業内容</span>
          </h2>

          <div class="m__service_main">
            <h3 class="m__service_main_title">士業の総合的なコンサルティングで成果のでるサービスを提供</h3>
            <p class="m__service_main_text">資格者の自己実現のため、安定的収益基盤の確保から
              <br class="pc_br">オリジナルの価値創出まで徹底的にサポートします。
              <br class="pc_br">一般的なコンサルティングサービスとは違い、フレームワークや
              <br class="pc_br">解決案の提示のみではなく、
              <br class="pc_br">実利を伴ったサポートを行うので成果に確実にコミットします。</p>
          </div>
        </div>
      </div>

      <div class="ctr">
        <div class="m__service_type m__right_block">
          <div class="cont_ctr m__service_type_wrap js-fadein">
            <h3 class="m__service_type_title">提供サービス</h3>

            <ul class="m__service_type_list">
              <li class="m__service_type_item">
                <figure class="m__service_type_pic">
                  <img src="<?php echo $themePath; ?>img/service-icon-webad.svg" alt="">
                </figure>

                <p class="m__service_type_name">広告集客サポート</p>
                <p class="m__service_type_text">
                  収益拡大における最大の肝である集客について、インターネットを駆使した集客で確実にサポートします。
                  <br class="sp_br">「投資に対して問合せが来ない」ということは一切起きません。
                </p>
              </li>

              <li class="m__service_type_item">
                <figure class="m__service_type_pic">
                  <img src="<?php echo $themePath; ?>img/service-icon-strategy.svg" alt="">
                </figure>

                <p class="m__service_type_name">事業戦略サポート</p>
                <p class="m__service_type_text">
                  事務所の最大化、事務所の多様性、士としての自己実現等、描く未来に向けての事業戦略を組み立てから実行までサポートします。
                </p>
              </li>

              <li class="m__service_type_item">
                <figure class="m__service_type_pic">
                  <img src="<?php echo $themePath; ?>img/service-icon-callteam.svg" alt="">
                </figure>

                <p class="m__service_type_name">自社コールチーム</p>
                <p class="m__service_type_text">
                  問合せが来ても商談に繋がらなければ意味がありません。
                  <br class="sp_br">ご要望に応じて自社コールチームによる問合せ代行サービスをご提供しています。
                </p>
              </li>

              <li class="m__service_type_item">
                <figure class="m__service_type_pic">
                  <img src="<?php echo $themePath; ?>img/service-icon-consulting.svg" alt="">
                </figure>

                <p class="m__service_type_name">組織・業務コンサルティング</p>
                <p class="m__service_type_text">
                  現状の業務フローの改善を効率と効果最大を軸にサポートします。
                  <br class="sp_br">また、事務所の拡大と共に必ず起こる”組織”作りを独自ノウハウからサポートします。
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="ctr">
        <div class="m__service_type--plus m__right_block">
          <div class="cont_ctr m__service_type_wrap js-fadein">
            <h3 class="m__service_type_title--plus">- プラスα</h3>
            <ul class="m__service_type_list">
              <li class="m__service_type_item">
                <figure class="m__service_type_pic">
                  <img src="<?php echo $themePath; ?>img/service-icon-network.svg" alt="">
                </figure>

                <p class="m__service_type_name--plus">資格者ネットワーク</p>
                <p class="m__service_type_text">
                  弊社のクライアント又は弊社独自のつながりのネットワークを通じて情報共有や新規事業等の知的サポートが可能です。
                </p>
              </li>

              <li class="m__service_type_item">
                <figure class="m__service_type_pic--support">
                  <img src="<?php echo $themePath; ?>img/service-icon-support.svg" alt="">
                </figure>

                <p class="m__service_type_name--plus">事業融資サポート</p>
                <p class="m__service_type_text">
                  新規事業等を始める際の資金面でのサポートを行います。
                </p>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section id="works" class="m__works">
    <div class="m__works_title_block">
      <div class="ctr">
        <div class="m__left_block m__works_title_bg">
          <div class="ctr">
            <div class="cont_ctr">
              <h2 class="m__title m__works_title js-fadein">
                WORKS<span class="m__title_small">実績</span>
              </h2>

              <h3 class="m__works_desc_title m__title m__works_title js-fadein">
                圧倒的なスピードで、<br class="sp_br">事務所の再建と<br>売り上げの最大化を実現
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ctr">
      <div class="m__right_block m__works_slider_block">
        <div class="cont_ctr m__works_slider js-fadein">
          <svg class="m__works_slider_btn_prev js-swiper-prev" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 50 50"><defs><filter id="a" x="0" y="0" width="50" height="50" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="3" result="b"/><feFlood flood-color="#afc9e0" flood-opacity="0.161"/><feComposite operator="in" in2="b"/><feComposite in="SourceGraphic"/></filter></defs><g transform="translate(1281 4482) rotate(180)"><g transform="matrix(-1, 0, 0, -1, 1281, 4482)" filter="url(#a)"><circle cx="16" cy="16" r="16" transform="translate(41 38) rotate(180)" fill="#fff"/></g><path class="m__works_slider_btn_prev_path" d="M-403,4442.007l5.045,5.044L-403,4452.1" transform="translate(1657 12.892)" fill="none" stroke="#007ecc" stroke-width="2"/></g></svg>

          <svg class="m__works_slider_btn_next js-swiper-next" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 50 50"><defs><filter id="a" x="0" y="0" width="50" height="50" filterUnits="userSpaceOnUse"><feOffset dy="3" input="SourceAlpha"/><feGaussianBlur stdDeviation="3" result="b"/><feFlood flood-color="#afc9e0" flood-opacity="0.161"/><feComposite operator="in" in2="b"/><feComposite in="SourceGraphic"/></filter></defs><g transform="translate(1281 4482) rotate(180)"><g transform="matrix(-1, 0, 0, -1, 1281, 4482)" filter="url(#a)"><circle cx="16" cy="16" r="16" transform="translate(41 38) rotate(180)" fill="#fff"/></g><path class="m__works_slider_btn_next_path" d="M-403,4442.007l5.045,5.044-3.784,3.784L-403,4452.1" transform="translate(856.045 8906.994) rotate(180)" fill="none" stroke="#007ecc" stroke-width="2"/></g></svg>
          <div class="works-siwper-container swiper-container">
            <div class="swiper-wrapper">
              <div class="m__works_item swiper-slide">
                <div class="m__works_desc_block">
                  <i class="m__works_num_block">CASE<span class="m__works_num">01</span></i>
                  <p class="m__works_desc_name">
                    A法律事務所
                  </p>
                </div>
                <div class="m__works_desc_dtl">
                  <div class="m__works_result">
                    <div class="m__works_result_item">
                      <p class="m__works_result_name">売上</p>
                      <div class="m__works_result_item_wrap">
                        <div class="m__works_result_before">
                          <p class="m__works_result_before_prev_year">前年</p>
                          <p class="m__works_result_before_sales">
                            <span class="m__works_result_before_sales_num">900</span>万円
                          </p>
                        </div>
                        <i class="m__works_result_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-navy.svg" alt=""></i>
                        <div class="m__works_result_after">
                          <p class="m__works_result_after_sales">
                            <span class="m__works_result_after_sales_num">5</span>億円
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="m__works_result_item">
                      <p class="m__works_result_name--period">期間</p>
                      <p class="m__works_result_period">約12ヶ月</p>
                    </div>
                  </div>
                </div>
                <div class="m__works_graph">
                  <ul class="m__works_graph_list">
                    <li class="m__works_graph_item">
                      <p class="m__works_graph_name"><i class="m__works_graph_name_icon"><img src="<?php echo $themePath; ?>img/works-icon-qual.svg" alt=""></i>資格者数</p>
                      <div class="m__works_graph_unit_list">
                        <p class="m__works_graph_before"><i class="m__works_graph_before_num">1</i>人</p>
                        <i class="m__works_graph_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-gray.svg" alt=""></i>
                        <p class="m__works_graph_after"><i class="m__works_graph_after_num">7</i>人</p>
                      </div>
                    </li>
                    <li class="m__works_graph_item">
                      <p class="m__works_graph_name"><i class="m__works_graph_name_icon"><img src="<?php echo $themePath; ?>img/works-icon-people.svg" alt=""></i>事務員数</p>
                      <div class="m__works_graph_unit_list">
                        <p class="m__works_graph_before"><i class="m__works_graph_before_num">1</i>人</p>
                        <i class="m__works_graph_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-gray.svg" alt=""></i>
                        <p class="m__works_graph_after"><i class="m__works_graph_after_num">15</i>人</p>
                      </div>
                    </li>
                    <li class="m__works_graph_item">
                      <p class="m__works_graph_name"><i class="m__works_graph_name_icon"><img src="<?php echo $themePath; ?>img/works-icon-branch.svg" alt=""></i>支店数</p>
                      <div class="m__works_graph_unit_list">
                        <p class="m__works_graph_before"><i class="m__works_graph_before_num">0</i>支店</p>
                        <i class="m__works_graph_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-gray.svg" alt=""></i>
                        <p class="m__works_graph_after"><i class="m__works_graph_after_num">2</i>支店</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="m__works_item swiper-slide">
                <div class="m__works_desc_block">
                  <i class="m__works_num_block">CASE<span class="m__works_num">02</span></i>
                  <p class="m__works_desc_name">
                    B法律事務所
                  </p>
                </div>
                <div class="m__works_desc_dtl">
                  <div class="m__works_result">
                    <div class="m__works_result_item">
                      <p class="m__works_result_name">売上</p>
                      <div class="m__works_result_item_wrap">
                        <div class="m__works_result_before">
                          <p class="m__works_result_before_prev_year">前年</p>
                          <p class="m__works_result_before_sales">
                            <span class="m__works_result_before_sales_num">1800</span>万円
                          </p>
                        </div>
                        <i class="m__works_result_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-navy.svg" alt=""></i>
                        <div class="m__works_result_after">
                          <p class="m__works_result_after_sales">
                            <span class="m__works_result_after_sales_num">2</span>億円
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="m__works_result_item">
                      <p class="m__works_result_name--period">期間</p>
                      <p class="m__works_result_period">約10ヶ月</p>
                    </div>
                  </div>
                </div>
                <div class="m__works_graph">
                  <ul class="m__works_graph_list">
                    <li class="m__works_graph_item">
                      <p class="m__works_graph_name"><i class="m__works_graph_name_icon"><img src="<?php echo $themePath; ?>img/works-icon-qual.svg" alt=""></i>資格者数</p>
                      <div class="m__works_graph_unit_list">
                        <p class="m__works_graph_before"><i class="m__works_graph_before_num">1</i>人</p>
                        <i class="m__works_graph_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-gray.svg" alt=""></i>
                        <p class="m__works_graph_after"><i class="m__works_graph_after_num">5</i>人</p>
                      </div>
                    </li>
                    <li class="m__works_graph_item">
                      <p class="m__works_graph_name"><i class="m__works_graph_name_icon"><img src="<?php echo $themePath; ?>img/works-icon-people.svg" alt=""></i>事務員数</p>
                      <div class="m__works_graph_unit_list">
                        <p class="m__works_graph_before"><i class="m__works_graph_before_num">1</i>人</p>
                        <i class="m__works_graph_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-gray.svg" alt=""></i>
                        <p class="m__works_graph_after"><i class="m__works_graph_after_num">10</i>人</p>
                      </div>
                    </li>
                    <li class="m__works_graph_item">
                      <p class="m__works_graph_name"><i class="m__works_graph_name_icon"><img src="<?php echo $themePath; ?>img/works-icon-branch.svg" alt=""></i>支店数</p>
                      <div class="m__works_graph_unit_list">
                        <p class="m__works_graph_before"><i class="m__works_graph_before_num">0</i>支店</p>
                        <i class="m__works_graph_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-gray.svg" alt=""></i>
                        <p class="m__works_graph_after"><i class="m__works_graph_after_num">1</i>支店</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="m__works_item swiper-slide">
                <div class="m__works_desc_block">
                  <i class="m__works_num_block">CASE<span class="m__works_num">03</span></i>
                  <p class="m__works_desc_name">
                    C司法書士事務所
                  </p>
                </div>
                <div class="m__works_desc_dtl">
                  <div class="m__works_result">
                    <div class="m__works_result_item">
                      <p class="m__works_result_name">売上</p>
                      <div class="m__works_result_item_wrap">
                        <div class="m__works_result_before">
                          <p class="m__works_result_before_prev_year">前年</p>
                          <p class="m__works_result_before_sales">
                            <span class="m__works_result_before_sales_num">4000</span>万円
                          </p>
                        </div>
                        <i class="m__works_result_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-navy.svg" alt=""></i>
                        <div class="m__works_result_after">
                          <p class="m__works_result_after_sales">
                            <span class="m__works_result_after_sales_num">5</span>億円
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="m__works_result_item">
                      <p class="m__works_result_name--period">期間</p>
                      <p class="m__works_result_period">約9ヶ月</p>
                    </div>
                  </div>
                </div>
                <div class="m__works_graph">
                  <ul class="m__works_graph_list">
                    <li class="m__works_graph_item">
                      <p class="m__works_graph_name"><i class="m__works_graph_name_icon"><img src="<?php echo $themePath; ?>img/works-icon-qual.svg" alt=""></i>資格者数</p>
                      <div class="m__works_graph_unit_list">
                        <p class="m__works_graph_before"><i class="m__works_graph_before_num">3</i>人</p>
                        <i class="m__works_graph_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-gray.svg" alt=""></i>
                        <p class="m__works_graph_after"><i class="m__works_graph_after_num">8</i>人</p>
                      </div>
                    </li>
                    <li class="m__works_graph_item">
                      <p class="m__works_graph_name"><i class="m__works_graph_name_icon"><img src="<?php echo $themePath; ?>img/works-icon-people.svg" alt=""></i>事務員数</p>
                      <div class="m__works_graph_unit_list">
                        <p class="m__works_graph_before"><i class="m__works_graph_before_num">3</i>人</p>
                        <i class="m__works_graph_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-gray.svg" alt=""></i>
                        <p class="m__works_graph_after"><i class="m__works_graph_after_num">14</i>人</p>
                      </div>
                    </li>
                    <li class="m__works_graph_item">
                      <p class="m__works_graph_name"><i class="m__works_graph_name_icon"><img src="<?php echo $themePath; ?>img/works-icon-branch.svg" alt=""></i>支店数</p>
                      <div class="m__works_graph_unit_list">
                        <p class="m__works_graph_before"><i class="m__works_graph_before_num">0</i>支店</p>
                        <i class="m__works_graph_arrow"><img src="<?php echo $themePath; ?>img/works-arrow-gray.svg" alt=""></i>
                        <p class="m__works_graph_after"><i class="m__works_graph_after_num">3</i>支店</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="m__parallax">
    <div class="m__parallax_img">
      <picture>
        <source type="image/webp" class="js-parallax pc" srcset="<?php echo $themePath; ?>img/top-parallax.webp">
          <img class="js-parallax pc" src="<?php echo $themePath; ?>img/top-parallax.jpg" alt="">
      </picture>

      <picture>
        <source type="image/webp" class="js-parallax sp" srcset="<?php echo $themePath; ?>img/top-parallax-s.webp">
          <img class="js-parallax sp" src="<?php echo $themePath; ?>img/top-parallax-s.jpg" alt="">
      </picture>
    </div>
  </section>

  <section id="company" class="m__company">
    <div class="cont_ctr m__company_wrap">
      <div class="m__company_2col js-fadein">
        <h2 class="m__title m__company_title">
          COMPANY<span class="m__title_small">会社概要</span>
        </h2>

        <div class="m__company_list">
          <dl class="m__company_list_item">
            <dt class="m__company_list_name">
              社名
            </dt>
            <dd class="m__company_list_text">
              株式会社サラ
            </dd>
          </dl>

          <dl class="m__company_list_item">
            <dt class="m__company_list_name">
              代表取締役
            </dt>
            <dd class="m__company_list_text">
              吉田 正樹
            </dd>
          </dl>

          <dl class="m__company_list_item">
            <dt class="m__company_list_name">
              所在地
            </dt>
            <dd class="m__company_list_text">
              〒541-0044
              <br>大阪府大阪市中央区伏見町2-1-1 三井住友銀行高麗橋ビル4F
              <br><a href="https://goo.gl/maps/fjx1bRHZZ2wAFNyW8" class="m__company_list_map_btn">Google map</a>
            </dd>
          </dl>

          <dl class="m__company_list_item">
            <dt class="m__company_list_name">
              電話番号
            </dt>
            <dd class="m__company_list_text">06-6202-7678</dd>
          </dl>
        </div>
      </div>

      <div class="m__company_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3280.634701221957!2d135.5038871511961!3d34.68916799124678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e6e08350b263%3A0x69696498593f33e2!2z44CSNTQxLTAwNDQg5aSn6Ziq5bqc5aSn6Ziq5biC5Lit5aSu5Yy65LyP6KaL55S677yS5LiB55uu77yR4oiS77yRIOS4ieS6leS9j-WPi-mKgOihjCDpq5jpupfmqYvjg5Pjg6sgNEY!5e0!3m2!1sja!2sjp!4v1591870417365!5m2!1sja!2sjp" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </section>

  <section id="contact" class="m__contact">
    <div class="cont_ctr m__contact_wrap">
      <div class="m__contact_btn_wrap">
        <h3 class="m__title m__contact_title js-fadein">CONTACT</h3>
        <p class="m__contact_text">コンサルティングのご相談・ご依頼を<br class="sp_br">お待ちしております。</p>
        <a href="/contact" class="m__contact_btn">お問い合わせ・ご依頼はこちら</a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
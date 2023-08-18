<?php get_header(); ?>
<?php get_template_part('hero'); ?>
<section class="p-work">
  <div class="l-container">
    <div class="c-titleBox">
      <div class="c-titleBox__wrapper">
        <p class="p-work__subTitle">PC・ワークスが信頼される<br class="p-work__linefeed">3つのポイント</p>
        <h3 class="c-titleBox__title">パソコン売るなら<br class="p-work__linefeed">PCワークス</h3>
      </div>
    </div>
    <ul class="p-work__list">
      <li class="p-work__item">
        <div class="p-work__imgContainer">
          <img class="p-work__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/top_work01.png" alt="丸画像" />
        </div>
        <h2 class="p-work__title">安心安全</h2>
        <p class="p-work__text">
          PC1台から無料で事前に簡易査定いたします！買取後、全てのPCはデータを消去しているため、データ流出の心配もございません。ご入用の方はデータ消去証明書の発行も承っております！
        </p>
      </li>
      <li class="p-work__item">
        <div class="p-work__imgContainer">
          <img class="p-work__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/top_work02.jpg" alt="丸画像" />
        </div>
        <h2 class="p-work__title">高額買取</h2>
        <!-- <p class="p-work__text">
          パソコン専門店のための<br />お手頃な修理価格を実現致しました!!
        </p> -->
        <p class="p-work__text">
          パソコンに関する専門性が高く、買い取ったPCはリユースして販売しております。そのため、他店では金属として引き取っているPCも、当店では高値で買い取ることができます！
        </p>
      </li>
      <li class="p-work__item">
        <div class="p-work__imgContainer">
          <img class="p-work__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/top_work03.png" alt="丸画像" />
        </div>
        <h2 class="p-work__title">PC専門店</h2>
        <p class="p-work__text">
          中古パソコンの販売・修理・買取の事業を展開しているため、専門的な知識や経験を持ったスタッフが多数在中しています！壊れているから売れないと諦めている方も一度お持ち込みください！
        </p>
      </li>
    </ul>
  </div>
</section>
<section class="p-menu">
  <div class="l-container">
    <div class="c-titleBox">
      <div class="c-titleBox__wrapper">
        <h3 class="c-titleBox__title">買取メニュー</h3>
        <p class="c-titleBox__text">Menu</p>
      </div>
    </div>
    <ul class="p-menu__list show">
      <li class="p-menu__item">
        <div class="p-menu__imgContainer">
          <img class="p-menu__image" src="<?php echo get_template_directory_uri(); ?>//assets/images/gahag-0088132005-1.jpg" alt="" />
        </div>
        <p class="p-menu__text">デスクトップPC</p>
      </li>
      <li class="p-menu__item">
        <div class="p-menu__imgContainer">
          <img class="p-menu__image" src="<?php echo get_template_directory_uri(); ?>//assets/images/PC.png" alt="" />
        </div>
        <p class="p-menu__text">ノートPC</p>
      </li>
      <li class="p-menu__item">
        <div class="p-menu__imgContainer">
          <img class="p-menu__image" src="<?php echo get_template_directory_uri(); ?>//assets/images/tablet-phone.jpg" alt="" />
        </div>
        <p class="p-menu__text">タブレット＆スマホ</p>
      </li>
      <li class="p-menu__item">
        <div class="p-menu__imgContainer">
          <img class="p-menu__image" src="<?php echo get_template_directory_uri(); ?>//assets/images/monitor.png" alt="" />
        </div>
        <p class="p-menu__text">モニター</p>
      </li>
      <button class="p-topMenu__btn" onclick="location.href='<?php echo home_url('/purchase'); ?>'">一覧</button>
    </ul>
  </div>
</section>
<section class="p-shop">
  <div class="l-container">
    <div class="c-titleBox">
      <div class="c-titleBox__wrapper">
        <h3 class="c-titleBox__title">店舗一覧</h3>
        <p class="c-titleBox__text">Shops</p>
      </div>
    </div>
    <div class="p-shop__container">
      <ul class="p-shop__list">
        <?php // タームの親・子の一覧にタームに紐づく投稿一覧を表示する方法
        $categories = get_terms(
          'shop_category',
          array(
            'parent' => 0,
            'orderby' => 'description'
          )
        );
        foreach ($categories as $cat) : ?>
          <li class="p-shop__item">
            <p class="p-shop__area"><?php echo ($cat->name); ?></p>
            <ul class="p-shop__loopBox">
              <?php
              $children = get_terms('shop_category', 'hierarchical=0&parent=' . $cat->term_id);
              if ($children) : // 子タームの有無
                foreach ($children as $child) : ?>
                  <li class="p-shop__loop">
                    <div class="p-shop__innerArea">
                      <div class="p-shop__iconPref">
                        <div class="p-shop__iconContainer">
                          <img class="p-shop__icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-map.svg" alt="" />
                        </div>
                        <p class="p-shop__pref"><?php echo ($child->name); ?></p>
                      </div>
                      <?php $catslug = $child->slug;
                      $args = array(
                        'post_type' => 'shop',
                        'shop_category' => $catslug,
                        'posts_per_page' => -1,
                      );
                      $myquery = new WP_Query($args);
                      ?>
                      <!-- 都道府県ごとの各店舗を表示するリストのループ -->
                      <ul class="p-shop__shopNameList">
                        <?php if ($myquery->have_posts()) : ?>
                          <?php while ($myquery->have_posts()) : $myquery->the_post(); ?>
                            <li class="p-shop__shopName">
                              <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            </li>
                          <?php endwhile; ?>
                        <?php endif; ?>
                      </ul>
                    </div>
                  </li>
                  <?php wp_reset_postdata(); ?>
                <?php endforeach; ?>
              <?php endif; ?>
              <!-- 子タームに紐づく記事一覧の表示終了 -->
            </ul>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>
<section class="p-info">
  <div class="l-container">
    <div class="p-info__titleBox">
      <h3 class="p-info__title">【新着&excl;&excl;】<br class="p-info__linefeed">⭐️パソコン買取ブログ⭐️</h3>
      <div class="p-info__titleWrapper">
        <!-- <p class="c-titleBox__text">Pick Up</p> -->
      </div>
    </div>
    <ul class="p-info__list">
      <?php
      $custom_posts = get_posts(array(
        'post_type' => 'blog', // 投稿タイプ
        'posts_per_page' => 3, // 表示件数
        'orderby' => 'date', // 表示順の基準
        'order' => 'DESC', // 昇順・降順
      ));
      global $post;
      if ($custom_posts) : foreach ($custom_posts as $post) : setup_postdata($post); ?>
          <li class="p-info__item">
            <a href="<?php the_permalink(); ?>">
              <div class="p-info__imgBox">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('thumbnails', ['class' => '.p-info__image']); ?>
                <?php else : ?>
                  <img class="p-info__imgBox" src="<?php echo get_template_directory_uri(); ?>/assets/images/macbook1993_TP_V.jpg" alt="">
                <?php endif; ?>
              </div>
              <p class="p-info__text"><?php the_title() ?></p>
            </a>
          </li>
        <?php endforeach;
        wp_reset_postdata();
      else : ?>
        <p class="p-info__notFound">ブログ投稿がありません</p>
      <?php endif; ?>
    </ul>
  </div>
</section>
<section class="p-topNews">
  <div class="l-container">
    <div class="c-titleBox">
      <div class="c-titleBox__wrapper">
        <h3 class="c-titleBox__title">各店舗のお知らせ</h3>
        <p class="c-titleBox__text">News</p>
      </div>
    </div>
    <!-- <div class="p-topNews__container"> -->
    <ul class="p-topNews__container">
      <?php
      $custom_posts = get_posts(array(
        'post_type' => 'news', // 投稿タイプ
        'posts_per_page' => 5, // 表示件数
        'orderby' => 'date', // 表示順の基準
        'order' => 'DESC', // 昇順・降順
      ));
      global $post;
      if ($custom_posts) : foreach ($custom_posts as $post) : setup_postdata($post); ?>
          <li class="p-topNews__article">
            <a href="<?php the_permalink() ?>">
              <p class="p-topNews__date"><?php the_time("Y-m-d"); ?></p>
              <div class="p-topNews__articleTitle">
                <p>&lt;
                  <?php
                  $taxonomy = 'custom_tags'; // タグのタクソノミー名
                  $tags = get_the_terms(get_the_ID(), $taxonomy);
                  if ($tags && !is_wp_error($tags)) {
                    $tag_names = array();
                    foreach ($tags as $tag) {
                      $tag_names[] = $tag->name;
                    }
                    echo implode(' / ', $tag_names);
                  }
                  ?>
                  &gt;<?php the_title(); ?></p>
              </div>
            </a>
          </li>
        <?php endforeach;
        wp_reset_postdata();
      else : ?>
        <p class="p-topNews__text">お知らせがありません</p>
      <?php endif; ?>
    </ul>
    <!-- </div> -->
  </div>
</section>
<section class="p-question">
  <div class="l-container">
    <div class="p-question__container">
      <div class="c-titleBox">
        <div class="c-titleBox__wrapper">
          <h3 class="c-titleBox__title">よくある質問</h3>
          <p class="c-titleBox__text">Q&A</p>
        </div>
      </div>
      <div class="p-question__box">
        <h3 class="p-question__title">買取について</h3>
        <ul class="p-question__list">
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                査定にはどのくらいの時間がかかりますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              店舗持ち込みの場合、5~10分程度です。商品点数によって10~30分程度いただいております。<br>
              店舗の混み具合や大口のお取引によっては、お時間いただくこともございますが、1時間以内には査定が終わりように努めております。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                どんなものが買取対象ですか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              詳しくは<span><a href="<?php echo home_url("/purchase"); ?>">買取メニューページ </a></span>をご確認ください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                定休日、営業時間を教えてください。
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              店舗一覧ページからお近くの店舗の営業時間をご確認ください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                駐車場はありますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              店舗によって異なるため、お近くの店舗にお電話でご確認ください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                事前に買取価格を教えてもらえますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              事前簡易査定をお申し込みいただけましたら、概算のお見積をお伝えさせていただきます。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                故障したもの、古すぎるものも買い取ってくれますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              故障したものも、古すぎるものも買取可能です。買取金額があまりつかない場合もございますので、事前簡易査定をお申し込みいただくことをおすすめしております。<br>
              ブラウン管は、処分費用5,000円がかかってしまうため、ご注意ください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                全国どこからでも利用できますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              全国どこからでもお申し込みいただけます。沖縄、北海道、離島の場合は、送料分をご負担いただく可能性がございます。事前にお電話またはLINE、お問い合わせフォームからお問い合わせください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                高く売れるポイントを教えてください。
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              下記のような商品状態の場合は高額買取いたします。<br>
              □購入した時の付属品がすべてそろっている<br>
              □キズ、汚れなどがあまり目立たない<br>
              □きれいにメンテナンスされている<br>
              □季節に合った商品<br>
              ※商品によって条件は異なります。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                商品の型番が不明なのですが査定はできますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              外箱、裏面のシール、取扱い説明書などに記載があることが多いです。<br>
              ご不明な場合は確認方法をご案内しますので、お問い合わせください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                付属品や箱がなくても買取可能ですか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              ほとんどの商品が買取可能です。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                店舗が近くにないです。郵送でも買取できますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              ご来店以外にも、郵送での買取も承っております。初めての方へのページにお申し込みの手順を載せております。
              詳しくは<span><a href="<?php echo home_url("/beginnerpage"); ?>">こちら</a></span>こちらをご確認ください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                送料はかかりますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              梱包キットや送料は無料です。（キャンセル時の返送料のみいただいております。）
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                梱包方法について教えてください。
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              梱包方法については<a href="<?php echo get_template_directory_uri(); ?>/assets/pdf/konpo.pdf" download="konpo.pdf">こちら</a>をご参照ください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                家まで引き取りに来てくれますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              出張買取の場合は、別途ご相談させていただきます。お近くの店舗にお電話またはお問い合わせフォームよりご連絡ください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                自宅以外の場所に出張買取に来てもらうことはできますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              本人確認書類に記載の住所に限り出張買取ができます。法人や個人の方は別途ご相談ください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                出張日時を変更したいのですが。
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              日程の変更や確認についてはお電話で承ります。日程の変更の場合は、前日までにご連絡をお願いいたします。場合によっては、ご希望の日時に沿えない可能性がございます。ご理解いただけますと幸いです。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                当日立ち会うのは申し込み本人でない家族の場合、本人確認書類はどうしたらいいですか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              当日立ち会う方の本人様確認書類をご用意ください。
            </p>
          </li>
          <hr />
        </ul>
      </div>
      <div class="p-question__box">
        <h3 class="p-question__title">お支払いについて</h3>
        <ul class="p-question__list">
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                現金以外の支払い方法を教えてください。
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              ご本人名義の金融機関口座へのお振込ができます。お振込の際、振込手数料は弊社にて負担させていただきます。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                査定後、キャンセルはできますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              店舗にご来店いただいた場合は、査定後、お支払い前にキャンセルいただくことは可能です。<br>
              郵送の場合も、お支払い前にキャンセルいただいても構いませんが、ご返却時の郵送料をお客様にご負担をお願いしております。<br>
              出張買取の場合は、原則買取前提で訪問させていただいております。そのため、出張買取のキャンセルはお断りさせていただいております。<br>
              また、お客様による買取金額見積の承諾、もしくは買取代金のお支払をもって売買契約が成立し、商品の所有権は当社に移転するものとします。所有権移転後のキャンセル、返品は一切お受けできません。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                郵送買取を利用したいのですが、郵便局の口座に振り込めますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              郵便局の口座にも振り込みできます。郵便局の振込用口座をご確認のうえ、お申し込みください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                回収日までに準備しておくことはありますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              下記3点をご準備ください。<br>
              □買取品本体、付属品、箱等<br>
              □本人確認書類<br>
              □お申込書<br>
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                分割払い中（ネットワーク利用制限△）でも買取に出せますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              大変恐縮ですが、端末代金を分割でお支払い中の場合は買取いたしかねます。支払いが滞っている場合も、買取不可とさせていただいております。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                本人確認に表記されている住所が現住所と違うのですが？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              現住所と記載住所が同一であるものが必要です。恐縮ではございますが、異なっている場合はご利用いただけません。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                本人確認書類と異なる名義口座への振込は可能ですか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              本人確認書類のお名前と同一名義の振込口座に限ります。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                口座名義が旧姓のままなのですが、振込可能ですか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              旧姓を確認できる書類が必要となります。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                パソコンのデータは消去してもらえますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              買取したパソコンのデータについては、JEITAの定めるパソコンの廃棄・譲渡時におけるハードディスク上のデータ消去に関する留意事項に基づいて、販売前に消去を取り行っております。
              データ消去証明書の発行(3,300円税込/1台~)も可能です。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                未成年なんですけど買い取ってくれますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              古物営業法、青少年健全育成条例に基づき、古物の売却は18歳以上に限られます。18歳未満の方は保護者の方から直接お申し込みいただくか、またはご本人がお申し込みいただく場合には、保護者買取同意書により保護者の同意を確認させていただきます。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                法人として取引がしたいのですが、問い合わせの窓口は？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              法人様のPC買取も行っております。事前にお近くの店舗にお問い合わせいただけますと幸いです。<br>
              また弊社、加盟店を募集しております。詳しくは <span><a href="<?php echo home_url("/franchiserecruiting"); ?>">加盟店募集ページ</a></span>よりお問い合わせください。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                個人情報の管理は？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              当社は、ご利用者様より取得した個人情報を以下に定める範囲においてのみ使用致します。<br>
              1、当社は,ご利用者様より取得した個人情報を、古物営業法上の取引確認・身元確認義務の履行、取引確認、商品・サービスをご紹介するためのDM等の配信、及び代金の送金目的以外には利用いたしません。また、公安委員会・警察署等の公的機関から法令に基づ く正式な照会を受けた場合を除いて、利用者の同意なく第三者に開示いたしません。<br>
              2.個人情報を取得したご本人より、開示、訂正、削除、利用停止の申し出の際は本人確認など必要な手続きを経た後、 すみやかに対応いたします。
            </p>
          </li>
          <hr />
          <li class="p-question__item">
            <div class="p-question__textBox">
              <p class="p-question__text">
                海外からの申し込みできますか？
              </p>
              <span class="p-question__triger"></span>
            </div>
            <p class="p-question__text--hidden">
              大変申し訳ございませんが、現在、海外からの買取については対応しておりません。
            </p>
          </li>
          <hr />
        </ul>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
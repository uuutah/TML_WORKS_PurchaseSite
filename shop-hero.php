<section class="c-shopHero">
  <div class="c-shopHero__titleBackground">
    <div class="c-shopHero__titleBox">
      <?php if(is_home()){
        echo "<p class='c-shopHero__topText'>パソコン専門店ならではの<br class='c-shopHero__linefeedSub'>高額買取<br>壊れたパソコンも大丈夫!!</p>";
      } ?>
      <h2 class="c-shopHero__title">
        <?php if(is_home()) {
          echo "PC・ワークス";
        } elseif(is_post_type_archive("shop")) {
          echo "店舗一覧";
        } elseif(is_post_type_archive("blog")) {
          echo "ブログ";
        }elseif(is_post_type_archive("news")) {
          echo "お知らせ";
        }elseif(is_post_type_archive("revue")) {
          echo "お客様の声";
        } else {
          the_title();
        } ?>
      </h2>
      <p>
        <?php
          $custom_fields = nl2br(get_post_meta( $post->ID , 'subTitle' , true ));
          if(empty($custom_fields) === false){
            echo $custom_fields;
          } elseif(is_home()){
            echo "<p class='c-shopHero__subTitle'>店舗持ち込み•郵送買取可能!!<br>データは完全消去!!<br class='c-shopHero__linefeedSub'>証明書の発行もできます!</p>";
          }
        ?>
      </p>
    </div>
  </div>
  <div class="c-shopHero__img">
    <?php if(is_post_type_archive("shop")): ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop_top.jpg" alt="">
    <?php elseif(is_post_type_archive("blog")) : ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-top.jpg" alt="">
    <?php elseif(is_post_type_archive("news")) : ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news-top.jpg" alt="">
    <?php elseif(is_post_type_archive("revue")) : ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/revue-top.png" alt="">
    <?php elseif(is_home()): ?>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top.png" alt="">
    <?php elseif(is_singular("shop")): ?>
      <?php the_post_thumbnail('full', ['class' => 'c-shopHero__thumbnailImg'] ); ?>
    <?php else: ?>
      <?php the_post_thumbnail(); ?>
    <?php endif; ?>
  </div>
</section>
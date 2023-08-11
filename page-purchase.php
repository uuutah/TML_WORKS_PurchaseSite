<?php get_header(); ?>
<?php get_template_part('hero'); ?>
<section class="p-menu">
  <div class="l-container">
    <div class="c-titleBox">
      <div class="c-titleBox__wrapper">
        <h3 class="c-titleBox__title">買取メニュー</h3>
        <p class="c-titleBox__text">Menu</p>
      </div>
    </div>
    <p class="p-menu__topText">下記メニューよりお選びください</p>
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
      <li class="p-menu__item">
        <div class="p-menu__imgContainer">
          <img class="p-menu__image" src="<?php echo get_template_directory_uri(); ?>//assets/images/server.png" alt="" />
        </div>
        <p class="p-menu__text">サーバー&NAS</p>
      </li>
      <li class="p-menu__item">
        <div class="p-menu__imgContainer">
          <img class="p-menu__image" src="<?php echo get_template_directory_uri(); ?>//assets/images/hdd.jpg" alt="" />
        </div>
        <p class="p-menu__text">HDD（ハードディスク）</p>
      </li>
      <li class="p-menu__item">
        <div class="p-menu__imgContainer">
          <img class="p-menu__image" src="<?php echo get_template_directory_uri(); ?>//assets/images/business-phone.png" alt="" />
        </div>
        <p class="p-menu__text">ビジネスフォン</p>
      </li>
      <li class="p-menu__item">
        <div class="p-menu__imgContainer">
          <img class="p-menu__image" src="<?php echo get_template_directory_uri(); ?>//assets/images/other.jpg" alt="" />
        </div>
        <p class="p-menu__text">その他周辺機器</p>
      </li>
      <button class="p-topMenu__btn" onclick="location.href='<?php echo home_url('/purchase'); ?>'">一覧</button>
    </ul>
    <!-- <div class="p-menu__textBox">
      <p class="p-menu__text">上記選択肢またはメニューにない修理について</p>
      <p class="p-menu__text">
        修理メニューにない内容でも可能な範囲で修理させていただいております。お気軽にご相談ください^^<br>
        作業費用や納期についてご案内させていただきます。店舗一覧からお近くの店舗をご確認ください！
      </p>
    </div> -->
  </div>
</section>
<?php get_footer(); ?>
<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가



add_javascript('<script src="'.G5_THEME_JS_URL.'/unslider.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/swiper.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/outsideEvent.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/iscroll.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/iscroll.min.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_JS_URL.'/swiper.min.css">', 0);


?>



<!--메인이미지-->
<div class="main_bn_box swiper-container">
    <ul class="main_bn_ul swiper-wrapper">
        <li class="swiper-slide">
            <div class="bn_img">
                <img src="<?php echo G5_THEME_IMG_URL ?>/mobile/main/slide01.png" alt="메인베너" />
            </div>
        </li>
        <li class="swiper-slide">
            <div class="bn_img">
                <img src="<?php echo G5_THEME_IMG_URL ?>/mobile/main/slide02.png" alt="메인베너" />
            </div>
        </li>
        <li class="swiper-slide">
            <div class="bn_img">
                <img src="<?php echo G5_THEME_IMG_URL ?>/mobile/main/slide03.png" alt="메인베너" />
            </div>
        </li>
        <li class="swiper-slide">
            <div class="bn_img">
                <img src="<?php echo G5_THEME_IMG_URL ?>/mobile/main/slide04.png" alt="메인베너" />
            </div>
        </li>
    </ul>
<!-- Add Pagination -->
<div class="swiper-pagination"></div>
</div>

<script>
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true
});
</script>

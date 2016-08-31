<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_THEME_LIB_PATH.'/new_lastest.lib.php');

// add_javascript('<script src="'.G5_THEME_JS_URL.'/unslider.min.js"></script>', 10);
// add_javascript('<script src="'.G5_THEME_JS_URL.'/swiper.min.js"></script>', 10);
// add_javascript('<script src="'.G5_THEME_JS_URL.'/outsideEvent.js"></script>', 10);
// add_javascript('<script src="'.G5_THEME_JS_URL.'/iscroll.js"></script>', 10);
// add_javascript('<script src="'.G5_THEME_JS_URL.'/iscroll.min.js"></script>', 10);
// add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_JS_URL.'/swiper.min.css">', 0);


// 메인슬라이드와 퀵메뉴를 따로 빼서 인클루드
include_once(G5_THEME_MOBILE_PATH.'/inc/m_main_slider.php');
include_once(G5_THEME_MOBILE_PATH.'/inc/m_exam_btn.php');
include_once(G5_THEME_MOBILE_PATH.'/inc/m_quick_menu.php'); ?>

<!--} 메인배너 끝-->

    <?php
    echo latest("theme/ct_gallery", "ct_gallery", 2, 12);

    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    // $options = array(
    //         'thumb_width'    => 300, // 썸네일 width
    //         'thumb_height'   => 149,  // 썸네일 height
    //         'content_length' => 40   // 간단내용 길이
    // );
    // echo latest('theme/gallery', 'ct_gallery', 4, 25, 1, $options);
    ?>

    <div id ="footer_notice">
        <section id="sidx_lat">

            <?php echo latest("theme/m_center", "notice", 2, 25); ?>

        </section>
    </div>


<!-- 메인화면 최신글 끝 -->


<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>

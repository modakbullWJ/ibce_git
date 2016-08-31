<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


add_javascript('<script src="'.G5_THEME_JS_URL.'/unslider.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/swiper.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/outsideEvent.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/iscroll.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/iscroll.min.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_JS_URL.'/swiper.min.css">', 0);



// var_dump($device);
// exit;




?>


<header id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div class="to_content"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>

    <div id="hd_wrapper">

        <div id="logo">
            <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_IMG_URL ?>/mobile/main/logo.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>

<?php
// 사이드 메뉴를 따로 빼서 인클루드 wj 2016.08.17
 include_once(G5_THEME_MOBILE_PATH.'/inc/m_side_menu.php'); ?>
<!--
        <div id="hd_sch" class="hd_div">
            <h2>사이트 내 전체검색</h2>
            <form name="fsearchbox" action="<?php //echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" method="get">
            <input type="hidden" name="sfl" value="wr_subject||wr_content">
            <input type="hidden" name="sop" value="and">
            <input type="text" name="stx" id="sch_stx" placeholder=" 검색어(필수)" required class="required" maxlength="20">
            <input type="submit" value="검색" id="sch_submit">
            </form>

            <script>
            function fsearchbox_submit(f)
            {
                if (f.stx.value.length < 2) {
                    alert("검색어는 두글자 이상 입력하십시오.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                var cnt = 0;
                for (var i=0; i<f.stx.value.length; i++) {
                    if (f.stx.value.charAt(i) == ' ')
                        cnt++;
                }

                if (cnt > 1) {
                    alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                return true;
            }
            </script>
        </div>
        <ul id="hd_nb">
            <li><a href="">메뉴1</a></li>
            <li><a href="">메뉴2</a></li>
            <li><a href="">메뉴3</a></li>
            <li><a href="">메뉴4</a></li>
            <li><a href="">메뉴5</a></li>
        </ul>
    </div> -->



</header>



<hr>
<div id="wrapper">
    <div id="container">





       <!--  <?php// if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php //echo $g5['title'] ?></div><?php //} ?> -->
        <!-- <div id="text_size"> -->
            <!-- font_resize('엘리먼트id', '제거할 class', '추가할 class'); -->
            <!-- <button id="size_down" onclick="font_resize('container', 'ts_up ts_up2', '');"><img src="<?php // echo G5_URL; ?>/img/ts01.gif" alt="기본"></button>
            <button id="size_def" onclick="font_resize('container', 'ts_up ts_up2', 'ts_up');"><img src="<?php // echo G5_URL; ?>/img/ts02.gif" alt="크게"></button>
            <button id="size_up" onclick="font_resize('container', 'ts_up ts_up2', 'ts_up2');"><img src="<?php // echo G5_URL; ?>/img/ts03.gif" alt="더크게"></button>
        </div> -->

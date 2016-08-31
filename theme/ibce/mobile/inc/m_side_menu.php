<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
 <div id="btn_side">
            <button type="button" id="side_mn_btn"><a href="#"><span class="sound_only"> 메뉴 열기</span></a></button>
        </div>

        <div id="side_menu">
            <div class="side_close"><button type="button">닫기</button></div>
            <div class="side_wr add_side_wr">
                <aside id="isroll_wrap" class="side_inner_rel">
                    <div class="side_inner_abs">
                        <header class="side_hd">
                            <div id="aside">
                                <?php echo outlogin('theme/basic'); // 외부 로그인 ?>
                            </div>
                            <div class="shor_cut">
                                <ul>
                                    <li><a href="<?php echo G5_BBS_URL ?>/register.php" id="snb_join">JOIN [注册]</a></li>
                                    <!-- <li><a href="<?php //echo G5_BBS_URL ?>/current_connect.php" id="snb_cnt">접속자 <?php //echo connect('theme/basic'); // 현재 접속자수 ?></a></li> -->
                                    <li><a href="<?php echo G5_BBS_URL ?>/qalist.php" id="snb_new">1:1 문의</a></li>
                                <!--     <li><a href="<?php //echo G5_BBS_URL ?>/faq.php" id="snb_faq">FAQ</a></li> -->
                                </ul>
                            </div>
                        </header>
                        <nav class="side_menu">
                            <ul>
<?php
// $sql = " select *
//             from {$g5['menu_table']}
//             where me_mobile_use = '1'
//               and length(me_code) = '2'
//             order by me_order, me_id ";
// $result = sql_query($sql, false);

// for ($i=0; $row=sql_fetch_array($result); $i++) {
// ?>


                    <li class="mu_title">
                    <button type="button" class="sub_toggle">협회소개</button>
                        <ul class="sub_menu">
                            <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub1_1">인사말</a></li>
                            <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub1_2">조직도</a></li>
                            <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub1_3">협력단체</a></li>
                        </ul>
                     </li>

                     <li class="mu_title">
                       <button type="button" class="sub_toggle">자격증정보</button>
                       <ul class="sub_menu">
                         <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub2_1">민간등록자격증</a></li>
                         <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub2_2">자격기본법</a></li>
                         <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub2_3">민간자격제도</a></li>
                     </ul>
                    </li>

                    <li class="mu_title">
                     <button type="button" class="sub_toggle">자격시험</button>
                       <ul class="sub_menu">
                     <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub3_1">자격증 안내 [资格证]</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub3_2">시험 안내</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=schedule">시험일정 안내 [考试日程] </a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=application">시험 접수 [报名] </a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=reissue">재발급 신청 / Reissue</a></li>
                        </ul>
                    </li>


                    <li class="mu_title">
                      <button type="button" class="sub_toggle">자료실</button>
                      <ul class="sub_menu">
                        <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=form_lib">서식 자료실</a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=info_lib">정보 자료실</a></li>
                      </ul>
                    </li>

                    <li class="mu_title">
                         <button type="button" class="sub_toggle">세미나정보 [研讨会]</button>
                      <ul class="sub_menu">
                          <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=seminar">세미나정보 [研讨会]</a></li>
                      </ul>
                    </li>

                    <li class="mu_title">
                     <button type="button" class="sub_toggle">고객센터</button>
                     <ul class="sub_menu">
                         <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=notice">공지사항</a></li>
                         <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=ct_gallery">갤러리</a></li>
                         <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub6_3">강사모집</a></li>
                         <li><a href="<?php echo G5_BBS_URL ?>/qalist.php">Q&A</a></li>
                     </ul>
                    </li>

                     <li class="mu_title">

                    <button type="button" class="sub_toggle">    <?php if($is_admin){ ?> 시험 관리하기 <?php } ?>
                    <?php if($is_guest){ ?> My Class<?php } ?>
                    <?php if($member['mb_level'] == 2) { ?>My class <?php } ?>
                    <?php if($member['mb_level'] == 3) { ?> My Class
                    <?php } ?>
                    <?php if($member['mb_level'] == 4) { ?> My Class
                    <?php } ?>
                    <?php if($member['mb_level'] == 5) { ?>My Class
                    <?php } ?></button>
                    <ul class="sub_menu">
                        <li>
                      <?php if($is_admin){ ?>
                         <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_1"> 시험 관리</a></li>
                         <li> <a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_2">결과조회 [查询] </a></li>
                        <?php } ?>
                        <?php if($member['mb_level'] == 2) { ?><li><a id="level_2" href="#">시험응시 [考试] </a></li>
                        <li><a id="level_2_r" href="#">결과조회 [查询]</a></li>
                         <?php } ?>
                         <?php if($member['mb_level'] == 3) { ?><li><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_2&wr_id=1">시험응시 [考试] C-2 Class</a></li>
                         <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_2">결과조회 [查询] </a></li>
                      <?php } ?>
                      <?php if($member['mb_level'] == 4 ) { ?> <li><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_1&wr_id=2">시험응시 [考试] C-1 Class</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_2">결과조회 [查询] </a></li>
                      <?php } ?>
                      <?php if($member['mb_level'] == 5 ) { ?><li> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=master&wr_id=1">시험응시 [考试] Master Class</a></li>
                      <li>  <a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_2">결과조회 [查询] </a></li>
                      <?php } ?>
                        <?php if($is_guest){ ?>
                         <li><a href="<?php echo G5_BBS_URL ?>/login.php">시험 응시 [考试]</a></li>
                         <li><a href="<?php echo G5_BBS_URL ?>/login.php">결과 조회</a></li>
                        <?php } ?>
                      </li>
                    </ul>


</li>
<?php
// $submenus = '';

// $sql2 = " select *
//             from {$g5['menu_table']}
//             where me_mobile_use = '1'
//               and length(me_code) = '4'
//               and substring(me_code, 1, 2) = '{$row['me_code']}'
//             order by me_order, me_id ";
// $result2 = sql_query($sql2);

// for ($k=0; $row2=sql_fetch_array($result2); $k++) {
//     if($k == 0) {
//         $submenus .= '<button type="button" class="sub_toggle">하위메뉴</button>'.PHP_EOL;
//         $submenus .= '<ul class="sub_menu">'.PHP_EOL;
//     }

//     $submenus .= '<li><a href="'.$row2['me_link'].'" target="_'.$row2['me_target'].'" class="gnb_2da">'.$row2['me_name'].'</a></li>'.PHP_EOL;
// }

// if($k > 0)
//     $submenus .= '</ul>'.PHP_EOL;

// if($submenus)
//     $gnb_class = 'sd_cl';
// else
//     $gnb_class = 'sd_cl';
?>
<!--   <a href="<?php //echo $row['me_link']; ?>" target="_<?php //echo $row['me_target']; ?>" class="<?php //echo $gnb_class; ?>"><?php //echo $row['me_name'] ?></a> -->
<?php// //echo $submenus; ?>
<!-- </li> -->
<?php
//    }

//   if ($i == 0) {  ?>
<!--   <li id="side_menu_empty">메뉴 준비 중입니다.<?php// if ($is_admin) { ?> <br><a href="<?php //echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하세요.<?php //} ?></li> -->
<?php// } ?>

                            </ul>
                        </nav>
                    </div>
                </aside>
            </div>
        </div>


<script>
//사이드 메뉴
var $btn_side = $("#btn_side"),
    $side_menu = $("#side_menu"),
    $side_wr = $("#side_menu .side_wr"),
    side_obj = { my : {} },
    is_trans_sup = '';

$side_wr.css({"right":"-280px"});   //초기화

side_obj.destory = function(){
    if( !is_trans_sup ) return;
    side_obj.my.destroy();
}
side_obj.refresh = function(){
    if( !is_trans_sup ) return;
    side_obj.my.refresh();
}

function iscroll_loaded() {
    if( is_trans_sup ){
        $side_wr.removeClass("add_side_wr");
        side_obj.my = new IScroll('#isroll_wrap', { bounceTime : 400, mouseWheel: true, click: true, hScroll:false });
    }
}

$btn_side.on("click", function() {
    if (!$(this).data('toggle_enable')) {
        $(this).data('toggle_enable', true);
        $side_menu.show();
        $side_wr.animate({"right": "0px"}, 200, function(){
            iscroll_loaded();
            height_update($(this));
        });
    } else {
        remove_side_data();
    }
});

$(document).on("click", ".side_close", function(e){
    if ( !$(e.target).closest("#btn_side").length && $btn_side.data('toggle_enable') ){
        remove_side_data();
    }
})

function height_update(target){
    var side_wr_height = target.height();
    $("body").css({"min-height":side_wr_height+"px"}).addClass("over_hidden");
}

function remove_side_data(){
    $btn_side.data('toggle_enable', false);
    $side_wr.animate({"right": "-280px"}, 160, function(){
        $side_menu.hide();
        $("body").removeClass("over_hidden").css({"min-height":""});
    });
}

$("#side_menu .side_wr").on("clickoutside", function(e){
    //if ( !$(e.target).is('#btn_side *, #btn_side') ){
    if ( !$(e.target).closest("#btn_side").length && $btn_side.data('toggle_enable') ){
        remove_side_data();
    }
});

// 서브메뉴 열기
$(function (){
    $(".sub_toggle").on("click", function() {
        var $this = $(this);
        $sub_ul = $(this).closest("li").children("ul.sub_menu");

        if($sub_ul.size() > 0) {
            var txt = $this.text();

            if($sub_ul.is(":visible")) {
                txt = txt.replace(/닫기$/, "열기");
                $this
                    .removeClass("sd_cl")
                    .text(txt);
            } else {
                txt = txt.replace(/열기$/, "닫기");
                $this
                    .addClass("sd_cl")
                    .text(txt);
            }

            $sub_ul.toggle();
        }
    });


    //  $(".mu_title").on("click", function() {
    //     var $this = $('.sub_toggle');
    //     $sub_ul = $(this).closest("li").children("ul.sub_menu");

    //     if($sub_ul.size() > 0) {
    //         var txt = $this.text();

    //         if($sub_ul.is(":visible")) {
    //             txt = txt.replace(/닫기$/, "열기");
    //             $this
    //                 .removeClass("sd_cl")
    //                 .text(txt);
    //         } else {
    //             txt = txt.replace(/열기$/, "닫기");
    //             $this
    //                 .addClass("sd_cl")
    //                 .text(txt);
    //         }

    //         $sub_ul.toggle();
    //     }
    // });
});




</script>

<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
  include_once(G5_THEME_MOBILE_PATH.'/head.php');
  return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<div id="main_wrap">

  <div id="header" class="header_menu">
    <div class="top">
      <ul class="gnb">
              <?php if ($is_member) {  ?>
            <?php if ($is_admin) {  ?>
            <li><a href="<?php echo G5_ADMIN_URL ?>"><b>관리자</b></a></li>
            <?php }  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정[个人信息修改]</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃[退出]</a></li>
            <?php } else {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php">JOIN 注册</a></li>
             <li class=""><a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank">FIND ID/PW</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/login.php">LOGIN 登录</a></li>
            <?php }  ?>


       <!--  <li class=""><a href="#">회원가입</a></li>
        <li class=""><a href="#">아이디/비밀번호찾기</a></li>
        <li class=""><a href="#">로그인</a></li> -->
      </ul>
      <h1 class="logo"><a href="<?php echo G5_URL ?>/index.php"><img src="<?php echo G5_URL ?>/theme/ibce/img/logo.png" alt="로고" /></a></h1>
    </div>

    <div class="lnb">


      <ul id="mainnav">

       <?php
       // $sql = " select *
       // from {$g5['menu_table']}
       // where me_use = '1'
       // and length(me_code) = '2'
       // order by me_order, me_id ";
       // $result = sql_query($sql, false);
       //      $gnb_zindex = 999; // gnb_1dli z-index 값 설정용

            // for ($i=0; $row=sql_fetch_array($result); $i++) {
              // ?>
              <!-- <li class="" style="z-index:<?php //echo $gnb_zindex--; ?>">
                <a href="<?php //echo $row['me_link']; ?>" target="_<?php// echo $row['me_target']; ?>" class=""><?php// echo $row['me_name'] ?></a>
                <?php
                // $sql2 = " select *
                // from {$g5['menu_table']}
                // where me_use = '1'
                // and length(me_code) = '4'
                // and substring(me_code, 1, 2) = '{$row['me_code']}'
                // order by me_order, me_id ";
                // $result2 = sql_query($sql2);

                // for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                //   if($k == 0)
                //     echo '<ul class="gnb_2dul">'.PHP_EOL;
                //   ?>
                  <li class=""><a href="<?php// echo $row2['me_link']; ?>" target="_<?php// echo $row2['me_target']; ?>" class=""><?php //echo $row2['me_name'] ?></a></li>
                  <?php
               // }

                //if($k > 0)
                //  echo '</ul>'.PHP_EOL;
                ?>
              </li>
              <?php
           // }

          //  if ($i == 0) {  ?>
              <li id="gnb_empty">메뉴 준비 중입니다.<?php// if ($is_admin) { ?> <br><a href="<?php// echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php //} ?></li>
              <?php// } ?>
               -->
          <li class=""><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub1_1">협회소개</a></li>
                    <li class=""><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub2_1">자격증정보</a></li>
                    <li class=""><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub3_1">자격시험</a></li>
                    <li class=""><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=form_lib">자료실</a></li>
                    <li class=""><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=seminar">세미나 정보</a></li>
                    <li class=""><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=notice">고객센터</a></li>
                    <li class="">
                    <?php if($is_admin){ ?> <a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_1"> 시험 관리하기</a> <?php } ?>
                    <?php if($is_guest){ ?> <a href="<?php echo G5_BBS_URL ?>/login.php"> My Class</a> <?php } ?>
                    <?php if($member['mb_level'] == 2) { ?> <a href="#">My class</a> <?php } ?>
                    <?php if($member['mb_level'] == 3) { ?> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_2&wr_id=1">My Class</a>
                    <?php } ?>
                    <?php if($member['mb_level'] == 4) { ?> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_1&wr_id=2">My Class</a>
                    <?php } ?>
                    <?php if($member['mb_level'] == 5) { ?> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=master&wr_id=1">My Class</a>
                    <?php } ?>

                    </li>
                  </ul>

                  <!--서브메뉴-->
                  <div class="subnav_hover">
				  <img src="<?php echo G5_URL ?>/theme/ibce/img/watermark.png" alt="" class="subnav_watermark"/>

                   <div class="subnav_wrap">
                     <ul class="subnav_list ">
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub1_1">인사말</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub1_2">조직도</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub1_3">협력단체</a></li>
                    </ul>
                    <ul class="subnav_list ">
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub2_1">민간등록자격증</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub2_2">자격기본법</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub2_3">민간자격제도</a></li>
                    </ul>
                    <ul class="subnav_list ">
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub3_1">자격증 안내</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub3_2">시험 안내</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=schedule">시험일정 안내<br>[Schedule]</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=application">시험 접수<br>[报名]</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=reissue">재발급 신청<br>[Reissue]</a></li>

                    </ul>
                    <ul class="subnav_list ">
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=form_lib">서식 자료실</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=info_lib">정보 자료실</a></li>
                    </ul>
                    <ul class="subnav_list ">
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=seminar">세미나 정보</a></li>

                    </ul>
                    <ul class="subnav_list ">
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=notice">공지사항</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=ct_gallery">갤러리</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub6_3">강사모집</a></li>
                      <li><a href="<?php echo G5_BBS_URL ?>/qalist.php">Q&A</a></li>
                    </ul>
                    <ul class="subnav_list ">
                    <li>
                      <?php if($is_admin){ ?>
                       <a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_1"> 시험 관리</a>
                        <a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_2">결과조회<br>[Result] </a>
                        <?php } ?>
                        <?php if($member['mb_level'] == 2) { ?> <a id="level_2" href="#">시험응시<br>[开始考试]</a>
                                                                <a id="level_2_r" href="#">결과조회<br>[查询]</a>
                         <?php } ?>

                      <?php if($member['mb_level'] == 3) { ?> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_2&wr_id=1">开始考试<br>[C-2 Class]</a>
                       <a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_2">결과조회<br>[查询] </a>
                      <?php } ?>
                      <?php if($member['mb_level'] == 4 ) { ?> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_1&wr_id=2">开始考试<br>[C-1 Class]</a>
                       <a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_2">결과조회<br>[查询] </a>
                      <?php } ?>
                      <?php if($member['mb_level'] == 5 ) { ?> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=master&wr_id=1">开始考试<br>[Master Class]</a>
                       <a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_2">결과조회<br>[查询] </a>
                      <?php } ?>
                        <?php if($is_guest){ ?>
                       <a href="<?php echo G5_BBS_URL ?>/login.php">시험 응시</a>
                        <a href="<?php echo G5_BBS_URL ?>/login.php">시험 조회</a>
                        <?php } ?>

                      </li>
                    </ul>
                  </div>
                </div>
                <!--서브메뉴끝-->

              </div><!--/.lnb-->
            </div><!--/header-->



<script>


    $(document).ready(function(){

$('#level_2').mouseover(function(){
  $('#level_2').empty();
  $('#level_2').append('Go to the application');
  $('#level_2').attr( 'href','http://ibce.co.kr/bbs/board.php?bo_table=application');
}).mouseout(function(){
  $('#level_2').empty();
 $('#level_2').append('시험응시<br> Take an Exam');

});
$('#level_2_r').mouseover(function(){
  $('#level_2_r').empty();
  $('#level_2_r').append('After Exam');

}).mouseout(function(){
  $('#level_2_r').empty();
 $('#level_2_r').append('결과조회<br>[Result]');

});





var jbOffset = $( '#header' ).offset();
$( window ).scroll( function() {
if ( $( document ).scrollTop() > jbOffset.top ) {
$( '#header' ).attr('id', 'header_sticked' );
$('.logo').addClass('logo_sticked');

$('.eventSlide_right_tab').addClass('eventSlide_right_tab_sticked');
}
else {
$( '#header_sticked' ).attr('id', 'header' );

$('.logo').removeClass('logo_sticked');

$('.eventSlide_right_tab').removeClass('eventSlide_right_tab_sticked');

}



 });

       });

</script>

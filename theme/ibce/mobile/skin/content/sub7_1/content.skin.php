<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if ($is_guest)
  alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');

// if($member[mb_level] < 3 ){
//   alert("접근 권한이 없습니다.");
//   location.replace (G5_URL.'/index.php');
// }
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
include_once(G5_THEME_MOBILE_PATH.'/inc/sub/m_sub_navi.php');

?>

<div class="contents_area">

  <h3 id="sub7_1_h3">관리자 시험관리 페이지<span id="sub7_1_span">&nbsp;l 문제관리버튼을 클릭하세요.</span></h3>

  <?php if($is_admin){ ?>
    <div id="sub7_1">

<div id="sub7_1_in">


      <ul id = "sub7_ul_1">
        <li class="sub7_1_li_1"><a  href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=master">Master 문제 관리</a></li>
        <li class="sub7_1_li_2"><a  href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_1">C-1   문제 관리</a></li>
        <li class="sub7_1_li_2"><a  href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_2">C-2   문제 관리</a></li>
      </ul>

      <ul  id = "sub7_ul_2">


       <li class="sub7_1_li_1">  <a id="master_link" onclick="win_answer_master();"> Master 응시 결과확인</a></li>
       <li class="sub7_1_li_2">  <a id="C1_link" onclick="win_answer_c1();"> C-1 응시 결과 확인</a></li>
       <li class="sub7_1_li_2">  <a id="C2_link" onclick="win_answer_c2();"> C-2 응시 결과 확인</a></li>

     </ul>
   </div>


</div>
   <?php }?>





 </div>
</div>





<script>


  function win_answer_master() {
    an = window.open("<?php echo G5_URL ?>/plugin/exam/answer.php?bo_table=master&wr_id=1",
      "answer", "width=1300,height=950,scrollbars=yes");
    an.focus();
  }

  function win_answer_c1() {
    an = window.open("<?php echo G5_URL ?>/plugin/exam/answer.php?bo_table=c_1&wr_id=2",
      "answer", "width=1300,height=950,scrollbars=yes");
    an.focus();
  }

  function win_answer_c2() {
    an = window.open("<?php echo G5_URL ?>/plugin/exam/answer.php?bo_table=c_2&wr_id=1",
      "answer", "width=1300,height=950,scrollbars=yes");
    an.focus();
  }


</script>


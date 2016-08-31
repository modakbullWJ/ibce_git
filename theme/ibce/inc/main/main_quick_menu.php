    <div id="quick_menu">
            <ul>
                <li>
                  <a href="http://ibce.co.kr/bbs/content.php?co_id=sub2_1">
                      <img src="<?php echo G5_URL ?>/theme/ibce/img/icon01.png" alt="자격증안내" />
                      <h4>자격증 안내 [资格证]</h4>
                  </a>
                </li>
                <li>
                  <a href="http://ibce.co.kr/bbs/board.php?bo_table=schedule">
                      <img src="<?php echo G5_URL ?>/theme/ibce/img/icon02.png" alt="시험일정안내" />
                      <h4>시험일정 안내 [考试日程]</h4>
                  </a>
                </li>
                <li>
                  <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=application">
                      <img src="<?php echo G5_URL ?>/theme/ibce/img/icon03.png" alt="시험접수" />
                      <h4>시험 접수 [报名]</h4>
                  </a>
                </li>
                <li>
                  <a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_2">
                      <img src="<?php echo G5_URL ?>/theme/ibce/img/icon04.png" alt="자격증조회" />
                      <h4>자격증 조회 [查询]</h4>
                  </a>
                </li>
                <li>
                  <a href="http://ibce.co.kr/bbs/board.php?bo_table=seminar">
                      <img src="<?php echo G5_URL ?>/theme/ibce/img/icon05.png" alt="커뮤니티" />
                      <h4>세미나 정보 [研讨会]</h4>
                  </a>
                </li>
                <li>
                 <?php if($is_admin){ ?>
                  <a id="admin_click" href="#">
                   <img src="<?php echo G5_URL ?>/theme/ibce/img/icon06.png" alt="시험응시" />
                   <h4>시험 응시 [ 考试 ]</h4></a>
                   <?php } ?>
                   <?php if($member['mb_level'] == 2) { ?>
                    <a id="level2" href="<?php echo G5_BBS_URL ?>/board.php?bo_table=application">
                     <img src="<?php echo G5_URL ?>/theme/ibce/img/icon06.png" alt="시험응시" />
                     <h4>시험 응시 [ 考试 ]</h4></a>
                   <?php } ?>

                   <?php if($member['mb_level'] == 3) { ?> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_2&wr_id=1">  <img src="<?php echo G5_URL ?>/theme/ibce/img/icon06.png" alt="시험응시" />
                   <h4>시험 응시 [ 考试 ]</h4></a>
                   <?php } ?>
                   <?php if($member['mb_level'] == 4 ) { ?> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_1&wr_id=2">  <img src="<?php echo G5_URL ?>/theme/ibce/img/icon06.png" alt="시험응시" />
                   <h4>시험 응시 [ 考试 ]</h4></a>
                   <?php } ?>
                   <?php if($member['mb_level'] == 5 ) { ?> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=master&wr_id=1">  <img src="<?php echo G5_URL ?>/theme/ibce/img/icon06.png" alt="시험응시" />
                   <h4>시험 응시 [ 考试 ]</h4></a>
                   <?php } ?>
                   <?php if($is_guest){ ?>
                    <a href="<?php echo G5_BBS_URL; ?>/login.php">  <img src="<?php echo G5_URL ?>/theme/ibce/img/icon06.png" alt="시험응시" />
                      <h4>시험 응시 [ 考试 ]</h4></a>
                      <?php } ?>
                    </li>
            </ul>
        </div>

<script>

$(document).ready(function(){

$('#admin_click').click(function(){

  alert('관리자 접속 중 입니다.');

});

$('#admin_click').hover(function() {


}, function() {

});



$('#level2').click(function(){


  alert('시험 접수를 먼저 하셔야 합니다. You have to aplly for an exam first.')

});



});


</script>

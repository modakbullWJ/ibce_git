<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>


<div id="m_exam_btn">
  <?php if($is_admin){ ?> <h1><a href="<?php echo G5_BBS_URL ?>/content.php?co_id=sub7_1"> 시험 관리</a></h1> <?php } ?>

  <?php if($is_guest){ ?> <h1 > <a id="guest_btn" href="<?php echo G5_BBS_URL ?>/login.php">시험 응시 [ 考试 ]</a></h1> <?php } ?>

  <?php if($member['mb_level'] == 3 ) { ?><h1><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_2&wr_id=1">시험 응시 [ 考试 ] [C-2 Class]</a></h1>
  <?php }?>

  <?php if($member['mb_level'] == 4) { ?><h1><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=c_1&wr_id=2">시험 응시 [ 考试 ] [C-1 Class]</a></h1><?php } ?>

  <?php if($member['mb_level'] == 5) { ?><h1> <a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=master&wr_id=1">시험 응시 [ 考试 ] [Master Class]</a></h1>
  <?php } ?>




</div>

<script>


  $(document).ready(function(){

$('#guest_btn').click(function(){

  alert('시험 신청 후에 응시 가능합니다. You can approch after request.');

})


  });

</script>


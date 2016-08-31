<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// include_once "./_common.php";
include_once("../../../../../common.php");
include_once G5_LIB_PATH."/latest.lib.php";

$g5[title] = "일정보기";
include_once G5_PATH."/head.sub.php";

 if ($member[mb_level] < $board[bo_read_level]) {
      alert('비정상적인 접근이군요.\\n\\n정상적인 경로로 접근해주세요.','javascript:window.close()');
	  exit;
 }

?>
<link rel="stylesheet" href="./style.css" type="text/css">
<style>
body {
	overflow-x: hidden;
	overflow-y: hidden;
}
</style>

<div style="width:100%; height:40px; line-height:40px; background:url(<?php echo $latest_skin_url; ?>/img/visit_bg.gif); text-align:center">
    <strong>일정</strong>
</div>

<div style="height:10px;"></div>

<?php
for ($i=0; $i<count($list); $i++) {
	$from_date = str_replace("http://","",$list[$i][wr_1]);
	$to_date = str_replace("http://","",$list[$i][wr_2]);
	$from_date = substr($from_date,0,4)."년 ".sprintf("%2d",substr($from_date,4,2))."월 ".sprintf("%2d",substr($from_date,6,2))."일";
	$to_date   = substr($to_date,0,4)."년 ".sprintf("%2d",substr($to_date,4,2))."월 ".sprintf("%2d",substr($to_date,6,2))."일";
?>
<div style="borer-top:solid 1px #eeeeee; borer-bottom:solid 1px #dddddd; background:#efefde; line-height:25px; padding:7px 0 5px 0; font-weight:bold; color:#000000;">
	&nbsp;<img src="<?php echo $board_skin_url; ?>/img/cal.gif" align="absMiddle" alt=""> <?php echo $list[$i][wr_subject]; ?>
</div>

<div style="height:28px; line-height:28px; padding-left:7px;">
	일 정 : <?php echo $from_date; ?> <?php if($from_date != $to_date) echo"~ $to_date";?>
</div>

<div style="border-top:solid 1px #dddddd; padding:9px;">
	<span class="content"><?php echo $list[$i][content]; ?></span>
	<!-- 테러 태그 방지용 -->
	</xml></xmp><a href=""></a><a href=''></a>
</div>

<?php
}
?>

<div style="width:100%; height:30px; border-top:1px solid #f6f6f6; padding:10px 0 10px 0; text-align:center">
	<a href="#" class="btn_admin" onclick="window.close()">닫 기</a>
</div>
<?php
include_once G5_PATH."/tail.sub.php";
?>

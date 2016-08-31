<?php
//include_once("../../../common.php");  // 기본 skin
include_once("../../../../../common.php");  // Theme skin

if ($member[mb_level] < $board[bo_read_level]) {  
  alert('글을 읽을 권한이 없습니다.','javascript:window.close()');
  exit;
}

$latest_dir = $_GET["latest_dir"];
$bo_table = $_GET["bo_table"];
$year  = $_GET["year"];
$month = $_GET["month"];
$day   = $_GET["day"];


$g4[title] = "일정보기";

$tmp_write_table = $g5['write_prefix'].$bo_table; // 게시판 테이블 전체이름
// 0~9 월까지를 01 ~ 09 로 만들어 준다. 
if((int)$day <= 9){ 
  $day = "0".$day; 
} 
if((int)$month <= 9){ 
  $month = "0".$month; 
} 
$thedate = $year.$month.$day;
$latest_skin_url = G5_THEME_URL."/skin/latest/".$latest_dir."";
$latest_skin_path = G5_THEME_PATH."/skin/latest/".$latest_dir."";
//echo "latest_skin_url = ".$latest_skin_url ."<br>";
//echo "latest_skin_path = ".$latest_skin_path ."<br>";

$list = array();
$sql = " select * from ".$tmp_write_table." where bo_table = '".$bo_table."'";
$board = sql_fetch($sql);

$sql = " select * from ".$tmp_write_table." where wr_comment > -1 AND (wr_1 <= ".$thedate." AND wr_2 >= ".$thedate.") order by wr_id desc limit 0, 10";
//explain($sql);
$result = sql_query($sql);
for ($i=0; $row = sql_fetch_array($result); $i++) {
    $list[$i] = get_list($row, $board, $latest_skin_url, 70);

	$html = 0;
	if (strstr($list[$i][wr_option], "html1"))
		$html = 1;
	else if (strstr($list[$i][wr_option], "html2"))
		$html = 2;

	$list[$i][content] = conv_content($list[$i][wr_content], $html);
	
}


include_once $latest_skin_path."/pop.skin.php";

?>
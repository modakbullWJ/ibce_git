<?php
include_once('./_common.php');

$sql = " update g5_member set mb_10 = '".$_POST['field']."' where mb_id = '".$_POST['mb_id']."' ";

sql_query($sql);

$mb_id2 = $_POST['mb_id'];

$sql2 = "select mb_10 from g5_member where mb_id = '".$mb_id2."' ";

$row = sql_fetch($sql2);

// 불합격 횟수 카운트 시 실제 횟수와 db에 넣은 숫자의 설계를 직관적으로 안해놔서... 어쩔수없이 다시 계산... wj
// ex) 한번 불합격일때 db에는 2, 두번째 불합격일때 3, 최종 불합격 막는 숫자가 4로 되어 있어서... ㅜㅜ 까먹지 말자 wj
$res_r = "";

if($row['mb_10'] == ''){

  $res_r = '0';

} if($row['mb_10'] == '2'){

$res_r = '1';

}  if($row['mb_10'] == '3'){

  $res_r = '2';
}

if($row['mb_10'] == '4'){

  $res_r = '3';
}

echo $res_r;




?>

<?php
include_once('./_common.php');

$sql = " update g5_member set mb_8 = '".$_POST['field']."' where mb_id = '".$_POST['mb_id']."' ";

sql_query($sql);

$mb_id2 = $_POST['mb_id'];

$sql2 = "select mb_8 from g5_member where mb_id = '".$mb_id2."' ";

$row = sql_fetch($sql2);


if($row['mb_8']) {
    echo $row['mb_8'];
} else {
  echo '';
}





?>

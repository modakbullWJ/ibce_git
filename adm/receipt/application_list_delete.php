<?php
$sub_menu = "400100";
include_once('./_common.php');

check_demo();

auth_check($auth[$sub_menu], 'd');

check_token();

$count = count($_POST['chk']);

if(!$count)
    alert('삭제할 목록을 1개이상 선택해 주세요.');

for($i=0; $i<$count; $i++) {
    $id = $_POST['chk'][$i];

    $sql = " delete from g5_write_application where wr_id = '$id' ";
    sql_query($sql);
}



goto_url('./application_list.php?'.$qstr);
?>

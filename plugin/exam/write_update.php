<?php
/**
 * 시험문제 (Exam for Gnuboard4)
 *
 * Copyright (c) 2013 Choi Jae-Young <www.miwit.com>
 *
 * 저작권 안내
 * - 저작권자는 이 프로그램을 사용하므로서 발생하는 모든 문제에 대하여 책임을 지지 않습니다.
 * - 이 프로그램을 어떠한 형태로든 재배포 및 공개하는 것을 허락하지 않습니다.
 * - 이 저작권 표시사항을 저작권자를 제외한 그 누구도 수정할 수 없습니다.
 */

include_once("_common.php");
include_once("_config.php");
include_once("_upgrade.php");

if ($mw_basic['cf_exam_level'] > $member['mb_level'])
    alert("시험문제 등록 권한이 없습니다.");

$ex_begin = '';
if ($ex_begin_date[0] and !$ex_unlimited)
    $ex_begin = "{$ex_begin_date} {$ex_begin_hour}:{$ex_begin_minute}:00";

$ex_limit = '';
if ($ex_limit_date[0] and !$ex_unlimited)
    $ex_limit = "{$ex_limit_date} {$ex_limit_hour}:{$ex_limit_minute}:59";

$sql_common = "   bo_table = '{$bo_table}' ";
$sql_common.= " , wr_id = '{$wr_id}' ";
$sql_common.= " , ex_title = '{$ex_title}' ";
$sql_common.= " , ex_level = '{$ex_level}' ";
$sql_common.= " , ex_level_scale = '{$ex_level_scale}' ";
$sql_common.= " , ex_begin = '{$ex_begin}' ";
$sql_common.= " , ex_limit = '{$ex_limit}' ";
$sql_common.= " , ex_limit_number = '{$ex_limit_number}' ";
$sql_common.= " , ex_minimum = '{$ex_minimum}' ";
$sql_common.= " , ex_full_point = '{$ex_full_point}' ";
$sql_common.= " , ex_point = '{$ex_point}' ";
$sql_common.= " , ex_retake = '{$ex_retake}' ";
$sql_common.= " , ex_datetime = '{$g4['time_ymdhis']}' ";

if ($ex_id) {
    $sql = " update {$mw_exam['info_table']} set {$sql_common} ";

    if ($wr_id)
        $sql .= " where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' and mb_id = '{$write['mb_id']}' ";
    else
        $sql .= " where bo_table = '{$bo_table}' and ex_id = '{$ex_id}' and mb_id = '{$member['mb_id']}' ";

    sql_query($sql);
}
else {
    sql_query(" insert into {$mw_exam['info_table']} set {$sql_common}, mb_id = '{$member['mb_id']}' ");
    $ex_id = sql_insert_id();
}

sql_query(" delete from {$mw_exam['question_table']} where ex_id = '{$ex_id}' ");

for ($i=0, $m=count($qn_question); $i<$m; ++$i) {
    $qn_num = $i+1;
    $qn_question[$i] = trim($qn_question[$i]);
    if (!$qn_question[$i]) continue;
    $sql = " insert into {$mw_exam['question_table']} set ";
    $sql.= "  ex_id = '{$ex_id}' ";
    $sql.= " ,qn_num = '{$qn_num}' ";
    $sql.= " ,qn_question = '{$qn_question[$i]}'";
    $sql.= " ,qn_right_answer = '{$qn_right_answer[$i]}'";
    $sql.= " ,qn_score = '{$qn_score[$i]}'";
    sql_query($sql);
}

?>
<script>
if (opener.fwrite != undefined)
    opener.fwrite.ex_id.value = "<?php echo $ex_id?>";

alert("입력되었습니다.");
self.close();
</script>


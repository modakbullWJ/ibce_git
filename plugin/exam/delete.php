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

if (!$bo_table)
    die("bo_table 을 입력해주세요.");

$sql_where = " where bo_table = '{$bo_table}' ";
if ($wr_id)
    $sql_where .= " and wr_id = '{$wr_id}' and mb_id = '{$write['mb_id']}' "; // 등록된 데이터 수정
else
    $sql_where .= " and ex_id = '{$ex_id}' and mb_id = '{$member['mb_id']}' "; // 임시 데이터 수정

$row = sql_fetch(" select ex_id from {$mw_exam['info_table']} $sql_where ");
if (!$row)
    die("등록된 시험문제가 없습니다.");

sql_query(" delete from {$mw_exam['info_table']} $sql_where ");
sql_query(" delete from {$mw_exam['question_table']} where ex_id = '{$row['ex_id']}' ");
sql_query(" delete from {$mw_exam['answer_table']} where ex_id = '{$row['ex_id']}' ");

echo "시험문제를 삭제했습니다.";
exit;


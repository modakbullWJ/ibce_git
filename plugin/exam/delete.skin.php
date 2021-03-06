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

if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include(dirname(__FILE__)."/_config.php");

$sql = " select * from {$mw_exam['info_table']} where bo_table = '{$board['bo_table']}' and wr_id = '{$write['wr_id']}' ";
$exam = sql_fetch($sql);
if ($exam) {
    sql_query(" delete from {$mw_exam['question_table']} where ex_id = '{$exam['ex_id']}' ");
    sql_query(" delete from {$mw_exam['answer_table']} where ex_id = '{$exam['ex_id']}' ");
    sql_query(" delete from {$mw_exam['info_table']} where ex_id = '{$exam['ex_id']}' ");
}


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

if (!$is_member)
    alert("로그인 후 이용해주세요");

$exam = sql_fetch(" select * from {$mw_exam['info_table']} where ex_id = '{$ex_id}' ");
if (!$exam)
    alert("시험문제가 존재하지 않습니다.");

if ($write['mb_id'] != $member['mb_id'] and !$is_admin)
    alert("삭제할 권한이 없습니다.");

sql_query(" delete from {$mw_exam['answer_table']} where ex_id = '{$ex_id}' and mb_id = '{$mb_id}' ");

alert("삭제했습니다.",
    "answer.php?bo_table={$exam['bo_table']}&wr_id={$exam['wr_id']}&sfl={$sfl}&stx={$stx}&page={$page}");


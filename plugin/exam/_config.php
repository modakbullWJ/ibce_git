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

$mw_exam = array();
$mw_exam['table_prefix']    = $g4['table_prefix']       .'mw_exam_';
$mw_exam['info_table']      = $mw_exam['table_prefix']  .'info';
$mw_exam['question_table']  = $mw_exam['table_prefix']  .'question';
$mw_exam['answer_table']    = $mw_exam['table_prefix']  .'answer';
$mw_exam['path']            = $g4['path']               .'/plugin/exam';

$skin_lib_path = "$board_skin_path/mw.lib/mw.skin.basic.lib.php";
if (file_exists($skin_lib_path)) include_once($skin_lib_path);

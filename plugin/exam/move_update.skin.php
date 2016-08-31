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

if ($sw == 'copy')
{
    $sql = " select * from {$mw_exam['info_table']} where bo_table = '{$board['bo_table']}' and wr_id = '{$row2['wr_id']}' ";
    $exam = sql_fetch($sql);

    $list = array();

    $qry = sql_query(" desc {$mw_exam['info_table']} ");
    while ($row = sql_fetch_array($qry)) {
        if ($row['Field'] == "bo_table") continue;
        if ($row['Field'] == "wr_id") continue;
        if ($row['Field'] == "ex_id") continue;
        $list[] = $row['Field'];
    }

    if ($exam['ex_id']) {
        $sql = " insert into {$mw_exam['info_table']} set ";
        $sql.= "   bo_table = '{$move_bo_table}' ";
        $sql.= " , wr_id = '{$insert_id}' ";

        foreach ($list as $field) {
            $sql.= " , {$field} = '".addslashes($exam[$field])."' ";
        }
        sql_query($sql);

        $ex_id = sql_insert_id();

        // question
        $list = array();
        $qry = sql_query(" desc {$mw_exam['question_table']} ");
        while ($row = sql_fetch_array($qry)) {
            if ($row['Field'] == "ex_id") continue;
            $list[] = $row['Field'];
        }

        $qry = sql_query(" select * from {$mw_exam['question_table']} where ex_id = '{$exam['ex_id']}' order by qn_num ");
        while ($tmp = sql_fetch_array($qry)) {
            $sql = " insert into {$mw_exam['question_table']} set ex_id = '{$ex_id}' ";
            foreach ($list as $field) {
                $sql.= " , {$field} = '".addslashes($tmp[$field])."' ";
            }
            sql_query($sql);
        }

        // answer
        $list = array();
        $qry = sql_query(" desc {$mw_exam['answer_table']} ");
        while ($row = sql_fetch_array($qry)) {
            if ($row['Field'] == "ex_id") continue;
            $list[] = $row['Field'];
        }

        $qry = sql_query(" select * from {$mw_exam['answer_table']} where ex_id = '{$exam['ex_id']}' ");
        while ($tmp = sql_fetch_array($qry)) {
            $sql = " insert into {$mw_exam['answer_table']} set ex_id = '{$ex_id}' ";
            foreach ($list as $field) {
                $sql.= " , {$field} = '".addslashes($tmp[$field])."' ";
            }
            sql_query($sql);
        }
    }
}
else if ($sw == 'move')
{
    $sql = " update {$mw_exam['info_table']} set bo_table = '{$move_bo_table}', wr_id = '{$insert_id}' ";
    $sql.= " where bo_table = '{$bo_table}' and wr_id = '{$row2['wr_id']}' ";
    sql_query($sql);
}


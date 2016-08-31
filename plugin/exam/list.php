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

$g4['title'] = "시험문제 모음";
include_once("_head.php");

$rows = 20; // 페이지당 목록 수

$exam_board = array();
$exam_bo_subject = array();
$sql = " select bo_table, bo_subject from {$g4['board_table']} ";
$sql.= "  where bo_read_level <= '{$member['mb_level']}' and bo_list_level <= '{$member['mb_level']}'";
$qry = sql_query($sql);
while ($row = sql_fetch_array($qry)) {
    $exam_board[] = $row['bo_table'];
    $exam_bo_subject[$row['bo_table']] = $row['bo_subject'];
}

$sql_common = " from {$mw_exam['info_table']} ";
$sql_search = " where bo_table in ('".implode("','", $exam_board)."') ";

if (!is_numeric($page)) $page = 1;

$sql_order = "order by ex_id desc";

$sql = "select count(*) as cnt
        $sql_common
        $sql_search";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page == "") { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = "select *
        $sql_common
        $sql_search
        $sql_order
        limit $from_record, $rows ";
$qry = sql_query($sql);

$list = array();
for ($i=0; $row=sql_fetch_array($qry); $i++) {
    $row2 = sql_fetch("select wr_subject, wr_datetime, wr_comment, mb_id from {$g4['write_prefix']}{$row['bo_table']} where wr_id = '{$row['wr_id']}'");
    if (!$row2) {
        sql_query("delete from {$mw_exam['info_table']} where bo_table = '{$row['bo_table']}' and wr_id = '{$row['wr_id']}'");
        $row2['wr_subject'] = "삭제되었습니다.";
        continue;
    }

    $mb = get_member($row2['mb_id'], "mb_id, mb_nick, mb_email, mb_homepage");

    $list[$i] = array_merge($row, $row2);
    if ($member['mb_id']) {
        $list[$i]['wr_subject'] = str_replace("{닉네임}", $member['mb_nick'], $list[$i]['wr_subject']);
        $list[$i]['wr_subject'] = str_replace("{별명}", $member['mb_nick'], $list[$i]['wr_subject']);
    } else {
        $list[$i]['wr_subject'] = str_replace("{닉네임}", "회원", $list[$i]['wr_subject']);
        $list[$i]['wr_subject'] = str_replace("{별명}", "회원", $list[$i]['wr_subject']);
    }
    $list[$i]['bo_subject'] = $exam_bo_subject[$row['bo_table']];
    $list[$i]['total'] = $row['ex_total'];
    $list[$i]['point'] = $row['ex_point'];
    $list[$i]['href'] = "{$g4['bbs_path']}/board.php?bo_table={$row['bo_table']}&wr_id={$row['wr_id']}";
    $list[$i]['board_href'] = "{$g4['bbs_path']}/board.php?bo_table={$row['bo_table']}";
    $list[$i]['name'] = get_sideview($mb['mb_id'], $mb['mb_nick'], $mb['mb_email'], $mb['mb_homepage']);

    $list[$i]['ex_begin'] = $row['ex_begin'];
    $list[$i]['ex_limit'] = $row['ex_limit'];

    if ($row['ex_begin'][0] != '0' && $row['ex_begin'] > $g4['time_ymdhis'])
        $list[$i]['status'] = "<span class='red'>시작전</span>";
    else if ($row['ex_limit'][0] != '0' && $row['ex_limit'] < $g4['time_ymdhis'])
        $list[$i]['status'] = "종료";
    else
        $list[$i]['status'] = "<span class='blue'>진행중</span>";

    $row3 = sql_fetch(" select count(*) as cnt from {$mw_exam['answer_table']} where ex_id = '{$row['ex_id']}' ");
    $list[$i]['answer_count'] = $row3['cnt'];

    if ($row['ex_limit_number'])
        $total = "{$list[$i]['answer_count']}/{$row['ex_limit_number']}";
    else
        $total = $row3['cnt'];

    $list[$i]['total'] = $total;
}

$list_count = count($list);

$write_pages = get_paging($rows, $page, $total_page, "$PHP_SELF?{$qstr}&page=");
?>
<script type="text/javascript" src="<?=$g4['path']?>/js/sideview.js"></script>
<style type="text/css">
/* .exam_list table { list-style:none; margin:0 0 0 5px; padding:0; }
.exam_list td { border-bottom:1px solid #e1e1e1; }
.exam_list .tt { background-color:#f2f2f2; color:#3f4ea1; border-bottom:1px solid #d5d5d5; height:30px; font:bold 12 'dotum'; text-align:center;}
.exam_list .name { width:130px; height:30px; text-align:center; }
.exam_list .subject { width:350px; height:50px; overflow:hidden; }
.exam_list .subject .title { background:url(img/icon_exam.png) 0 2px no-repeat; padding-left:20px; }
.exam_list .subject .period { font-size:11px; color:#888; font-family:dotum; padding:5px 0 0 20px; }
.exam_list .total { width:80px; height:30px; text-align:center; }
.exam_list .status { width:80px; height:30px; text-align:center; }
.exam_list .point { width:80px; height:30px; text-align:center; }
.exam_list .datetime { width:100px; height:30px; text-align:center; }

.exam_list span.bo_table a { font-size:11px; color:#888; font-family:dotum; }
.exam_list .subject a { font-size:12px; color:#444; font-family:dotum; }
.exam_list .subject a:hover { text-decoration:underline; }
.exam_list .total { font-size:11px; color:#888; font-family:dotum; }
.exam_list .status { font-size:11px; color:#888; font-family:dotum; }
.exam_list .status .red { color:red; }
.exam_list .status .blue { color:blue; }
.exam_list .point { font-size:11px; color:#888; font-family:dotum; }
.exam_list .comment { font-size:11px; color:#FF6600; font-family:dotum; }
.exam_list .datetime { font-size:11px; color:#888; font-family:dotum; }
.exam_list .write_pages { margin:20px 0 0 0; text-align:center; height:50px; }
.exam_list .none { padding:70px 0 70px 0; text-align:center; } */
</style>

<? @include("ad.php"); ?>

<div class="exam_list">

<table width="99%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td class="tt"> 퀴즈제목 </td>
    <td class="tt"> 상태 </td>
    <td class="tt"> 만점포인트 </td>
    <td class="tt"> 참여자수 </td>
    <td class="tt"> 등록일 </td>
</tr>
<? for ($i=0; $i<$list_count; $i++) { ?>
<tr>
    <td class="subject">
        <div class="title">
            <span class="bo_table"><a href="<?=$list[$i]['board_href']?>">[<?=$list[$i]['bo_subject']?>]</a></span>
            <a href="<?=$list[$i]['href']?>"><?=cut_str(get_text($list[$i]['ex_title']), 45)?></a>
            <? if ($list[$i]['wr_comment']) { ?>
                <span class="comment">+<?=$list[$i]['wr_comment']?></span>
            <? } ?>
        </div>

        <? if ($list[$i]['ex_begin'][0] && $list[$i]['ex_limit'][0]) { ?>
        <div class="period">
            진행기간 :
            <?=date("Y년 m월 d일 H시", strtotime($list[$i]['ex_begin']))?> ~
            <?=date("Y년 m월 d일 H시", strtotime($list[$i]['ex_limit']))?>
        </div>
        <? } ?>
    </td>
    <td class="status"><?=$list[$i]['status']?></td>
    <td class="point"><?=$list[$i]['ex_full_point']?number_format($list[$i]['ex_full_point']).'p':'&nbsp;';?> </td>
    <td class="total"><?=number_format($list[$i]['total'])?>명</td>
    <td class="datetime"><?=substr($list[$i]['wr_datetime'], 0, 10)?></td>
</tr>
<? } if (!$i) echo "<td class='none' colspan='6'> 자료가 없습니다. </td>"; ?>
</table>

<div class="write_pages"><?=$write_pages?></div>

</div>

<?
include_once("_tail.php");

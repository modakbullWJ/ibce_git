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

if (!$is_member)
    alert_close("로그인 후 이용해주세요");

$exam = sql_fetch(" select * from {$mw_exam['info_table']} where ex_id = '{$ex_id}' ");
if (!$exam)
    alert_close("시험문제가 존재하지 않습니다.");

if ($write['mb_id'] != $member['mb_id'] and !$is_admin)
    alert_close("조회할 권한이 없습니다.");

include_once("{$g4['path']}/head.sub.php");

$tmp = sql_fetch(" select count(*) as cnt from {$mw_exam['answer_table']} where ex_id = '{$ex_id}' ");
$answer_count = $tmp['cnt'];

$tmp = sql_fetch(" select sum(qn_score) as full_point from {$mw_exam['question_table']} where ex_id = '{$ex_id}' ");
$full_point = $tmp['full_point'];

$sql = " select * from {$mw_exam['answer_table']} where ex_id = '{$ex_id}' and mb_id = '{$mb_id}' ";
$answer = sql_fetch($sql);
if (!$answer)
    alert_close("답안지가 존재하지 않습니다.");

$sql = " select count(*) as cnt from {$mw_exam['question_table']} where ex_id = '{$ex_id}'";
$tmp = sql_fetch($sql);
$question_count = $tmp['cnt'];

$answer_list = array();

$tmp = explode("|", $answer['as_answer']);
for ($i=0; $i<$question_count; ++$i) {
    $answer_list[$i+1] = $tmp[$i];
}
?>
<style>
#fexam { margin:10px; padding:10px; border:1px solid #ccc; }

#fexam .ti { margin:0 0 20px 0; }
#fexam .ti #end_timer { float:right; margin:10px 20px 0 0; }
#fexam .ti h3 { margin:0 0 10px 0; padding:10px; background-color:#efefef; }
#fexam .ti table { width:95%; background-color:#ccc; }
#fexam .ti table .tt { width:120px; background-color:#efefef; height:25px; padding-left:10px; }
#fexam .ti table .tt { font:bold 12px 'dotum'; color:#555; }
#fexam .ti table .tb { background-color:#fff; padding-left:10px; }
#fexam .ti table .tb { font:normal 11px 'dotum'; color:#555; }

#fexam #ma { height:30px; line-height:30px; text-align:center; color:red; font:bold 13px 'dotum'; }

#fexam .it { border-bottom:1px solid #ccc; }
#fexam .it.wr { background-color:#f6b2b2; }
#fexam .it .qn { padding:20px 0 0 20px; font:bold 13px 'gulim'; }
#fexam .it .qn .po { font:normal 11px 'dotum'; }
#fexam .it .an { padding:20px 0 20px 30px; }
#fexam .it .an label { cursor:pointer; }

#fexam .fn { margin:30px; text-align:center; }
/* #fexam .fn input { background-color:#efefef; cursor:pointer; width:100px; } */
#close_btn{display: inline-block; padding: 7px; border: 1px solid #e8180c; background: #e8180c;
    color: #fff; text-decoration: none; vertical-align: middle; cursor:pointer;}



</style>

<form name="fexam" id="fexam" method="post">

<div class="ti">
    <h3><?php echo $exam['ex_title']?></h3>

    <table border="0" cellpadding="0" cellspacing="1" width="100%">
    <?php if ($exam['ex_begin'][0]) { ?>
    <tr>
        <td class="tt">시험기간</td>
        <td class="tb" colspan="3"><?php echo "{$exam['ex_begin']} ~ {$exam['ex_limit']}"?></td>
    </tr>
    <?php } ?>
    <tr>
        <td class="tt">참여제한</td>
        <td class="tb"><?php echo "{$answer_count} / {$exam['ex_limit_number']}"?> 명</td>
        <td class="tt">합격시 지급 포인트</td>
        <td class="tb"><?php echo number_format($exam['ex_point'])?> 점</td>
    </tr>
    <tr>
        <td class="tt">합격점수</td>
        <td class="tb"><?php echo "{$exam['ex_minimum']} / {$full_point}"?> 점</td>
        <td class="tt">만점시 지급 포인트</td>
        <td class="tb"><?php echo number_format($exam['ex_full_point'])?> 점</td>
    </tr>
    </table>
</div>

<div id="ma"></div>

<?php
$total = 0;
$as_answer = array();
$sql = " select * from {$mw_exam['question_table']} where ex_id = '{$ex_id}' order by qn_num ";
$qry = sql_query($sql);
while ($row = sql_fetch_array($qry)) {
    $question = trim($row['qn_question']);
    $n = $row['qn_num'];

    $multi = array();
    $is_multi = false;

    preg_match_all("/\[\]([^\n]+)\n/iUs", "$question\n", $matchs);
    for ($i=0, $m=count($matchs[1]); $i<$m; ++$i) {
        $question = trim(str_replace(trim($matchs[0][$i]), "", $question));
        $multi[] = trim($matchs[1][$i]);
        $is_multi = true;
    }

    $wrong = "";
    $this_answer = $answer_list[$n];

    $as_answer[] = $this_answer;

    if ($this_answer != $row['qn_right_answer']) {
        $wrong = "wr";
    }
    else {
        $total += $row['qn_score'];
    }
    ?>
    <div class="it <?php echo $wrong?>">
        <div class="qn"><?php echo "{$n}. {$question} &nbsp;&nbsp;<span class=\"po\">({$row['qn_score']}점)</span>"?></div>
        <div class="an">
            <?php for ($i=0, $m=count($multi); $i<$m; ++$i) { ?>
            <input type="radio" name="qn_<?php echo $n?>" id="qn_<?php echo "{$n}_{$i}"?>" value="<?php echo $i+1?>"<?php
                if ($i+1 == $this_answer) echo " checked"?>>
            <label for="qn_<?php echo "{$n}_{$i}"?>"><?php echo $multi[$i]?></label><br>
            <?php } ?>
            <?php if (!$is_multi) { ?>
            <input type="text" size="50" name="qn_<?php echo $n?>" id="qn_<?php echo $n?>" value="<?php echo $this_answer?>">
            <?php } ?>
        </div>
    </div>
    <?
}
if (!$question_count) {
    echo "시험문제가 아직 등록되지 않았습니다.";
}

$is_pass = false;
$is_record = false;

if ($total >= $exam['ex_minimum']) {
    $is_pass = true;
}
else {
    $is_pass = false;
}

if ($is_pass) {
    $pass_str = "합격";
    $as_pass = "1";
}
else {
    $pass_str = "불합격";
    $as_pass = "";
}

echo "<script>$(\"#ma\").html(\"{$pass_str} ({$total}점)\")</script>\n";
?>
<div class="fn">
    <input id="close_btn" type="button" value="닫&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;기" onclick="self.close();">
</div>

</form>

<?php

include_once("{$g4['path']}/tail.sub.php");

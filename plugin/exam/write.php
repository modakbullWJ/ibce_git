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
    alert_close("시험문제 등록 권한이 없습니다.");

$sql = " select ex_id from {$mw_exam['info_table']} ";
$sql.= "  where wr_id = '' ";
$sql.= "    and ex_datetime < date_add(curdate(), interval -3 day) ";
$qry = sql_query($sql);
while ($row = sql_fetch_array($qry)) {
    sql_query("delete from {$mw_exam['question_table']} where ex_id = '{$row['ex_id']}'");
    sql_query("delete from {$mw_exam['info_table']} where ex_id = '{$row['ex_id']}'");
}

$sql = " select * from {$mw_exam['info_table']} where bo_table = '{$bo_table}' ";
if ($wr_id)
    $sql .= " and wr_id = '{$wr_id}' and mb_id = '{$write['mb_id']}' "; // 등록된 데이터 수정
else
    $sql .= " and ex_id = '{$ex_id}' and mb_id = '{$member['mb_id']}' "; // 임시 데이터 수정

$exam = sql_fetch($sql);

if ($wr_id && !$ex_id)
    $ex_id = $exam['ex_id'];

$exam['ex_begin_date'] = null;
$exam['ex_begin_hour'] = null;
$exam['ex_begin_minute'] = null;

$exam['ex_limit_date'] = null;
$exam['ex_limit_hour'] = null;
$exam['ex_limit_minute'] = null;

if ($exam['ex_begin'][0]) {
    $exam['ex_begin_date'] = date("Y-m-d", strtotime($exam['ex_begin']));
    $exam['ex_begin_hour'] = date("H", strtotime($exam['ex_begin']));
    $exam['ex_begin_minute'] = date("i", strtotime($exam['ex_begin']));
}

if ($exam['ex_limit'][0]) {
    $exam['ex_limit_date'] = date("Y-m-d", strtotime($exam['ex_limit']));
    $exam['ex_limit_hour'] = date("H", strtotime($exam['ex_limit']));
    $exam['ex_limit_minute'] = date("i", strtotime($exam['ex_limit']));
}

include_once("{$g4['path']}/head.sub.php");
?>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="./style.css" type="text/css">

<h3>시험정보</h3>

<form name="fwrite" method="post" action="write_update.php">
<input type="hidden" name="bo_table" value="<?php echo $bo_table?>"/>
<input type="hidden" name="wr_id" value="<?php echo $wr_id?>"/>
<input type="hidden" name="ex_id" value="<?php echo $ex_id?>"/>

<table class="w" border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
    <td class="tt">· 시험제목  </td>
    <td class="tb">
        <input type="text" size="50" style="width:98%" name="ex_title" value="<?php echo $exam['ex_title']?>" itemname="시험제목" required>
    </td>
</tr>
<tr>
    <td class="tt" width="100">· 시험기간 </td>
    <td class="tb">
        <input type="text" size="12" name="ex_begin_date" id="ex_begin_date" value="<?php echo $exam['ex_begin_date']?>" itemname="시험기간">
        <select name="ex_begin_hour" id="ex_begin_hour">
            <?php for ($i=0; $i<=23; $i++) { ?>
            <option value="<?php echo sprintf("%02d", $i)?>"><?php echo sprintf("%02d", $i)?>
            <?php } ?>
        </select> 시
        <select name="ex_begin_minute" id="ex_begin_minute">
            <?php for ($i=0; $i<=59; $i++) { ?>
            <option value="<?php echo sprintf("%02d", $i)?>"><?php echo sprintf("%02d", $i)?>
            <?php } ?>
        </select> 분 00 초
        ~
        <br>
        <input type="text" size="12" name="ex_limit_date" id="ex_limit_date" value="<?php echo $exam['ex_limit_date']?>" itemname="시험기간">
        <select name="ex_limit_hour" id="ex_limit_hour">
            <?php for ($i=0; $i<=23; $i++) { ?>
            <option value="<?php echo sprintf("%02d", $i)?>"><?php echo sprintf("%02d", $i)?>
            <?php } ?>
        </select> 시
        <select name="ex_limit_minute" id="ex_limit_minute">
            <?php for ($i=0; $i<=59; $i++) { ?>
            <option value="<?php echo sprintf("%02d", $i)?>"><?php echo sprintf("%02d", $i)?>
            <?php } ?>
        </select> 분
        59 초

        <br>
        <input type="checkbox" name="ex_unlimited" value="1" onclick="set_unlimited()"> 무제한

        <span class="i">(비워두면 글작성시 부터 무제한)</span>
        <script>
        $(document).ready(function () {
            $("#ex_begin_date").val("<?php echo $exam['ex_begin_date']?>");
            $("#ex_begin_hour").val("<?php echo $exam['ex_begin_hour']?>");
            $("#ex_begin_minute").val("<?php echo $exam['ex_begin_minute']?>");
            $("#ex_limit_date").val("<?php echo $exam['ex_limit_date']?>");
            $("#ex_limit_hour").val("<?php echo $exam['ex_limit_hour']?>");
            $("#ex_limit_minute").val("<?php echo $exam['ex_limit_minute']?>");
        });
        </script>
    </td>
</tr>
<tr>
    <td class="tt">· 재시험</td>
    <td class="tb">
        <input type="checkbox" name="ex_retake" value="1" <?php echo $exam['ex_retake'] ? "checked" : ""?>>
        불합격시 재응시 가능
    </td>
</tr>
<tr>
    <td class="tt">· 참여가능 레벨</td>
    <td class="tb">
        <select name="ex_level" id="ex_level">
        <?php
        for ($i=2; $i<=$member['mb_level']; ++$i) {
            echo "<option value=\"{$i}\">{$i}</option>\n";
        }?>
        </select>
        레벨
        <select name="ex_level_scale" id="ex_level_scale">
            <option value="+"> 이상 가능 </option>
            <option value="="> 만 가능 </option>
            <option value="-"> 미만 가능 </option>
        </select>
        <script>
        $("#ex_level").val("<?php echo $exam['ex_level']?>");
        $("#ex_level_scale").val("<?php echo $exam['ex_level_scale']?>");
        </script>
    </td>
</tr>
<tr>
    <td class="tt">· 참여인원 제한</td>
    <td class="tb">
        <input type="text" size="5" name="ex_limit_number" value="<?php echo $exam['ex_limit_number']?>"> 명
        <span class="i">(비워두면 무제한)</span>
    </td>
</tr>
<tr>
    <td class="tt">· 합격점수 </td>
    <td class="tb">
        <input type="text" size="5" name="ex_minimum" value="<?php echo $exam['ex_minimum']?>" itemname="합격점수" required> 점
    </td>
</tr>
<tr>
    <td class="tt">· 만점시 지급포인트 </td>
    <td class="tb">
        <input type="text" size="5" name="ex_full_point" value="<?php echo $exam['ex_full_point']?>"> 포인트
    </td>
</tr>
<tr>
    <td class="tt">· 합격시 지급포인트 </td>
    <td class="tb">
        <input type="text" size="5" name="ex_point" value="<?php echo $exam['ex_point']?>"> 포인트
    </td>
</tr>
<tr>
    <td class="tt">· 시험문제 </td>
    <td class="tb">
        <div>객관식, 주관식 문제 예시를 보고 같은 형식으로 문제를 작성해주세요.</div>
        <div>
            <a href="#;" class="screenshot" rel="img/mu.png">[객관식 예시보기]</a>
            <a href="#;" class="screenshot" rel="img/sh.png">[주관식 예시보기]</a>
        </div>

        <div id="qn_list">
        <?php ob_start();?>
        <div class="qn_item">
            <div><textarea name="qn_question[]" cols="50" rows="10" style="width:98%">[qn_question]</textarea></div>
            <div>
                정답 : <input type="text" size="10" name="qn_right_answer[]" value="[qn_right_answer]">,
                점수 : <input type="text" size="10" name="qn_score[]" value="[qn_score]">
            </div>
        </div>
        <?php
        $tpl = ob_get_contents();
        ob_end_clean();

        $prt = null;

        if ($ex_id) {
            $sql = " select * from {$mw_exam['question_table']} where ex_id = '{$ex_id}' order by qn_num ";
            $qry = sql_query($sql);
            while ($row = sql_fetch_array($qry)) {
                $prt = $tpl;
                $prt = str_replace("[qn_question]", $row['qn_question'], $prt);
                $prt = str_replace("[qn_right_answer]", $row['qn_right_answer'], $prt);
                $prt = str_replace("[qn_score]", $row['qn_score'], $prt);
                echo $prt;
            }
        }
        if (!$ex_id or !$prt) {
            $prt = $tpl;
            $prt = str_replace("[qn_question]", "", $prt);
            $prt = str_replace("[qn_right_answer]", "", $prt);
            $prt = str_replace("[qn_score]", "", $prt);
            echo $prt;
        }
        ?>
        </div>
        <div class="add_button"><input type="button" value="문제추가" onclick="add_question()"></div>
    </td>
</tr>
</table>

<div class="fn">
    <input type="submit" value="등     록"/>
    <input type="button" value="닫     기" onclick="self.close()"/>
</div>
</form>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
<script src="<?php echo $g4['path']?>/skin/board/mw.basic/mw.js/tooltip.js"></script>
<script>
$(document).ready(function() {
    $.datepicker.regional['ko'] = {
            closeText: '닫기',
            prevText: '이전달',
            nextText: '다음달',
            currentText: '오늘',
            monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)',
            '7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
            monthNamesShort: ['1월','2월','3월','4월','5월','6월',
            '7월','8월','9월','10월','11월','12월'],
            dayNames: ['일','월','화','수','목','금','토'],
            dayNamesShort: ['일','월','화','수','목','금','토'],
            dayNamesMin: ['일','월','화','수','목','금','토'],
            weekHeader: 'Wk',
            dateFormat: 'yy-mm-dd',
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: true,
            yearSuffix: ''};
    $.datepicker.setDefaults($.datepicker.regional['ko']);

    $('#ex_begin_date').datepicker({
        showOn: 'both',
        buttonImage: '<?php echo $mw_exam['path']?>/img/calendar.gif',
        buttonImageOnly: true,
        buttonText: "달력",
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: 'c-99:c+99'
    });

    $('#ex_limit_date').datepicker({
        showOn: 'both',
        buttonImage: '<?php echo $mw_exam['path']?>/img/calendar.gif',
        buttonImageOnly: true,
        buttonText: "달력",
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: 'c-99:c+99'
    });

    $("img.ui-datepicker-trigger").attr("style", "margin-left:2px; vertical-align:middle; cursor: pointer;");
});

function add_question() {
    $('#qn_list .qn_item:last').clone(true).insertAfter('#qn_list .qn_item:last');
    $('#qn_list .qn_item:last textarea').val('');
    $('#qn_list .qn_item:last input:text').val('');
}

function set_unlimited() {
    $("#ex_begin_date").val("");
    $("#ex_begin_hour").val("");
    $("#ex_begin_minute").val("");

    $("#ex_limit_date").val("");
    $("#ex_limit_hour").val("");
    $("#ex_limit_minute").val("");

}
</script>
<?php

include_once("{$g4['path']}/tail.sub.php");

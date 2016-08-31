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
    alert_close("로그인 후 이용해주세요. / After Login.");

 if($member['mb_8'] == 'PASS'){
      alert_close("이미합격했습니다. / You already has passed.");
 }


//재시험 3번 제한 코드
if($member['mb_10'] == '4'){
       alert_close("이미 세번 응시 하셨습니다. / You already have tried 3-times this exam. Please check your result at My class.");
 }



$exam = sql_fetch(" select * from {$mw_exam['info_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' ");
if (!$exam)
    alert_close("시험문제가 존재하지 않습니다.");

$ex_level = true;
if ((!$exam['ex_level_scale'] || $exam['ex_level_scale'] == '+') && $exam['ex_level'] > $member['mb_level']) {
    $ex_level = false;
}

if ($exam['ex_level_scale'] == '=' && $exam['ex_level'] != $member['mb_level']) {
    $ex_level = false;
}

if ($exam['ex_level_scale'] == '-' && $exam['ex_level'] <= $member['mb_level']) {
    $ex_level = false;
}

if (!$ex_level)
    alert_close("시험에 응시할 권한이 없습니다. / You have no permission to take the exam. ");

$ex_id = $exam['ex_id'];

if ($exam['ex_begin'][0] and $exam['ex_begin'] > $g4['time_ymdhis'])
    alert_close("시험 시작 전 입니다.");

if ($exam['ex_limit'][0] and $exam['ex_limit'] < $g4['time_ymdhis'])
    alert_close("시험이 종료되었습니다.");

$tmp = sql_fetch(" select count(*) as cnt from {$mw_exam['answer_table']} where ex_id = '{$ex_id}' ");
$answer_count = $tmp['cnt'];

if ($exam['ex_limit_number'] > 0 and $answer_count >= $exam['ex_limit_number'])
    alert_close("참여인원({$exam['ex_limit_number']}명)을 초과해 더이상 시험에 참여하실 수 없습니다.");

include_once("{$g4['path']}/head.sub.php");

$tmp = sql_fetch(" select sum(qn_score) as full_point from {$mw_exam['question_table']} where ex_id = '{$ex_id}' ");
$full_point = $tmp['full_point'];

$sql = " select * from {$mw_exam['answer_table']} where ex_id = '{$ex_id}' and mb_id = '{$member['mb_id']}' ";
$answer = sql_fetch($sql);

if ($is_answer and $answer and !$exam['ex_retake'])
    alert("더이상 시험에 응시하실 수 없습니다.");

if ($is_answer and $answer and $answer['as_pass'])
    alert_close("이미 합격하셨습니다. ");

$sql = " select count(*) as cnt from {$mw_exam['question_table']} where ex_id = '{$ex_id}'";
$tmp = sql_fetch($sql);
$question_count = $tmp['cnt'];

$answer_list = array();

if ($answer) {
    if ($is_answer and $exam['ex_retake']) {
        for ($i=0; $i<$question_count; ++$i) {
            $answer_list[$i+1] = $_POST['qn_'.($i+1)];
        }
    }
    else {
        $is_answer = 1;
        $tmp = explode("|", $answer['as_answer']);
        for ($i=0; $i<$question_count; ++$i) {
            $answer_list[$i+1] = $tmp[$i];
        }
    }
}
else if ($is_answer) {
    for ($i=0; $i<$question_count; ++$i) {
        $answer_list[$i+1] = $_POST['qn_'.($i+1)];
    }
}
?>
<style>
#fexam { margin:10px; padding:10px; border:1px solid #ccc; }

#fexam .ti { margin:0 0 20px 0; }
#fexam .ti #end_timer { float:right; margin:10px 20px 0 0; }
#fexam .ti h3 { /* margin:0 0 10px 0; padding:20px; background-color:#efefef; text-align: center; font-size: 16px; */
margin: 30px 20px;  padding: 20px 50px; border: 0;  background: #ba9765;  font-size: 18px;
    color: #fff;  text-align: center;  opacity: 0.8;}
#fexam .ti table { width:95%; background-color:#ccc; }
#fexam .ti table .tt { width:120px; background-color:#efefef; height:25px; padding-left:10px; }
#fexam .ti table .tt { font:bold 12px 'dotum'; color:#555; }
#fexam .ti table .tb { background-color:#fff; padding-left:10px; }
#fexam .ti table .tb { font:normal 11px 'dotum'; color:#555; }

@media screen and (max-width:500px) {
    #fexam .ti table td,
    #fexam .ti table td.tt,
    #fexam .ti table td.tb
    { display:block; width:100%; line-height:30px; }
}

#fexam #ma { /* height:30px; line-height:30px; text-align:center; color:red; font:bold 13px 'dotum'; */
margin: 30px 20px;  padding: 20px 50px;  border: 0; /*  background: #ba9765; */
    font-size: 14px;  color:#ba9765; text-align: center; }

#fexam .it { border-bottom:1px solid #ccc; }
/* #fexam .it.wr { background-color:#f6b2b2; } */
#fexam .it .qn { padding:20px 0 0 20px; font:bold 14px 'gulim'; }
#fexam .it .qn .po { font:normal 11px 'dotum'; }
#fexam .it .an { padding:20px 0 20px 30px; font-size: 14px}
#fexam .it .an label { cursor:pointer; }

#fexam .fn { margin:30px; text-align:center; }
#fexam .fn button { background-color:#fff; cursor:pointer; padding:10px; border:1px solid #ccc; }
</style>

<form name="fexam" id="fexam" method="post">
<input type="hidden" name="bo_table" value="<?php echo $bo_table?>">
<input type="hidden" name="wr_id" value="<?php echo $wr_id?>">
<input type="hidden" name="ex_id" value="<?php echo $ex_id?>">
<input type="hidden" name="is_answer" value="1">

<div class="ti">
    <div id="end_timer"></div>
    <h3><?php echo $exam['ex_title']?></h3>

    <table border="0" cellpadding="0" cellspacing="1">
    <?php if ($exam['ex_begin'][0]) { ?>
    <tr>
        <td class="tt">시험기간</td>
        <td class="tb" colspan="3"><?php echo "{$exam['ex_begin']} ~ {$exam['ex_limit']}"?></td>
    </tr>
    <?php } ?>
<!--     <tr>
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
    </tr> -->
    </table>
</div>

<!-- 3번까지만 시험을 보게 하기 위해 불합격 횟수를 따로 카운트했음 wj -->
<?php if ($member['mb_10'] =='') { ?><div id="ma">1 회차 [First]</div><?php }?>
<?php if ($member['mb_10'] =='2') { ?><div id="ma">2 회차 [second]</div><?php }?>
<?php if ($member['mb_10'] =='3') { ?><div id="ma">3 회차 [Last]</div><?php }?>

<?php if ($is_answer) { ?><div id="ma"></div><?php }?>

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

    if ($is_answer and $this_answer != $row['qn_right_answer']) {
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

if ($is_answer) {
    $is_record = false;
    if ($total >= $exam['ex_minimum']) {
        $is_pass = true;
        $is_record = true;

        $content = "{$exam['ex_title']} PASS";
        if ($total == $full_point)
            insert_point($member['mb_id'], $exam['ex_full_point'], $content, $bo_table, $wr_id, "@exam");
        else
            insert_point($member['mb_id'], $exam['ex_point'], $content, $bo_table, $wr_id, "@exam");
    }
    else {
        $is_pass = false;
        if (!$exam['ex_retake']) {
            $is_record = true;
        }
    }

    if ($is_pass) {
        $pass_str = "PASS";
        $as_pass = "1";
    }
    else {
        $pass_str = "FAIL";
        $as_pass = "";
    }


    echo "<script>$(\"#ma\").html(\" 결과[Result] {$pass_str} ({$total}점) \")</script>\n";


if($is_pass == '1'){
    $pass_time = G5_TIME_YMDHIS;
}

if($is_pass == ''){
    $try_time = G5_TIME_YMDHIS;
}

// pass/fail표시를 위해
$as_result = $pass_str;

//합격이면 이걸로

    if ($is_record && !$answer['as_pass']) {
        sql_query("delete from {$mw_exam['answer_table']} where ex_id = '{$ex_id}' and mb_id = '{$member['mb_id']}' ");
        $as_answer = implode("|", $as_answer);
        $sql = " insert into {$mw_exam['answer_table']} set ";
        $sql.= "  ex_id = '{$ex_id}' ";
        $sql.= " ,mb_id = '{$member['mb_id']}' ";
        $sql.= " ,as_answer = '{$as_answer}' ";
        $sql.= " ,as_pass = '{$as_pass}' ";
        $sql.= " ,as_datetime = '{$g4['time_ymdhis']}' ";
        $sql.= " ,as_ip = '{$_SERVER['REMOTE_ADDR']}' ";

        $sql.= " ,as_class = '{$member['mb_4']}' ";
        $sql.= " ,mb_tel = '{$member['mb_tel']}' ";
        $sql.= " ,mb_name = '{$member['mb_name']}' ";
        $sql.= " ,mb_email = '{$member['mb_email']}' ";
        $sql.= " ,mb_hp = '{$member['mb_hp']}' ";
        $sql.= " ,mb_1 = '{$member['mb_1']}' ";
        $sql.= " ,mb_2 = '{$member['mb_2']}' ";
        $sql.= " ,mb_3 = '{$member['mb_3']}' ";
        $sql.= " ,mb_5 = '{$member['mb_5']}' ";
        $sql.= " ,mb_6 = '{$member['mb_6']}' ";
        $sql.= " ,mb_7 = '{$member['mb_7']}' ";
        $sql.= " ,as_result = '{$as_result}' ";
        $sql.= " ,as_subject = '{$exam['ex_title']}' ";
        $sql.= " ,as_score = '{$total}' ";
        $sql.= " ,mb_10 = '{$member['mb_10']}' ";
        $sql.= " ,try_time = '$try_time' ";
        $sql.= " ,pass_time = '$pass_time' ";

        $sql.= " ,as_agent = '{$_SERVER['HTTP_USER_AGENT']}' ";
        sql_query($sql);
    }


// 여기부터 멤버 테이블에도 결과를 저장하기 위한 코드 wj

$mb_id = $member["mb_id"];

if($member['mb_10'] == '' && $as_result  =='FAIL'){

   $count_take_f = "2";

} elseif($member['mb_10'] == '2' && $member['mb_8'] =='FAIL'){

    $count_take_f = "3";

}elseif($member['mb_10'] == '3' && $member['mb_8'] =='FAIL'){

    $count_take_f = "4";

}

if($pass_str == 'PASS'){
     $count_take_p ="1";
}
    //$minus_point = "-100";

   // insert_point($member['mb_id'], $minus_point, $content, $bo_table, $wr_id, "@exam");
 $sql3 = " update {$g5['member_table']}
 set
 mb_9 = '$pass_time',
 mb_15 = '$try_time',
 mb_8 = '{$as_result}',
 mb_13 = '{$total}',
 mb_14 ='{$exam['ex_title']}',
 mb_10 = '{$count_take_f}',

 mb_11 = '{$count_take_p}'

 where mb_id = '$mb_id' ";
 sql_query($sql3);


 }

?>
<!-- 회원 레벨을 가져와서 제이쿼리에 답안 체크 숫자를 확인하기 위해 wj-->
<input type="hidden" id="chk_level" value="<?php echo $member['mb_level']; ?>">



<div class="fn">
    <button type="submit" id="subbtn" >제 출 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提 交</button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button type="button" onclick="self.close();">닫 기&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;关 闭</button>
</div>

</form>

<?php if ($exam['ex_limit'][0]) { ?>
<script>
var end_time = <?=(strtotime($exam['ex_limit'])-$g4['server_time'])?>;
function run_timer()
{
    var timer = document.getElementById("end_timer");

    dd = Math.floor(end_time/(60*60*24));
    hh = Math.floor((end_time%(60*60*24))/(60*60));
    mm = Math.floor(((end_time%(60*60*24))%(60*60))/60);
    ii = Math.floor((((end_time%(60*60*24))%(60*60))%60));

    var str = "";

    if (dd > 0) str += dd + "일 ";
    if (hh > 0) str += hh + "시간 ";
    if (mm > 0) str += mm + "분 ";
    str += ii + "초 ";

    //timer.style.color = "#FF6C00";
    timer.style.color = "#FF0000";
    timer.style.fontWeight = "bold";
    timer.innerHTML = str;

    end_time--;

    if (end_time <= 0)  {
        clearInterval(tid);
        alert("시험시간이 종료되었습니다.");
        self.close();
    }
}
run_timer();
tid = setInterval('run_timer()', 1000);
</script>
<?php } ?>


<script>



    $(document).ready(function () {


// 레벨을 확인해서 답안 체크 갯수를 확인하고 모두 체크하지 않았으면 경고창을 띄운다. wj
var chk_level_jquery = $('#chk_level').val();

console.log(chk_level_jquery);

$('#subbtn').click(function() {

   value = $("input[type='radio']:checked").length;

   if (chk_level_jquery =='5' && value < 50) {

       alert("Please select an every answer / Master Class");

       return false;
   }

   if (chk_level_jquery =='4' && value < 50) {

       alert("Please select an every answer / C-1 Class");

       return false;
   }


   if (chk_level_jquery =='3' && value < 30) {

       alert("Please select an every answer / C-2 Class");

       return false;
   }

});


// 새로고침 버튼을 막았다. wj
$(document).keydown(function(e) {
    key = (e) ? e.keyCode : event.keyCode;

    var t = document.activeElement;

    if (key == 8 || key == 116 || key == 17 || key == 82) {
        if (key == 8) {
            if (t.tagName != "INPUT") {
                if (e) {
                    e.preventDefault();
                } else {
                    event.keyCode = 0;
                    event.returnValue = false;
                }
            }
        } else {
            if (e) {
                e.preventDefault();
            } else {
                event.keyCode = 0;
                event.returnValue = false;
            }
        }
    }
});

$(window.document).on("contextmenu", function(event){return false;});   //우클릭방지
$(window.document).on("selectstart", function(event){return false;});   //더블클릭을 통한 선택방지
$(window.document).on("dragstart"   , function(event){return false;});  //드래그



});



</script>

<?php

include_once("{$g4['path']}/tail.sub.php");

?>

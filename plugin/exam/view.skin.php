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

include_once("_config.php");



$dir = "/".dirname(str_replace($_SERVER['DOCUMENT_ROOT'], "", __FILE__));
$dir = str_replace("//", "/", $dir);

//if ($mw_basic['cf_exam_join_level'] > $member['mb_level']) return;

$sql = " select * from {$mw_exam['info_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' ";
$exam = sql_fetch($sql, false);

if (!$exam) return;

$tmp = sql_fetch(" select count(*) as cnt from {$mw_exam['answer_table']} where ex_id = '{$exam['ex_id']}' ");
$answer_count = $tmp['cnt'];

$tmp = sql_fetch(" select sum(qn_score) as full_point from {$mw_exam['question_table']} where ex_id = '{$exam['ex_id']}' ");
$full_point = $tmp['full_point'];
?>
<style>
#exam  { margin:0 0 0 0; border:1px solid #ccc; padding:30px 10px; background-color:#fff; }
#exam h3 { /* margin:0 0 10px 0; padding:10px; background-color:#efefef; font-size:14px; font-weight:bold; text-align: center;  */
margin: 20px;
    padding: 20px 50px;
    border: 0;
    background: #ba9765;
    font-size: 18px;
    color: #fff;
    text-align: center;
    opacity: 0.8;
}
#exam table { background-color:#ccc; border-spacing:1px; margin:0 0 10px 0; width:97%; }
#exam table .tt { width:120px; background-color:#efefef; height:25px; padding-left:10px; }
#exam table .tt { font:bold 12px 'dotum'; color:#555; }
#exam table .tb { background-color:#fff; padding-left:10px; }
#exam table .tb { font:normal 11px 'dotum'; color:#555; }
#exam .btn_exam { margin:20px 0 0 0; text-align:center; }
#exam .btn_exam button { background-color:#fff; cursor:pointer; font-size:12px; border:1px solid #ccc; padding:5px 10px 5px 10px; margin: 20px 0 0 0;}

@media screen and (max-width:500px) {
    #exam table td,
    #exam table td.tt,
    #exam table td.tb
    { display:block; width:100%; line-height:30px; }
}
</style>

<div id="exam">
    <h3>
        <?php echo $exam['ex_title']?>



    </h3>

<!--     <table border="0" cellpadding="0" cellspacing="1">
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
    </table> -->

    <div class="btn_exam">

        <button type="button" onclick="win_exam()"><i class="fa fa-file-text-o"></i> 시험보기 / 开始考试</button>
        <?php if ($write['mb_id'] == $member['mb_id'] or $is_admin) { ?>
        <button type="button" onclick="win_config()"><i class="fa fa-gear"></i> 시험설정</button>
        <button type="button" onclick="win_answer()"><i class="fa fa-list"></i> 응시목록</button>
        <?php } ?>
    </div>

</div>

<script>
function win_exam() {
    ex = window.open("<?php echo $exam_path?>/exam.php?bo_table=<?php echo $bo_table?>&wr_id=<?php echo $wr_id?>",
        "exam", "width=1300,height=950,scrollbars=yes,resizable=0");
    ex.focus();
}

<?php if ($write['mb_id'] == $member['mb_id'] or $is_admin) { ?>
function win_answer() {
    an = window.open("<?php echo $exam_path?>/answer.php?bo_table=<?php echo $bo_table?>&wr_id=<?php echo $wr_id?>",
        "answer", "width=1300,height=950,scrollbars=yes");
    an.focus();
}

function win_config() {
    wq = window.open("<?php echo $exam_path?>/write.php?bo_table=<?php echo $bo_table?>&wr_id=<?php echo $wr_id?>",
         "config", "width=1300,height=950,scrollbars=yes");
    wq.focus();

}
<?php } ?>
</script>

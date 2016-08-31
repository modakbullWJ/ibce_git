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

$exam = sql_fetch(" select * from {$mw_exam['info_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' ");
if (!$exam)
    alert_close("시험문제가 존재하지 않습니다.");

if ($write['mb_id'] != $member['mb_id'] and !$is_admin)
    alert_close("조회할 권한이 없습니다.");

include_once("{$g4['path']}/head.sub.php");

$sql_common = " from {$mw_exam['answer_table']} ";
$sql_search = " where ex_id = '{$exam['ex_id']}' ";
$sql_order = " order by as_datetime desc ";

if (!$sfl)
    $sfl = "mb_id";

if ($sfl && $stx)
    $sql_search .= " and {$sfl} like '%{$stx}%' ";

$sql = "select count(*) as cnt
        $sql_common
        $sql_search";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page == "") { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함  */

$sql = "select *
        $sql_common
        $sql_search
        $sql_order
        limit $from_record, $rows ";
$qry = sql_query($sql);

$mb_id_list = array();

$list = array();
for ($i=0; $row=sql_fetch_array($qry); $i++) {
    $list[$i] = $row;
    $list[$i]['num'] = $total_count - ($page - 1) * $rows - $i;

    $tmp = get_member($row['mb_id'], "mb_id, mb_nick, mb_email, mb_homepage");
    $list[$i]['name'] = get_sideview($tmp['mb_id'], $tmp['mb_nick'], $tmp['mb_email'], $tmp['mb_homepage']);

    if ($row['as_pass'])
        $list[$i]['as_pass'] = "합격";
    else
        $list[$i]['as_pass'] = "불합격";
}

$list_count = count($list);

$write_pages = get_paging($config['cf_write_pages'], $page, $total_page,
    "{$_SERVER['PHP_SELF']}?{$qstr}&bo_table={$bo_table}&wr_id={$wr_id}&page=");
?>
<link rel="stylesheet" href="style.css" type="text/css">

<style>
body { padding:10px; }
</style>

<script src="<?php echo $g4['path']?>/js/sideview.js"></script>

<div class="f">
    <div class="fp">
        <a href="<?php echo $_SERVER['PHP_SELF']?>?bo_table=<?php echo $bo_table?>&wr_id=<?php
            echo $wr_id?>"><?php echo $exam['ex_title']?></a>
    </div>
    <div class="fb">
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>" name="fsearch">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table?>">
        <input type="hidden" name="wr_id" value="<?php echo $wr_id?>">

        <select name="sfl">
            <option value="mb_id">회원ID</option>
            <option value="as_ip">IP</option>
        </select>
        <input type="text" size="10" name="stx" class="ed" value="<?php echo $stx?>">
        <input type="submit" class="b" value="검색">
        <script> fsearch.sfl.value = "<?php echo $sfl?>"; </script>
        &nbsp;
    </div>
</div>

<div id="answer_content">
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="t">
<tr>
    <td class="tt" width="50"> 번호 </td>
    <td class="tt" width="100"> 회원ID </td>
    <td class="tt" width="100"> 응시일시 </td>
    <td class="tt" width="100"> 합격여부 </td>
    <td class="tt" width=""> IP  </td>
    <td class="tt" width="80"> - </td>
</tr>
<?php  for ($i=0; $i<$list_count; $i++) { ?>
<tr>
    <td class="tls"> <?php echo $list[$i]['num']?> </td>
    <td class="tls"> <?php echo $list[$i]['name']?> </td>
    <td class="tls"> <?php echo $list[$i]['as_datetime']?> </td>
    <td class="tls"> <?php echo $list[$i]['as_pass']?> </td>
    <td class="tls"> <?php echo $list[$i]['as_ip']?> </td>
    <td class="tls">
        <a href="#;" onclick="win_answer('<?php echo $list[$i]['mb_id']?>')">[답안]</a>
        <a href="#;" onclick="del('delete_answer.php?ex_id=<?php echo $list[$i]['ex_id']?>&mb_id=<?php
            echo $list[$i]['mb_id']?>')">[삭제]</a>
    </td>
</tr>
<?php } ?>
<?php if (!$list_count) {?>
<tr>
    <td class="n" colspan="10">데이터가 없습니다.</td>
</tr>
<?php } ?>
</table>
</div>

<div style="padding:30px 0 50px 0; text-align:center;"><?php echo $write_pages?></div>

<script>
function win_answer (mb_id) {
    an = window.open("<?php echo $exam_path?>/answer_view.php?ex_id=<?php echo $exam['ex_id']?>&mb_id="+mb_id,
        "win_answer", "width=800,height=600,scrollbars=yes");
    an.focus();

}
</script>

<?php

include_once("{$g4['path']}/tail.sub.php");
